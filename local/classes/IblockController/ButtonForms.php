<?php

namespace Legacy\IblockController;

use Bitrix\Main\Loader;
use Legacy\General\DataProcessor;
use Legacy\Iblock\ButtonFormsTable;

class ButtonForms
{
    private static function processData($query)
    {
        $result = [];

        $db = $query->exec();

        while ($arr = $db->fetch()) {
            $result []= [
                'id' => $arr['ID'],
                'text' => $arr['NAME'],
                'form' => $arr['FORM_TYPE'],
            ];
        }

        return $result;
    }


    public static function get($arRequest)
    {
        $result = [];

        if (Loader::includeModule('iblock')) {
            $q = ButtonFormsTable::query()
                ->withSelect()
                ->withOrderBySort('ASC');
            $result = self::processData($q);
        }

        return $result;
    }

    public static function getById($arRequest)
    {
        $id = $arRequest['id'];
        if(!$id) return false;
        $result = [];
        if (Loader::includeModule('iblock')) {
            $q = ButtonFormsTable::query()
                ->withSelect()
                ->withFilterByIDs($id);
            $result = self::processData($q);
        }

        return current($result);
    }

    public static function getByIds($arRequest)
    {
        $ids = $arRequest['ids'] ?? [''];
        $result = [];
        if (Loader::includeModule('iblock')) {
            $q = ButtonFormsTable::query()
                ->withSelect()
                ->withFilterByIDs($ids);
            $result = self::processData($q);
        }

        return DataProcessor::sortResultByIDs($result, $ids);
    }
}
