<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?
	$fixIDs = array("10","11","20","48","13");
	$arCountry = array();
	$counter = 0;
	foreach ($arResult['SECTIONS'] as $arSection){
		$arCountry[$arSection["ID"]] = array("NAME" => $arSection["NAME"], "SECTION_PAGE_URL" => $arSection["SECTION_PAGE_URL"]);
	}
	$currentCountry = $GLOBALS["arCountry"]["id"];
	$counter = 0;
?>
<ul>
	<? foreach ($fixIDs as $id) :?>
		<?if($currentCountry != $id) :?>
			<li><a href="<?=$arCountry[$id]['SECTION_PAGE_URL'];?>"><?=$arCountry[$id]["NAME"]?></a></li>
			<?
			$counter++;
			unset($arCountry[$id]);
			?>
		<?endif;?>
	<? endforeach; ?>

	<?$i = 0;
	shuffle($arCountry);?>
	<? while ($counter < 7) :?>
		<? if(isset($arCountry[$i])) :?>
			<li><a href="<?=$arCountry[$i]['SECTION_PAGE_URL'];?>"><?=$arCountry[$i]["NAME"]?></a></li>
			<?$counter++; $i++;?>
		<? else: ?>
			<?break;?>
		<? endif; ?>
	<? endwhile; ?>

</ul>