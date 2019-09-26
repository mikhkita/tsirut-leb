<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("T_IBLOCK_DESC_LIST"),
	"DESCRIPTION" => GetMessage("T_IBLOCK_DESC_LIST_DESC"),
	"ICON" => "/images/news_list.gif",
	"SORT" => 1,
//	"SCREENSHOT" => array(
//		"/images/post-77-1108567822.jpg",
//		"/images/post-1169930140.jpg",
//	),
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "redder",
		"NAME" => GetMessage("NAMESPACE_NAME"),
		"CHILD" => array(
			"ID" => "constructor",
			"NAME" => GetMessage("T_IBLOCK_DESC_NEWS"),
			"SORT" => 1,
			"CHILD" => array(
				"ID" => "news_cmpx",
			),
		),
	),
);

?>