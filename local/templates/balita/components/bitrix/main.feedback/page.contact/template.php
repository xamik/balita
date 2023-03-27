<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<? if (!empty($arResult["ERROR_MESSAGE"])) {
    foreach ($arResult["ERROR_MESSAGE"] as $v)
        ShowError($v);
}
if ($arResult["OK_MESSAGE"] <> '') {
    ?>
    <div class="mf-ok-text"><?= $arResult["OK_MESSAGE"] ?></div><?
}
?>

<form action="<?= POST_FORM_ACTION_URI ?>" method="POST">
    <?= bitrix_sessid_post() ?>

    <div class="row">
        <div class="col-md-6 form-group">
            <label for="name"><?= GetMessage("MFT_NAME") ?>
                <? if (empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])): ?>
                    <span>*</span>
                <? endif ?>
            </label>
            <input type="text" id="name" class="form-control" name="user_name" value="<?= $arResult["AUTHOR_NAME"] ?>">
        </div>

        <div class="col-md-6 form-group">
            <label for="email"><?= GetMessage("MFT_EMAIL") ?>
                <? if (empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])): ?>
                    <span>*</span>
                <? endif ?>
            </label>
            <input type="email" id="email" class="form-control" value="<?= $arResult["AUTHOR_EMAIL"] ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <label for="message"><?= GetMessage("MFT_MESSAGE") ?>
                <? if (empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])): ?>
                    <span>*</span>
                <? endif ?>
            </label>
            <textarea id="message" class="form-control " cols="30" rows="8" name="MESSAGE"><?= $arResult["MESSAGE"] ?></textarea>
        </div>
    </div>
    <? if ($arParams["USE_CAPTCHA"] == "Y"): ?>
        <div class="row align-items-center">
            <div class="col-md-6 form-group">
                <input type="hidden" name="captcha_sid" value="<?= $arResult["capCode"] ?>">
                <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["capCode"] ?>" width="180" height="40" alt="CAPTCHA">
            </div>
            <div class="col-md-6 form-group">
                <label for="captcha_word"><?= GetMessage("MFT_CAPTCHA_CODE") ?><span>*</span></label>
                 <input type="text" id="captcha_word" class="form-control" name="captcha_word"  value="">
            </div>
        </div>
    <? endif; ?>
    <input type="hidden" name="PARAMS_HASH" value="<?= $arResult["PARAMS_HASH"] ?>">
    <div class="row">
        <div class="col-md-6 form-group">
            <input type="submit" class="btn btn-primary" name="submit" value="<?= GetMessage("MFT_SUBMIT") ?>">
        </div>
    </div>
</form>
