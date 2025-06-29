<?php

namespace Legacy\API;

use \Bitrix\Main\Loader;
use Bitrix\Main\Config\Option;
use \Bitrix\Iblock\ElementTable;
use \Bitrix\Iblock\SectionTable;
use Legacy\General\Constants;
use Bitrix\Main\Application;

class Settings
{
    public static function get($arRequest)
    {
        $context = Application::getInstance()->getContext();
        $server = $context->getServer();

        return [
            'logos' => [
                'favicon' => Option::get('kubx.settings', 'favicon')
                    ? ($server->getServerPort() == '443' ? 'https' : 'http').'://'.$server->getServerName() . Option::get('kubx.settings', 'favicon')
                    : null,
                'logo' => Option::get('kubx.settings', 'logo')
                    ? ($server->getServerPort() == '443' ? 'https' : 'http').'://'.$server->getServerName() . Option::get('kubx.settings', 'logo')
                    : null,
                'mini_logo' => Option::get('kubx.settings', 'mini_logo')
                    ? ($server->getServerPort() == '443' ? 'https' : 'http').'://'.$server->getServerName() . Option::get('kubx.settings', 'mini_logo')
                    : null,
                'light_logo' => Option::get('kubx.settings', 'light_logo')
                    ? ($server->getServerPort() == '443' ? 'https' : 'http').'://'.$server->getServerName() . Option::get('kubx.settings', 'light_logo')
                    : null,
                ],
            'colors' => [
                'primary' => [
                    '900' => Option::get('kubx.settings', 'primary_900'),
                    '800' => Option::get('kubx.settings', 'primary_800'),
                    '700' => Option::get('kubx.settings', 'primary_700'),
                    '600' => Option::get('kubx.settings', 'primary_600'),
                    '500' => Option::get('kubx.settings', 'primary_500'),
                    '400' => Option::get('kubx.settings', 'primary_400'),
                    '300' => Option::get('kubx.settings', 'primary_300'),
                    '200' => Option::get('kubx.settings', 'primary_200'),
                    '100' => Option::get('kubx.settings', 'primary_100'),
                    '50' => Option::get('kubx.settings', 'primary_50'),
                ],
                'secondary' => [
                    '900' => Option::get('kubx.settings', 'secondary_900'),
                    '800' => Option::get('kubx.settings', 'secondary_800'),
                    '700' => Option::get('kubx.settings', 'secondary_700'),
                    '600' => Option::get('kubx.settings', 'secondary_600'),
                    '500' => Option::get('kubx.settings', 'secondary_500'),
                    '400' => Option::get('kubx.settings', 'secondary_400'),
                    '300' => Option::get('kubx.settings', 'secondary_300'),
                    '200' => Option::get('kubx.settings', 'secondary_200'),
                    '100' => Option::get('kubx.settings', 'secondary_100'),
                    '50' => Option::get('kubx.settings', 'secondary_50'),
                ],
                'other' => [
                    'icon' => Option::get('kubx.settings', 'icon_background'),
                ]
            ],
            'metatags' => [
                'title' => Option::get('kubx.settings', 'title'),
                'description' => Option::get('kubx.settings', 'description'),
            ],
            'other' => [
                'copyright_footer' => Option::get('kubx.settings', 'copyright_footer'),
            ],
            'need_preview_product_modal' => self::getNeedPreviewProductModal(),
        ];
    }

    //todo добавить в get
    public static function getBasketColors()
    {
        return [
            Option::get('kubx.settings', 'basket_2'),
            Option::get('kubx.settings', 'basket_3'),
            Option::get('kubx.settings', 'basket_4'),
            Option::get('kubx.settings', 'basket_5'),
            Option::get('kubx.settings', 'basket_6'),
            Option::get('kubx.settings', 'basket_7'),
            Option::get('kubx.settings', 'basket_8'),
        ];
    }

    private static function getNeedPreviewProductModal()
    {
        $needPreviewProductModal = Option::get('kubx.settings', 'need_preview_product_modal') === 'Y';
        return $needPreviewProductModal;
    }

    public static function getCatalogSort()
    {
        $catalogSort = Option::get('kubx.settings', 'catalog_sort');
        return self::processSort($catalogSort);
    }

    public static function getFavouriteSort()
    {
        $catalogSort = Option::get('kubx.settings', 'favourite_sort');
        return self::processSort($catalogSort);
    }

    private static function processSort($stringSort)
    {
        return array_map(function ($storeAmount) {
            [$key, $value] = explode('::', $storeAmount);
            return [
                'code' => $key,
                'name' => $value];
            }, explode('<>', $stringSort));
    }

    public static function getPropertiesViewInDetailProduct()
    {
        $result = [];
        $propertiesViewInDetailProduct = Option::get('kubx.settings', 'properties_view_in_detail_product');
         foreach (explode('<>', $propertiesViewInDetailProduct) as $propertyView) {
             [$propertyCode, $view] = explode('::', $propertyView);
             $result[$propertyCode] = $view;
         }
        return $result;
    }

    public static function getSwagger()
    {
        return getServerName().Option::get('kubx.settings', 'swagger');
    }
}
