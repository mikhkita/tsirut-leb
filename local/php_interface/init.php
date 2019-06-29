<?

// Константы

// define(WITHOUT_VISA, 2);//Без визы
// define(VISA, 3);//Виза
// define(VISA_ARRIVAL, 4);//Виза по прилете
// define(SCHENGEN_VISA, 5);//Шенгенская виза

define(UF_CATEGORIES, 3);//Польз. поле "Категории"

// ===========

function includeArea($file, $getString = false){
	if($getString){
		$str = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/include/".$file.".php");
		return preg_replace("/[^\+0-9]/", "", $str);
	}else{
		global $APPLICATION;
		$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
		        "AREA_FILE_SHOW" => "file", 
		        "PATH" => "/include/".$file.".php"
		    )
		);
	}	
}

function numberFormat($value){
	return number_format($value, 0, '', ' ');
}

function UserFieldValue($id){
	$UserField = CUserFieldEnum::GetList(array(), array("ID" => $id));
	if($UserFieldAr = $UserField->GetNext()){
		return $UserFieldAr["VALUE"];
	}
	else return false;
}



// function getValidPhone($file){
// 	global $APPLICATION;
// 	$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
// 	        "AREA_FILE_SHOW" => "file", 
// 	        "PATH" => "/include/".$file.".php"
// 	    )
// 	);	
// } 
?>