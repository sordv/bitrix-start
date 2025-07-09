<?php

namespace Sprint\Migration;


class recociliationacts20250707151355 extends Version
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
  'NAME' => 'ReconciliationActs',
  'TABLE_NAME' => 'reconciliation_acts',
  'LANG' => 
  array (
    'ru' => 
    array (
      'NAME' => 'Акты сверки',
    ),
    'en' => 
    array (
      'NAME' => 'Reconciliation acts',
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
  'FIELD_NAME' => 'UF_CONTRACT',
  'USER_TYPE_ID' => 'string',
  'XML_ID' => 'UF_CONTRACT',
  'SORT' => '200',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'SIZE' => 20,
    'ROWS' => 1,
    'REGEXP' => '',
    'MIN_LENGTH' => 0,
    'MAX_LENGTH' => 0,
    'DEFAULT_VALUE' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Contract number',
    'ru' => 'Номер договора',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Contract number',
    'ru' => 'Номер договора',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Contract number',
    'ru' => 'Номер договора',
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
  'FIELD_NAME' => 'UF_DATE_START',
  'USER_TYPE_ID' => 'date',
  'XML_ID' => 'UF_DATE_START',
  'SORT' => '300',
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
    'en' => 'Period from',
    'ru' => 'Период с',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Period from',
    'ru' => 'Период с',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Period from',
    'ru' => 'Период с',
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
  'FIELD_NAME' => 'UF_DATE_END',
  'USER_TYPE_ID' => 'date',
  'XML_ID' => 'UF_DATE_END',
  'SORT' => '400',
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
    'en' => 'Period to',
    'ru' => 'Период до',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Period to',
    'ru' => 'Период до',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Period to',
    'ru' => 'Период до',
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
  'FIELD_NAME' => 'UF_DATE_FORMATION',
  'USER_TYPE_ID' => 'date',
  'XML_ID' => 'UF_DATE_FORMATION',
  'SORT' => '500',
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
    'en' => 'Formation date',
    'ru' => 'Дата формирования',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Formation date',
    'ru' => 'Дата формирования',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Formation date',
    'ru' => 'Дата формирования',
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
  'FIELD_NAME' => 'UF_ACT_FILE',
  'USER_TYPE_ID' => 'file',
  'XML_ID' => 'UF_ACT_FILE',
  'SORT' => '600',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'N',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'N',
  'SETTINGS' => 
  array (
    'SIZE' => 20,
    'LIST_WIDTH' => 0,
    'LIST_HEIGHT' => 0,
    'MAX_SHOW_SIZE' => 0,
    'MAX_ALLOWED_SIZE' => 0,
    'EXTENSIONS' => 
    array (
    ),
    'TARGET_BLANK' => 'Y',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Reconciliation act file',
    'ru' => 'Файл акта сверки',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Reconciliation act file',
    'ru' => 'Файл акта сверки',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Reconciliation act file',
    'ru' => 'Файл акта сверки',
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
