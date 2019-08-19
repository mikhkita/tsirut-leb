<?

CModule::AddAutoloadClasses(
   '', // не указываем имя модуля
   array(
      // ключ - имя класса, значение - путь относительно корня сайта к файлу с классом
   	'Curl' => '/local/php_interface/classes/curl.php',
   	'Parser' => '/local/php_interface/classes/parser.php',
   	'Tourvisor' => '/local/php_interface/classes/tourvisor.php',
   	'TourList' => '/local/php_interface/classes/tourlist.php',
   	'Log' => '/local/php_interface/classes/log.php',
   )
);

// Константы

// define(WITHOUT_VISA, 2);//Без визы
// define(VISA, 3);//Виза
// define(VISA_ARRIVAL, 4);//Виза по прилете
// define(SCHENGEN_VISA, 5);//Шенгенская виза

define(UF_CATEGORIES, 3);//Польз. поле "Категории"
//Города из инфоблока "Горячие туры"
define(CITY_MOSCOW, 8);
define(CITY_BELGOROD, 9);
define(CITY_VORONEZH, 10);

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

function getRusMonth($i){
   $array = array("января","февраля","марта","апреля","мая","июня","июля","августа","сентября","октября","ноября","декабря");
   return $array[$i-1];
}

function dateFormatted($date){
   $arr = explode("-", $date);
   return intval($arr[2])." ".getRusMonth($arr[1]);
}

function getCurrentDate(){
	$date = date("d-m-Y");
	$arr = explode("-", $date);
	return intval($arr[0])." ".getRusMonth($arr[1])." ".intval($arr[2]);
}

AddEventHandler("main", "OnEpilog", "Redirect404");
function Redirect404() {
    if (defined('ERROR_404') && ERROR_404=='Y' && !defined('ADMIN_SECTION')){
	   GLOBAL $APPLICATION;
	   $APPLICATION->RestartBuffer();
	   include   $_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/header.php';
	   require   ($_SERVER['DOCUMENT_ROOT'].'/404.php');
	   include   $_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/footer.php';
	}
}

AddEventHandler("main", "OnEndBufferContent", "replacePlaceholders");
function replacePlaceholders(&$content){
	$year = date("Y", strtotime("+2 month"));
	$content = str_replace("#YEAR#", $year, $content);
}

function writeLog($record, $filename){
	if(file_exists($filename)){
		file_put_contents($filename, PHP_EOL.date('d.m.Y-H:i:s').PHP_EOL.$record, FILE_APPEND);
	}else{
		file_put_contents($filename, date('d.m.Y-H:i:s').PHP_EOL.$record);
	}
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