<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';
$strReturn .= '<ul class="b-breadcrumbs">';

$itemSize = count($arResult);
$arPages = array("articles","bus");

$excludeItem = (in_array($GLOBALS["urlArr"][1], $arPages) && !empty($GLOBALS["urlArr"][2]));
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1){
		$strReturn .= '
			<li id="bx_breadcrumb_'.$index.'">
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a>
			</li>';
	}else{
		if(!$excludeItem){
			$strReturn .= '<li><span>'.$title.'</span></li>';
		}
		
	}
}

$strReturn .= '</ul>';

return $strReturn;
