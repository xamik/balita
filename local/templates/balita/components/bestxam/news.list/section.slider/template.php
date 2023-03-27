<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<?php if($arResult['ITEMS']):?>
<section class="site-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme home-slider">
                    <?php foreach($arResult['ITEMS'] as $arItem):?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <div  id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <a href="<?=$arItem['DETAIL_PAGE_URL'];?>" class="a-block d-flex align-items-center height-lg" style="background-image: url('<?=CFile::GetPath($arItem['PREVIEW_PICTURE']);?>'); ">
                            <div class="text half-to-full">
                                <div class="post-meta">
                                    <span class="category"><?=$arItem['IBLOCK_SECTION'][$arItem['IBLOCK_SECTION_ID']]['NAME'];?></span>
                                    <span class="mr-2"><?=date('F d,Y', strtotime($arItem['ACTIVE_FROM']));?></span> &bullet;
                                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                </div>
                                <h3><?=$arItem['NAME'];?></h3>
                                <? if($arItem['PREVIEW_TEXT']):?>
                                    <p><?=$arItem['PREVIEW_TEXT'];?></p>
                                <? endif;?>
                            </div>
                        </a>
                    </div>
                    <? endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif;?>