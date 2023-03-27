<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Balita");
?>
<?
$APPLICATION->IncludeComponent('bestxam:news.list', 'page.index', array(
    "IBLOCK_ID" => 1,
    "NEWS_COUNT" => 5,
    "SET_TITLE" => "Y",
    "SET_BROWSER_TITLE" => "N",
    "PARENT_SECTION_CODE"=> "travel",
    "SET_META_KEYWORDS" => "N",
    "SET_META_DESCRIPTION" => "N",
    "SET_LAST_MODIFIED" => "N",
    "SEF_MODE"=>"Y",
    "SEF_FOLDER"=>"/",
    "DETAIL_URL"=>"/blog/#SECTION_CODE#/#ELEMENT_CEDE#/",
)); ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>