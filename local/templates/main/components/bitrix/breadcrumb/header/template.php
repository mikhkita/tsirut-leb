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

if($GLOBALS["is404"]){
	$title = htmlspecialcharsex($arResult[0]["TITLE"]);
	$strReturn .= '
		<li id="bx_breadcrumb_0" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<a href="'.$arResult[0]["LINK"].'" title="'.$title.'" itemprop="url"><span itemprop="title">'.$title.'</span></a>
		</li></ul>';
}else{
	$itemSize = count($arResult);

	$itsArticlesDetail = ($GLOBALS["urlArr"][1] == "articles" && !empty($GLOBALS["urlArr"][2]));
	$itsBusDetail = ($GLOBALS["urlArr"][1] == "tours" && $GLOBALS["urlArr"][2] == "bus" && !empty($GLOBALS["urlArr"][3]));
	$excludeItem = $itsArticlesDetail || $itsBusDetail;
	for($index = 0; $index < $itemSize; $index++)
	{
		$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

		if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1){
			$strReturn .= '
				<li id="bx_breadcrumb_'.$index.'" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url"><span itemprop="title">'.$title.'</span></a>
				</li>';
		}else{
			if(!$excludeItem){
				$strReturn .= '<li><span>'.$title.'</span></li>';
			}
			
		}
	}

	$strReturn .= '</ul>';
}

return $strReturn;
