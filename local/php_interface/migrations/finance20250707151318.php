<?php

namespace Sprint\Migration;


class finance20250707151318 extends Version
{
    protected $author = "admin";

    protected $description = "pr";

    protected $moduleVersion = "5.3.2";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
    $hlblockId = $helper->Hlblock()->saveHlblock(array (
  'NAME' => 'Finances',
  'TABLE_NAME' => 'finances',
  'LANG' => 
  array (
    'ru' => 
    array (
      'NAME' => 'Финансы',
    ),
    'en' => 
    array (
      'NAME' => 'Finances',
    ),
  ),
));
        $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_NAME',
  'USER_TYPE_ID' => 'hlblock',
  'XML_ID' => 'UF_NAME',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'DISPLAY' => 'LIST',
    'LIST_HEIGHT' => 1,
    'HLBLOCK_ID' => 'Organizations',
    'HLFIELD_ID' => 'UF_NAME',
    'DEFAULT_VALUE' => 0,
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Name',
    'ru' => 'Контрагент',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Name',
    'ru' => 'Контрагент',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Name',
    'ru' => 'Контрагент',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_DATE_UPDATE',
  'USER_TYPE_ID' => 'datetime',
  'XML_ID' => 'UF_DATE_UPDATE',
  'SORT' => '200',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'DEFAULT_VALUE' => 
    array (
      'TYPE' => 'NONE',
      'VALUE' => '',
    ),
    'USE_SECOND' => 'Y',
    'USE_TIMEZONE' => 'N',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Update date',
    'ru' => 'Дата обновления',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Update date',
    'ru' => 'Дата обновления',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Update date',
    'ru' => 'Дата обновления',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_CREDIT_LIMIT_TOTAL',
  'USER_TYPE_ID' => 'double',
  'XML_ID' => 'UF_CREDIT_LIMIT_TOTAL',
  'SORT' => '300',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'PRECISION' => 2,
    'SIZE' => 20,
    'MIN_VALUE' => 0.0,
    'MAX_VALUE' => 0.0,
    'DEFAULT_VALUE' => NULL,
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Total credit limit',
    'ru' => 'Кредитный лимит',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Total credit limit',
    'ru' => 'Кредитный лимит',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Total credit limit',
    'ru' => 'Кредитный лимит',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_CREDIT_LIMIT_FREE',
  'USER_TYPE_ID' => 'double',
  'XML_ID' => 'UF_CREDIT_LIMIT_FREE',
  'SORT' => '400',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'PRECISION' => 2,
    'SIZE' => 20,
    'MIN_VALUE' => 0.0,
    'MAX_VALUE' => 0.0,
    'DEFAULT_VALUE' => NULL,
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Free credit limit',
    'ru' => 'Свободный кредитный лимит',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Free credit limit',
    'ru' => 'Свободный кредитный лимит',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Free credit limit',
    'ru' => 'Свободный кредитный лимит',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_CREDIT_LIMIT_SPENT',
  'USER_TYPE_ID' => 'double',
  'XML_ID' => 'UF_CREDIT_LIMIT_SPENT',
  'SORT' => '500',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'PRECISION' => 2,
    'SIZE' => 20,
    'MIN_VALUE' => 0.0,
    'MAX_VALUE' => 0.0,
    'DEFAULT_VALUE' => NULL,
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Spent credit limit',
    'ru' => 'Израсходованный кредитный лимит',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Spent credit limit',
    'ru' => 'Израсходованный кредитный лимит',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Spent credit limit',
    'ru' => 'Израсходованный кредитный лимит',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_PREPAYMENT',
  'USER_TYPE_ID' => 'double',
  'XML_ID' => 'UF_PREPAYMENT',
  'SORT' => '600',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'PRECISION' => 2,
    'SIZE' => 20,
    'MIN_VALUE' => 0.0,
    'MAX_VALUE' => 0.0,
    'DEFAULT_VALUE' => NULL,
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Prepayment',
    'ru' => 'Аванс',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Prepayment',
    'ru' => 'Аванс',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Prepayment',
    'ru' => 'Аванс',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_POSTPONEMENT',
  'USER_TYPE_ID' => 'integer',
  'XML_ID' => 'UF_POSTPONEMENT',
  'SORT' => '700',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'SIZE' => 20,
    'MIN_VALUE' => 0,
    'MAX_VALUE' => 0,
    'DEFAULT_VALUE' => NULL,
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Postponement in days',
    'ru' => 'Отсрочка в днях',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Postponement in days',
    'ru' => 'Отсрочка в днях',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Postponement in days',
    'ru' => 'Отсрочка в днях',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_LATE_PAYMENT_SUM',
  'USER_TYPE_ID' => 'double',
  'XML_ID' => 'UF_LATE_PAYMENT_SUM',
  'SORT' => '800',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'PRECISION' => 2,
    'SIZE' => 20,
    'MIN_VALUE' => 0.0,
    'MAX_VALUE' => 0.0,
    'DEFAULT_VALUE' => NULL,
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Late payment sum',
    'ru' => 'Сумма просрочки',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Late payment sum',
    'ru' => 'Сумма просрочки',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Late payment sum',
    'ru' => 'Сумма просрочки',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_LATE_PAYMENT_DAYS',
  'USER_TYPE_ID' => 'integer',
  'XML_ID' => 'UF_LATE_PAYMENT_DAYS',
  'SORT' => '900',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'SIZE' => 20,
    'MIN_VALUE' => 0,
    'MAX_VALUE' => 0,
    'DEFAULT_VALUE' => NULL,
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Late payment in days',
    'ru' => 'Дней просрочки',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Late payment in days',
    'ru' => 'Дней просрочки',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Late payment in days',
    'ru' => 'Дней просрочки',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_LATE_PAYMENT_DEBT',
  'USER_TYPE_ID' => 'double',
  'XML_ID' => 'UF_LATE_PAYMENT_DEBT',
  'SORT' => '1000',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'PRECISION' => 2,
    'SIZE' => 20,
    'MIN_VALUE' => 0.0,
    'MAX_VALUE' => 0.0,
    'DEFAULT_VALUE' => NULL,
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Late payment debt',
    'ru' => 'Задолженность',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Late payment debt',
    'ru' => 'Задолженность',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Late payment debt',
    'ru' => 'Задолженность',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_SHIPMENT_BAN',
  'USER_TYPE_ID' => 'boolean',
  'XML_ID' => 'UF_SHIPMENT_BAN',
  'SORT' => '1100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'DEFAULT_VALUE' => 0,
    'DISPLAY' => 'CHECKBOX',
    'LABEL' => 
    array (
      0 => '',
      1 => '',
    ),
    'LABEL_CHECKBOX' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Shipment ban',
    'ru' => 'Запрет отгрузки',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Shipment ban',
    'ru' => 'Запрет отгрузки',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Shipment ban',
    'ru' => 'Запрет отгрузки',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_DATE_NEXT_PAYMENT',
  'USER_TYPE_ID' => 'date',
  'XML_ID' => 'UF_DATE_NEXT_PAYMENT',
  'SORT' => '1200',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'DEFAULT_VALUE' => 
    array (
      'TYPE' => 'NONE',
      'VALUE' => '',
    ),
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Date next payment',
    'ru' => 'Дата ближайшего платежа',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Date next payment',
    'ru' => 'Дата ближайшего платежа',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Date next payment',
    'ru' => 'Дата ближайшего платежа',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
            $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_CREDIT_LIMIT_PURCHASE_AVAILABLE',
  'USER_TYPE_ID' => 'boolean',
  'XML_ID' => 'UF_CREDIT_LIMIT_PURCHASE_AVAILABLE',
  'SORT' => '1300',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'DEFAULT_VALUE' => 0,
    'DISPLAY' => 'CHECKBOX',
    'LABEL' => 
    array (
      0 => '',
      1 => '',
    ),
    'LABEL_CHECKBOX' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Credit limit purchase available',
    'ru' => 'Доступна покупка в счет кредитного лимита',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Credit limit purchase available',
    'ru' => 'Доступна покупка в счет кредитного лимитаДоступна покупка в счет кредитного лимита',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Credit limit purchase available',
    'ru' => 'Доступна покупка в счет кредитного лимита',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
        }
}
