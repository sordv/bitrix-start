<?php

namespace Legacy\IblockController;

use Bitrix\Main\Loader;
use Legacy\General\DataProcessor;
use Legacy\Iblock\AdvantagesTable;

class Advantages
{
    private static function processData($query)
    {
        $result = [];

        $db = $query->exec();

        while ($arr = $db->fetch()) {
            $result []= [
                'id' => $arr['ID'],
                'title' => $arr['TITLE_VALUE'],
                'subtitle' => $arr['PREVIEW_TEXT'],
                'img' => getFilePath($arr['PREVIEW_PICTURE']),
            ];
        }

        return $result;
    }


    public static function get($arRequest)
    {
        $result = [];

        if (Loader::includeModule('iblock')) {
            $q = AdvantagesTable::query()
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
            $q = AdvantagesTable::query()
                ->withSelect()
                ->withFilterByIDs($ids);
            $result = self::processData($q);

        }

        return DataProcessor::sortResultByIDs($result, $ids);
    }
}
