<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск туров");
?>
<div class="b-block">
	<div class="filter-mobile-cont hide">
		<a href="#b-popup-filter-mobile" class="fancy b-btn-filter-mobile">Открыть фильтр</a>
	</div>
	<div class="b b-tourvisor">
		<div class="tourvisor-preloader"><img src="<?=SITE_TEMPLATE_PATH?>/html/i/preloader-dark.svg"></div>
		<div class="b-tourvisor-header b-tourvisor-search b-tourvisor-with-filter">
			<div class="tv-search-form tv-moduleid-191365"></div>
		</div>
	</div>
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
	</div>
</div>
<div class="b b-categories">
	<div class="b-block">
		<h2 class="b-title">Популярные направления</h2>
		 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"categories",
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
		"SECTION_USER_FIELDS" => array("UF_COUNTRY_NAME","UF_VISA","UF_PRICE_FROM","UF_CATEGORIES","UF_T_AIR_1","UF_T_AIR_2","UF_T_AIR_3","UF_T_AIR_4","UF_T_AIR_5","UF_T_AIR_6","UF_T_AIR_7","UF_T_AIR_8","UF_T_AIR_9","UF_T_AIR_10","UF_T_AIR_11","UF_T_AIR_12","UF_T_WATER_1","UF_T_WATER_2","UF_T_WATER_3","UF_T_WATER_4","UF_T_WATER_5","UF_T_WATER_6","UF_T_WATER_7","UF_T_WATER_8","UF_T_WATER_9","UF_T_WATER_10","UF_T_WATER_11","UF_T_WATER_12",""),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "LINE"
	)
);?>
	</div>
</div>
<div class="b b-feedback">
	<div class="b-feedback-back">
	</div>
	<div class="b-block">
		<div class="b-feedback-text">
			<h2><?=includeArea("russia-form-head");?></h2>
			<div class="div-p"><?=includeArea("russia-form-text");?></div>
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
 <input id="personal-1" type="checkbox" name="personal" checked="" required=""> <label for="personal-1">
					<div class="b-checked icon-checked">
					</div>
					<p>
						 Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных.</a>
					</p>
 </label>
				</div>
				<input type="submit" value="Подписаться" style="display:none;">
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
<div class="b b-tour-operators">
	<div class="b-head-gradient">
	</div>
	<div class="b-block gradient-after">
		<h2 class="b-title white">Туры от официальных туроператоров</h2>
		 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"operators",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_PICTURE",2=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "100",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
	</div>
</div>
<div class="b-calendar">
	<div class="b-block">
		<h2 class="b-title">Календарь выгодных туров</h2>
		<!-- <div class="tv-calendar tv-moduleid-980631"></div> -->
		<div class="tv-calendar tv-moduleid-190548"></div>
	</div>
</div>
<div class="b b-mailing">
	<div class="b-block">
		<div class="b-mailing-cont">
			<div class="b-head-gradient">
			</div>
			<div class="gradient-after">
				<h2><?=includeArea("search-mail-head");?></h2>
				<div class="mailing-text"><?=includeArea("search-mail-text");?></div>
				<form class="b-mailing-form" method="post" action="/subscribe.php">
					 <input type="text" name="email" placeholder="Ваш e-mail" required="">
					 <input type="text" name="MAIL" required="" placeholder="Ваш e-mail">
					 <a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
					 <a href="#" class="b-btn b-btn-orange one-line b-btn-submit ajax">
						<p class="btn-bold">
							 Подписаться
						</p>
					 </a>
					<div class="b-checkbox">
 <input id="checkbox-politics-1" type="checkbox" name="politics" checked="" required=""> <label for="checkbox-politics-1">
						<div class="b-checked icon-checked">
						</div>
						<p>
							 Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных.</a>
						</p>
 </label>
					</div>
					<input type="submit" value="Подписаться" style="display:none;">
				</form>
			</div>
		</div>
		 <!-- VK Widget -->
		<div class="b-widget-vk">
			<div id="vk_groups">
			</div>
		</div>
		 <script type="text/javascript">
			var myWidth = 0;
			if( typeof( window.innerWidth ) == 'number' ) {
	            myWidth = window.innerWidth;
	        } else if( document.documentElement && ( document.documentElement.clientWidth || 
	        document.documentElement.clientHeight ) ) {
	            myWidth = document.documentElement.clientWidth;
	        } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
	            myWidth = document.body.clientWidth;
	        }

	        if(myWidth > 767){
	        	VK.Widgets.Group("vk_groups", {mode: 0, width: "288", height: "384", no_cover: 1}, 56008470);
	        }else{
	        	VK.Widgets.Group("vk_groups", {mode: 0, width: "auto", height: "200", no_cover: 1}, 56008470);
	        }
		</script>
	</div>
</div>
 <div class="b-block">
	<div class="b-seo-separator-wide">
	</div>
</div>
<div class="b-seo b-block">
	<div class="seo-block center">
		<h2 class="with-icon"><span class="seo-icon seo-icon-coin"></span>Заголовок блока</h2>
		<p>
			Товарищи! укрепление и развитие структуры влечет за собой процесс внедрения и модернизации соответствующий условий активизации. Товарищи! укрепление и развитие структуры требуют от нас анализа системы обучения кадров, соответствует насущным потребностям. 
		</p>
	</div>
</div>
<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>