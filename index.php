<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

?>
<div class="center b-block">
	<a href="#b-popup-quiz" class="fancy b-btn b-btn-orange b-btn-quiz">
		<p class="btn-bold">Рассчитать стоимость</p>
		<p class="btn-regular">вашего лучшего тура</p>
	</a>
</div>
<div class="b-statistics">
	<div class="b-block clearfix">
		<div class="b-statistics-list b-statistics-slider mobile-slider">
			<div class="b-statistics-item statistics-1">
				<div class="b-statistics-item-top">
 					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/count-country.png" data-retina="<?=SITE_TEMPLATE_PATH?>/html/i/count-country@2x.png" class="anim fadeLeft delay100" data-cont=".b-statistics">
 					<span class="anim fadeRight delay200" data-cont=".b-statistics">стран</span>
				</div>
				<p class="anim fadeDown delay300" data-cont=".b-statistics">
					 в которых мы бывали сами
				</p>
			</div>
			<div class="b-statistics-item statistics-2">
				<div class="b-statistics-item-top">
 					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/count-hotel.png" data-retina="<?=SITE_TEMPLATE_PATH?>/html/i/count-hotel@2x.png" class="anim fadeLeft delay400">
 					<span class="anim fadeRight delay500">отелей</span>
				</div>
				<p class="anim fadeDown delay600">
					 мы посетили и проверили лично
				</p>
			</div>
			<div class="b-statistics-item statistics-3">
				<div class="b-statistics-item-top">
 					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/count-tourist.png" data-retina="<?=SITE_TEMPLATE_PATH?>/html/i/count-tourist@2x.png" class="anim fadeLeft delay700">
 					<span class="anim fadeRight delay800">туристов</span>
				</div>
				<p class="anim fadeDown delay900">
					 в год доверяют нам свой отдых
				</p>
			</div>
		</div>
	</div>
</div>
<div class="b b-popular">
	<div class="b-block">
		<h2 class="b-title">Популярные направления</h2>
		<div class="b-country-list clearfix">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"tour-slider",
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
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
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
		"PROPERTY_CODE" => array("BUTTON_TEXT",""),
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
);?><?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"country-list",
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
		"SECTION_USER_FIELDS" => array("UF_COUNTRY_NAME","UF_VISA","UF_PRICE_FROM","UF_CATEGORIES","UF_T_AIR_1","UF_T_WATER_1",""),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "LINE"
	)
);?>
		</div>
		<div class="center">
 <a href="/tours/" class="b-btn b-btn-blue one-line">
			<p class="btn-bold">
				 Все направления
			</p>
 </a>
		</div>
	</div>
</div>
<div class="b b-3">
	<div class="b-3-back">
	</div>
	<div class="b-block">
		<div class="b-3-content">
			<div class="b-3-content-top clearfix">
 <img src="<?=SITE_TEMPLATE_PATH?>/html/i/cloud.svg" class="b-3-cloud"> <img src="<?=SITE_TEMPLATE_PATH?>/html/i/b-3-woman.png" class="b-3-woman">
				<div class="b-3-text">
					<div class="div-p">
						 <?=includeArea("b-3-top");?>
					</div>
				</div>
			</div>
			<div class="b-3-content-bottom">
				<div class="div-p">
					 <?=includeArea("b-3-bottom");?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="b b-4">
	<div class="b-block">
		<h2>Что это значит?</h2>
		<div class="b-4-list b-4-slider mobile-slider clearfix">
			<div class="b-4-item">
				<div class="b-4-icon anim fadeDown delay100" data-cont=".b-4">
					<div id="coin-parallax" class="coin-parallax">
						<div data-depth="0.6" class="coin-1">
 <img src="<?=SITE_TEMPLATE_PATH?>/html/i/coin-1.svg">
						</div>
						<div data-depth="-0.4" class="coin-2">
 <img src="<?=SITE_TEMPLATE_PATH?>/html/i/coin-2.svg">
						</div>
 <img src="<?=SITE_TEMPLATE_PATH?>/html/i/svg-icon-1.svg" class="main-img">
					</div>
				</div>
				<h3 class="anim fadeDown delay200" data-cont=".b-4"><?=includeArea("b-4-1-head");?></h3>
				<div class="div-p anim fadeDown delay300" data-cont=".b-4">
					 <?=includeArea("b-4-1-text");?>
				</div>
			</div>
			<div class="b-4-item">
				<div class="b-4-icon anim fadeDown delay400" data-cont=".b-4">
					 <object type="image/svg+xml" data="<?=SITE_TEMPLATE_PATH?>/html/i/svg-icon-2.svg" width="162" height="143"></object>
				</div>
				<h3 class="anim fadeDown delay500" data-cont=".b-4"><?=includeArea("b-4-2-head");?></h3>
				<div class="div-p anim fadeDown delay600" data-cont=".b-4">
					 <?=includeArea("b-4-2-text");?>
				</div>
			</div>
			<div class="b-4-item">
				<div class="b-4-icon anim fadeDown delay700" data-cont=".b-4">
 <img src="<?=SITE_TEMPLATE_PATH?>/html/i/svg-icon-3.svg">
				</div>
				<h3 class="anim fadeDown delay800" data-cont=".b-4"><?=includeArea("b-4-3-head");?></h3>
				<div class="div-p anim fadeDown delay900" data-cont=".b-4">
					 <?=includeArea("b-4-3-text");?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="b b-5">
	<div class="b-block">
		<div class="b-5-text">
			<h2><?=includeArea("b-5-head");?></h2>
			<div class="div-p">
				 <?=includeArea("b-5-text");?>
			</div>
			 <a href="#b-popup-tour-selection" class="b-btn b-btn-orange fancy">
				<p class="btn-bold">
					Подберите мне тур
				</p>
				<p class="btn-regular">
					 Хочу довериться профессионалам
				</p>
			 </a>
		</div>
		<div class="b-5-window">
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
<div class="b b-tourvisor-main">
	<div class="b-head-gradient"></div>
	<div class="b-block gradient-after">
		<h2 class="b-title white">Или подберите тур самостоятельно</h2>
		<!-- <div class="tv-search-form tv-moduleid-189840">
		</div> -->
		<div class="tv-search-form tv-moduleid-191367"></div>
		<div class="center">
			 <a href="#" class="b-btn b-btn-orange one-line TVSearchButton_custom">
				<p class="btn-bold">Найти туры</p>
			 </a>
		</div>
	</div>
</div>
<div class="b b-reviews">
	<div class="b-block">
		<h2 class="b-title">Отзывы туристов, которые доверились нам</h2>
		 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"reviews",
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
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_TEXT",2=>"PREVIEW_PICTURE",3=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
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
		"PROPERTY_CODE" => array(0=>"DATE",1=>"TOUR",2=>"",),
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
<div class="b b-mailing">
	<div class="b-block">
		<div class="b-mailing-cont">
			<div class="b-head-gradient">
			</div>
			<div class="gradient-after">
				<h2><?=includeArea("mail-head");?></h2>
				<div class="mailing-text"><?=includeArea("mail-text");?></div>
				<?=includeArea("subscribe-form");?>
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
<div class="b b-articles">
	<div class="b-block">
		<h2 class="b-title">Последние статьи</h2>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "articles", Array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
		"DISPLAY_DATE" => "Y",	// Выводить дату элемента
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FIELD_CODE" => array(	// Поля
			0 => "ID",
			1 => "NAME",
			2 => "PREVIEW_TEXT",
			3 => "PREVIEW_PICTURE",
			4 => "",
		),
		"FILTER_NAME" => "",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "6",	// Код информационного блока
		"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "4",	// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Новости",	// Название категорий
		"PARENT_SECTION" => "",	// ID раздела
		"PARENT_SECTION_CODE" => "",	// Код раздела
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE" => array(	// Свойства
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
	),
	false
);?>
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
<div class="b-seo b-block">
	<div class="b-seo-two-blocks">
		<div class="seo-block first">
			<h2 class="with-icon"><span class="seo-icon seo-icon-coin"></span><span class="title">Заголовок блока</span></h2>
			<p>
				 Идейные соображения высшего порядка, а также укрепление и развитие структуры представляет собой интересный эксперимент проверки дальнейших направлений развития. Товарищи! укрепление и развитие структуры влечет за собой процесс внедрения и модернизации новых предложений. Равным образом укрепление и развитие структуры в значительной степени обуславливает создание направлений прогрессивного развития.
			</p>
		</div>
		<div class="seo-block second">
			<h2>Заголовок блока</h2>
			<p>
				 Равным образом рамки и место обучения кадров требуют от нас анализа дальнейших направлений развития. Разнообразный и богатый опыт новая модель организационной деятельности обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.
			</p>
		</div>
	</div>
</div>
<div class="b-block">
	<div class="b-seo-separator">
	</div>
</div>
<div class="b-seo b-block">
	<div class="seo-block center">
		<h2 class="with-icon"><span class="seo-icon seo-icon-coin"></span><span class="title">Заголовок блока</span></h2>
		<p>Идейные соображения высшего порядка, а также укрепление и развитие структуры представляет собой интересный эксперимент проверки дальнейших направлений развития. Товарищи! укрепление и развитие структуры влечет за собой процесс внедрения и модернизации новых предложений. Равным образом укрепление и развитие структуры в значительной степени обуславливает создание направлений прогрессивного развития.</p>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>