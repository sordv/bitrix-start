<?php

namespace Legacy\Sale;

use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Sale;
use Legacy\General\Constants;

class Order
{
    /** @var Sale\Order $order */
    var $order;
    /** @var Sale\Basket $basket */
    var $basket;
    /** @var integer personTypeId */
    var $personTypeID;

    private function __construct()
    {
        if (!Loader::includeModule('sale')) {
            throw new \Exception('Не удалось подключить модуль "sale".');
        }

        if (!Loader::includeModule('catalog')) {
            throw new \Exception('Не удалось подключить модуль "catalog".');
        }

        if (!Loader::includeModule('iblock')) {
            throw new \Exception('Не удалось подключить модуль "iblock".');
        }
    }

    public static function initOrder($basket, $personTypeID, $userId, $orderProperties)
    {
        $self = new self;
        $self->basket = $basket;
        $self->personTypeID = $personTypeID;
        $self->orderProperties = $orderProperties;
        $self->order = Sale\Order::create(Context::getCurrent()->getSite(), $userId);
        $self->order->setBasket($self->basket);
        $self->order->setPersonTypeId($self->personTypeID);

        return $self;
    }

    public function setCoupon($coupon)
    {
        Sale\DiscountCouponsManager::init(
            Sale\DiscountCouponsManager::MODE_ORDER, [
                "userId" => $this->order->getUserId(),
                "orderId" => $this->order->getId()
            ]
        );

        $res = Sale\DiscountCouponsManager::add($coupon);
        if (!$res) {
            $coupons = Sale\DiscountCouponsManager::get(true, [], true);
            $statusList = Sale\DiscountCouponsManager::getStatusList(true);
            throw new \Exception('Промокод '.$statusList[$coupons[$coupon]['STATUS']]);
        }

        $discounts = $this->order->getDiscount();
        $discounts->calculate();
        $this->save();
    }

    public function clearCoupon()
    {
        Sale\DiscountCouponsManager::clear(true);
        $discounts = $this->order->getDiscount();
        $discounts->calculate();
        $this->save();
    }

    public function getCoupons()
    {
        return Sale\DiscountCouponsManager::get(true, [], false);
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function getProperty($propertyCollection, $code)
    {
        foreach ($propertyCollection as $property) {
            if ($property->getField('CODE') == $code && $property->getPersonTypeId() == $this->personTypeID) {
                return $property;
            }
        }

        return null;
    }

    public function setOrderProperties()
    {
        $propertyCollection = $this->order->getPropertyCollection();
        foreach ($this->orderProperties as $orderProperty => $value) {
            if ($property = $this->getProperty($propertyCollection, strtoupper($orderProperty))) {
                $property->setValue(trim($value));
            }
        }
    }

    public function setShipment()
    {
        $shipmentCollection = $this->order->getShipmentCollection();
        $shipment = $shipmentCollection->createItem(
            \Bitrix\Sale\Delivery\Services\Manager::getObjectById($this->orderProperties['delivery_service'])
        );
        if ($this->orderProperties['delivery_service'] == Constants::DELIVERY_SAMOVYVOZ) {
            $shipment->setStoreId($this->orderProperties['stock_id']);
        }

        $shipmentItemCollection = $shipment->getShipmentItemCollection();
        foreach ($this->basket as $basketItem) {
            $item = $shipmentItemCollection->createItem($basketItem);
            $item->setQuantity($basketItem->getQuantity());
        }
    }

    public function setPayment($paySystemId)
    {
        $paymentCollection = $this->order->getPaymentCollection();
        $payment = $paymentCollection->createItem(\Bitrix\Sale\PaySystem\Manager::getObjectById($paySystemId));
        $payment->setField("SUM", $this->order->getPrice());
        $payment->setField("CURRENCY", $this->order->getCurrency());
    }

    public function createOrder()
    {
        $obResult = $this->order->save();

        if (!$obResult->isSuccess()) {
            throw new \Exception(implode('. ', $obResult->getErrorMessages()));
        }
        return $obResult->getId();
    }

    public static function load($orderId)
    {
        $self = new self;
        $self->order = Sale\Order::load($orderId);

        return $self;
    }

    public function getField($code)
    {
        return $this->order->getField($code);
    }

    public function getUserId()
    {
        return $this->order->getUserId();
    }

    public function getId()
    {
        return $this->order->getId();
    }

    public function cancel()
    {
        $paymentCollection = $this->order->getPaymentCollection();
        if ($paymentCollection->hasPaidPayment()) {
            $payment = $paymentCollection[0];
            $payment->setPaid("N");
            $payment->setReturn("Y");
        }

        $this->order->setField('STATUS_ID', 'D');
        $this->order->setField('CANCELED', 'Y');

        $this->order->save();
    }
}
