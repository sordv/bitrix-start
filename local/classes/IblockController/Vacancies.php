<?php

namespace Legacy\IblockController;

use \Bitrix\Main\Loader;
use Legacy\General\DataProcessor;
use Legacy\General\Constants;
use Legacy\Iblock\VacanciesTable;

class Vacancies
{
    private static function processData($query)
    {
        $result = [];

        $db = $query->exec();

        while ($arr = $db->fetch()) {
            $result[] = [
                'id' => $arr['ID'],
                'name' => $arr['VACANCY_TITLE_VALUE'],
                'preview_description' => \Bitrix\Main\Web\Json::decode($arr['DESCRIPTION_ANNOUNCEMENT_VALUE'] ?? '{}')['blocks']['0']['value'] ?? '',
                'description' => \Bitrix\Main\Web\Json::decode($arr['DESCRIPTION_VALUE'] ?? '{}')['blocks'][0]['value'] ?? '',
                'form' => ButtonForms::getByID(['id' => $arr['FORM_VALUE']]),
            ];
        }

        return $result;
    }


    public static function get($arRequest)
    {
        $result = [];

        if (Loader::includeModule('iblock')) {
            $q = VacanciesTable::query()
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
            $q = VacanciesTable::query()
                ->withSelect()
                ->withFilterByIDs($ids);
            $result = self::processData($q);
        }

        return DataProcessor::sortResultByIDs($result, $ids);
    }
}
