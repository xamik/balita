<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!doctype html>
<html lang="en">
<head>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700" rel="stylesheet">

    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/css/bootstrap.css'); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/css/animate.css'); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/css/owl.carousel.min.css'); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/fonts/ionicons/css/ionicons.min.css'); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/fonts/fontawesome/css/font-awesome.min.css'); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/fonts/flaticon/font/flaticon.css'); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/assets/css/style.css'); ?>


    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/assets/js/jquery-3.2.1.min.js'); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/assets/js/jquery-migrate-3.0.0.js'); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/assets/js/popper.min.js'); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/assets/js/bootstrap.min.js'); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/assets/js/owl.carousel.min.js'); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/assets/js/jquery.waypoints.min.js'); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/assets/js/jquery.stellar.min.js'); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/assets/js/main.js'); ?>

    <? $APPLICATION->ShowHead(); ?>
</head>
<body>
<? $APPLICATION->ShowPanel(); ?>


<header role="banner">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-9 social">
                    <a href="#"><span class="fa fa-twitter"></span></a>
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><span class="fa fa-instagram"></span></a>
                    <a href="#"><span class="fa fa-youtube-play"></span></a>
                    <a href="#"><span class="fa fa-vimeo"></span></a>
                    <a href="#"><span class="fa fa-snapchat"></span></a>
                </div>
                <div class="col-3 search-top">
                    <!-- <a href="#"><span class="fa fa-search"></span></a> -->
                    <form action="#" class="search-top-form">
                        <span class="icon fa fa-search"></span>
                        <input type="text" id="s" placeholder="Type keyword to search...">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container logo-wrap">
        <div class="row pt-5">
            <div class="col-12 text-center">
                <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button"
                   aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
                <h1 class="site-logo"><a href="/">Balita</a></h1>
            </div>
        </div>
    </div>
    <?
    $APPLICATION->IncludeComponent(
        "bitrix:menu",
        "header.1",
        array(
            "ROOT_MENU_TYPE" => "top",
            "MAX_LEVEL" => "2",
            "CHILD_MENU_TYPE" => "left",
            "USE_EXT" => "Y",
            "DELAY" => "N",
            "ALLOW_MULTI_SELECT" => "Y",
            "MENU_CACHE_TYPE" => "N",
            "MENU_CACHE_TIME" => "3600",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "MENU_CACHE_GET_VARS" => array(),
            "COMPONENT_TEMPLATE" => "header.1"
        ),
        false
    );
    ?>
</header>
<!-- END header -->

<? if ($APPLICATION->GetCurPage(false) === '/'): ?>
    <?
    $GLOBALS['sectionSliderFilter']['PROPERTY_IN_SLIDER'] = true;
    $APPLICATION->IncludeComponent('bestxam:news.list', 'section.slider', array(
        "IBLOCK_ID" => 1,
        "FILTER_NAME" => 'sectionSliderFilter',
        "NEWS_COUNT" => 5,
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SEF_MODE"=>"Y",
        "SEF_FOLDER"=>"/",
        "DETAIL_URL"=>"/blog/#SECTION_CODE#/#ELEMENT_CEDE#/",
        'PROPERTY_CODE' => array('PROPERTY_IN_SLIDER')
    )); ?>
<? endif; ?>

<section class="site-section<? if ($APPLICATION->GetCurPage(false) === '/'): ?>py-sm<? endif; ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="mb-4"><? $APPLICATION->ShowTitle('h1') ?></h2>
            </div>
        </div>
        <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">