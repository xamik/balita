<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Blog");
?>
<?
$APPLICATION->IncludeComponent('bestxam:news', 'page.blog', array(
    "IBLOCK_ID" => 1,
    "FILTER_NAME" => '',
    "NEWS_COUNT" => 2,
    "SET_TITLE" => "Y",
    "SET_BROWSER_TITLE" => "Y",
    "SEF_MODE"=>"Y",
    "SEF_FOLDER"=>"/blog/",
    "SEF_URL_TEMPLATES"=>array(
        "list"=>"/",
        "section"=>"#SECTION_CODE#/",
        "detail"=>"#SECTION_CODE#/#CODE#/"
    ),
    "VARIABLE_ALIASES" => Array(
        "detail" => Array(),
        "list" => Array(),
        "section" => Array(),
    ),
    'PROPERTY_CODE' => array('PROPERTY_IN_SLIDER')
)); ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>