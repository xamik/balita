<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

//get section list
$sectionsRes = CIBlockElement::GetElementGroups($arResult['ID'], true);
while($section = $sectionsRes->Fetch()) {
    $arResult['IBLOCK_SECTION'][$section['ID']] = $section;
}



