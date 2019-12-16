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
<?$APPLICATION->SetDirProperty("header-text", "");?>
<div class="b-articles-detail">
	<div class="b-content-back">
		<div class="b-block">
			<div class="clearfix">
				<div class="b-articles-detail-left">
					<div class="b-text b-text-short">
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
					</div>
				</div>
				<div class="b-articles-detail-right">
					<h3>Последние статьи</h3>
					<?//исключить вывод текущей статьи
					global $articlesFilter;
					$articlesFilter = array("IBLOCK_ID"=>6, "ACTIVE"=>"Y", "!ID"=>$arResult["ID"]);
					?>
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
							"FILTER_NAME" => "articlesFilter",	// Фильтр
							"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
							"IBLOCK_ID" => "6",	// Код информационного блока
							"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
							"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
							"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
							"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
							"NEWS_COUNT" => "2",	// Количество новостей на странице
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
							"LAST_ARTICLES" => "Y"
						),
						false
					);?>
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
								<img src="/local/templates/main/html/i/adv-cards.svg">
								<p>Онлайн-оплата туров прямо на сайте</p>
							</div>
							<div class="nav-adv">
								<img src="/local/templates/main/html/i/adv-earth.svg">
								<p>Поиск туров по всем туроператорам</p>
							</div>
							<div class="nav-adv">
								<img src="/local/templates/main/html/i/adv-money.svg">
								<p>Комиссию за вас платит туроператор</p>
							</div>
						</div>
					</div>
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
		</div>
	</div>
</div>