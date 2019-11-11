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
<div class="b-hot-list clearfix">
<?$i = 1; $formShow = false?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<? $renderImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 302*2, "height" => 302*2), BX_RESIZE_IMAGE_EXACT, false, false, false, 70 ); ?>
	<? $tours = json_decode($arItem["~PREVIEW_TEXT"], true); ?>
	<a href="/<?=$GLOBALS["hotDir"]?>/<?=$arItem["PROPERTIES"]["CITY"]["VALUE_XML_ID"]?>/<?=$arItem["CODE"]?>/" class="b-hot-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="hot-top" style="background-image: url('<?=$renderImage["src"]?>')">
			<div class="blackout"></div>
			<div class="blackout-full"></div>
			<div class="content">
				<div class="hot-discount">-<?=$arItem["PROPERTIES"]["PERCENT"]["VALUE"]?>%</div>
				<div class="hot-info">
					<? if(isset($tours[0])): ?>
						<div class="hot-date"><?=dateFormatted($tours[0]["DT"])?> на <?=(intval($tours[0]["NT"])+1)?> дней</div>	
					<? endif; ?>
					<? if(isset($tours[1])): ?>
						<div class="hot-date"><?=dateFormatted($tours[1]["DT"])?> на <?=(intval($tours[1]["NT"])+1)?> дней</div>
					<? endif; ?>
					<? if($arItem["PROPERTIES"]["COUNTRY"]["VALUE"]): ?>
						<div class="hot-title"><b><?=$arItem["NAME"]?>,</b> <?=$arItem["PROPERTIES"]["COUNTRY"]["VALUE"]?></div>
					<? else: ?>
						<div class="hot-title"><b><?=$arItem["NAME"]?></b></div>
					<? endif; ?>
				</div>
			</div>
		</div>
		<div class="hot-price">
			<p class="old-price">от <?=number_format( (intval($arItem["PROPERTIES"]["PERCENT"]["VALUE"])/100+1)*$tours[0]["MP"], 0, ',', ' ' )?> руб.</p>
			<p class="total-price">от <?=number_format( $tours[0]["MP"], 0, ',', ' ' )?> руб.</p>
		</div>
	</a>
	<?if($i == 8 && 0):?>
		<?$formShow = true?>
		<div class="b-search-subscribe b-hot-search-subscribe">
			<div class="b-subscribe-cont">
				<div class="b-subscribe-form">
					<h2><?=includeArea("hot-form-head")?></h2>
					<div class="mailing-text"><?=includeArea("hot-form-text")?></div>
					<form class="b-mailing-form" method="post" action="/searchTour.php" novalidate="novalidate">
						<input type="text" name="name" placeholder="Ваше имя" required="">
						<input type="text" name="phone" placeholder="Ваш телефон" required="">
						<input type="text" name="MAIL" required="" placeholder="Ваш e-mail">
						<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
						<a href="#" class="b-btn b-btn-orange one-line b-btn-submit ajax">
							<p class="btn-bold"><?=includeArea("hot-form-button")?></p>
						</a>
						<div class="b-checkbox">
							<input id="checkbox-search-2" type="checkbox" name="politics" checked="" required="">
							<label for="checkbox-search-2">
								<div class="b-checked icon-checked"></div>
								<p>Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных.</a></p>
							</label>
						</div>
						<input type="submit" value="Отправить" style="display:none;">
					</form>
				</div>
			</div>
		</div>
	<?endif;?>
	<?$i++;?>
<?endforeach;?>
</div>
<?if(!$formShow):?>
	<div class="b-search-subscribe b-hot-search-subscribe">
		<div class="b-subscribe-cont">
			<div class="b-subscribe-form">
				<h2><?=includeArea("hot-form-head")?></h2>
				<div class="mailing-text"><?=includeArea("hot-form-text")?></div>
				<form class="b-mailing-form" method="post" action="/searchTour.php" novalidate="novalidate">
					<input type="text" name="name" placeholder="Ваше имя" required="">
					<input type="text" name="phone" placeholder="Ваш телефон" required="">
					<input type="text" name="MAIL" required="" placeholder="Ваш e-mail">
					<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
					<a href="#" class="b-btn b-btn-orange one-line b-btn-submit ajax">
						<p class="btn-bold"><?=includeArea("hot-form-button")?></p>
					</a>
					<div class="b-checkbox">
						<input id="checkbox-search-2" type="checkbox" name="politics" checked="" required="">
						<label for="checkbox-search-2">
							<div class="b-checked icon-checked"></div>
							<p>Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных.</a></p>
						</label>
					</div>
					<input type="submit" value="Отправить" style="display:none;">
				</form>
			</div>
		</div>
	</div>
<?endif;?>
