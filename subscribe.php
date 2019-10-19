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
		"EMAIL"	=> $_POST["email"],
	);

	if(CEvent::Send("SUBSCRIBE", "s1", $arEventFields)){
		echo "1";
	}else{
		echo "0";
	}
}
?>