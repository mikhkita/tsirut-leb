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

global $APPLICATION;

// if( $arResult["PROPERTIES"]["V_TITLE"]["VALUE"] ){
	// $APPLICATION->SetTitle("Горящие туры ".$arResult["PROPERTIES"]["V_TITLE"]["VALUE"], false);
// }
if( $arResult["PROPERTIES"]["TITLE"]["VALUE"] ){
	$APPLICATION->SetTitle($arResult["PROPERTIES"]["TITLE"]["VALUE"]);
}else{
	$APPLICATION->SetTitle($arResult["NAME"]);
}

$this->setFrameMode(true);

$meals = array(
	2 => "Без питания",
	3 => "<b>BB</b> - Только завтрак",
	4 => "<b>HB</b> - Завтрак, ужин",
	5 => "<b>FB</b> - Полный пансион",
	7 => "<b>AI</b> - Все включено",
	9 => "<b>UAI</b> - Ультра все включено",
);

$way = $arResult["NAME"].( (isset($arResult["PROPERTIES"]["COUNTRY"]["VALUE"]))?(", ".$arResult["PROPERTIES"]["COUNTRY"]["VALUE"]):"" )." ".$arResult["PROPERTIES"]["CITY"]["VALUE"];

$departureId = $GLOBALS["hotCodes"][$_REQUEST["CITY"]]["TOURVISOR_ID"];

?>
<div class="b-content-back">
	<div class="b-block b-hot-block b-hot-groups-block clearfix" data-way="<?=$way?>">
		<div class="b-hot-nav left stick">
			<? $tours = json_decode($arResult["~PREVIEW_TEXT"], true); ?>
			<div class="b-hot-nav-list b-hot-tog">
				<? foreach ($tours as $key => $tour): ?>
					<div class="clearfix b-hot-nav-item">
						<div class="b-hot-nav-date">
							<b><?=dateFormatted($tour["DT"])?></b>
							на <?=($tour["NT"]+1)?> дней
						</div>
						<div class="b-hot-nav-price">
							<div class="b-hot-new-price">от <?=number_format( $tour["MP"], 0, ',', ' ' )?> руб.</div>
						</div>
					</div>
				<? endforeach; ?>
				<div class="b-hot-border"></div>
			</div>
		</div>
		<div class="b-hot-groups right">
			<? $tours = json_decode($arResult["~PREVIEW_TEXT"], true); ?>
			<div class="b-hot-tog">
			<? $group = 1; ?>
			<? foreach ($tours as $key => $tour): ?>
				<div class="b-hot-group" data-desc="с <?=dateFormatted($tour["DT"])?> по <?=dateFormatted(date("Y-m-d", strtotime($tour["DT"])+$tour["NT"]*24*60*60))?> на <?=($tour["NT"]+1)?> дней/<?=$tour["NT"]?> ночей">
					<h2 class="b-subtitle"><?=dateFormatted($tour["DT"])?> на <?=($tour["NT"]+1)?>&nbsp;дней/<?=$tour["NT"]?>&nbsp;ночей</h2>
					<div class="b-hot-group-dates">
						<span>Вылет <b><?=dateFormatted($tour["DT"])?></b></span>
						<span>Прилет <b><?=dateFormatted(date("Y-m-d", strtotime($tour["DT"])+$tour["NT"]*24*60*60))?></b></span>
					</div>
					<ul class="b-hot-group-list">
						<? foreach ($tour["HT"] as $i => $hotel): ?>
							<li>
								<div class="b-col b-hot-group-img">
									<img src="<?=$hotel["PIC"]?>">
								</div>
								<div class="b-col b-hot-group-name">
									<? if($hotel["LN"] && $hotel["LN"] != ""): ?>
										<a href="#b-hotel-popup" data-href="#!/hotel=<?=$hotel["LN"]?>&departure=<?=$departureId?>" class="fancy b-hot-hotel-view" ><h3><?=$hotel["NM"]?></h3></a>
									<? else: ?>
										<h3><?=$hotel["NM"]?></h3>
									<? endif; ?>
									<div class="b-hot-stars">
										<? for( $i = 0; $i < intval($hotel["ST"]); $i++ ): ?>
											<div class="b-hot-star"></div>
										<? endfor; ?>
									</div>
									<div class="b-hot-group-type" title="<?=strip_tags($meals[$hotel["ML"]])?>">
										<span><?=$meals[$hotel["ML"]]?></span>
									</div>
								</div>
								<div class="b-col b-hot-group-price">
									<div class="b-hot-new-price">от <?=number_format( $hotel["MP"], 0, ',', ' ' )?> руб.</div>
									<div class="b-hot-day-price"><?=number_format( $hotel["DP"], 0, ',', ' ' )?> руб/сутки</div>
								</div>
								<div class="b-col b-hot-group-button">
									<a href="#b-hotel-popup" data-href="#!/hotel=<?=$hotel["LN"]?>&departure=<?=$departureId?>" class="fancy b-btn b-btn-hot-hotel b-hot-hotel-view">Подробнее</a>
								</div>
							</li>
						<? endforeach; ?>
					</ul>
					<?if($group == 1):?>
						<div class="b-search-subscribe-1" id="b-search-subscribe-1">
							<div class="b-search-subscribe b-mailing-cont">
								<div class="b-head-gradient"></div>
								<div class="gradient-after">
									<h2><?=includeArea("detail-mail-head");?></h2>
									<div class="mailing-text"><?=includeArea("detail-mail-text");?></div>
									<?=includeArea("subscribe-form");?>
								</div>
							</div>
						</div>
					<?endif;?>
					<?if($group == 2):?>
						<div class="b-search-subscribe b-search-pay" id="b-search-pay">
							<div class="b-search-pay-wrap">
								<div class="b-search-pay-content">
									<h2>Боитесь упустить выгодное предложение?</h2>
									<p>Вы можете забронировать понравившийся вам тур и оплатить его прямо на сайте!</p>
								</div>
								<img src="<?=SITE_TEMPLATE_PATH?>/html/i/search-pay.svg">
							</div>
						</div>
					<?endif;?>
					<? $group++; ?>
				</div>
			<? endforeach; ?>
			</div>
		</div>
	</div>
</div>

<div class="b b-feedback">
	<div class="b-feedback-back">
	</div>
	<div class="b-block">
		<div class="b-feedback-text">
			<h2><?=includeArea("hot-detail-form-head");?></h2>
			<div class="div-p"><?=includeArea("hot-detail-form-text");?></div>
			<form class="b-feedback-form" method="post" action="/searchTour.php">
				<input type="text" name="name" placeholder="Ваше имя" required="">
				<input type="text" name="phone" placeholder="Ваш телефон" required="">
				<input type="text" name="MAIL" required="" placeholder="Ваш e-mail">
				<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
				<a href="#" class="b-btn b-btn-orange ajax">
					<p class="btn-bold">
						 Подберите мне тур
					</p>
					<p class="btn-regular">
						 Хочу довериться профессионалам
					</p>
				</a>
				<div class="b-checkbox">
					<input id="personal-1" type="checkbox" name="personal" checked="" required=""> 
					<label for="personal-1">
						<div class="b-checked icon-checked"></div>
						<p>Заполняя форму вы подтверждаете <a href="/policy.pdf" target="_blank">согласие на обработку персональных данных.</a></p>
 					</label>
				</div>
				<input type="submit" value="Отправить" style="display:none;">
			</form>
		</div>
		<div class="b-5-manager">
			<div class="b-5-name">
				<div class="div-p">
					 <?=includeArea("b-5-name");?>
				</div>
				 <small><?=includeArea("b-5-post");?></small>
			</div>
		</div>
	</div>
</div>

<div class="b-block">
	<div class="b-seo-separator-wide"></div>
</div>

<div class="b-seo b-block">
	<?=htmlspecialcharsBack($arResult["PROPERTIES"]["SEO_TEXT"]["VALUE"]["TEXT"])?>
</div>

<?$APPLICATION->IncludeComponent(
    "sprint.editor:blocks",
    ".default",
    Array(
        "ELEMENT_ID" => $arResult["ID"],
        "IBLOCK_ID" => $arResult["IBLOCK_ID"],
        "PROPERTY_CODE" => "EDITOR",
    ),
    $component,
    Array(
        "HIDE_ICONS" => "Y"
    )
);?>