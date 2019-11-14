
<div class="b-content-back b-contacts-top">
	<div class="b-bus-tours">
		<div class="b-bus-tours-main clearfix">
			<?
			//Фильтр
			$GLOBALS["busFilter"] = array();
			if(isset($_REQUEST["loc"]) && !empty($_REQUEST["loc"])){
				$GLOBALS["busFilter"]["PROPERTY_LOCATION_FILTER"] = array();
				foreach ($_REQUEST["loc"] as $id => $value) {
					$GLOBALS["busFilter"]["PROPERTY_LOCATION_FILTER"][] = $id;
				}
			}
			$APPLICATION->IncludeComponent("bitrix:news.list", "bus-tours", Array(
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
						0 => "NAME",
						1 => "PREVIEW_TEXT",
						2 => "PREVIEW_PICTURE",
						3 => "",
					),
					"FILTER_NAME" => "busFilter",	// Фильтр
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
					"IBLOCK_ID" => "9",	// Код информационного блока
					"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
					"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
					"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
					"NEWS_COUNT" => "50",	// Количество новостей на странице
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
						0 => "LOCATION",
						1 => "LOCATION_FILTER",
						2 => "PRICE",
						3 => "",
					),
					"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
					"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
					"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
					"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
					"SET_STATUS_404" => "N",	// Устанавливать статус 404
					"SET_TITLE" => "N",	// Устанавливать заголовок страницы
					"SHOW_404" => "N",	// Показ специальной страницы
					"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
					"SORT_BY2" => "ID",	// Поле для второй сортировки новостей
					"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
					"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
					"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
				),
				false
			);?>

		</div>
		<div class="b b-mailing">
			<div class="b-block">
				<div class="b-mailing-cont">
					<div class="b-head-gradient"></div>
					<div class="gradient-after">
						<h2><?=includeArea("bus-mail-head");?></h2>
						<div class="mailing-text"><?=includeArea("bus-mail-text");?></div>
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
		<div class="b-block">
			<div class="b-seo-separator-wide">
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
	</div>
</div>