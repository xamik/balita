<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Contact");
?>
<?$APPLICATION->IncludeComponent("bitrix:main.feedback","page.contact",Array(
        "USE_CAPTCHA" => "Y",
        "OK_TEXT" => "Спасибо, ваше сообщение принято.",
        "EMAIL_TO" => "my@email.com",
        "REQUIRED_FIELDS" => Array("NAME","EMAIL","MESSAGE"),
        "EVENT_MESSAGE_ID" => Array("5")
    )
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>