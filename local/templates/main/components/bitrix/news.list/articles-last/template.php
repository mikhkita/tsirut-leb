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
<div class="b-article-list">
<?foreach($arResult["ITEMS"] as $arItem):?><?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?><?
	$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>302, 'height'=>180), BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 80);
	?>
	<a id="<?=$this->GetEditAreaId($arItem['ID']);?>" href="<?=$arItem['DETAIL_PAGE_URL']?>" class="b-article-item">
		<div class="b-article-top">
			<div class="b-article-img">
				<img src="<?=$img['src']?>">
			</div>
			<div class="blackout"></div>
			<h3><?=$arItem['NAME']?></h3>
		</div>
		<p><?=$arItem['PREVIEW_TEXT']?></p>
	</a>
<?endforeach;?>
</div>