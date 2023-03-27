<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

//get section list
foreach($arResult['ITEMS'] as $key=>$arItem){
    $sectionsRes = CIBlockElement::GetElementGroups($arItem['ID'], true);
    while($section = $sectionsRes->Fetch()) {
        $arResult['ITEMS'][$key]['IBLOCK_SECTION'][$section['ID']] = $section;
    }
}



