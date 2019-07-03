<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$GLOBALS['APPLICATION']->RestartBuffer();

$filterTags = array(
	"http://128.fo.ru",
	"КЛИЕНТСКИЕ БАЗЫ",
	"prodawez392@gmail.com",
);

$spam = false;
foreach ($_POST as $i => $value)
	foreach ($filterTags as $j => $tag)
		if( mb_strpos($value, $tag, 0, "UTF-8") !== false )
			$spam = true;

if( (isset($_POST["MAIL"]) && $_POST["MAIL"] != "") || $spam ){
	$data = array(
		"DATA" => implode(PHP_EOL, array_map(function($k, $v) { return "$k: $v"; }, array_keys($_POST), $_POST))
	);
	if( CEvent::Send("SPAM", "s1", $data) ){
		echo "1";
	}else{
		echo "0";
	}
}else{

	$arEventFields = array(
		"COUNTRY" => (!empty($_POST["country-other"])) ? $_POST["country-other"] : $_POST["country"],
		"MONTH" => $_POST["month"],
		"ADULTS" => $_POST["adults"],
		"CHILDREN" => $_POST["children"],
		"NIGHT" => $_POST["night"],
		"NAME" => $_POST["name"],
		"PHONE" => $_POST["phone"],
		"EMAIL" => $_POST["email"],
	);

	if(CEvent::Send("NEW_QUIZ", "s1", $arEventFields)){
		echo "1";
	}else{
		echo "0";
	}
}
?>