<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>

                <ul class="categories">
                    <?
                    foreach ($arResult as $key => $arItem):
                    ?>

                     <li class="nav-item ">
                                <a href="<?= $arItem["LINK"] ?>"
                                   class="nav-link <? if ($arItem["SELECTED"]): ?>active<? endif; ?>"><?= $arItem["TEXT"] ?><span>(<?=$arItem['PARAMS']['COUNT'];?>)</span></a>
                      <? endforeach ?>
            </ul>

<? endif ?>
