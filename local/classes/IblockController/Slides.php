<?php

namespace Legacy\IblockController;

use Bitrix\Main\Loader;
use Legacy\General\DataProcessor;
use Legacy\Iblock\SliderTable;

class Slides
{
    private static function processData($query)
    {
        $result = [];

        $db = $query->exec();

        while ($arr = $db->fetch()) {
            $result []= [
                'id' => $arr['ID'],
                'title' => $arr['NAME'],
                'subtitle' => $arr['PREVIEW_TEXT'],
                'image' =>[
                    'desktop' => getFilePath($arr['PREVIEW_PICTURE']),
                    'mobile' => getFilePath($arr['DETAIL_PICTURE']),
                ],
                'button_form' => ButtonForms::getById(['id' => $arr['FORM_ID']]),
                'button_link' => Links::getById(['id' => $arr['LINK_ID']]),
            ];
        }

        return $result;
    }


    public static function get($arRequest)
    {
        $result = [];

        if (Loader::includeModule('iblock')) {
            $q = SliderTable::query()
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
            $q = SliderTable::query()
                ->withSelect()
                ->withFilterByIDs($ids);
            $result = self::processData($q);

        }

        return DataProcessor::sortResultByIDs($result, $ids);
    }
}
