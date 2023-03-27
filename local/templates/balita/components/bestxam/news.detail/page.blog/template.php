<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<div class="post-meta">
    <span class="category"><?=$arResult['IBLOCK_SECTION'][$arResult['IBLOCK_SECTION_ID']]["NAME"];?></span>
    <span class="mr-2"><?=date('F d,Y', strtotime($arResult['ACTIVE_FROM']));?></span> &bullet;
    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
</div>
<div class="post-content-body">
    <?=$arResult['DETAIL_TEXT'];?>
</div>


<div class="pt-5">
    <p>Categories:
        <? $n = 1;?>
        <? foreach ($arResult['IBLOCK_SECTION'] as $section):?>
            <a href="/blog/<?=$section['CODE'];?>/"><?=$section['NAME'];?></a><? if($n < count($arResult['IBLOCK_SECTION'])):?>, <? endif;?>
            <? $n++;?>
        <? endforeach;?>
</div>
