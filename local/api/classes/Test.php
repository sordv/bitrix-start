<?php

namespace Legacy\API;

use \Bitrix\Main\Loader;
use Bitrix\Main\Config\Option;
use \Bitrix\Iblock\ElementTable;
use \Bitrix\Iblock\SectionTable;
use Legacy\General\Constants;
use Legacy\General\Helper;
use Legacy\HighLoadBlock\Entity;
use Legacy\Iblock\TestTable;

class Test
{

//    public static function get($arRequest)
//    {
//        $landingItem = null;
//        if (Loader::includeModule('iblock')) {
//            $q = TestTable::query()
//                ->withSelect();
//            return current(self::processData($q));
//        }
//    }

    public static function getKUBX($arRequest)
    {
        return Option::get('kubx.settings', 'kubx_900');
    }


    public static function get($arRequest)
    {
        return [
            'color'=>Option::get('kubx.settings', 'primary_800'),
            'logo'=> Option::get('kubx.settings', 'logo') ? $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['SERVER_NAME'] . Option::get('kubx.settings', 'logo') : null,
        ];
    }

    public static function initMainBaskets($arRequest)
    {
        global $USER;
        if($USER->IsAdmin()){
            $result = \Bitrix\Main\UserTable::getList(array(
                'select' => array('ID'),
                'filter' => array('ACTIVE' => true)
            ));
            $ids = array_map(function ($a) {
                return $a['ID'];
            }, $result->fetchAll());
            $params = [
                'filter' => [
                    'UF_USER' => $ids,
                    'UF_MAIN' => true
                ],
                'order' => [
                    'ID' => 'ASC',
                ],
                'select' =>  [
                    'UF_USER'
                ]
            ];
            $mainBaskets = Entity::getInstance()->getList(Constants::HLBLOCK_MULTI_BASKET, $params);
            $idsWithMain = array_map(function ($a) {
                return $a['UF_USER'];
            }, $mainBaskets);
            $idsNeedToCreateMainBasket = array_diff($ids, $idsWithMain);
            $count = 0;
            foreach ($idsNeedToCreateMainBasket as $id){
                $params = [
                    'UF_USER' => $id,
                    'UF_NAME' => 'Основная корзина',
                    'UF_DESCRIPTION' => '',
                    'UF_MAIN' => 1
                ];
                if(Entity::getInstance()->add(Constants::HLBLOCK_MULTI_BASKET, $params)){
                    $count++;
                };
            }
            return $count;
        } else {
            throw new \Exception('Недостаточно прав!');
        }
    }

}
