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
<div class="b-card flip-card b-card-template">
	<div class="flip-card-inner">
		<div class="flip-card-front"></div>
		<div class="flip-card-back"></div>
	</div>
</div>
<div class="b-card-list clearfix">

</div>
<div class="b-operators-list" style="display: none;">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	// $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	// $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

	//id="<?=$this->GetEditAreaId($arItem['ID']);?>
	?>
	<?
	$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>150*2, 'height'=>50*2), BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 70);
	?>
	<div class="b-operators-item">
		<div class="b-img" style="background-image: url('<?=$img['src']?>')"></div>
	</div>
<?endforeach;?>
</div>
