<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

<?if($GLOBALS["arCountry"]["name"] && !$GLOBALS["arCountry"]["isRussia"]):?>
	<div class="b-tourvisor-calendar" data-country="<?=$GLOBALS["arCountry"]["name"]?>">
		<div class="b-block">
			<div class="content">
				<h2>Календарь туров</h2>
				<div class="b-tourvisor-calendar-cont">
					<div class="calendar-preloader"><img src="<?=SITE_TEMPLATE_PATH?>/html/i/preloader-dark.svg"></div>
					<a href="#" class="b-btn b-btn-orange one-line hidden">
						<p class="btn-bold">Показать туры</p>
					</a>
				</div>
				<div class="b-tourvisor-hidden">
					<div class="tv-calendar tv-moduleid-982526" tv-departure="<?=$GLOBALS["arCountry"]["cityIDTV"]?>"></div>
				</div>
			</div>
		</div>
	</div>
<?endif;?>

<div class="b-online-search">
	<div class="b-block">
		<h2 class="b-title regular"><b><?=$GLOBALS["arResort"]["titleTV"];?></b></h2>
		<div class="filter-mobile-cont hide">
			<a href="#b-popup-filter-mobile" class="fancy b-btn-filter-mobile">Открыть фильтр</a>
		</div>
		<div class="b b-tourvisor">
			<div class="tourvisor-preloader"><img src="<?=SITE_TEMPLATE_PATH?>/html/i/preloader-dark.svg"></div>
			<div class="b b-tourvisor-with-filter b-tourvisor-detail" data-country="<?=$GLOBALS["arCountry"]["name"]?>">
				<div class="tv-search-form tv-moduleid-191769" 
					tv-country="<?=$GLOBALS["arResort"]["countryIDTV"]?>" 
					tv-resorts="<?//=$GLOBALS["arResort"]["resortIDTV"]?>" 
					tv-departure="<?=$GLOBALS["arResort"]["cityIDTV"]?>"
					tv-flydates="<?if(isset($_GET['flydates_from']) && isset($_GET['flydates_to'])) echo $_GET['flydates_from'].','.$_GET['flydates_to']?>"
				></div>
			</div>
		</div>
		<div class="b-tourvisor-list">
			<div class="b-filter-cont hidden">
				<div class="b-filter">
					<div class="b-TVMeal b-filter-item">
						<h3>Питание</h3>
						<ul class="b-radio-list">
							<li>
								<input id="food-all" type="radio" name="food" value="all" checked>
								<label for="food-all" data-TV="Любое">Любое</label>
							</li>
							<li>
								<input id="food-BB" type="radio" name="food" value="BB">
								<label for="food-BB" data-TV="Только завтрак"><b>BB</b> – Только завтрак</label>
							</li>
							<li>
								<input id="food-HB" type="radio" name="food" value="HB">
								<label for="food-HB" data-TV="Завтрак, ужин"><b>HB</b> – Завтрак, ужин</label>
							</li>
							<li>
								<input id="food-FB" type="radio" name="food" value="FB">
								<label for="food-FB" data-TV="Полный пансион"><b>FB</b> – Полный пансион</label>
							</li>
							<li>
								<input id="food-Al" type="radio" name="food" value="Al">
								<label for="food-Al" data-TV="Все включено"><b>Al</b> – Все включено</label>
							</li>
							<li>
								<input id="food-UAl" type="radio" name="food" value="UAl">
								<label for="food-UAl" data-TV="Ультра все включено"><b>UAl</b> – Ультра все включено</label>
							</li>
						</ul>
					</div>
					<div class="b-TVRating b-filter-item">
						<h3>Рейтинг</h3>
						<ul class="b-radio-list">
							<li>
								<input id="rating-all" type="radio" name="rating" value="all" checked>
								<label for="rating-all" data-TV="Любой">Любой рейтинг</label>
							</li>
							<li>
								<input id="rating-4_5" type="radio" name="rating" value="4.5">
								<label for="rating-4_5" data-TV="4,5 и более"><b>4.5+</b>&nbsp;Превосходно</label>
							</li>
							<li>
								<input id="rating-4_0" type="radio" name="rating" value="4.0">
								<label for="rating-4_0" data-TV="4,0 и более"><b>4.0+</b>&nbsp;Очень хорошо</label>
							</li>
							<li>
								<input id="rating-3_5" type="radio" name="rating" value="3.5">
								<label for="rating-3_5" data-TV="3,5 и более"><b>3.5+</b>&nbsp;Хорошо</label>
							</li>
							<li>
								<input id="rating-3_0" type="radio" name="rating" value="3.0">
								<label for="rating-3_0" data-TV="3,0 и более"><b>3.0+</b>&nbsp;Удовлетворительно</label>
							</li>
						</ul>
					</div>
				</div>
				<div class="b-tourvisor-nav">
					<?if($GLOBALS["arResort"]["monthList"]):?>
						<div class="b-tourvisor-nav-item clearfix">
							<h3>Туры по месяцам</h3>
							<ul class="months">
								<?foreach ($GLOBALS["arResort"]["monthList"] as $value):?>
									<li><a href="?flydates_from=<?=$monthsTV[$value]['start']?>&flydates_to=<?=$monthsTV[$value]['end']?>"><?=UserFieldValue($value)?></a></li>
								<?endforeach;?>
							</ul>
						</div>
					<?endif;?>
					<?if($GLOBALS["arResort"]["seasonList"]):?>
						<div class="b-tourvisor-nav-item clearfix">
							<h3>Туры по сезонам</h3>
							<ul class="b-seasons">
								<?foreach ($GLOBALS["arResort"]["seasonList"] as $value):?>
									<li class="b-season">
										<img src="<?=SITE_TEMPLATE_PATH?>/html/i/<?=$seasonsTV[$value]['img']?>">
										<a href="?flydates_from=<?=$seasonsTV[$value]['start']?>&flydates_to=<?=$seasonsTV[$value]['end']?>"><?=UserFieldValue($value)?></a>
									</li>
								<?endforeach;?>
							</ul>
						</div>
					<?endif;?>
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
					<div class="b-tourvisor-nav-item clearfix">
						<h3>Туры в другие страны</h3>
						<?$APPLICATION->IncludeComponent(
							"bitrix:catalog.section.list",
							"country-list-detail",
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
					<div class="b-tourvisor-nav-item b-nav-seo">
						<?=$GLOBALS["arResort"]["seoText"]?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>