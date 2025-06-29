<?php

namespace Legacy\Iblock;

use Legacy\General\Constants;
use Bitrix\Main\Type\DateTime;
use Bitrix\Main\Entity\Query;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Entity\ExpressionField;
use Bitrix\Main\DB\SqlExpression;

class SliderTable extends \Bitrix\Iblock\ElementTable
{
    public static function setDefaultScope($query)
    {
        $query
            ->where("IBLOCK_ID", Constants::IB_SLIDES)
            ->where("ACTIVE", true)
        ;
    }

    public static function withSelect(Query $query)
    {
        $query->registerRuntimeField(
            'FORM',
            new ReferenceField(
                'FORM',
                ElementPropertyTable::class,
                [
                    'this.ID' => 'ref.IBLOCK_ELEMENT_ID',
                    'ref.IBLOCK_PROPERTY_ID' => new SqlExpression('?', Constants::IB_PROP_SLIDES_BUTTON_FORM),
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
                    'ref.IBLOCK_PROPERTY_ID' => new SqlExpression('?', Constants::IB_PROP_SLIDES_BUTTON_LINK),
                ]
            )
        );

        $query->setSelect([
            'ID',
            'NAME',
            'PREVIEW_PICTURE',
            'DETAIL_PICTURE',
            'PREVIEW_TEXT',
            'FORM_ID' => 'FORM.VALUE',
            'LINK_ID' => 'LINK.VALUE',
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
