<?php

namespace Legacy\Iblock;

use Legacy\General\Constants;
use Bitrix\Main\Type\DateTime;
use Bitrix\Main\Entity\Query;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Entity\ExpressionField;
use Bitrix\Main\DB\SqlExpression;

class ServicesTable extends \Bitrix\Iblock\ElementTable
{
    public static function setDefaultScope($query)
    {
        $query
            ->where("IBLOCK_ID", Constants::IB_SERVICES)
            ->where("ACTIVE", true)
        ;
    }

    public static function withSelect(Query $query)
    {
        $query->registerRuntimeField(
            'PREVIEW_DESCRIPTION',
            new ReferenceField(
                'PREVIEW_DESCRIPTION',
                ElementPropertyTable::class,
                [
                    'this.ID' => 'ref.IBLOCK_ELEMENT_ID',
                    'ref.IBLOCK_PROPERTY_ID' => new SqlExpression('?',Constants::IB_PROP_SERVICES_PREVIEW_DESCRIPTION),
                ]
            )
        );
        $query->registerRuntimeField(
            'DETAIL_DESCRIPTION',
            new ReferenceField(
                'DETAIL_DESCRIPTION',
                ElementPropertyTable::class,
                [
                    'this.ID' => 'ref.IBLOCK_ELEMENT_ID',
                    'ref.IBLOCK_PROPERTY_ID' => new SqlExpression('?',Constants::IB_PROP_SERVICES_DETAIL_DESCRIPTION),
                ]
            )
        );

        $query->registerRuntimeField(
            'BUTTON',
            new ReferenceField(
                'BUTTON',
                ElementPropertyTable::class,
                [
                    'this.ID' => 'ref.IBLOCK_ELEMENT_ID',
                    'ref.IBLOCK_PROPERTY_ID' => new SqlExpression('?',Constants::IB_PROP_SERVICES_BUTTON),
                ]
            )
        );

        $query->setSelect([
            'ID',
            'NAME',
            'CODE',
            'DETAIL_PICTURE',
            'PREVIEW_DESCRIPTION_VALUE' => 'PREVIEW_DESCRIPTION.VALUE',
            'DETAIL_DESCRIPTION_VALUE' => 'DETAIL_DESCRIPTION.VALUE',
            'BUTTON_VALUE' => 'BUTTON.VALUE'
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

    public static function withFilterByCode(Query $query, $code)
    {
        $query->where('CODE', $code);
    }
}
