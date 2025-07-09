<?php

namespace Legacy\API;

use Legacy\General\Constants;
use Legacy\HighLoadBlock\Entity;

class ReconciliationActs
{
    public static function get($arRequest)
    {
        // если передан ID - возвращаем одну запись
        if (!empty($arRequest['id'])) {
            $params = [
                'select' => ['*'],
                'filter' => ['ID' => $arRequest['id']]
            ];
            
            $item = Entity::getInstance()->getRow(Constants::HLBLOCK_RECONCILIATION_ACTS, $params);

            // форматируем дату
            if ($item) {
                $item['UF_DATE_START'] = self::formatDate($item['UF_DATE_START']);
                $item['UF_DATE_END'] = self::formatDate($item['UF_DATE_END']);
                $item['UF_DATE_FORMATION'] = self::formatDate($item['UF_DATE_FORMATION']);
            }
            
            return [
                'item' => $item ? $item : null
            ];
        }
        
        // если ID не передан - возвращаем все записи
        // для этого нам нужно учесть сортировку и пагинацию
        // значения по умолчанию
        $order = ['ID' => 'ASC'];
        $limit = 10;
        $offset = 0;

        // если в запросе переданы свои значения
        if (isset($arRequest['order'])) {
            $order = $arRequest['order'];
        }

        if (isset($arRequest['limit'])) {
            $limit = (int)$arRequest['limit'];
        }

        if (isset($arRequest['offset'])) {
            $offset = (int)$arRequest['offset'];
        }

        // применение параметров
        $params = [
            'select' => ['*'],
            'order' => $order,
            'limit' => $limit,
            'offset' => $offset
        ];

        $items = Entity::getInstance()->getList(Constants::HLBLOCK_RECONCILIATION_ACTS, $params);
        
        foreach ($items as &$item) {
            // форматируем дату
            $item['UF_DATE_START'] = self::formatDate($item['UF_DATE_START']);
            $item['UF_DATE_END'] = self::formatDate($item['UF_DATE_END']);
            $item['UF_DATE_FORMATION'] = self::formatDate($item['UF_DATE_FORMATION']);
        }

        return [
            'items' => $items
        ];
    }

    private static function formatDate($data)
    {
        return \Bitrix\Main\Type\DateTime::createFromUserTime($data)->format('d.m.Y');
    }
}