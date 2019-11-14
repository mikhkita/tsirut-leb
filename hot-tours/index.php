<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", $GLOBALS["hotCodes"][$_REQUEST["CITY"]]["TITLE"]);
$APPLICATION->SetPageProperty("description", $GLOBALS["hotCodes"][$_REQUEST["CITY"]]["DESCRIPTION"]);
$APPLICATION->SetTitle("Горящие туры ".$GLOBALS["hotCodes"][$_REQUEST["CITY"]]["NAME"]);
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>