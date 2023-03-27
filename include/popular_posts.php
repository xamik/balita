<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
    <div class="sidebar-box">
        <h3 class="heading">Popular Posts</h3>
        <?php
        $APPLICATION->IncludeComponent('bestxam:news.list', 'sidebar.popular', array(
            "IBLOCK_ID" => 1,
            "NEWS_COUNT" => 3,
            "SET_TITLE" => "N",
            "SET_BROWSER_TITLE" => "N",
            "PARENT_SECTION_CODE"=> "",
            "SORT"=>array("RAND"=>"ASC"),
            "SET_META_KEYWORDS" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SEF_MODE"=>"Y",
            "SEF_FOLDER"=>"/",
            "DETAIL_URL"=>"/blog/#SECTION_CODE#/#ELEMENT_CEDE#/",
        )); ?>
    </div>
