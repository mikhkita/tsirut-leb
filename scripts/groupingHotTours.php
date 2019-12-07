<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$GLOBALS['APPLICATION']->RestartBuffer();
$log = "";

//ID свойства - ID раздела
$citySecID = array(
	CITY_MOSCOW => CITY_MOSCOW_SECTION,
	CITY_BELGOROD => CITY_BELGOROD_SECTION, 
	CITY_VORONEZH => CITY_VORONEZH_SECTION
);
//Получить все горящие туры
$arFilter = Array("IBLOCK_ID" => 7);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, Array());
while($ob = $res->GetNextElement()){
	$arFields = $ob->GetFields();
	$arProps = $ob->GetProperties();

	$el = new CIBlockElement;
	$arLoadProductArray = Array(
	  "IBLOCK_SECTION" => $citySecID[$arProps["CITY"]["VALUE_ENUM_ID"]]
	);
	$resUpdate = $el->Update($arFields["ID"], $arLoadProductArray);
	if($resUpdate){
		$log .= "Элемент #".$arFields["ID"]." перемещён\n";
	}else{
		$log .= "Элемент #".$arFields["ID"]." не удалось переместить\n";
	}
}

echo $log;		
die();
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>