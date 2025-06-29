<?php

namespace Legacy\Iblock;

use Legacy\General\Constants;
use Bitrix\Main\Type\DateTime;
use Bitrix\Main\Entity\Query;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Entity\ExpressionField;
use Bitrix\Main\DB\SqlExpression;

class LinksTable extends \Bitrix\Iblock\ElementTable
{
    public static function setDefaultScope($query)
    {
        $query
            ->where("IBLOCK_ID", Constants::IB_LINKS)
            ->where("ACTIVE", true)
        ;
    }

    public static function withSelect(Query $query)
    {
        $query->registerRuntimeField(
            'TEXT',
            new ReferenceField(
                'TEXT',
                ElementPropertyTable::class,
                [
                    'this.ID' => 'ref.IBLOCK_ELEMENT_ID',
                    'ref.IBLOCK_PROPERTY_ID' => new SqlExpression('?',Constants::IB_PROP_LINKS_TEXT),
                ]
            )
        );

        $query->registerRuntimeField(
            'OPEN_IN_NEW_WINDOW',
            new ReferenceField(
                'OPEN_IN_NEW_WINDOW',
                ElementPropertyTable::class,
                [
                    'this.ID' => 'ref.IBLOCK_ELEMENT_ID',
                    'ref.IBLOCK_PROPERTY_ID' => new SqlExpression('?',Constants::IB_PROP_LINKS_OPEN_IN_NEW_WINDOW),
                ]
            )
        );

        $query->registerRuntimeField(
            'LINK',
            new ReferenceField(
                'LINK',
                ElementPropertyTable::class,
                [
                    'this.ID' => 'ref.IBLOCK_ELEMENT_ID',
                    'ref.IBLOCK_PROPERTY_ID' => new SqlExpression('?',Constants::IB_PROP_LINKS_LINK),
                ]
            )
        );

        $query->setSelect([
            'ID',
            'NAME',
            'PREVIEW_PICTURE',
            'PREVIEW_TEXT',
            'TEXT_VALUE' => 'TEXT.VALUE',
            'OPEN_IN_NEW_WINDOW_VALUE' => 'OPEN_IN_NEW_WINDOW.VALUE',
            'LINK_VALUE' => 'LINK.VALUE'
        ]);
    }

    public static function withOrderBySort(Query $query, $sort)
    {
        $query->addOrder('SORT', $sort);
    }

    public static function withFilterByIDs(Query $query, $ids)
    {
        $query->whereIn('ID', $ids);
    }
}
