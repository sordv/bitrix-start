<?php

namespace Legacy\IblockController;

use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\Loader;
use Legacy\General\Constants;
use Legacy\General\DataProcessor;
use Legacy\Iblock\ServicesTable;

class Services
{
    private static function processData($query)
    {
        $result = [];

        $db = $query->exec();

        while ($res = $db->fetch()) {
            $result [] = [
                'id' => $res['ID'],
                'title' => $res['NAME'],
                'code' => $res['CODE'],
                'image' => getFilePath($res['DETAIL_PICTURE']),
                'preview_description' => \Bitrix\Main\Web\Json::decode($res['PREVIEW_DESCRIPTION_VALUE'] ?? '{}')['blocks'][0]['value'],
                'description' => \Bitrix\Main\Web\Json::decode($res['DETAIL_DESCRIPTION_VALUE'] ?? '{}')['blocks'][0]['value'],
                'button' => ButtonForms::getById(['id' => $res['BUTTON_VALUE']]),
            ];
        }

        return $result;
    }

    public static function get($arRequest)
    {
        $result = ['items' => [], 'seo' => []];

        if (Loader::includeModule('iblock')) {
            $q = ServicesTable::query()
                ->withSelect()
                ->withOrderBySort('ASC');
            $result['items'] = self::processData($q);
            $result['seo'] = SEO::get(['page' => 'services', 'is_page' => true]);
        }

        return $result;
    }


    public static function getById($arRequest)
    {
        $code = $arRequest['pageCode'];
        if(!$code) return false;
        $result = [];
        if (Loader::includeModule('iblock')) {
            $q = ServicesTable::query()
                ->withSelect()
                ->withFilterByCode($code);

            $result = current(self::processData($q));

            $result['seo'] = SEO::getElementSEO(Constants::IB_SERVICES, $result['id']);
        }

        return $result;
    }

    public static function getByIds($arRequest)
    {
        $ids = $arRequest['ids'] ?? [];
        $result = [];
        if (Loader::includeModule('iblock')) {
            $q = ServicesTable::query()
                ->withSelect()
                ->withFilterByIDs($ids);

            $result = self::processData($q);
        }

        return DataProcessor::sortResultByIDs($result, $ids);
    }
}
