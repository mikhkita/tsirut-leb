<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
// use Bitrix\Sale;

\Bitrix\Main\Data\StaticHtmlCache::getInstance()->markNonCacheable();

$GLOBALS['APPLICATION']->RestartBuffer();

$action = (isset($_GET["action"]))?$_GET["action"]:NULL;
$action = (isset($_GET["actions"]))?$_GET["actions"]:$action;

switch ($action) {
	case 'ADDREVIEW':

		if (empty($_POST["MAIL"])){
			if (empty($_POST['comment'])) {
				$spam = true;
			} else {
				$spam = false;
			}
		}else{
			$spam = true;
		}

		if (!$spam) {
			CModule::IncludeModule("iblock");
			$el = new CIBlockElement;

			$PROP = array();

			$PROP["DATE"]['VALUE'] = getCurrentDate();
			$PROP["TOUR"]['VALUE'] = $_POST["tour"];

			$arLoadProductArray = Array(
			  "IBLOCK_ID"      => 3,
			  "PROPERTY_VALUES"=> $PROP,
			  "NAME"           => $_POST["name"],
			  "ACTIVE"         => "N",
			  "PREVIEW_TEXT"   => $_POST['comment'],
			  "DATE_ACTIVE_FROM" => ConvertTimeStamp(time(), "FULL"),
			);
			
			if ($id = $el->Add($arLoadProductArray)) {

				$link = "http://beltour.pro/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=3&type=content&ID=".$id."&lang=ru&find_section_section=-1&WF=Y";

				if(CEvent::Send("NEW_REVIEW", "s1", array("LINK" => $link, "NAME" => $_POST["name"], "TOUR" => $_POST["tour"], "COMMENT" => $_POST["comment"]))){
					echo "1";
				} else {
					echo "01";
				}
			} else {
				echo "02";
			}
		}else{
			echo "1";
		}

		break;
	default:
		break;
}
die();

function returnError( $text ){
	echo json_encode(array(
		"result" => "error",
		"error" => $text
	));
	die();
}

function returnSuccess( $array = array() ){
	$arResult = array(
		"result" => "success"
	);
	$arResult = $arResult + $array;

	echo json_encode($arResult);
	die();
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>