<?php
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Config\Option;

Loc::loadMessages($_SERVER['DOCUMENT_ROOT'].BX_ROOT.'/modules/main/options.php');
Loc::loadMessages(__FILE__);

$module_id = 'kubx.settings';
\Bitrix\Main\Loader::includeModule($module_id);

$arTabs = [
    [
        'DIV' => 'edit1',
        'TAB' => Loc::getMessage('KUBX_SETTINGS_OPTIONS_TAB_SETTINGS'),
    ],
    [
        'DIV' => 'edit2',
        'TAB' => Loc::getMessage('KUBX_SETTINGS_OPTIONS_TAB_TOKENS'),
    ],
    [
        'DIV' => 'edit3',
        'TAB' => Loc::getMessage('KUBX_SETTINGS_OPTIONS_TAB_CATALOG'),
    ],
    [
        'DIV' => 'edit4',
        'TAB' => Loc::getMessage('KUBX_SETTINGS_OPTIONS_TAB_OTHER'),
    ]
];

$arGroups = [
    'LOGOTYPES' => [
        'TAB' => 'edit1',
        'TITLE' => 'Логотипы'
    ],
    'COLORS_PRIMARY' => [
        'TAB' => 'edit1',
        'TITLE' => 'Цветовые решения Primary'
    ],
    'COLORS_SECONDARY' => [
        'TAB' => 'edit1',
        'TITLE' => 'Цветовые решения Secondary'
    ],
    'METATAGS' => [
        'TAB' => 'edit1',
        'TITLE' => 'Метатеги'
    ],
    'BASKET_COLORS' => [
        'TAB' => 'edit1',
        'TITLE' => 'Цвета корзин'
    ],
    'OTHER_COLORS' => [
        'TAB' => 'edit1',
        'TITLE' => 'Дополнительные цветовые решения'
    ],

    'TOKENS' => [
        'TAB' => 'edit2',
        'TITLE' => 'Токены'
    ],

    'SORT' => [
        'TAB' => 'edit3',
        'TITLE' => 'Значения сортировки'
    ],
    'CATALOG_LIST' => [
        'TAB' => 'edit3',
        'TITLE' => 'Настройки каталога'
    ],
    'PRODUCT_DETAIL' => [
        'TAB' => 'edit3',
        'TITLE' => 'Настройки детальной карточки товара'
    ],
    'DEVELOPMENT' => [
        'TAB' => 'edit4',
        'TITLE' => 'Для разработки'
    ],

    'B24' => [
        'TAB' => 'edit4',
        'TITLE' => 'CRM Б24'
    ],

    'SWAGGER' => [
        'TAB' => 'edit4',
        'TITLE' => 'SWAGGER'
    ],
];

$arOptions = [
    [
        'GROUP' => 'LOGOTYPES',
        'SORT' => '1',
        'NAME' => 'logo',
        'TITLE' => 'Логотип',
        'TYPE' => 'IMAGE',
    ],
    [
        'GROUP' => 'LOGOTYPES',
        'SORT' => '1',
        'NAME' => 'mini_logo',
        'TITLE' => 'Мини логотип',
        'TYPE' => 'IMAGE',
    ],
    [
        'GROUP' => 'LOGOTYPES',
        'SORT' => '3',
        'NAME' => 'light_logo',
        'TITLE' => 'Светлый логотип',
        'TYPE' => 'IMAGE',
    ],
    [
        'GROUP' => 'COLORS_PRIMARY',
        'SORT' => '1',
        'NAME' => 'primary_900',
        'TITLE' => 'Цвет primary_900',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_PRIMARY',
        'SORT' => '2',
        'NAME' => 'primary_800',
        'TITLE' => 'Цвет primary_800',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_PRIMARY',
        'SORT' => '3',
        'NAME' => 'primary_700',
        'TITLE' => 'Цвет primary_700',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_PRIMARY',
        'SORT' => '4',
        'NAME' => 'primary_600',
        'TITLE' => 'Цвет primary_600',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_PRIMARY',
        'SORT' => '5',
        'NAME' => 'primary_500',
        'TITLE' => 'Цвет primary_500',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_PRIMARY',
        'SORT' => '6',
        'NAME' => 'primary_400',
        'TITLE' => 'Цвет primary_400',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_PRIMARY',
        'SORT' => '7',
        'NAME' => 'primary_300',
        'TITLE' => 'Цвет primary_300',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_PRIMARY',
        'SORT' => '8',
        'NAME' => 'primary_200',
        'TITLE' => 'Цвет primary_200',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_PRIMARY',
        'SORT' => '9',
        'NAME' => 'primary_100',
        'TITLE' => 'Цвет primary_100',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_PRIMARY',
        'SORT' => '10',
        'NAME' => 'primary_50',
        'TITLE' => 'Цвет primary_50',
        'TYPE' => 'COLOR',
    ],

    [
        'GROUP' => 'COLORS_SECONDARY',
        'SORT' => '1',
        'NAME' => 'secondary_900',
        'TITLE' => 'Цвет secondary_900',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_SECONDARY',
        'SORT' => '2',
        'NAME' => 'secondary_800',
        'TITLE' => 'Цвет secondary_800',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_SECONDARY',
        'SORT' => '3',
        'NAME' => 'secondary_700',
        'TITLE' => 'Цвет secondary_700',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_SECONDARY',
        'SORT' => '4',
        'NAME' => 'secondary_600',
        'TITLE' => 'Цвет secondary_600',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_SECONDARY',
        'SORT' => '5',
        'NAME' => 'secondary_500',
        'TITLE' => 'Цвет secondary_500',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_SECONDARY',
        'SORT' => '6',
        'NAME' => 'secondary_400',
        'TITLE' => 'Цвет secondary_400',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_SECONDARY',
        'SORT' => '7',
        'NAME' => 'secondary_300',
        'TITLE' => 'Цвет secondary_300',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_SECONDARY',
        'SORT' => '8',
        'NAME' => 'secondary_200',
        'TITLE' => 'Цвет secondary_200',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_SECONDARY',
        'SORT' => '9',
        'NAME' => 'secondary_100',
        'TITLE' => 'Цвет secondary_100',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'COLORS_SECONDARY',
        'SORT' => '10',
        'NAME' => 'secondary_50',
        'TITLE' => 'Цвет secondary_50',
        'TYPE' => 'COLOR',
    ],
    [
        'GROUP' => 'METATAGS',
        'SORT' => '1',
        'NAME' => 'title',
        'TITLE' => 'Основной Title',
        'TYPE' => 'TEXT',
    ],
    [
        'GROUP' => 'METATAGS',
        'SORT' => '2',
        'NAME' => 'description',
        'TITLE' => 'Основной Description',
        'TYPE' => 'TEXT',
    ],
    [
        'GROUP' => 'OTHER',
        'SORT' => '1',
        'NAME' => 'copyright_footer',
        'TITLE' => 'Копирайт Footer',
        'TYPE' => 'TEXT',
    ],

    [
        'GROUP' => 'BASKET_COLORS',
        'SORT' => '2',
        'NAME' => 'basket_2',
        'TITLE' => 'Цвет корзины 2',
        'TYPE' => 'SELECT',
        'OPTIONS' => [
            ['VALUE' => 'blue', 'TITLE' => 'Синий'],
            ['VALUE' => 'orange', 'TITLE' => 'Оранжевый'],
            ['VALUE' => 'indigo', 'TITLE' => 'Индиго'],
            ['VALUE' => 'teal', 'TITLE' => 'Бирюзовый'],
            ['VALUE' => 'green', 'TITLE' => 'Зеленый'],
            ['VALUE' => 'yellow', 'TITLE' => 'Желтый'],
            ['VALUE' => 'pink', 'TITLE' => 'Розовый'],
            ['VALUE' => 'gray', 'TITLE' => 'Серый'],
            ['VALUE' => 'red', 'TITLE' => 'Красный'],
            ['VALUE' => 'purple', 'TITLE' => 'Фиолетовый'],
        ]
    ],
    [
        'GROUP' => 'BASKET_COLORS',
        'SORT' => '3',
        'NAME' => 'basket_3',
        'TITLE' => 'Цвет корзины 3',
        'TYPE' => 'SELECT',
        'OPTIONS' => [
            ['VALUE' => 'blue', 'TITLE' => 'Синий'],
            ['VALUE' => 'orange', 'TITLE' => 'Оранжевый'],
            ['VALUE' => 'indigo', 'TITLE' => 'Индиго'],
            ['VALUE' => 'teal', 'TITLE' => 'Бирюзовый'],
            ['VALUE' => 'green', 'TITLE' => 'Зеленый'],
            ['VALUE' => 'yellow', 'TITLE' => 'Желтый'],
            ['VALUE' => 'pink', 'TITLE' => 'Розовый'],
            ['VALUE' => 'gray', 'TITLE' => 'Серый'],
            ['VALUE' => 'red', 'TITLE' => 'Красный'],
            ['VALUE' => 'purple', 'TITLE' => 'Фиолетовый'],
        ]
    ],
    [
        'GROUP' => 'BASKET_COLORS',
        'SORT' => '4',
        'NAME' => 'basket_4',
        'TITLE' => 'Цвет корзины 4',
        'TYPE' => 'SELECT',
        'OPTIONS' => [
            ['VALUE' => 'blue', 'TITLE' => 'Синий'],
            ['VALUE' => 'orange', 'TITLE' => 'Оранжевый'],
            ['VALUE' => 'indigo', 'TITLE' => 'Индиго'],
            ['VALUE' => 'teal', 'TITLE' => 'Бирюзовый'],
            ['VALUE' => 'green', 'TITLE' => 'Зеленый'],
            ['VALUE' => 'yellow', 'TITLE' => 'Желтый'],
            ['VALUE' => 'pink', 'TITLE' => 'Розовый'],
            ['VALUE' => 'gray', 'TITLE' => 'Серый'],
            ['VALUE' => 'red', 'TITLE' => 'Красный'],
            ['VALUE' => 'purple', 'TITLE' => 'Фиолетовый'],
        ]
    ],
    [
        'GROUP' => 'BASKET_COLORS',
        'SORT' => '5',
        'NAME' => 'basket_5',
        'TITLE' => 'Цвет корзины 5',
        'TYPE' => 'SELECT',
        'OPTIONS' => [
            ['VALUE' => 'blue', 'TITLE' => 'Синий'],
            ['VALUE' => 'orange', 'TITLE' => 'Оранжевый'],
            ['VALUE' => 'indigo', 'TITLE' => 'Индиго'],
            ['VALUE' => 'teal', 'TITLE' => 'Бирюзовый'],
            ['VALUE' => 'green', 'TITLE' => 'Зеленый'],
            ['VALUE' => 'yellow', 'TITLE' => 'Желтый'],
            ['VALUE' => 'pink', 'TITLE' => 'Розовый'],
            ['VALUE' => 'gray', 'TITLE' => 'Серый'],
            ['VALUE' => 'red', 'TITLE' => 'Красный'],
            ['VALUE' => 'purple', 'TITLE' => 'Фиолетовый'],
        ]
    ],
    [
        'GROUP' => 'BASKET_COLORS',
        'SORT' => '6',
        'NAME' => 'basket_6',
        'TITLE' => 'Цвет корзины 6',
        'TYPE' => 'SELECT',
        'OPTIONS' => [
            ['VALUE' => 'blue', 'TITLE' => 'Синий'],
            ['VALUE' => 'orange', 'TITLE' => 'Оранжевый'],
            ['VALUE' => 'indigo', 'TITLE' => 'Индиго'],
            ['VALUE' => 'teal', 'TITLE' => 'Бирюзовый'],
            ['VALUE' => 'green', 'TITLE' => 'Зеленый'],
            ['VALUE' => 'yellow', 'TITLE' => 'Желтый'],
            ['VALUE' => 'pink', 'TITLE' => 'Розовый'],
            ['VALUE' => 'gray', 'TITLE' => 'Серый'],
            ['VALUE' => 'red', 'TITLE' => 'Красный'],
            ['VALUE' => 'purple', 'TITLE' => 'Фиолетовый'],
        ]
    ],
    [
        'GROUP' => 'BASKET_COLORS',
        'SORT' => '7',
        'NAME' => 'basket_7',
        'TITLE' => 'Цвет корзины 7',
        'TYPE' => 'SELECT',
        'OPTIONS' => [
            ['VALUE' => 'blue', 'TITLE' => 'Синий'],
            ['VALUE' => 'orange', 'TITLE' => 'Оранжевый'],
            ['VALUE' => 'indigo', 'TITLE' => 'Индиго'],
            ['VALUE' => 'teal', 'TITLE' => 'Бирюзовый'],
            ['VALUE' => 'green', 'TITLE' => 'Зеленый'],
            ['VALUE' => 'yellow', 'TITLE' => 'Желтый'],
            ['VALUE' => 'pink', 'TITLE' => 'Розовый'],
            ['VALUE' => 'gray', 'TITLE' => 'Серый'],
            ['VALUE' => 'red', 'TITLE' => 'Красный'],
            ['VALUE' => 'purple', 'TITLE' => 'Фиолетовый'],
        ]
    ],
    [
        'GROUP' => 'BASKET_COLORS',
        'SORT' => '8',
        'NAME' => 'basket_8',
        'TITLE' => 'Цвет корзины 8',
        'TYPE' => 'SELECT',
        'OPTIONS' => [
            ['VALUE' => 'blue', 'TITLE' => 'Синий'],
            ['VALUE' => 'orange', 'TITLE' => 'Оранжевый'],
            ['VALUE' => 'indigo', 'TITLE' => 'Индиго'],
            ['VALUE' => 'teal', 'TITLE' => 'Бирюзовый'],
            ['VALUE' => 'green', 'TITLE' => 'Зеленый'],
            ['VALUE' => 'yellow', 'TITLE' => 'Желтый'],
            ['VALUE' => 'pink', 'TITLE' => 'Розовый'],
            ['VALUE' => 'gray', 'TITLE' => 'Серый'],
            ['VALUE' => 'red', 'TITLE' => 'Красный'],
            ['VALUE' => 'purple', 'TITLE' => 'Фиолетовый'],
        ]
    ],
    [
        'GROUP' => 'OTHER_COLORS',
        'SORT' => '1',
        'NAME' => 'icon_background',
        'TITLE' => 'Background-цвет иконки',
        'TYPE' => 'COLOR',
    ],

    [
        'GROUP' => 'TOKENS',
        'SORT' => '1',
        'NAME' => 'sms_ru',
        'TITLE' => 'SMS.ru',
        'TYPE' => 'TEXT',
    ],
    [
        'GROUP' => 'TOKENS',
        'SORT' => '2',
        'NAME' => 'dadata',
        'TITLE' => 'DaData',
        'TYPE' => 'TEXT',
    ],
    [
        'GROUP' => 'SORT',
        'SORT' => '1',
        'NAME' => 'catalog_sort',
        'TITLE' => 'Сортировка в каталоге',
        'TYPE' => 'M_KEY_VALUE',
    ],
    [
        'GROUP' => 'SORT',
        'SORT' => '2',
        'NAME' => 'favourite_sort',
        'TITLE' => 'Сортировка в избранном',
        'TYPE' => 'M_KEY_VALUE',
    ],
    [
        'GROUP' => 'CATALOG_LIST',
        'SORT' => '1',
        'NAME' => 'need_preview_product_modal',
        'TITLE' => 'Открывать превью товара в модальном окне',
        'TYPE' => 'CHECKBOX',
    ],
    [
        'GROUP' => 'PRODUCT_DETAIL',
        'SORT' => '2',
        'NAME' => 'properties_view_in_detail_product',
        'TITLE' => 'Особый вид отображения свойств',
        'TYPE' => 'M_KEY_VALUE',
    ],

    [
        'GROUP' => 'DEVELOPMENT',
        'SORT' => '1',
        'NAME' => 'need_authorize',
        'TITLE' => 'Авторизовать под пользователем',
        'TYPE' => 'CHECKBOX',
    ],
    [
        'GROUP' => 'DEVELOPMENT',
        'SORT' => '1',
        'NAME' => 'user_id_to_authorize',
        'TITLE' => 'ID пользователя для авторизации',
        'TYPE' => 'TEXT',
    ],

    [
        'GROUP' => 'B24',
        'SORT' => '1',
        'NAME' => 'b24_address',
        'TITLE' => 'Адрес Битрикс 24',
        'TYPE' => 'TEXT',
    ],
    [
        'GROUP' => 'SWAGGER',
        'SORT' => '1',
        'NAME' => 'swagger',
        'TITLE' => 'Swagger',
        'TYPE' => 'FILE',
    ],
];

$moduleOptions = new CModuleOptions($module_id, $arTabs, $arGroups, $arOptions);
$moduleOptions->showOptions();



