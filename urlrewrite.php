<?php
$arUrlRewrite=array (
  1 => 
  array (
    'CONDITION' => '#^/search/(.+)/(\\\\?(.*))?#',
    'RULE' => 'SECTION_CODE=$1',
    'ID' => '',
    'PATH' => '/search/detail.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
);
