<?php

namespace Legacy\Iblock;

use Legacy\General\Constants;
use Bitrix\Main\Type\DateTime;
use Bitrix\Main\Entity\Query;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Entity\ExpressionField;
use Bitrix\Main\DB\SqlExpression;

class DocumentationTable extends \Bitrix\Iblock\ElementTable
{
    public static function setDefaultScope($query)
    {
        $query
            ->where("IBLOCK_ID", Constants::IB_DOCUMENTATION)
            ->where("ACTIVE", true)
        ;
    }

    public static function withSelect(Query $query)
    {
        $query->registerRuntimeField(
            'TEXT_INFORMATION',
            new ReferenceField(
                'TEXT_INFORMATION',
                ElementPropertyTable::class,
                [
                    'this.ID' => 'ref.IBLOCK_ELEMENT_ID',
                    'ref.IBLOCK_PROPERTY_ID' => new SqlExpression('?',Constants::IB_PROP_DOCUMENTATION_TEXT_INFORMATION),
                ]
            )
        );

        $query->registerRuntimeField(
            'IMAGES',
            new ReferenceField(
                'IMAGES',
                ElementPropertyTable::class,
                [
                    'this.ID' => 'ref.IBLOCK_ELEMENT_ID',
                    'ref.IBLOCK_PROPERTY_ID' => new SqlExpression('?',Constants::IB_PROP_DOCUMENTATION_IMAGES),
                ]
            )
        );

        $query->setSelect([
            'ID',
            'NAME',
            'CODE',
            'TEXT_INFORMATION_VALUE' => 'TEXT_INFORMATION.VALUE',
            'IMAGES_VALUE' => 'IMAGES.VALUE'
        ]);
    }

    public static function withSimpleSelect(Query $query)
    {
        $query->setSelect([
            'ID',
            'NAME',
            'CODE'
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