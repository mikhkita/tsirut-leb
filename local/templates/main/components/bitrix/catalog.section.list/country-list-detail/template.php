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
<?shuffle($arResult['SECTIONS']);
$arResult['SECTIONS'] = array_slice($arResult['SECTIONS'], 0, 6);?>
<ul>
<?foreach ($arResult['SECTIONS'] as $arSection):?>
	<?if($arSection["ID"] != $GLOBALS["arCountry"]["id"]):?>
		<li><a href="<?=$arSection['SECTION_PAGE_URL'];?>"><?=$arSection["NAME"]?></a></li>
	<?endif;?>
<?endforeach;?>
</ul>