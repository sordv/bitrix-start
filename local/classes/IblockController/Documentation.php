<?php

namespace Legacy\IblockController;

use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\Loader;
use Legacy\General\Constants;
use Legacy\General\DataProcessor;
use Legacy\Iblock\DocumentationTable;

class Documentation
{
    private static function processData($query)
    {
        $result = [];

        $db = $query->exec();

        while ($res = $db->fetch()) {
            $result [] = [
                'id' => $res['ID'],
                'name' => $res['NAME'],
                'code' => $res['CODE'],
                'text_information' => \Bitrix\Main\Web\Json::decode($res['TEXT_INFORMATION_VALUE'])['blocks'][0]['value'],
                'images' => \Bitrix\Main\Web\Json::decode($res['IMAGES_VALUE'])['blocks'][0]['images'],
            ];
        }

        return $result;
    }

    private static function processDataSimple($query)
    {
        $result = [];

        $db = $query->exec();

        while ($res = $db->fetch()) {
            $result [] = [
                'id' => $res['ID'],
                'name' => $res['NAME'],
                'code' => $res['CODE'],
            ];
        }

        return $result;
    }


    public static function get($arRequest)
    {
        $result = [];

        if (Loader::includeModule('iblock')) {
            $q = DocumentationTable::query()
                ->withSelect()
                ->withOrderBySort('ASC');
            $result['documentation_info'] = current(self::processData($q));
            $result['documentation'] = self::getDocumentation([]);
            $result['seo'] = SEO::get(['page' => 'docs', 'is_page' => true]);
        }

        return $result;
    }

    public static function getDocumentation($arRequest)
    {
        $result = [];

        if (Loader::includeModule('iblock')) {
            $q = DocumentationTable::query()
                ->withSimpleSelect()
                ->withOrderBySort('ASC');
            $result = self::processDataSimple($q);
        }

        return $result;
    }

    public static function getById($arRequest)
    {

        $id = $arRequest['id'];
        if(!$id) return false;
        $result = [];
        if (Loader::includeModule('iblock')) {
            $q = DocumentationTable::query()
                ->withSelect()
                ->withFilterByIDs($id);
            $result['documentation_info'] = current(self::processData($q));
            $result['documentation'] = self::getDocumentation([]);
            $result['seo'] = SEO::get(['page' => 'docs', 'is_page' => true]);
        }

        return $result;
    }

    public static function getPreviewByIds($arRequest)
    {
        $ids = $arRequest['ids'] ?? [];
        if(!$ids) return [];
        $result = [];
        if (Loader::includeModule('iblock')) {
            $q = DocumentationTable::query()
                ->withSimpleSelect()
                ->withFilterByIDs($ids);

            $result = self::processDataSimple($q);
        }

        return DataProcessor::sortResultByIDs($result,$ids);
    }
}
