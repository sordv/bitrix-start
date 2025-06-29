<?php

namespace Legacy\Iblock;

use Legacy\General\Constants;
use Bitrix\Main\Type\DateTime;
use Bitrix\Main\Entity\Query;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Entity\ExpressionField;
use Bitrix\Main\DB\SqlExpression;

class AdvantagesTable extends \Bitrix\Iblock\ElementTable
{
    public static function setDefaultScope($query)
    {
        $query
            ->where("IBLOCK_ID", Constants::IB_ADVANTAGES)
            ->where("ACTIVE", true)
        ;
    }

    public static function withSelect(Query $query)
    {
        $query->registerRuntimeField(
            'TITLE',
            new ReferenceField(
                'TITLE',
                ElementPropertyTable::class,
                [
                    'this.ID' => 'ref.IBLOCK_ELEMENT_ID',
                    'ref.IBLOCK_PROPERTY_ID' => new SqlExpression('?',Constants::IB_PROP_ADVANTAGES_TITLE),
                ]
            )
        );

        $query->setSelect([
            'ID',
            'NAME',
            'PREVIEW_PICTURE',
            'PREVIEW_TEXT',
            'TITLE_VALUE' => 'TITLE.VALUE'
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