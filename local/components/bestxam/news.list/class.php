<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class CBestxamNewsList extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        if (!is_int($arParams['IBLOCK_ID'])) {

        }

        $iblockRes = CIBlock::GetByID($this->arParams['IBLOCK_ID']);

        if ($iblock = $iblockRes->GetNext()) {

        }
        return $arParams;

    }

    private function getItems()
    {
        global $APPLICATION;
        //set order
        $elementsOrder = is_array($this->arParams['SORT']) ? $this->arParams['SORT'] : array("DATE_ACTIVE" => "DESC", "SORT" => "ASC");

        //set filter
        $elementsFilter = array(
            "IBLOCK_ID" => $this->arParams['IBLOCK_ID'],
            "IBLOCK_LID" => SITE_ID,
            "ACTIVE" => "Y",
            "CHECK_PERMISSIONS" => $this->arParams['CHECK_PERMISSIONS'] ? "Y" : "N",
            "INCLUDE_SUBSECTIONS" => $this->arParams['INCLUDE_SUBSECTIONS'] ?: "Y"
        );
        $sectionFilter = array("IBLOCK_ID" => $this->arParams['IBLOCK_ID']);
        if ($this->arParams['PARENT_SECTION']) {
            $elementsFilter[] = array("SECTION_ID" => $this->arParams['PARENT_SECTION']);
            $sectionFilter["ID"] = $this->arParams['PARENT_SECTION'];
        }
        if ($this->arParams['PARENT_SECTION_CODE']) {
            $elementsFilter[] = array("SECTION_CODE" => $this->arParams['PARENT_SECTION_CODE']);
            $sectionFilter["CODE"] = $this->arParams['PARENT_SECTION_CODE'];
        }
        if (isset($this->arParams['FILTER_NAME'])) {
            if (isset($GLOBALS[$this->arParams['FILTER_NAME']])) {
                $elementsFilter = array_merge($elementsFilter, $GLOBALS[$this->arParams['FILTER_NAME']]);
            }
        }

        //set select
        $elementsSelect = array(
            "ID",
            "IBLOCK_ID",
            "IBLOCK_SECTION_ID",
            "NAME",
            "IBLOCK_SECTION",
            "ACTIVE_FROM",
            "TIMESTAMP_X",
            "DETAIL_PAGE_URL",
            "LIST_PAGE_URL",
            "DETAIL_TEXT",
            "DETAIL_TEXT_TYPE",
            "PREVIEW_TEXT",
            "PREVIEW_TEXT_TYPE",
            "PREVIEW_PICTURE",
        );

        //select fields
        if (is_array($this->arParams['FIELD_CODE'])) {
            $elementsSelect = array_merge($elementsSelect, $this->arParams['FIELD_CODE']);
        }

        //select properties
        if (is_array($this->arParams['PROPERTY_CODE'])) {
            $elementsSelect = array_merge($elementsSelect, $this->arParams['PROPERTY_CODE']);
        }

        //set pager
        $elementsPager = array('nPageSize' => !isset($this->arParams['NEWS_COUNT']) ? 20 : $this->arParams['NEWS_COUNT']);

        //set group
        $elementsGroupBy = false;

        //get result
        $elementsRes = CIBlockElement::GetList($elementsOrder, $elementsFilter, $elementsGroupBy, $elementsPager, $elementsSelect);
        while ($elementsOb = $elementsRes->GetNext()) {
            $arButtons = CIBlock::GetPanelButtons(
                $elementsOb["IBLOCK_ID"],
                $elementsOb["ID"],
                $elementsOb['IBLOCK_SECTION_ID'],
                array("SECTION_BUTTONS"=>false, "SESSID"=>false)
            );
            $elementsOb["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
            $elementsOb["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];
            $this->arResult['ITEMS'][] = $elementsOb;
        }

        //get pager
        $this->arResult["NAV_STRING"] = $elementsRes->GetPageNavStringEx(
            $navComponentObject,
            '', '', ''
        );

        //get section
        $sectionRes = CIBlockSection::GetList(array(), $sectionFilter);
        if ($this->arResult['SECTION'] = $sectionRes->Fetch()) {
            //set title
            if ($this->arParams['SET_TITLE'] == "Y") {
                $APPLICATION->SetPageProperty('h1', $this->arResult['SECTION']['NAME']);
            }
            if ($this->arParams['SET_BROWSER_TITLE'] == 'Y') {
                $APPLICATION->SetTitle($this->arResult['SECTION']['NAME']);
            }
        }
    }

    public function executeComponent()
    {
        $this->getItems();

        $this->includeComponentTemplate();

    }
}

?>