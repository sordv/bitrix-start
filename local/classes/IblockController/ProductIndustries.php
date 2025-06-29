<?php

namespace Legacy\IblockController;

use Bitrix\Main\Loader;
use Legacy\General\DataProcessor;
use Legacy\Iblock\ProductIndustriesTable;

class ProductIndustries
{
    private static function processData($query)
    {
        $result = [];

        $db = $query->exec();

        while ($arr = $db->fetch()) {
            $ID = (int)$arr['ID'];
            $index = array_search($ID, array_column($result, 'id'));

            if(is_numeric($index)){
                $result[$index]['items'][] = $arr['EXAMPLE'];
            }
            else{
                $result[] = [
                    'id' => $arr['ID'],
                    'name' => $arr['NAME'],
                    'type' => $arr['TYPE_VALUE'],
                    'type_description' => $arr['TYPE_DESCRIPTION'],
                    'img' => \CFile::GetPath($arr['PREVIEW_PICTURE']),
                    'items' => [
                        $arr['EXAMPLE'],
                    ],

                ];
            }
        }
        return $result;
    }

    public static function get($arRequest)
    {
        $result = [];

        if (Loader::includeModule('iblock')) {
            $q = ProductIndustriesTable::query()
                ->withSelect()
                ->withOrderBySort('ASC');
            $result = self::processData($q);
        }

        return $result;
    }

    public static function getByIds($arRequest)
    {
        $ids = $arRequest['ids'] ?? [''];

        $result = [];
        if (Loader::includeModule('iblock')) {
            $q = ProductIndustriesTable::query()
                ->withSelect()
                ->withFilterByIDs($ids);
            $result = self::processData($q);

        }

        return DataProcessor::sortResultByIDs($result, $ids);
    }
}
