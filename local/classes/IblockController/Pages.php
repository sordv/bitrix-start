<?php

namespace Legacy\IblockController;

use Bitrix\Main\Loader;
use Legacy\General\Constants;
use Legacy\General\DataProcessor;
use Legacy\Iblock\CompositePagesTable;
use Legacy\Iblock\PagesTable;

class Pages
{
    private static function processPageData($query)
    {
        $arrayPropsCodes = [
            'SLIDER_BLOCK_SORT',
            'SLIDER_BLOCK',
            'ADVANTAGES_BLOCK_SORT',
            'ADVANTAGES_BLOCK',
            'PRODUCTS_BLOCK_SORT',
            'PRODUCTS_BLOCK',
            'ABOUT_COMPANY_BLOCK_SORT',
            'ABOUT_COMPANY_BLOCK',
            'PRODUCT_INDUSTRIES_BLOCK_SORT',
            'PRODUCT_INDUSTRIES_BLOCK',
            'WORK_STEPS_BLOCK_SORT',
            'WORK_STEPS_BLOCK',
            'FORM_BLOCK_SORT',
            'FORM_BLOCK',
            'FAQ_BLOCK_SORT',
            'FAQ_BLOCK',
            'CONTACTS_BLOCK_SORT',
            'CONTACTS_BLOCK',
            'CERTIFICATES_BLOCK_SORT',
            'CERTIFICATES_BLOCK',
            'PARTNERS_BLOCK_SORT',
            'PARTNERS_BLOCK',
            'IMAGE_TEXT_BLOCK_SORT',
            'IMAGE_TEXT_BLOCK',
            'REQUISITES_BLOCK_SORT',
            'REQUISITES_BLOCK',
            'STAFF_CONTACTS_BLOCK_SORT',
            'STAFF_CONTACTS_BLOCK',
            'REVIEWS_BLOCK_SORT',
            'REVIEWS_BLOCK',
            'VACANCIES_BLOCK_SORT',
            'VACANCIES_BLOCK',
            'LINKS_BLOCK_SORT',
            'LINKS_BLOCK',
        ];
        $sprintEditorPropsCodes = ['BLOCKS'];

        return DataProcessor::processIBProperties($query, ['arrayPropsCodes' => $arrayPropsCodes, 'sprintEditorPropsCodes' => $sprintEditorPropsCodes], true);
    }

    private static function processSimplePageData($query)
    {
       $result = [];

        $db = $query->exec();

        while ($arr = $db->fetch()) {
            $result []= [
                'id' => $arr['ID'],
                'name' => $arr['PAGE_HEADER'],
                'code' => $arr['CODE'],
            ];
        }

        return $result;
    }


    private static function processCompositePageData($query)
    {
        $sprintEditorPropsCodes = ['PAGES'];

        return DataProcessor::processIBProperties($query, ['sprintEditorPropsCodes' => $sprintEditorPropsCodes], true);
    }

    public static function getPage($arRequest)
    {
        $code = $arRequest['code'];
        $requestItem = null;
        if (Loader::includeModule('iblock')) {
            $q = PagesTable::query()
                ->withSelect()
                ->withFilterByCode($code);
            $requestItem = current(self::processPageData($q));
        }

        if (!$requestItem) {
            return null;
        }

        $blocks = [];
        foreach ($requestItem['BLOCKS'] as $blockInfo) {
            $blocks = [
                ...$blocks,
                ...self::getBlocksInfo($blockInfo['iblock_id'], $blockInfo['element_ids'])
            ];
        }

        return array_change_key_case_recursive([
            'page_header' => $requestItem['PAGE_HEADER'],
            'blocks' => $blocks,
            'seo' => SEO::getElementSEO(Constants::IB_PAGES, $requestItem['INFO']['ID'])
        ]);
    }

    public static function getCompositePage($arRequest)
    {
        $code = $arRequest['code'];
        if(!$code) {
            throw new \Exception('Не передан код страницы');
        }

        $requestItem = null;
        if (Loader::includeModule('iblock')) {
            $q = CompositePagesTable::query()
                ->withSelect()
                ->withFilterByCode($code);
            $requestItem = current(self::processCompositePageData($q));
        }

        $pagesIds = $requestItem['PAGES'][0]['element_ids'];

        $q = PagesTable::query()
            ->withSimpleSelect()
            ->withFilterByIDs($pagesIds);
        $pages = self::processSimplePageData($q);
        $pageCode = $arRequest['pageCode'] ?? $pages[0]['code'];

        return [
            'tabs' => $pages,
            'current_tab' => $pageCode,
            'page_info' => self::getPage(['code' => $pageCode]),
            'seo' => SEO::getElementSEO(Constants::IB_COMPOSITE_PAGES, $requestItem['INFO']['ID'])
        ];
    }

    public static function getBlocksInfo($blockId, $ids)
    {
        switch ($blockId) {
            case Constants::IB_COMPOSITE_BLOCK:
                $blocks = CompositeBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'composite',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);

            case Constants::IB_SLIDER_BLOCK:
                $blocks = SliderBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'slider',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);

            case Constants::IB_ADVANTAGES_BLOCK:
                $blocks = AdvantagesBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'advantages',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);
            case Constants::IB_PRODUCTS_BLOCK:
                $blocks = ProductsBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'products',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);
            case Constants::IB_ABOUT_COMPANY_BLOCK:
                $blocks = AboutCompanyBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'aboutCompany',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);
            case Constants::IB_PRODUCT_INDUSTRIES_BLOCK:
                $blocks = ProductIndustriesBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'productIndustries',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);
            case Constants::IB_WORK_STEPS_BLOCK:
                $blocks = WorkStepsBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'workSteps',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);
            case Constants::IB_FORM_BLOCK:
                $blocks = FormBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'formBlock',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);
            case Constants::IB_FAQ_BLOCK:
                $blocks = FAQBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'faq',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);
            case Constants::IB_CONTACTS_BLOCK:
                $blocks = ContactsBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'contacts',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);
            case Constants::IB_PARTNERS_BLOCK:
                $blocks = PartnersBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'partners',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);
            case Constants::IB_CERTIFICATES_BLOCK:
                $blocks = CertificatesBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'certificates',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);
            case Constants::IB_IMAGE_TEXT_BLOCK:
                $blocks = ImageTextBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'imageText',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);
            case Constants::IB_REQUISITES_BLOCK:
                $blocks = RequisitesBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'requisites',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);
            case Constants::IB_STAFF_CONTACTS_BLOCK:
                $blocks = StaffContactsBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'staffContacts',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);
            case Constants::IB_REVIEWS_BLOCK:
                $blocks = ReviewsBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'reviews',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);
            case Constants::IB_LINKS_BLOCK:
                $blocks = LinksBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'links',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);
            case Constants::IB_VACANCIES_BLOCK:
                $blocks = VacanciesBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'vacancies',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);

            case Constants::IB_TEMPLATE_BLOCK:
                $blocks = TemplateBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'templateBlock',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);

            case Constants::IB_PROMOTIONS_BLOCK:
                $blocks = PromotionsBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'promotions',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);

            case Constants::IB_SERVICES_BLOCK:
                $blocks = ServicesBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'services',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);

            case Constants::IB_SECTIONS_BLOCK:
                $blocks = SectionsBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'sections',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);

            case Constants::IB_LOCATIONS_BLOCK:
                $blocks = LocationsBlock::getByIds(['ids' => $ids]);
                return array_map(function($block) {
                    return [
                        'type' => 'locations',
                        'title' => '',
                        'subtitle' => '',
                        ...$block,
                    ];
                }, $blocks);
            default:
                return [];
        }
    }
}
