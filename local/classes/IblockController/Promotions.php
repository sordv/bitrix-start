<?php

namespace Legacy\IblockController;

use Bitrix\Main\Loader;
use Legacy\General\DataProcessor;
use Legacy\General\Constants;
use Legacy\Iblock\IblockPropertiesTable;

class Promotions
{
    private static function processData($query)
    {
        $arrayPropsCodes = [];
        $enumPropsCodes = ['TEMPLATE'];
        $filePropsCodes = ['IMAGE'];
        $sprintEditorPropsCodes = ['DESCRIPTION'];

        $result = DataProcessor::processIBProperties($query, ['arrayPropsCodes' => $arrayPropsCodes, 'enumPropsCodes' => $enumPropsCodes, 'filePropsCodes' => $filePropsCodes, 'sprintEditorPropsCodes' => $sprintEditorPropsCodes], true);

        foreach ($result as &$block) {
            $block['DESCRIPTION'] = $block['DESCRIPTION'][0]['value'];
        }

        return $result;
    }
    public static function getByIds($arRequest)
    {
        $ids = $arRequest['ids'] ?? [];

        $result = [];
        if (Loader::includeModule('iblock')) {
            $q = IblockPropertiesTable::query()
                ->withIblock(Constants::IB_PROMOTIONS)
                ->withSelect()
                ->withFilterByIDs($ids);
            $result = self::processData($q);
        }

        return DataProcessor::sortResultByIDs($result, $ids, true);
    }
}
