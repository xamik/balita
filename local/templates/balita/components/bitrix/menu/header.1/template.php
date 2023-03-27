<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>

    <nav class="navbar navbar-expand-md  navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav mx-auto">
                    <?
                    foreach ($arResult as $key => $arItem):
                    ?>
                        <? if ($arItem["DEPTH_LEVEL"] == 1 && $arResult[$key + 1]["DEPTH_LEVEL"] == 2): ?>
                            <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle <? if ($arItem["SELECTED"]): ?>active<? endif; ?>"
                               href="<?= $arItem["LINK"] ?>"
                               id="dropdown05"
                               data-toggle="dropdown"
                               aria-haspopup="true"
                               aria-expanded="false"><?= $arItem["TEXT"] ?></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown05">
                        <? elseif ($arItem["DEPTH_LEVEL"] == 1 && ($arResult[$key + 1]["DEPTH_LEVEL"] == 1 || !isset($arResult[$key + 1]["DEPTH_LEVEL"]))): ?>
                            <li class="nav-item ">
                                <a href="<?= $arItem["LINK"] ?>"
                                   class="nav-link <? if ($arItem["SELECTED"]): ?>active<? endif; ?>"><?= $arItem["TEXT"] ?></a>
                            </li>
                        <? elseif ($arResult[$key + 1]["DEPTH_LEVEL"] == 2): ?>
                            <a class="dropdown-item"
                               href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                        <? endif; ?>
                        <?
                        if (
                                ($arItem["DEPTH_LEVEL"] == 2 && $arResult[$key + 1]["DEPTH_LEVEL"] == 1) ||
                                ($arItem["DEPTH_LEVEL"] == 2 && !isset($arResult[$key + 1]["DEPTH_LEVEL"]))
                        ):
                        ?>
                    </div>
                    </li>
                <? endif;?>
            <? endforeach ?>
            </ul>
        </div>
        </div>
    </nav>

<? endif ?>
