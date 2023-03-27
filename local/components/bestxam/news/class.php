<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
class CBestxamNews extends CBitrixComponent
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
    public function setComponentTemplateName(){

        global $APPLICATION;

        $arDefaultUrlTemplates = array("list"=>"","detail"=>"",'section'=>"");

        $arComponentVariables = array(
            "SECTION_ID",
            "SECTION_CODE",
            "ELEMENT_ID",
            "ELEMENT_CODE",
        );
        $arUrlTemplates = CComponentEngine::makeComponentUrlTemplates($arDefaultUrlTemplates, $this->arParams["SEF_URL_TEMPLATES"]);

        $arVariableAliases = CComponentEngine::makeComponentVariableAliases($arComponentVariables, $this->arParams["VARIABLE_ALIASES"]);

        $engine = new CComponentEngine($this);
        if (CModule::IncludeModule('iblock'))
        {
            $engine->addGreedyPart("#SECTION_CODE_PATH#");
            $engine->setResolveCallback(array("CIBlockFindTools", "resolveComponentEngine"));
        }
        $componentPage = $engine->guessComponentPath(
            $this->arParams["SEF_FOLDER"],
            $arUrlTemplates,
            $arComponentVariables
        );

        //set parent section
        $this->arParams['PARENT_SECTION_CODE'] = $arComponentVariables['SECTION_CODE'] ? : false;
        $this->arParams['PARENT_SECTION'] = $arComponentVariables['SECTION_ID'] ? : false;

        $this->arParams['ELEMENT_CODE'] = $arComponentVariables['CODE'] ? : false;
        $this->arParams['ELEMENT_ID'] = $arComponentVariables['ID'] ? : false;


        //set template file name
        $this->templateName = $componentPage ?:"list";


    }
    public  function executeComponent()
    {

        $this->setComponentTemplateName();
        $this->includeComponentTemplate($this->templateName);

    }
}

?>