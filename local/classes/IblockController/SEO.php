<?php

namespace Legacy\IblockController;

use Bitrix\Iblock\InheritedProperty;
use Bitrix\Main\Loader;
use Legacy\General\Constants;
use Legacy\HighLoadBlock\Entity;

class SEO
{
    public static function get($arRequest) {
        $result = [];
        if ($arRequest['is_page']) {
            $page = !is_array($arRequest['page']) ? $arRequest['page'] : implode('/', $arRequest['page']);
        } else {
            $page = rawurldecode($arRequest['page']);
        }

        $params = [
            'select' => [
                'UF_TITLE',
                'UF_KEYWORDS',
                'UF_DESCRIPTION',
                'UF_H1',
            ],
            'filter' => [
                'UF_PAGE' => '/'.$page.'/',
            ],
            'order' => [
                'UF_SORT' => 'ASC',
            ]
        ];

        $rsData = Entity::getInstance()->getList(Constants::HLBLOCK_SEO_DATA, $params);
        if ($arrSeo = $rsData[0]) {
            $result = [
                'title' => $arrSeo['UF_TITLE'],
                'keywords' => $arrSeo['UF_KEYWORDS'],
                'description' => $arrSeo['UF_DESCRIPTION'],
                'h1' => $arrSeo['UF_H1'],
            ];
        }
        return $result;
    }

    public static function getProductSEO($id) {
        $seo = (new InheritedProperty\ElementValues(Constants::IB_CATALOG_CRM, $id))->getValues();
        return [
            'title' => $seo['ELEMENT_META_TITLE'],
            'keywords' => $seo['ELEMENT_META_KEYWORDS'],
            'description' => $seo['ELEMENT_META_DESCRIPTION'],
            'h1' => $seo['ELEMENT_PAGE_TITLE']
        ];
    }

    public static function getOfferSEO($id) {
        $seo = (new InheritedProperty\ElementValues(Constants::IB_CATALOG_CRM_OFFERS, $id))->getValues();
        return [
            'title' => $seo['ELEMENT_META_TITLE'],
            'keywords' => $seo['ELEMENT_META_KEYWORDS'],
            'description' => $seo['ELEMENT_META_DESCRIPTION'],
            'h1' => $seo['ELEMENT_PAGE_TITLE']
        ];
    }

    public static function getCategorySEO($categoryCode) {
        $seo = (new InheritedProperty\SectionValues(Constants::IB_CATALOG_CRM, Section::getIdByCode($categoryCode)))->getValues();
        return [
            'title' => $seo['SECTION_META_TITLE'],
            'keywords' => $seo['SECTION_META_KEYWORDS'],
            'description' => $seo['SECTION_META_DESCRIPTION'],
            'h1' => $seo['SECTION_PAGE_TITLE']
        ];
    }

    public static function getElementSEO($iblockId, $id) {
        $seo = (new InheritedProperty\ElementValues($iblockId, $id))->getValues();
        return [
            'title' => $seo['ELEMENT_META_TITLE'],
            'keywords' => $seo['ELEMENT_META_KEYWORDS'],
            'description' => $seo['ELEMENT_META_DESCRIPTION'],
        ];
    }
}
