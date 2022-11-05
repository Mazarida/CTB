<?php
$arUrlRewrite=array (
  6 => 
  array (
    'CONDITION' => '#^/knowledge-base/([\\w\\d\\-]+)/(\\?(.*))?#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => 'bitrix:news.detail',
    'PATH' => '/knowledge-base/detail.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/directions/([\\w\\d\\-]+)/(\\?(.*))?#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => 'bitrix:news.detail',
    'PATH' => '/directions/detail.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/products/([\\w\\d\\-]+)/(\\?(.*))?#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => 'bitrix:news.detail',
    'PATH' => '/products/detail.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/library/([\\w\\d\\-]+)/(\\?(.*))?#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => 'bitrix:news.detail',
    'PATH' => '/library/detail.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/news/([\\w\\d\\-]+)/(\\?(.*))?#',
    'RULE' => 'ELEMENT_CODE=$1',
    'ID' => 'bitrix:news.detail',
    'PATH' => '/news/detail.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
);
