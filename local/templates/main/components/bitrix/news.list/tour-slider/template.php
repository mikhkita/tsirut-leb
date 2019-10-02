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
<div class="b-country-slider">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?
	$hasButton = false;
	if(!empty($arItem["PROPERTIES"]["BUTTON_TEXT"]["VALUE"])){
		$hasButton = true;
	}
	$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>628*2, 'height'=>383*2), BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 70);
	?>
	<a  href="<?=$arItem["CODE"]?>" 
		id="<?=$this->GetEditAreaId($arItem['ID']);?>" 
		class="b-country-item-slider <?if($hasButton) echo 'with-button';?>" 
		style="background-image: url('<?=$img['src']?>')"
	>
		<div class="blackout"></div>
		<div class="blackout-full"></div>
		<div class="content">
			<div class="b-country-slider-cont">
				<div class="b-country-slider-info">
					<h3><?=$arItem["NAME"]?></h3>
					<p><?=$arItem["PREVIEW_TEXT"]?></p>
				</div>
				<?if($hasButton):?>
					<span class="b-btn-tr"><?=$arItem["PROPERTIES"]["BUTTON_TEXT"]["VALUE"]?></span>
				<?endif;?>
			</div>
		</div>
	</a>
<?endforeach;?>
</div>
