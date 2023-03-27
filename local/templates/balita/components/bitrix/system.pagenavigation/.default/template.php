<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$ClientID = 'navigation_'.$arResult['NavNum'];

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}
?>
<nav aria-label="Page navigation" class="text-center">
    <ul class="pagination">
    <?
    $strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
    $strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
    if($arResult["bDescPageNumbering"] === true)
    {
        // to show always first and last pages
        $arResult["nStartPage"] = $arResult["NavPageCount"];
        $arResult["nEndPage"] = 1;

        $sPrevHref = '';
        if ($arResult["NavPageNomer"] < $arResult["NavPageCount"])
        {
            $bPrevDisabled = false;
            if ($arResult["bSavePage"])
            {
                $sPrevHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1);
            }
            else
            {
                if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1))
                {
                    $sPrevHref = $arResult["sUrlPath"].$strNavQueryStringFull;
                }
                else
                {
                    $sPrevHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1);
                }
            }
        }
        else
        {
            $bPrevDisabled = true;
        }

        $sNextHref = '';
        if ($arResult["NavPageNomer"] > 1)
        {
            $bNextDisabled = false;
            $sNextHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]-1);
        }
        else
        {
            $bNextDisabled = true;
        }
        ?>
        <?if (!$bPrevDisabled):?>
        <li class="page-item"><a href="<?=$sPrevHref;?>" id="<?=$ClientID?>_previous_page" class="page-link"><?=GetMessage("nav_prev")?></a></li>
    <?endif;?>&nbsp;
        <?
        $bFirst = true;
        $bPoints = false;
        do
        {
            $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;
            if ($arResult["nStartPage"] <= 2 || $arResult["NavPageCount"]-$arResult["nStartPage"] <= 1 || abs($arResult['nStartPage']-$arResult["NavPageNomer"])<=2)
            {

                if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                    ?>
                    <li class="page-item"><a href="#"  class="page-link"><?=$NavRecordGroupPrint?></a></li>
                <?
                elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
                    ?>
                    <li class="page-iitem"><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="page-link"><?=$NavRecordGroupPrint?></a>
                <?
                else:
                    ?>
                    <li class="page-item"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>" class="page-link"><?=$NavRecordGroupPrint?></a>
                <?
                endif;
                $bFirst = false;
                $bPoints = true;
            }
            else
            {
                if ($bPoints)
                {
                    ?><li class="page-link"><span>...</span><li><?
                    $bPoints = false;
                }
            }
            $arResult["nStartPage"]--;
        } while($arResult["nStartPage"] >= $arResult["nEndPage"]);
    }
    else
    {
        // to show always first and last pages
        $arResult["nStartPage"] = 1;
        $arResult["nEndPage"] = $arResult["NavPageCount"];

        $sPrevHref = '';
        if ($arResult["NavPageNomer"] > 1)
        {
            $bPrevDisabled = false;

            if ($arResult["bSavePage"] || $arResult["NavPageNomer"] > 2)
            {
                $sPrevHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]-1);
            }
            else
            {
                $sPrevHref = $arResult["sUrlPath"].$strNavQueryStringFull;
            }
        }
        else
        {
            $bPrevDisabled = true;
        }

        $sNextHref = '';
        if ($arResult["NavPageNomer"] < $arResult["NavPageCount"])
        {
            $bNextDisabled = false;
            $sNextHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1);
        }
        else
        {
            $bNextDisabled = true;
        }
        ?>       <?if (!$bPrevDisabled):?>
        <li class="page-item">
            <a href="<?=$sPrevHref;?>" id="<?=$ClientID?>_previous_page" class="page-link">
             Prev
            </a>
        </li>
    <?endif;?>

        <?
        $bFirst = true;
        $bPoints = false;
        do
        {
            if ($arResult["nStartPage"] <= 2 || $arResult["nEndPage"]-$arResult["nStartPage"] <= 1 || abs($arResult['nStartPage']-$arResult["NavPageNomer"])<=2)
            {

                if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
                    ?>
                    <li class="page-item active"><a href="#" class="page-link"><?=$arResult["nStartPage"]?></a></li>
                <?
                elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
                    ?>
                    <li class="page-item"><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a></li>
                <?
                else:
                    ?>
                    <li class="page-item"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>" class="page-link"><?=$arResult["nStartPage"]?></a></li>
                <?
                endif;
                $bFirst = false;
                $bPoints = true;
            }
            else
            {
                if ($bPoints)
                {
                    ?>...<?
                    $bPoints = false;
                }
            }
            $arResult["nStartPage"]++;
        } while($arResult["nStartPage"] <= $arResult["nEndPage"]);
    }

?>
    <?if (!$bNextDisabled):?>
        <li class="page-item">
            <a href="<?=$sNextHref;?>" id="<?=$ClientID?>_next_page" class="page-link">
               Next
            </a>
        </li>
    <?endif;?>
    </ul>
</nav>