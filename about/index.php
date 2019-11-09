<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?>

<div class="b-about">

<div class="b-content-back b-contacts-top">
	<div class="b b-about-top clearfix">
		<div class="b-block">
			<div class="b-about-top-left">
				<h3><?=includeArea("about-top-head");?></h3>
				<div class="b-about-mobile-cont"></div>
				<p><?=includeArea("about-top-text");?></p>
				<div class="b-about-top-bottom">
					<div class="b-about-top-sign"></div>
					<div class="b-about-top-dir"><?=includeArea("about-top-sign");?></div>
				</div>
			</div>
			<div class="b-about-top-right">
				<div class="b-about-img"></div>
			</div>
		</div>
	</div>
</div>
<div class="b b-about-selection b-about-wide">
	<div class="b-block">
		<div class="b-about-selection-content">
			<h2 class="b-title white regular"><?=includeArea("about-select-head");?></h2>
			<p><?=includeArea("about-select-text");?></p>
		</div>
	</div>
</div>
<div class="b b-about-5-cause b-4">
	<div class="b-block">
		<h2 class="b-title regular"><b>5 причин</b> обратиться в «Аквамарин»</h2>
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
				<h3 class="anim fadeDown delay200" data-cont=".b-4"><?=includeArea("about-b-4-1-head");?></h3>
				<div class="div-p anim fadeDown delay300" data-cont=".b-4">
					<?=includeArea("about-b-4-1-text");?>
				</div>
			</div>
			<div class="b-4-item">
				<div class="b-4-icon anim fadeDown delay400" data-cont=".b-4">
					 <object type="image/svg+xml" data="<?=SITE_TEMPLATE_PATH?>/html/i/svg-icon-2.svg" width="162" height="143"></object>
				</div>
				<h3 class="anim fadeDown delay500" data-cont=".b-4"><?=includeArea("about-b-4-2-head");?></h3>
				<div class="div-p anim fadeDown delay600" data-cont=".b-4">
					<?=includeArea("about-b-4-2-text");?>
				</div>
			</div>
			<div class="b-4-item">
				<div class="b-4-icon anim fadeDown delay700" data-cont=".b-4">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/about-svg-icon-3.svg">
				</div>
				<h3 class="anim fadeDown delay800" data-cont=".b-4"><?=includeArea("about-b-4-3-head");?></h3>
				<div class="div-p anim fadeDown delay900" data-cont=".b-4">
					<?=includeArea("about-b-4-3-text");?>
				</div>
			</div>
			<div class="b-4-item b-4-item-wide">
				<div class="b-4-icon anim fadeDown delay1000" data-cont=".b-4">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/svg-icon-3.svg">
				</div>
				<h3 class="anim fadeDown delay1000" data-cont=".b-4"><?=includeArea("about-b-4-4-head");?></h3>
				<div class="div-p anim fadeDown delay1000" data-cont=".b-4">
					<?=includeArea("about-b-4-4-text");?>
				</div>
			</div>
			<div class="b-4-item b-4-item-wide">
				<div class="b-4-icon anim fadeDown delay1000" data-cont=".b-4">
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/about-svg-icon-5.svg">
				</div>
				<h3 class="anim fadeDown delay1000" data-cont=".b-4"><?=includeArea("about-b-4-5-head");?></h3>
				<div class="div-p anim fadeDown delay1000" data-cont=".b-4">
					<?=includeArea("about-b-4-5-text");?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="b b-about-services b-about-wide">
	<div class="b-block">
		<h2 class="b-title white regular">Все для <b>вашего удобства</b></h2>
		<div class="b-about-services-list">
			<div class="b-about-services-item">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/icon-web.svg">
				<p><?=includeArea("about-services-1");?></p>
			</div>
			<div class="b-about-services-item">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/icon-debt.svg">
				<p><?=includeArea("about-services-2");?></p>
			</div>
			<div class="b-about-services-item">
				<img src="<?=SITE_TEMPLATE_PATH?>/html/i/icon-ins.svg">
				<p><?=includeArea("about-services-3");?></p>
			</div>
		</div>
	</div>
</div>
<div class="b-contacts-bottom">
	<h2 class="b-title regular">Приходите к нам <b>за отпуском</b></h2>
	<?$APPLICATION->IncludeComponent("bitrix:news.list", "contacts-slider", Array(
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
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"DISPLAY_DATE" => "Y",	// Выводить дату элемента
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FIELD_CODE" => array(	// Поля
			0 => "ID",
			1 => "NAME",
			2 => "PREVIEW_PICTURE",
			3 => "",
		),
		"FILTER_NAME" => "",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "5",	// Код информационного блока
		"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "20",	// Количество новостей на странице
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
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
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

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>