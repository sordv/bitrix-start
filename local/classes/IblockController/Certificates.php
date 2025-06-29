<?php

namespace Legacy\IblockController;

use Bitrix\Main\Loader;
use Legacy\General\DataProcessor;
use Legacy\Iblock\CertificatesTable;

class Certificates
{
    private static function processData($query)
    {
        $result = [];

        $db = $query->exec();

        while ($arr = $db->fetch()) {
            $result []= [
                'id' => $arr['ID'],
                'image' => getFilePath($arr['PREVIEW_PICTURE']),
            ];
        }

        return $result;
    }

    public static function getByIds($arRequest)
    {
        $ids = $arRequest['ids'] ?? [''];

        $result = [];
        if (Loader::includeModule('iblock')) {
            $q = CertificatesTable::query()
                ->withSelect()
                ->withFilterByIDs($ids);
            $result = self::processData($q);

        }

        return DataProcessor::sortResultByIDs($result, $ids);
    }
}
