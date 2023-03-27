<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
global $APPLICATION;
$aMenuLinksExt = [];
$arFilter = Array('IBLOCK_ID' => 1, '=DEPTH_LEVEL' => 1);
$arSelect = ['ID', 'NAME', 'SECTION_PAGE_URL', 'DESCRIPTION', 'PICTURE',];
$db_list = CIBlockSection::GetList(Array('left_margin' => 'asc'), $arFilter, true, $arSelect);
while ($ar_result = $db_list->GetNext()) {

    $aMenuLinksExt[] = [
        0 => $ar_result['NAME'],
        1 => $ar_result['SECTION_PAGE_URL'],
        2 => [
            0 => $ar_result['SECTION_PAGE_URL']
        ],
        3 => [
            'FROM_IBLOCK' => true,
            'IS_PARENT' => false,
            'COUNT'=>$ar_result['ELEMENT_CNT']

        ]
    ];
}



$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>