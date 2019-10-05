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
<div class="b-bus-tours-left">
	<div class="b-bus-tours-filter">
		<h3>Фильтр туров</h3>
		<form method="GET" action="" class="b-bus-filter-form">
			<ul>
			<?
			$ids = array();
			if(isset($_REQUEST["loc"]) && !empty($_REQUEST["loc"])){
				foreach ($_REQUEST["loc"] as $id => $value) {
					$ids[] = $id;
				}
			}
			$property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC", "VALUE"=>"ASC"), Array("IBLOCK_ID"=>$arResult["IBLOCK_ID"], "CODE"=>"LOCATION_FILTER"));
			?>
			<?while($enum_fields = $property_enums->GetNext()):?>
				<li class="b-checkbox">
					<input id="bus-city-<?=$enum_fields["ID"]?>" type="checkbox" name="loc[<?=$enum_fields["ID"]?>]" <?if(in_array($enum_fields["ID"], $ids)) echo "checked"?>>
					<label for="bus-city-<?=$enum_fields["ID"]?>">
						<div class="b-checked icon-checked"></div>
						<p><?=$enum_fields["VALUE"]?></p>
					</label>
				</li>
			<?endwhile;?>
			</ul>
			<div class="center">
				<a href="#" class="b-btn b-btn-rect bus-filter-submit">Найти туры</a><br>
				<a href="#" class="bus-filter-refresh dashed">Сбросить фильтр</a>
			</div>
		</form>
	</div>
	<div class="b-tourvisor-nav">
		<div class="b-tourvisor-nav-item clearfix">
			<h3>Популярные направления</h3>
			 <?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section.list",
				"country-list-articles",
				Array(
					"ADD_SECTIONS_CHAIN" => "N",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"COUNT_ELEMENTS" => "Y",
					"FILTER_NAME" => "sectionsFilter",
					"IBLOCK_ID" => "1",
					"IBLOCK_TYPE" => "content",
					"SECTION_CODE" => "",
					"SECTION_FIELDS" => array("PICTURE",""),
					"SECTION_ID" => "1",
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array("UF_COUNTRY_NAME",""),
					"SHOW_PARENT_NAME" => "Y",
					"TOP_DEPTH" => "2",
					"VIEW_MODE" => "LINE"
				)
			);?>
		</div>
		<div class="b-tourvisor-nav-item">
			<h3>Наши преимущества</h3>
			<div class="nav-adv">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/adv-cards.svg">
				<p><?=includeArea("filter-adv-1")?></p>
			</div>
			<div class="nav-adv">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/adv-earth.svg">
				<p><?=includeArea("filter-adv-2")?></p>
			</div>
			<div class="nav-adv">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/adv-money.svg">
				<p><?=includeArea("filter-adv-3")?></p>
			</div>
		</div>
	</div>
</div>
<?$i = 1; $formShow = false?>
<div class="b-bus-tours-right b-bus-tours-list">
	<?if(count($arResult["ITEMS"])):?>
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>220*2, 'height'=>154*2), BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 70);
		?>
			<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b-bus-tours-item">
				<a class="b-img" href="<?=$arItem['DETAIL_PAGE_URL']?>" style="background-image: url(<?=$img['src']?>)"></a>
				<div class="b-right">
					<a href="<?=$arItem['DETAIL_PAGE_URL']?>"><h3><?=$arItem['NAME']?></h3></a>
					<div class="city"><?=$arItem['PROPERTIES']['LOCATION']['VALUE']?></div>
					<p><?=$arItem["PREVIEW_TEXT"]?></p>
					<div class="price">
						<span><?=numberFormat($arItem['PROPERTIES']['PRICE']['VALUE'])?> руб.</span>
						<span class="icon-next"></span>
					</div>
				</div>
			</div>
			<?if($i == 3):?>
				<?$formShow = true?>
				<div class="b-search-subscribe b-bus-search-subscribe">
					<div class="b-subscribe-cont">
						<div class="b-subscribe-form">
							<h2><?=includeArea("bus-form-head")?></h2>
							<div class="mailing-text"><?=includeArea("bus-form-text")?></div>
							<form class="b-mailing-form" method="post" action="/searchTour.php" novalidate="novalidate">
								<input type="text" name="name" placeholder="Ваше имя" required="">
								<input type="text" name="phone" placeholder="Ваш телефон" required="">
								<input type="text" name="MAIL" required="" placeholder="Ваш e-mail">
								<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
								<a href="#" class="b-btn b-btn-orange one-line b-btn-submit ajax">
									<p class="btn-bold"><?=includeArea("bus-form-button")?></p>
								</a>
								<div class="b-checkbox">
									<input id="checkbox-search-2" type="checkbox" name="politics" checked="" required="">
									<label for="checkbox-search-2">
										<div class="b-checked icon-checked"></div>
										<p>Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных.</a></p>
									</label>
								</div>
								<input type="submit" value="Подписаться" style="display:none;">
							</form>
						</div>
					</div>
				</div>
			<?endif;?>
			<?$i++;?>
		<?endforeach;?>
		<?if(!$formShow):?>
			<div class="b-search-subscribe b-bus-search-subscribe">
				<div class="b-subscribe-cont">
					<div class="b-subscribe-form">
						<h2><?=includeArea("bus-form-head")?></h2>
						<div class="mailing-text"><?=includeArea("bus-form-text")?></div>
						<form class="b-mailing-form" method="post" action="/searchTour.php" novalidate="novalidate">
							<input type="text" name="name" placeholder="Ваше имя" required="">
							<input type="text" name="phone" placeholder="Ваш телефон" required="">
							<input type="text" name="MAIL" required="" placeholder="Ваш e-mail">
							<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
							<a href="#" class="b-btn b-btn-orange one-line b-btn-submit ajax">
								<p class="btn-bold"><?=includeArea("bus-form-button")?></p>
							</a>
							<div class="b-checkbox">
								<input id="checkbox-search-2" type="checkbox" name="politics" checked="" required="">
								<label for="checkbox-search-2">
									<div class="b-checked icon-checked"></div>
									<p>Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных.</a></p>
								</label>
							</div>
							<input type="submit" value="Подписаться" style="display:none;">
						</form>
					</div>
				</div>
			</div>
		<?endif;?>
	<?else:?>
		<h3 class="elements-not-found">Туры не найдены</h3>
	<?endif;?>
</div>
