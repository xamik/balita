<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
class CBestxamNewsDetail extends CBitrixComponent
{
    private string $templateName = "";

    public function onPrepareComponentParams($arParams)
    {
        if (!is_int($arParams['IBLOCK_ID'])) {

        }

        $iblockRes = CIBlock::GetByID($this->arParams['IBLOCK_ID']);

        if ($iblock = $iblockRes->GetNext()) {

        }

        return $arParams;
    }

    private function getItem(){

        global $APPLICATION;
        //set order
        $elementsOrder = is_array($this->arParams['SORT']) ? $this->arParams['SORT'] : array("DATE_ACTIVE"=>"DESC", "SORT" => "ASC");

        //set filter
        $elementsFilter = array (
            "IBLOCK_ID" => $this->arParams['IBLOCK_ID'],
            "IBLOCK_LID" => SITE_ID,
            "ACTIVE" => "Y",
            "CHECK_PERMISSIONS" => $this->arParams['CHECK_PERMISSIONS'] ? "Y" : "N",
        );

        if($this->arParams['ID'] > 0){
            $elementsFilter[] = array( "ID"=> $this->arParams['ID']);
        }
        if($this->arParams['CODE']){
            $elementsFilter[] = array("CODE"=> $this->arParams['CODE']);
        }

        //set select
        $elementsSelect = array(
            "ID",
            "IBLOCK_ID",
            "IBLOCK_SECTION_ID",
            "NAME",
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
            $elementsSelect = array_merge( $elementsSelect, $this->arParams['FIELD_CODE']);
        }

        //select properties
        if (is_array($this->arParams['PROPERTY_CODE'])) {
            $elementsSelect = array_merge($elementsSelect, $this->arParams['PROPERTY_CODE']);
        }

        //set pager
        $elementsPager = array('nPageSize' => 1);

        //set group
        $elementsGroupBy = false;

        //get result
        $elementsRes = CIBlockElement::GetList($elementsOrder, $elementsFilter, $elementsGroupBy, $elementsPager, $elementsSelect);
        while ($elementsOb = $elementsRes->GetNext()) {
            $this->arResult = $elementsOb;
        }

        //set title
        if($this->arParams['SET_TITLE'] == "Y"){
            $APPLICATION->SetTitle($this->arResult["NAME"]);
        }
    }

    public  function executeComponent()
    {
        $this->getItem();
        $this->includeComponentTemplate();
    }
}

?>