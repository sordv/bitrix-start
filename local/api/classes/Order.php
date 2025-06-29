<?php

namespace Legacy\API;

use Bitrix\Main\Application;
use Bitrix\Main\Security\Random;
use Bitrix\Main\Web\Json;
use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Sale;
use Legacy\General\Constants;
use Legacy\General\Validation;
use Legacy\HighLoadBlock\OrganizationsTable;
use Legacy\Main\CLUser;
use \Saferoute\Widget\Common;
use \Saferoute\Widget\SafeRouteWidgetApi;
use Bitrix\Main\UserPhoneAuthTable;
use Legacy\Sale\Basket as LSBasket;
use Legacy\Sale\Order as LSOrder;

class Order
{
    public static function __callStatic($method, $arguments)
    {
        $CLUser = new CLUser();

        if ($CLUser->IsAuthorized()) {
            $class = OrderRegistered::class;
        } else {
            $class = OrderAnonymous::class;
        }

        if (method_exists($class, $method)) {
            return call_user_func($class.'::'.$method, $arguments[0]);
        } else {
            throw new \Exception('Метод не найден.');
        }
    }
}

abstract class AOrder
{
    protected static function order($arRequest)
    {
        $userType = $arRequest['user_type'] ?? 'contact';

        $userId = User::getID();
        if (is_null($userId)) {
            throw new \Exception('Ошибка при оформлении заказа.');
        }

        $orderProperties = $arRequest['order_properties'];
        if (is_null($orderProperties) || empty($orderProperties)) {
            throw new \Exception('Отсутствуют свойства заказа.');
        }

        if ($orderProperties['organization_id'] > 0 && $userType == 'company') {
            self::updateOrganizationOrderProps($orderProperties);
        }

        $personTypeID = constant('Legacy\General\Constants::PERSON_TYPE_CRM_' . strtoupper($userType));

        self::updateOrCreateProfile($userId, $personTypeID, $orderProperties);

        $basket = LSBasket::loadItems()->getBasket();
        if(!$basket->count()){
            throw new \Exception('Товаров в корзине не найдено. Обновите страницу.');
        }

        $order = LSOrder::initOrder($basket, $personTypeID, $userId, $orderProperties);

        $order->setOrderProperties();
        $order->setShipment();
        $order->setPayment(Constants::PAY_SYSTEM_INVOICE);

        $orderId = $order->createOrder();

        Basket::clearBasket([]);
        return ['order_id' => $orderId];
    }

    private static function updateOrCreateProfile($userId, $personTypeID, $orderProperties)
    {
        $profileId = null;
        $profileProps = [];

        $user_profiles = \CSaleOrderUserProps::GetList(
            ['DATE_UPDATE' => 'DESC'],
            ['USER_ID' => $userId]
        );
        while ($user_profile = $user_profiles->fetch()) {
            $userProfileProps = [];

            $profileProperties = \CSaleOrderUserPropsValue::GetList(
                ['ID' => 'ASC'],
                ['USER_PROPS_ID' => $user_profile['ID']]
            );
            while ($arPropVals = $profileProperties->Fetch()) {
                $userProfileProps[strtolower($arPropVals['PROP_CODE'])] = $arPropVals;
            }

            if ($orderProperties['organization_id'] === $userProfileProps['organization_id']['VALUE']) {
                $profileId = $user_profile['ID'];
                $profileProps = $userProfileProps;
                break;
            }
        }

        if ($profileId) {
            foreach ($orderProperties as $property => $value) {
                if ($id = $profileProps[$property]['ID']) {
                    if ($value != $profileProps[$property]['VALUE']) {
                        $propToUpdate = [
                            'ID' => $id,
                            'USER_PROPS_ID' => $profileId,
                            'VALUE' => $value
                        ];
                        \CSaleOrderUserPropsValue::Update($id, $propToUpdate);
                    }
                }
            }
        } else {
            $arProfileFields = [
                'NAME' => 'Профиль ' . date('Y-m-d'),
                'USER_ID' => $userId,
                'PERSON_TYPE_ID' => $personTypeID
            ];
            $PROFILE_ID = \CSaleOrderUserProps::Add($arProfileFields);

            if ($PROFILE_ID) {
                $order = Sale\Order::create(Context::getCurrent()->getSite(), $userId);
                $propertyCollection = $order->getPropertyCollection()->getArray()['properties'];
                $propertyIds = [];

                foreach ($propertyCollection as $property) {
                    $propertyIds[strtolower($property['CODE'])] = [
                        'ID' => $property['ID'],
                        'NAME' => $property['NAME']
                    ];
                }

                foreach ($orderProperties as $property => $value) {
                    if ($propertyIds[$property]) {
                        $prop = [
                            "USER_PROPS_ID" => $PROFILE_ID,
                            "NAME" => $propertyIds[$property]['NAME'],
                            "ORDER_PROPS_ID" => $propertyIds[$property]['ID'],
                            "VALUE" => $value
                        ];
                        \CSaleOrderUserPropsValue::Add($prop);
                    }
                }
            }
        }
    }
    private static function updateOrganizationOrderProps(&$orderProperties)
    {
        $userOrganizations = array_column(Organizations::getUserOrganizations(), 'id');
        if (!in_array($orderProperties['organization_id'], $userOrganizations)) {
            throw new \Exception('Организация не найдена');
        }

        $organization = OrganizationsTable::query()
            ->withSelect()
            ->withID($orderProperties['organization_id'])
            ->exec()
            ->fetch()
        ;

        $orderProperties['company'] = htmlspecialchars_decode($organization['UF_NAME']);
        $orderProperties['inn'] = $organization['UF_INN'];
        $orderProperties['ogrn'] = $organization['UF_OGRN'];
        $orderProperties['kpp'] = $organization['UF_KPP'];
        $orderProperties['director'] = $organization['UF_DIRECTOR'];
    }

    public static function getDeliveries($arRequest)
    {
        $needAllDeliveries = $arRequest['all']
            || current(Dadata::findCities(['query' => $arRequest['location']]))['region']
            === 'Тюменская обл';
        $result = [];

        if (Loader::includeModule('sale')) {
            $deliveryServices = \Bitrix\Sale\Delivery\Services\Table::getList(['filter' => ['ACTIVE' => 'Y'], 'order' => ['SORT' => 'ASC']]);
            while ($service = $deliveryServices->fetch()) {
                $id = $service['ID'];

                if ($id !== Constants::DELIVERY_BEZ_DOSTAVKI) {
                    if ($needAllDeliveries) {
                        if ($id == Constants::DELIVERY_SAMOVYVOZ) {
                            $dbResult = \CCatalogStore::GetList([], ['ISSUING_CENTER' => 'Y', 'ACTIVE' => 'Y']);
                            $stocks = [];
                            while ($stock = $dbResult->fetch()) {
                                $stocks[] = [
                                    'id' => $stock['ID'],
                                    'name' => $stock['TITLE'],
                                    'address' => $stock['ADDRESS'],
                                    'description' => $stock['DESCRIPTION'],
                                ];
                            }

                            $result[] = [
                                'code' => $service['XML_ID'],
                                'id' => $service['ID'],
                                'name' => $service['NAME'],
                                'description' => $service['DESCRIPTION'],
                                'stocks' => $stocks,
                            ];
                        } else {
                            if (!$result['transport_company']) {
                                $result['transport_company'] = [
                                    'code' => 'transport_company',
                                    'name' => 'Транспортная компания',
                                    'companies' => []
                                ];
                            }
                            if (strpos($service['XML_ID'], 'transport_company_') !== false) {
                                $result['transport_company']['companies'][] = [
                                    'code' => $service['XML_ID'],
                                    'id' => $service['ID'],
                                    'name' => $service['NAME'],
                                    'description' => $service['DESCRIPTION'],
                                    'logo' => getFilePath($service['LOGOTIP'])
                                ];
                            } else {
                                $result[] = [
                                    'code' => $service['XML_ID'],
                                    'id' => $service['ID'],
                                    'name' => $service['NAME'],
                                    'description' => $service['DESCRIPTION'],
                                ];
                            }
                        }
                    } else if ($service['XML_ID'] != 'pickup' && str_contains($service['XML_ID'], 'transport_company_')) {
                        if (!$result['transport_company']) {
                            $result['transport_company'] = [
                                'code' => 'transport_company',
                                'name' => 'Транспортная компания',
                                'companies' => []
                            ];
                        }
                        if (strpos($service['XML_ID'], 'transport_company_') !== false) {
                            $result['transport_company']['companies'][] = [
                                'code' => $service['XML_ID'],
                                'id' => $service['ID'],
                                'name' => $service['NAME'],
                                'description' => $service['DESCRIPTION'],
                                'logo' => getFilePath($service['LOGOTIP'])
                            ];
                        } else {
                            $result[] = [
                                'code' => $service['XML_ID'],
                                'id' => $service['ID'],
                                'name' => $service['NAME'],
                                'description' => $service['DESCRIPTION'],
                            ];
                        }
                    }
                }

            }
        }

        return array_values($result);
    }

    public static function getOrderOptions($arRequest)
    {
        $result = [];

        $user_profile_properties = self::getProfileProps()['profile_properties'];
        $location = $user_profile_properties['location'];

        if (!$location) {
            $location = Location::getUserLocation()['city'];
            $user_profile_properties['location'] = $location;
        }

        if (Loader::includeModule('sale')) {
            $result['order_receiving'] = self::getDeliveries(['location' => $location]);
            $result['user_order_properties'] = $user_profile_properties;
        }

        return $result;
    }

    private static function getProfileProps()
    {
        $userInfo = User::getProfileInfo();
        $userId = $userInfo['id'];

        $user_profiles = \CSaleOrderUserProps::GetList(
            ['DATE_UPDATE' => 'DESC'],
            ['USER_ID' => $userId]
        );

        $result = [
            'profile_properties' => [],
            'profile_id' => null
        ];
        if ($user_profile = $user_profiles->fetch()) {
            $result['profile_id'] = $user_profile['ID'];

            $profileProperties = \CSaleOrderUserPropsValue::GetList(
                ['ID' => 'ASC'],
                ['USER_PROPS_ID' => $user_profile['ID']]
            );
            while ($arPropVals = $profileProperties->Fetch()) {
                $result['profile_properties'][strtolower($arPropVals['PROP_CODE'])] = htmlspecialchars_decode($arPropVals['VALUE']);
            }

            if ($result['profile_properties']['organization_id'] > 0) {
                $organization = OrganizationsTable::query()
                    ->withSelect()
                    ->withID($result['profile_properties']['organization_id'])
                    ->exec()
                    ->fetch()
                ;

                $result['profile_properties']['company'] = htmlspecialchars_decode($organization['UF_NAME']);
                $result['profile_properties']['inn'] = $organization['UF_INN'];
                $result['profile_properties']['ogrn'] = $organization['UF_OGRN'];
                $result['profile_properties']['kpp'] = $organization['UF_KPP'];
                $result['profile_properties']['director'] = $organization['UF_DIRECTOR'];
            }
        } else {
            foreach ($userInfo as $property => $value) {
                if ($property == 'id' || $property == 'group') {
                    continue;
                }
                $result['profile_properties'][$property] = htmlspecialchars_decode($value);
            }
        }
        return $result;
    }
}

class OrderAnonymous extends AOrder
{
    public static function checkUserUnregistered($arRequest)
    {
        $email = $arRequest['email'];
        $phone = UserPhoneAuthTable::normalizePhoneNumber($arRequest['phone']);
        $FIO = explode(' ', $arRequest['FIO'] ?? '');
        $surname = $FIO[0] ?? '';
        $name = $FIO[1] ?? '';
        Validation::checkOrderRegistrationFields($email, $phone, $name, $surname);
        return true;
    }

    public static function checkout($arRequest)
    {
        if (Loader::includeModule('iblock') && Loader::includeModule('sale')) {
            $basket = LSBasket::loadItems()->getBasket();
            if(!$basket->count()){
                throw new \Exception('Товаров в корзине не найдено. Обновите страницу.');
            }

            $_SESSION['ORDER_REGISTRATION'] = Auth::$MODE_REGISTRATION_IN_ORDER;
            $user = Auth::orderRegistration($arRequest['order_properties']);
            $orderInfo = self::order($arRequest);
            return [...$orderInfo, 'user' => $user];
        }
    }
}

class OrderRegistered extends AOrder
{
    public static function checkout($arRequest)
    {
        if (Loader::includeModule('iblock') && Loader::includeModule('sale')) {
            return self::order($arRequest);
        }
    }
}
