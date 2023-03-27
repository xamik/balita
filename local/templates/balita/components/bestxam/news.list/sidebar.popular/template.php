<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php if($arResult['ITEMS']):?>
<div class="post-entry-sidebar">
    <ul>
        <? foreach ($arResult['ITEMS'] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <li  id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <a href="<?=$arItem['DETAIL_PAGE_URL'];?>">
                    <img src="<?=CFile::GetPath($arItem['PREVIEW_PICTURE']);?>" alt="Image placeholder" class="mr-4">
                    <div class="text">
                        <h4><?=$arItem['NAME'];?></h4>
                        <div class="post-meta">
                            <span class="mr-2"><?=date('F d,Y', strtotime($arItem['ACTIVE_FROM']));?> </span> &bullet;
                            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                        </div>
                    </div>
                </a>
            </li>
        <? endforeach;?>
    </ul>
</div>
<?php endif;?>
