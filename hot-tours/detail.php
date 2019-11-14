<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Горящие туры ".$GLOBALS["hotCodes"][$_REQUEST["CITY"]]["NAME"]);
?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>