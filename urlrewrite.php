<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  1 =>  array (
        'CONDITION' => '#^/blog/#',
        'RULE' => '',
        'ID' => 'bestxam:news',
        'PATH' => '/blog/index.php',
        'SORT' => 100,
    ),
);
