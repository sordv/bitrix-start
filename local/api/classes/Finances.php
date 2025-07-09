<?php

namespace Legacy\API;

use Legacy\General\Constants;
use Legacy\HighLoadBlock\Entity;

class Finances
{
    public static function get($arRequest)
    {
        // если передан ID - возвращаем одну запись
        if (!empty($arRequest['id'])) {
            $params = [
                'select' => ['*'],
                'filter' => ['ID' => $arRequest['id']]
            ];
            
            $item = Entity::getInstance()->getRow(Constants::HLBLOCK_FINANCES, $params);

            // форматируем дату и дату со временем
            if ($item) {
                $item['UF_DATE_UPDATE'] = self::formatDateAndTime($$item['UF_DATE_UPDATE']);
                $item['UF_DATE_NEXT_PAYMENT'] = self::formatDate($item['UF_DATE_NEXT_PAYMENT']);
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

        $items = Entity::getInstance()->getList(Constants::HLBLOCK_FINANCES, $params);
        
        // форматируем дату и дату со временем
        foreach ($items as &$item) {
            $item['UF_DATE_UPDATE'] = self::formatDateAndTime($$item['UF_DATE_UPDATE']);
            $item['UF_DATE_NEXT_PAYMENT'] = self::formatDate($item['UF_DATE_NEXT_PAYMENT']);
        }
        unset($item);
            
        return [
            'items' => $items
        ];
    }

    private static function formatDateAndTime($data)
    {
        return \Bitrix\Main\Type\DateTime::createFromUserTime($data)->format('d.m.Y H:i:s');
    }

    private static function formatDate($data)
    {
        return \Bitrix\Main\Type\DateTime::createFromUserTime($data)->format('d.m.Y');
    }
}