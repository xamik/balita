<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
$APPLICATION->IncludeComponent('bestxam:news.detail', 'page.blog', array(
    "IBLOCK_ID" => $arParams['IBLOCK_ID'],
    "FILTER_NAME" => $arParams['FILTER_NAME'],
    'FIELD_CODE' => $arParams['FIELD_CODE'],
    'PROPERTY_CODE' => $arParams['PROPERTY_CODE'],
    "NEWS_COUNT" => $arParams['NEWS_COUNT'],
    "SET_TITLE" => $arParams['SET_TITLE'],
    "ID"=> $arParams['ELEMENT_ID'],
    "CODE"=> $arParams['ELEMENT_CODE'],
    "INCLUDE_SUBSECTIONS" => $arParams['INCLUDE_SUBSECTIONS'],
    "SET_BROWSER_TITLE" => $arParams['SET_BROWSER_TITLE'],
    "SET_META_KEYWORDS" => $arParams['SET_META_KEYWORDS'],
    "SET_META_DESCRIPTION" => $arParams['SET_META_DESCRIPTION'],
    "SET_LAST_MODIFIED" => $arParams['SET_LAST_MODIFIED'],
    "SEF_MODE"=> $arParams['SEF_MODE'],
    "SEF_FOLDER"=> $arParams['SEF_FOLDER'],
    "DETAIL_URL"=> $arParams['DETAIL_URL'],
)); ?>