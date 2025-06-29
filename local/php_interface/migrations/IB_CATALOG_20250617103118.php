<?php

namespace Sprint\Migration;


class IB_CATALOG_20250617103118 extends Version
{
    protected $author = "admin";

    protected $description = "";

    protected $moduleVersion = "5.0.2";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Iblock()->saveIblockType(array (
  'ID' => 'CRM_PRODUCT_CATALOG',
  'SECTIONS' => 'Y',
  'EDIT_FILE_BEFORE' => NULL,
  'EDIT_FILE_AFTER' => NULL,
  'IN_RSS' => 'N',
  'SORT' => '100',
  'LANG' => 
  array (
    'ru' => 
    array (
      'NAME' => 'Каталоги CRM',
      'SECTION_NAME' => 'Категория',
      'ELEMENT_NAME' => 'Товар',
    ),
  ),
));
        $iblockId = $helper->Iblock()->saveIblock(array (
  'IBLOCK_TYPE_ID' => 'CRM_PRODUCT_CATALOG',
  'LID' => 
  array (
    0 => 's1',
  ),
  'CODE' => 'catalog_crm',
  'API_CODE' => 'catalogcrm',
  'REST_ON' => 'N',
  'NAME' => 'Товарный каталог CRM',
  'ACTIVE' => 'Y',
  'SORT' => '100',
  'LIST_PAGE_URL' => '',
  'DETAIL_PAGE_URL' => '',
  'SECTION_PAGE_URL' => '',
  'CANONICAL_PAGE_URL' => '',
  'PICTURE' => NULL,
  'DESCRIPTION' => '',
  'DESCRIPTION_TYPE' => 'text',
  'RSS_TTL' => '24',
  'RSS_ACTIVE' => 'Y',
  'RSS_FILE_ACTIVE' => 'N',
  'RSS_FILE_LIMIT' => NULL,
  'RSS_FILE_DAYS' => NULL,
  'RSS_YANDEX_ACTIVE' => 'N',
  'XML_ID' => 'FUTURE-1C-CATALOG',
  'INDEX_ELEMENT' => 'Y',
  'INDEX_SECTION' => 'Y',
  'WORKFLOW' => 'N',
  'BIZPROC' => 'N',
  'SECTION_CHOOSER' => 'L',
  'LIST_MODE' => 'C',
  'RIGHTS_MODE' => 'S',
  'SECTION_PROPERTY' => 'Y',
  'PROPERTY_INDEX' => 'I',
  'VERSION' => '1',
  'LAST_CONV_ELEMENT' => '0',
  'SOCNET_GROUP_ID' => NULL,
  'EDIT_FILE_BEFORE' => '',
  'EDIT_FILE_AFTER' => '',
  'SECTIONS_NAME' => 'Категория',
  'SECTION_NAME' => 'Раздел',
  'ELEMENTS_NAME' => 'Товар',
  'ELEMENT_NAME' => 'Элемент',
  'EXTERNAL_ID' => 'FUTURE-1C-CATALOG',
  'LANG_DIR' => '/',
  'IPROPERTY_TEMPLATES' => 
  array (
    'SECTION_META_TITLE' => '{=this.Name} купить',
    'SECTION_META_DESCRIPTION' => '{=lower this.Name} купить с доставкой',
    'SECTION_PAGE_TITLE' => '{=this.Name}',
    'ELEMENT_META_TITLE' => '{=this.Name}',
    'ELEMENT_META_DESCRIPTION' => '{=this.DetailText}',
  ),
  'ELEMENT_ADD' => 'Добавить элемент',
  'ELEMENT_EDIT' => 'Изменить элемент',
  'ELEMENT_DELETE' => 'Удалить элемент',
  'SECTION_ADD' => 'Добавить раздел',
  'SECTION_EDIT' => 'Изменить раздел',
  'SECTION_DELETE' => 'Удалить раздел',
));
        $helper->Iblock()->saveIblockFields($iblockId, array (
  'IBLOCK_SECTION' => 
  array (
    'NAME' => 'Привязка к разделам',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'KEEP_IBLOCK_SECTION_ID' => 'N',
    ),
    'VISIBLE' => 'Y',
  ),
  'ACTIVE' => 
  array (
    'NAME' => 'Активность',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => 'Y',
    'VISIBLE' => 'Y',
  ),
  'ACTIVE_FROM' => 
  array (
    'NAME' => 'Начало активности',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'ACTIVE_TO' => 
  array (
    'NAME' => 'Окончание активности',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'SORT' => 
  array (
    'NAME' => 'Сортировка',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '500',
    'VISIBLE' => 'Y',
  ),
  'NAME' => 
  array (
    'NAME' => 'Название',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'PREVIEW_PICTURE' => 
  array (
    'NAME' => 'Картинка для анонса',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'FROM_DETAIL' => 'N',
      'UPDATE_WITH_DETAIL' => 'N',
      'DELETE_WITH_DETAIL' => 'N',
      'SCALE' => 'N',
      'WIDTH' => '',
      'HEIGHT' => '',
      'IGNORE_ERRORS' => 'N',
      'METHOD' => 'resample',
      'COMPRESSION' => 95,
      'USE_WATERMARK_TEXT' => 'N',
      'WATERMARK_TEXT' => '',
      'WATERMARK_TEXT_FONT' => '',
      'WATERMARK_TEXT_COLOR' => '',
      'WATERMARK_TEXT_SIZE' => '',
      'WATERMARK_TEXT_POSITION' => 'tl',
      'USE_WATERMARK_FILE' => 'N',
      'WATERMARK_FILE' => '',
      'WATERMARK_FILE_ALPHA' => '',
      'WATERMARK_FILE_POSITION' => 'tl',
      'WATERMARK_FILE_ORDER' => '',
    ),
    'VISIBLE' => 'Y',
  ),
  'PREVIEW_TEXT_TYPE' => 
  array (
    'NAME' => 'Тип описания для анонса',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => 'text',
    'VISIBLE' => 'Y',
  ),
  'PREVIEW_TEXT' => 
  array (
    'NAME' => 'Описание для анонса',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'DETAIL_PICTURE' => 
  array (
    'NAME' => 'Детальная картинка',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'SCALE' => 'N',
      'WIDTH' => '',
      'HEIGHT' => '',
      'IGNORE_ERRORS' => 'N',
      'METHOD' => 'resample',
      'COMPRESSION' => 95,
      'USE_WATERMARK_TEXT' => 'N',
      'WATERMARK_TEXT' => '',
      'WATERMARK_TEXT_FONT' => '',
      'WATERMARK_TEXT_COLOR' => '',
      'WATERMARK_TEXT_SIZE' => '',
      'WATERMARK_TEXT_POSITION' => 'tl',
      'USE_WATERMARK_FILE' => 'N',
      'WATERMARK_FILE' => '',
      'WATERMARK_FILE_ALPHA' => '',
      'WATERMARK_FILE_POSITION' => 'tl',
      'WATERMARK_FILE_ORDER' => '',
    ),
    'VISIBLE' => 'Y',
  ),
  'DETAIL_TEXT_TYPE' => 
  array (
    'NAME' => 'Тип детального описания',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => 'text',
    'VISIBLE' => 'Y',
  ),
  'DETAIL_TEXT' => 
  array (
    'NAME' => 'Детальное описание',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'XML_ID' => 
  array (
    'NAME' => 'Внешний код',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'CODE' => 
  array (
    'NAME' => 'Символьный код',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'UNIQUE' => 'Y',
      'TRANSLITERATION' => 'Y',
      'TRANS_LEN' => 255,
      'TRANS_CASE' => 'L',
      'TRANS_SPACE' => '-',
      'TRANS_OTHER' => '-',
      'TRANS_EAT' => 'Y',
      'USE_GOOGLE' => 'N',
    ),
    'VISIBLE' => 'Y',
  ),
  'TAGS' => 
  array (
    'NAME' => 'Теги',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'SECTION_NAME' => 
  array (
    'NAME' => 'Название',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'SECTION_PICTURE' => 
  array (
    'NAME' => 'Картинка для анонса',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'FROM_DETAIL' => 'N',
      'UPDATE_WITH_DETAIL' => 'N',
      'DELETE_WITH_DETAIL' => 'N',
      'SCALE' => 'N',
      'WIDTH' => '',
      'HEIGHT' => '',
      'IGNORE_ERRORS' => 'N',
      'METHOD' => 'resample',
      'COMPRESSION' => 95,
      'USE_WATERMARK_TEXT' => 'N',
      'WATERMARK_TEXT' => '',
      'WATERMARK_TEXT_FONT' => '',
      'WATERMARK_TEXT_COLOR' => '',
      'WATERMARK_TEXT_SIZE' => '',
      'WATERMARK_TEXT_POSITION' => 'tl',
      'USE_WATERMARK_FILE' => 'N',
      'WATERMARK_FILE' => '',
      'WATERMARK_FILE_ALPHA' => '',
      'WATERMARK_FILE_POSITION' => 'tl',
      'WATERMARK_FILE_ORDER' => '',
    ),
    'VISIBLE' => 'Y',
  ),
  'SECTION_DESCRIPTION_TYPE' => 
  array (
    'NAME' => 'Тип описания',
    'IS_REQUIRED' => 'Y',
    'DEFAULT_VALUE' => 'text',
    'VISIBLE' => 'Y',
  ),
  'SECTION_DESCRIPTION' => 
  array (
    'NAME' => 'Описание',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'SECTION_DETAIL_PICTURE' => 
  array (
    'NAME' => 'Детальная картинка',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'SCALE' => 'N',
      'WIDTH' => '',
      'HEIGHT' => '',
      'IGNORE_ERRORS' => 'N',
      'METHOD' => 'resample',
      'COMPRESSION' => 95,
      'USE_WATERMARK_TEXT' => 'N',
      'WATERMARK_TEXT' => '',
      'WATERMARK_TEXT_FONT' => '',
      'WATERMARK_TEXT_COLOR' => '',
      'WATERMARK_TEXT_SIZE' => '',
      'WATERMARK_TEXT_POSITION' => 'tl',
      'USE_WATERMARK_FILE' => 'N',
      'WATERMARK_FILE' => '',
      'WATERMARK_FILE_ALPHA' => '',
      'WATERMARK_FILE_POSITION' => 'tl',
      'WATERMARK_FILE_ORDER' => '',
    ),
    'VISIBLE' => 'Y',
  ),
  'SECTION_XML_ID' => 
  array (
    'NAME' => 'Внешний код',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => '',
    'VISIBLE' => 'Y',
  ),
  'SECTION_CODE' => 
  array (
    'NAME' => 'Символьный код',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => 
    array (
      'UNIQUE' => 'N',
      'TRANSLITERATION' => 'Y',
      'TRANS_LEN' => 255,
      'TRANS_CASE' => 'L',
      'TRANS_SPACE' => '-',
      'TRANS_OTHER' => '-',
      'TRANS_EAT' => 'Y',
      'USE_GOOGLE' => 'N',
    ),
    'VISIBLE' => 'Y',
  ),
  'LOG_SECTION_ADD' => 
  array (
    'NAME' => 'LOG_SECTION_ADD',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => NULL,
    'VISIBLE' => 'Y',
  ),
  'LOG_SECTION_EDIT' => 
  array (
    'NAME' => 'LOG_SECTION_EDIT',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => NULL,
    'VISIBLE' => 'Y',
  ),
  'LOG_SECTION_DELETE' => 
  array (
    'NAME' => 'LOG_SECTION_DELETE',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => NULL,
    'VISIBLE' => 'Y',
  ),
  'LOG_ELEMENT_ADD' => 
  array (
    'NAME' => 'LOG_ELEMENT_ADD',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => NULL,
    'VISIBLE' => 'Y',
  ),
  'LOG_ELEMENT_EDIT' => 
  array (
    'NAME' => 'LOG_ELEMENT_EDIT',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => NULL,
    'VISIBLE' => 'Y',
  ),
  'LOG_ELEMENT_DELETE' => 
  array (
    'NAME' => 'LOG_ELEMENT_DELETE',
    'IS_REQUIRED' => 'N',
    'DEFAULT_VALUE' => NULL,
    'VISIBLE' => 'Y',
  ),
));
    $helper->Iblock()->saveGroupPermissions($iblockId, array (
  'administrators' => 'X',
  'everyone' => 'R',
  'CRM_SHOP_ADMIN' => 'X',
  'CRM_SHOP_MANAGER' => 'W',
  'KUBX_VISITOR' => 'S',
));
        $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Артикул',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'PRODUCT_ARTICLE',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_BASKET',
      'IS_ENABLED' => 'Y',
    ),
    3 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
    4 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_LISTING',
      'IS_ENABLED' => 'N',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Изображения',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'IMAGES',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'F',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => '',
  'FILE_TYPE' => 'jpg, gif, bmp, png, jpeg, webp',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_BASKET',
      'IS_ENABLED' => 'Y',
    ),
    3 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'N',
    ),
    4 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_LISTING',
      'IS_ENABLED' => 'Y',
    ),
    5 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    6 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'N',
    ),
    7 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_LISTING',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => '',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Акция',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'SALE',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'L',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'VALUES' => 
  array (
    0 => 
    array (
      'VALUE' => 'Y',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'f212aef11fb5e00fead96c0adb5e05e9',
    ),
  ),
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'catalog',
      'FEATURE_ID' => 'IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    4 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'N',
    ),
    5 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_LISTING',
      'IS_ENABLED' => 'N',
    ),
    6 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    7 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'N',
    ),
    8 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_LISTING',
      'IS_ENABLED' => 'N',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Новое поступление',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'NEW_ARRIVAL',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'L',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => NULL,
  'HINT' => '',
  'VALUES' => 
  array (
    0 => 
    array (
      'VALUE' => 'Y',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => '4b7e5816e541a17186fb7604a57854b2',
    ),
  ),
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'catalog',
      'FEATURE_ID' => 'IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    4 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'N',
    ),
    5 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_LISTING',
      'IS_ENABLED' => 'N',
    ),
  ),
  'SMART_FILTER' => 'Y',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Сезон',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'SEASON',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => 'directory',
  'USER_TYPE_SETTINGS' => 
  array (
    'size' => 1,
    'width' => 0,
    'group' => 'N',
    'multiple' => 'N',
    'TABLE_NAME' => 'seasons',
  ),
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_BASKET',
      'IS_ENABLED' => 'Y',
    ),
    3 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'N',
    ),
    4 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_LISTING',
      'IS_ENABLED' => 'N',
    ),
  ),
  'SMART_FILTER' => 'Y',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Пол',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'GENDER',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => 'directory',
  'USER_TYPE_SETTINGS' => 
  array (
    'size' => 1,
    'width' => 0,
    'group' => 'N',
    'multiple' => 'N',
    'TABLE_NAME' => 'b_legacy_catalog_gender',
  ),
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_BASKET',
      'IS_ENABLED' => 'Y',
    ),
    3 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
    4 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_LISTING',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'Y',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Защитные свойства',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'PROTECTIVE_PROPERTIES',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => 'directory',
  'USER_TYPE_SETTINGS' => 
  array (
    'size' => 1,
    'width' => 0,
    'group' => 'N',
    'multiple' => 'N',
    'TABLE_NAME' => 'protective_properties',
  ),
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'catalog',
      'FEATURE_ID' => 'IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    2 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_BASKET',
      'IS_ENABLED' => 'Y',
    ),
    4 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'N',
    ),
    5 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_LISTING',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Сопутствующие товары',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'RELATED_PRODUCTS',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'E',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => 'CRM_PRODUCT_CATALOG:catalog_crm',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'catalog',
      'FEATURE_ID' => 'IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    2 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    4 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
    5 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_LISTING',
      'IS_ENABLED' => 'N',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'ID поставщика',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'VENDOR_ID',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Заголовок окна браузера',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'TITLE',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Ключевые слова',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'KEYWORDS',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Мета-описание',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'META_DESCRIPTION',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Бренд',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'BRAND_REF',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => 'directory',
  'USER_TYPE_SETTINGS' => 
  array (
    'size' => 1,
    'width' => 0,
    'group' => 'N',
    'multiple' => 'N',
    'TABLE_NAME' => 'eshop_brand_reference',
  ),
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
    4 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_LISTING',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'Y',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Новинка',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'NEWPRODUCT',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'L',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'VALUES' => 
  array (
    0 => 
    array (
      'VALUE' => 'да',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'Y',
    ),
  ),
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'catalog',
      'FEATURE_ID' => 'IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Лидер продаж',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'SALELEADER',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'L',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'VALUES' => 
  array (
    0 => 
    array (
      'VALUE' => 'да',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'YYY',
    ),
  ),
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'catalog',
      'FEATURE_ID' => 'IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Спецпредложение',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'SPECIALOFFER',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'L',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'VALUES' => 
  array (
    0 => 
    array (
      'VALUE' => 'да',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'YES',
    ),
  ),
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'catalog',
      'FEATURE_ID' => 'IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Артикул',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'ARTNUMBER',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Производитель',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'MANUFACTURER',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'N',
    ),
    4 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_LISTING',
      'IS_ENABLED' => 'N',
    ),
    5 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    6 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'N',
    ),
    7 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_LISTING',
      'IS_ENABLED' => 'N',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Материал',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'MATERIAL',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Цвет',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'COLOR',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'С этим товаром рекомендуем',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'RECOMMEND',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'E',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => 'CRM_PRODUCT_CATALOG:catalog_crm',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'catalog',
      'FEATURE_ID' => 'IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'ID поста блога для комментариев',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'BLOG_POST_ID',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'N',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'A',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Количество комментариев',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'BLOG_COMMENTS_CNT',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'N',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'A',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Фоновая картинка для шаблона',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'BACKGROUND_IMAGE',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'F',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => '',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Тренды',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'TREND',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'L',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'VALUES' => 
  array (
    0 => 
    array (
      'VALUE' => 'Да',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'Y',
    ),
  ),
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'catalog',
      'FEATURE_ID' => 'IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'ГОСТ',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'GOST',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'N',
    ),
    4 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_LISTING',
      'IS_ENABLED' => 'N',
    ),
    5 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    6 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'N',
    ),
    7 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_LISTING',
      'IS_ENABLED' => 'N',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Серия',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'SERIA',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Модельный ряд',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'MODRYAD',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'N',
    ),
    4 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_LISTING',
      'IS_ENABLED' => 'N',
    ),
    5 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    6 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'N',
    ),
    7 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_LISTING',
      'IS_ENABLED' => 'N',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Модель',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'MODEL',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'L',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'VALUES' => 
  array (
  ),
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'catalog',
      'FEATURE_ID' => 'IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    2 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    4 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Модельный ряд',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'MODEL_RYAD',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'L',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'VALUES' => 
  array (
    0 => 
    array (
      'VALUE' => 'C',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'c',
    ),
    1 => 
    array (
      'VALUE' => 'D',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'd',
    ),
    2 => 
    array (
      'VALUE' => 'EC',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'ec',
    ),
    3 => 
    array (
      'VALUE' => 'ED',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'ed',
    ),
    4 => 
    array (
      'VALUE' => 'EM',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'em',
    ),
    5 => 
    array (
      'VALUE' => 'ET',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'et',
    ),
    6 => 
    array (
      'VALUE' => 'EV',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'ev',
    ),
    7 => 
    array (
      'VALUE' => 'FC',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'fc',
    ),
    8 => 
    array (
      'VALUE' => 'FCD',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'fcd',
    ),
    9 => 
    array (
      'VALUE' => 'FCDL Heavy',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'fcdl-heavy',
    ),
    10 => 
    array (
      'VALUE' => 'FCP',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'fcp',
    ),
    11 => 
    array (
      'VALUE' => 'FCpn',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'fcpn',
    ),
    12 => 
    array (
      'VALUE' => 'HQP',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'hqp',
    ),
    13 => 
    array (
      'VALUE' => 'Medium',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'medium',
    ),
    14 => 
    array (
      'VALUE' => 'P',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'p',
    ),
    15 => 
    array (
      'VALUE' => 'PR',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'pr',
    ),
    16 => 
    array (
      'VALUE' => 'Sc',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'sc',
    ),
    17 => 
    array (
      'VALUE' => 'SCB',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'scb',
    ),
    18 => 
    array (
      'VALUE' => 'SCD',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'scd',
    ),
    19 => 
    array (
      'VALUE' => 'SCDB',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'scdb',
    ),
    20 => 
    array (
      'VALUE' => 'SCDL HEAVY',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'scdl-heavy',
    ),
    21 => 
    array (
      'VALUE' => 'SCDLb HEAVY',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'scdlb-heavy',
    ),
    22 => 
    array (
      'VALUE' => 'SCDLbHEAVY',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'scdlbheavy',
    ),
    23 => 
    array (
      'VALUE' => 'SCH',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'sch',
    ),
    24 => 
    array (
      'VALUE' => 'SCHB',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'schb',
    ),
    25 => 
    array (
      'VALUE' => 'SCHG',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'schg',
    ),
    26 => 
    array (
      'VALUE' => 'SCHGB',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'schgb',
    ),
    27 => 
    array (
      'VALUE' => 'SCP',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'scp',
    ),
    28 => 
    array (
      'VALUE' => 'SCPB',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'scpb',
    ),
    29 => 
    array (
      'VALUE' => 'SCpn',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'scpn',
    ),
    30 => 
    array (
      'VALUE' => 'SCpnb',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'scpnb',
    ),
    31 => 
    array (
      'VALUE' => 'SCT',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'sct',
    ),
    32 => 
    array (
      'VALUE' => 'SCTB',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'sctb',
    ),
    33 => 
    array (
      'VALUE' => 'SCTGB',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'sctgb',
    ),
    34 => 
    array (
      'VALUE' => 'SPRg',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'sprg',
    ),
    35 => 
    array (
      'VALUE' => 'Модельный ряд',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'modelnyy-ryad',
    ),
  ),
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'catalog',
      'FEATURE_ID' => 'IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    4 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'N',
    ),
    5 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_LISTING',
      'IS_ENABLED' => 'N',
    ),
    6 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    7 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'N',
    ),
    8 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_LISTING',
      'IS_ENABLED' => 'N',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Кол-во в коробке',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'KOL_VKOROBKE',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Тип кронштейна',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'TYP_CRONSHTEIN',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'L',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'VALUES' => 
  array (
    0 => 
    array (
      'VALUE' => 'Без кронштейна',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'bez-kronshteyna',
    ),
    1 => 
    array (
      'VALUE' => 'Платформенное неповоротное',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'platformennoe-nepovorotnoe',
    ),
    2 => 
    array (
      'VALUE' => 'Платформенное поворотное',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'platformennoe-povorotnoe',
    ),
    3 => 
    array (
      'VALUE' => 'Платформенное поворотное с тормозом',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'platformennoe-povorotnoe-s-tormozom',
    ),
    4 => 
    array (
      'VALUE' => 'Поворотное под болт',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'povorotnoe-pod-bolt',
    ),
    5 => 
    array (
      'VALUE' => 'Поворотное под болт с тормозом',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'povorotnoe-pod-bolt-s-tormozom',
    ),
    6 => 
    array (
      'VALUE' => 'Поворотное с болтом',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'povorotnoe-s-boltom',
    ),
    7 => 
    array (
      'VALUE' => 'Поворотное с болтом и тормозом',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'povorotnoe-s-boltom-i-tormozom',
    ),
    8 => 
    array (
      'VALUE' => 'Тип кронштейна',
      'DEF' => 'N',
      'SORT' => '500',
      'XML_ID' => 'tip-kronshteyna',
    ),
  ),
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'catalog',
      'FEATURE_ID' => 'IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    2 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    4 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Тип подшипника в оси',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'TYP_PODSHIBNICK',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Ширина ступицы, мм',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'WIDTH_STUPIZA',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Длина ступицы, мм',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'LENGTH',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Нагрузка, кг',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'NAGRUZKA',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Диаметр, мм',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'DIAMETR',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Ширина рабочей поверхности, мм',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'SHIRINA_RAB_POVERH',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Вес кг/шт',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'VES',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Высота, мм',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'VYSOTA',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Габариты площадки',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'GABARITY_POSHADKI',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Габариты отверстия',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'GABARITY_OTVERSTIA',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'legacy.settings',
      'FEATURE_ID' => 'LEGACY_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'Y',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Состав',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'SOSTAV',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Ткань',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'TKAN',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Плотность',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'PLOTNOST',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Объем',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'Obem',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'S',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'N',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => NULL,
  'FILTER_HINT' => '',
));
            $helper->Iblock()->saveProperty($iblockId, array (
  'NAME' => 'Файлы',
  'ACTIVE' => 'Y',
  'SORT' => '500',
  'CODE' => 'FILES',
  'DEFAULT_VALUE' => '',
  'PROPERTY_TYPE' => 'F',
  'ROW_COUNT' => '1',
  'COL_COUNT' => '30',
  'LIST_TYPE' => 'L',
  'MULTIPLE' => 'Y',
  'XML_ID' => '',
  'FILE_TYPE' => '',
  'MULTIPLE_CNT' => '5',
  'LINK_IBLOCK_ID' => '0',
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'IS_REQUIRED' => 'N',
  'VERSION' => '1',
  'USER_TYPE' => NULL,
  'USER_TYPE_SETTINGS' => 'a:0:{}',
  'HINT' => '',
  'FEATURES' => 
  array (
    0 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'Y',
    ),
    1 => 
    array (
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    2 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_BASKET',
      'IS_ENABLED' => 'N',
    ),
    3 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_DETAIL_TABLE',
      'IS_ENABLED' => 'N',
    ),
    4 => 
    array (
      'MODULE_ID' => 'kubx.settings',
      'FEATURE_ID' => 'KUBX_USE_IN_LISTING',
      'IS_ENABLED' => 'N',
    ),
  ),
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => '',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
));
        $helper->UserOptions()->saveElementGrid($iblockId, array (
  'views' => 
  array (
    'default' => 
    array (
      'columns' => 
      array (
        0 => '',
      ),
      'columns_sizes' => 
      array (
        'expand' => 1,
        'columns' => 
        array (
        ),
      ),
      'sticked_columns' => 
      array (
      ),
      'last_sort_by' => 'name',
      'last_sort_order' => 'desc',
      'custom_names' => 
      array (
      ),
    ),
  ),
  'filters' => 
  array (
  ),
  'current_view' => 'default',
));

    }
}
