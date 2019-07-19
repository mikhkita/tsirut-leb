<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

<?if($GLOBALS["arCountry"]["name"]):?>
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
					<div class="tv-calendar tv-moduleid-980631"></div>
				</div>
			</div>
		</div>
	</div>
<?endif;?>

<div class="b-online-search">
	<div class="b-block">
		<h2 class="b-title regular"><b><?=$GLOBALS["arCountry"]["titleTV"];?></b></h2>
		<a href="#b-popup-filter-mobile" class="fancy b-btn-filter-mobile hide">Открыть фильтр</a>
		<div class="b b-tourvisor-with-filter" data-country="<?=$GLOBALS["arCountry"]["name"]?>">
			<div class="tv-search-form tv-moduleid-190001"></div>
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
					<div class="b-tourvisor-nav-item clearfix">
						<h3>Туры по месяцам</h3>
						<ul class="months">
							<li><a href="#">Январь</a></li>
							<li><a href="#">Февраль</a></li>
							<li><a href="#">Март</a></li>
							<li><a href="#">Апрель</a></li>
							<li><a href="#">Май</a></li>
							<li><a href="#">Июнь</a></li>
							<li><a href="#">Июль</a></li>
							<li><a href="#">Август</a></li>
							<li><a href="#">Сентябрь</a></li>
							<li><a href="#">Октябрь</a></li>
							<li><a href="#">Ноябрь</a></li>
							<li><a href="#">Декабрь</a></li>
						</ul>
					</div>
					<div class="b-tourvisor-nav-item clearfix">
						<h3>Туры по сезонам</h3>
						<div class="b-seasons">
							<div class="b-season">
								<img src="<?=SITE_TEMPLATE_PATH?>/html/i/tours-summer.svg">
								<a href="#">Лето</a>
							</div>
							<div class="b-season">
								<img src="<?=SITE_TEMPLATE_PATH?>/html/i/tours-autumn.svg">
								<a href="#">Осень</a>
							</div>
						</div>
						<div class="b-seasons">
							<div class="b-season">
								<img src="<?=SITE_TEMPLATE_PATH?>/html/i/tours-winter.svg">
								<a href="#">Зима</a>
							</div>
							<div class="b-season">
								<img src="<?=SITE_TEMPLATE_PATH?>/html/i/tours-spring.svg">
								<a href="#">Весна</a>
							</div>
						</div>
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
					<div class="b-tourvisor-nav-item clearfix">
						<h3>Туры в другие страны</h3>
						<ul>
							<li><a href="#">Туры в Доминикану</a></li>
							<li><a href="#">Туры в Таиланд</a></li>
							<li><a href="#">Туры в Черногорию </a></li>
							<li><a href="#">Туры в Индию</a></li>
							<li><a href="#">Туры на Кипр</a></li>
							<li><a href="#">Туры в Грузию</a></li>
						</ul>
					</div>
					<div class="b-tourvisor-nav-item b-nav-seo">
						<h3>Заголовок первого блока</h3>
						<p>Идейные соображения высшего порядка, а также укрепление и развитие структуры представляет собой интересный эксперимент проверки дальнейших направлений развития. </p>
					</div>
					<div class="b-tourvisor-nav-item b-nav-seo">
						<h3 class="with-icon">
							<span class="seo-icon seo-icon-gift"></span>Заголовок второго блока с иконкой</span>
						</h3>
						<p>Равным образом рамки и место обучения кадров требуют от нас анализа дальнейших направлений развития. Разнообразный и богатый опыт новая модель организационной деятельности обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.<br><br>Значимость этих проблем настолько очевидна, что укрепление и развитие структуры требуют определения и уточнения форм развития.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?$arFilter = array("IBLOCK_ID"=>1, "ACTIVE"=>"Y", "SECTION_CODE"=>$_REQUEST["SECTION_CODE"]);?>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "detail", Array(
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
			1 => "CODE",
			2 => "NAME",
			3 => "PREVIEW_TEXT",
			4 => "PREVIEW_PICTURE",
			5 => "",
		),
		"FILTER_NAME" => "arFilter",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "1",	// Код информационного блока
		"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
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
			0 => "B_1_HEADER",
			1 => "B_1_TEXT",
			2 => "TYPE",
			3 => "",
		),
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
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
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>