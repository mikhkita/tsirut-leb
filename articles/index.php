<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наш блог о путешествиях");
?>

<?
if(isset($_REQUEST["TAG"]) && !empty($_REQUEST["TAG"])){
	$APPLICATION->SetTitle("По тегу \"".$_REQUEST["TAG"]."\"");
}
?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>