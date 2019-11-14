<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
	$result = array();
	CModule::IncludeModule('iblock');
	$ID = htmlspecialcharsbx($_REQUEST["ID"]);

	if(isset($ID) && !empty($ID)){
		$res = CIBlockElement::GetByID($ID);
		if($arRes = $res->GetNext()){
			$result["result"] = "success";
			$result["text"] = $arRes['PREVIEW_TEXT'];
		}else{
			$result["result"] = "error";
			$result["errorMsg"] = "Не удалось получить отзыв";
		}
	}else{
		$result["result"] = "error";
		$result["errorMsg"] = "Параметр 'ID' отсутствует";
	}
	echo json_encode($result);
?>