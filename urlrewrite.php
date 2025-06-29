<?php
$arUrlRewrite=array (
    array (
        'CONDITION' => '#^/rest/#',
        'RULE' => '',
        'ID' => NULL,
        'PATH' => '/bitrix/services/rest/index.php',
        'SORT' => 100,
    ),
    array(
        'CONDITION' => '#^/api/(.*)/(.*)/(.*)#',
        'RULE' => 'CLASS=$1&METHOD=$2',
        'ID' => 'legacy:api',
        'PATH' => '/local/api/index.php',
        'SORT' => 100,
    ),
);
