<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<?php if($arResult['ITEMS']):?>
        <div class="row mb-5 mt-5">

            <div class="col-md-12">
                <? foreach ($arResult['ITEMS'] as $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                <div class="post-entry-horzontal" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <a href="<?=$arItem['DETAIL_PAGE_URL'];?>">
                        <div class="image element-animate" data-animate-effect="fadeIn" style="background-image: url(<?=CFile::GetPath($arItem['PREVIEW_PICTURE']);?>);"></div>
                        <span class="text">
                      <div class="post-meta">
                        <span class="category"><?=$arItem['IBLOCK_SECTION'][$arItem['IBLOCK_SECTION_ID']]['NAME'];?></span>
                        <span class="mr-2"><?=date('F d,Y', strtotime($arItem['ACTIVE_FROM']));?></span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                      </div>
                      <h2><?=$arItem['NAME'];?></h2>
                    </span>
                    </a>
                </div>
                <!-- END post -->
                <? endforeach;?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <?php echo $arResult['NAV_STRING'];?>
            </div>
        </div>
<?php endif;?>