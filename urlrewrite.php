<?php
$arUrlRewrite=array (
  4 => 
  array (
    'CONDITION' => '#^/hot-tours/(.+)/(.+)/(\\\\?(.*))?#',
    'RULE' => 'CITY=$1&ELEMENT_CODE=$2&$3',
    'ID' => '',
    'PATH' => '/hot-tours/detail.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/search/(.+)/(.+)/(\\\\?(.*))?#',
    'RULE' => 'SECTION_CODE=$1&RESORT=$2&$3',
    'ID' => '',
    'PATH' => '/search/detailResort.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/hot-tours/(.+)/(\\\\?(.*))?#',
    'RULE' => 'CITY=$1&$2',
    'ID' => '',
    'PATH' => '/hot-tours/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/articles/(.+)/(\\\\?(.*))?#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => '',
    'PATH' => '/articles/detail.php',
    'SORT' => 100,
  ),
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
