<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

    <div class="sidebar-box">
        <h3 class="heading">Categories</h3>
        <?
        $APPLICATION->IncludeComponent(
            "bitrix:menu",
            "sidebar.1",
            array(
                "ROOT_MENU_TYPE" => "categories",
                "MAX_LEVEL" => "1",
                "CHILD_MENU_TYPE" => "",
                "USE_EXT" => "Y",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "Y",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => array(),
                "COMPONENT_TEMPLATE" => "sidebar.1"
            ),
            false
        );
        ?>
    </div>
