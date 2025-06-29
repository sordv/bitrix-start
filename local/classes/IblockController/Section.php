<?php

namespace Legacy\IblockController;

use Legacy\General\Constants;
use Bitrix\Main\Loader;
use Bitrix\Iblock\SectionTable;
use Legacy\HighLoadBlock\Entity;

class Section
{
    public static function getHierarchy($code)
    {
        $db = SectionTable::getList([
            'select' => [
                'ID',
                'NAME',
                'CODE',
                'DEPTH_LEVEL',
                'IBLOCK_SECTION_ID',
            ],
            'filter' => [
                'IBLOCK_ID' => Constants::IB_CATALOG_CRM
            ],
            'order' => [
                'DEPTH_LEVEL' => 'DESC',
                'SORT' => 'ASC',
            ],
        ]);

        $categories = $db->fetchAll();

        $index = array_search($code, array_column($categories, 'CODE'));

        $result = self::findUpperCategories($index, $categories);

        return $result;
    }

    public static function findUpperCategories($index, $categories){
        $result = [];

        $id = $categories[$index]['IBLOCK_SECTION_ID'];
        $parent_index = array_search($id, array_column($categories, 'ID'));

        if($parent_index){
            $result = array_merge($result, self::findUpperCategories($parent_index, $categories));
        }

        $previous_codes = array_column($result, 'code');
        $url = (empty($previous_codes) ? '' : '/') . implode('/', $previous_codes) . '/' . $categories[$index]['CODE'];

        $result[] = [
            'code' => $categories[$index]['CODE'],
            'name' => $categories[$index]['NAME'],
            'url'  => $url,
        ];

        return $result;
    }

    public static function getByIds($ids)
    {
        $result = [];

        if (Loader::includeModule('iblock') && Loader::includeModule('catalog')) {
            $db = SectionTable::getList([
                'select' => [
                    'ID',
                    'NAME',
                    'CODE',
                    'PICTURE',
                    'DESCRIPTION',
                    'IBLOCK_SECTION_ID',
                ],
                'filter' => [
                    'IBLOCK_ID' => Constants::IB_CATALOG_CRM,
                    'ACTIVE' => true,
                    'ID' => $ids
                ]
            ]);

            while ($res = $db->fetch()) {
                $result [] = [
                    'id' => $res['ID'],
                    'name' => $res['NAME'],
                    'code' => $res['CODE'],
                    'description' => $res['DESCRIPTION'],
                    'picture' => getFilePath($res['PICTURE']),
                ];
            }
        }

        return $result;
    }

    public static function getIdByCode($code)
    {
        $result = null;

        if (Loader::includeModule('iblock') && Loader::includeModule('catalog')) {
            $db = SectionTable::getList([
                'select' => [
                    'ID'
                ],
                'filter' => [
                    'CODE' => $code
                ]
            ]);
            $res = $db->fetch();
            if($res){
                return $res['ID'];
            }
        }

        return $result;
    }

    public static function getByCode($code)
    {
        if (Loader::includeModule('iblock') && Loader::includeModule('catalog')) {
            $db = SectionTable::getList([
                'select' => [
                    'NAME',
                    'CODE'
                ],
                'filter' => [
                    'CODE' => $code
                ]
            ]);
            $res = $db->fetch();
            return [
                'CODE' => $res['CODE'],
                'NAME' => $res['NAME'],
                'HIERARCHY' => self::getHierarchy($code)
            ];
        }

        return false;
    }

    private static function updateChildrenUrl($code, &$subcategories = [])
    {
        foreach ($subcategories as &$subcategory){
            $subcategory['url'] = '/' .  $code . $subcategory['url'];
            if($subcategory['subcategories']){
                self::updateChildrenUrl($code, $subcategory['subcategories']);
            }
        }
    }

    public static function getCatalogCategories()
    {
        $result = [];

        if (Loader::includeModule('iblock') && Loader::includeModule('catalog')) {
            $db = SectionTable::getList([
                'select' => [
                    'ID',
                    'NAME',
                    'CODE',
                    'PICTURE',
                    'DESCRIPTION',
                    'IBLOCK_SECTION_ID',
                    'DEPTH_LEVEL',
                ],
                'filter' => [
                    'IBLOCK_ID' => Constants::IB_CATALOG_CRM,
                    'ACTIVE' => true,
                ],
                'order' => [
                    'DEPTH_LEVEL' => 'DESC',
                    'SORT' => 'ASC',
                ],
            ]);

            $subcategories = [];
            while ($res = $db->fetch()) {
                self::updateChildrenUrl($res['CODE'], $subcategories[$res['ID']]);
                if($res['DEPTH_LEVEL'] == 1) {
                    $result [] = [
                        'id' => $res['ID'],
                        'name' => $res['NAME'],
                        'code' => $res['CODE'],
                        'description' => $res['DESCRIPTION'],
                        'picture' => getFilePath($res['PICTURE']),
                        'url' => '/' .  $res['CODE'],
                        'subcategories' => $subcategories[$res['ID']],
                    ];
                } else {
                    $subcategories[$res['IBLOCK_SECTION_ID']][] = [
                        'id' => $res['ID'],
                        'name' => $res['NAME'],
                        'code' => $res['CODE'],
                        'description' => $res['DESCRIPTION'],
                        'picture' => getFilePath($res['PICTURE']),
                        'url' => '/' .  $res['CODE'],
                        'subcategories' => $subcategories[$res['ID']],
                    ];
                }
            }
        }

        return $result;
    }

    public static function getCatalogCategoryChildrenCodes($codes)
    {
        if (!empty($codes)){
            $result = self::getCategoryChildrenCodes($codes);
        } else {
            $categories = self::getCatalogCategories();
            $result = self::getCategoriesCodes($categories);
        }

        return $result;
    }

    public static function getCategoriesCodes($categories = [])
    {
        $result = [];
        foreach ($categories as $category) {
            $result[] = $category['code'];
            if ($category['subcategories']) {
                $subCategoryChildren = self::getCategoriesCodes($category['subcategories']);
                $result = array_merge($result, $subCategoryChildren);
            }
        }

        return $result;
    }
    public static function getCategoryChildrenCodes($codes) {
        if (empty($codes)) {
            return [];
        }

        if(!is_array($codes)) {
            $codes = [$codes];
        }

        $subSections = [];

        $sectionsDb = SectionTable::getList([
            'select' => [
                'LEFT_MARGIN',
                'RIGHT_MARGIN'
            ],
            'filter' => [
                'ACTIVE' => 'Y',
                'CODE' => $codes,
                'IBLOCK_ID' => [
                    Constants::IB_CATALOG_CRM,
                    Constants::IB_CATALOG_CRM_OFFERS
                ],
            ],
        ]);

        $sections = [];
        while ($section = $sectionsDb->fetch()){
            $sections[] = [
                'LEFT_MARGIN' => $section['LEFT_MARGIN'],
                'RIGHT_MARGIN' => $section['RIGHT_MARGIN'],
            ];
        }

        if (empty($sections)) {
            return [];
        }

        $marginFilters = [
            'LOGIC' => 'OR'
        ];

        foreach ($sections as $section) {
            $marginFilters[] = [
                '>=LEFT_MARGIN' => $section['LEFT_MARGIN'],
                '<=RIGHT_MARGIN' => $section['RIGHT_MARGIN']
            ];
        }

        $res = SectionTable::getList([
            'select' => [
                'CODE'
            ],
            'filter' => [
                'ACTIVE' => 'Y',
                'IBLOCK_ID' => [
                    Constants::IB_CATALOG_CRM,
                    Constants::IB_CATALOG_CRM_OFFERS
                ],
                $marginFilters
            ],
            'order' => [
                'LEFT_MARGIN' => 'ASC'
            ]
        ]);

        while ($subSection = $res->fetch()) {
            $subSections[] = $subSection['CODE'];
        }

        return array_unique($subSections);
    }

    public static function getSectionTableSize($code)
    {
        $result = null;
        $db = \CIBlockSection::GetList(
            [],
            [
                'IBLOCK_ID'=>Constants::IB_CATALOG_CRM,
                'CODE' => $code
            ],
            false,
            [
                "NAME",
                "CODE",
                "UF_TABLE_SIZES"
            ]
        );

        $tableSizeID = $db->fetch()['UF_TABLE_SIZES'];
        $params = [
            'filter' => [
                'ID' => $tableSizeID,
            ],
        ];
        $table_sizes = Entity::getInstance()->getRow(Constants::HLBLOCK_TABLE_SIZES, $params);

        if ($table_sizes){
            $result = [
                'name' => $table_sizes['UF_NAME'],
                'code' => $table_sizes['UF_XML_ID'],
            ];
        }

        return $result;
    }

    public static function extractSectionInfo($sectionsInfo, $catalogCategory = null)
    {
        $sections = [];
        foreach (explode(',', $sectionsInfo) as $section) {
            [$code, $name] = explode(':', $section);
            $sections[] = ['CODE' => $code, 'NAME' => $name];
            if ($code === $catalogCategory || !$catalogCategory) {
                $hierarchy = self::getHierarchy($code);

                return [
                    'name' => $name,
                    'code' => $code,
                    'hierarchy' => $hierarchy,
                    'url' => $hierarchy[count($hierarchy) - 1]['url'],
                ];
            }
        }

        $hierarchy = self::getHierarchy($sections[0]['CODE']);
        return [
            'name' => implode(', ', array_column($sections, 'NAME')),
            'code' => $sections[0]['CODE'],
            'hierarchy' => $hierarchy,
            'url' => $hierarchy[count($hierarchy) - 1]['url'],
        ];
    }
}
