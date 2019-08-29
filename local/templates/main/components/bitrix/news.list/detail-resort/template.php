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

<div class="b-online-search">
	<div class="b-block">
		<h2 class="b-title regular"><b><?=$GLOBALS["arCountry"]["titleTV"];?></b></h2>
		<div class="filter-mobile-cont hide">
			<a href="#b-popup-filter-mobile" class="fancy b-btn-filter-mobile">Открыть фильтр</a>
		</div>
		<div class="b b-tourvisor">
			<div class="tourvisor-preloader"><img src="<?=SITE_TEMPLATE_PATH?>/html/i/preloader-dark.svg"></div>
			<div class="b b-tourvisor-with-filter b-tourvisor-detail" data-country="<?=$GLOBALS["arCountry"]["name"]?>">
				<?//если это месяц
				$dates = "";
				if($GLOBALS["arResort"]["month"]){
					$dates = $GLOBALS["monthsTV"][$GLOBALS["arResort"]["month"]]["start"].",".$GLOBALS["monthsTV"][$GLOBALS["arResort"]["month"]]["end"];
				}elseif($GLOBALS["arResort"]["season"]){
					$dates = $GLOBALS["seasonsTV"][$GLOBALS["arResort"]["season"]]["start"].",".$GLOBALS["seasonsTV"][$GLOBALS["arResort"]["season"]]["end"];
				}
				?>
				<div class="tv-search-form tv-moduleid-192034" 
					tv-country="<?=$GLOBALS["arCountry"]["countryIDTV"]?>" 
					tv-resorts="<?//=$GLOBALS["arResort"]["resortIDTV"]?>" 
					tv-departure="<?=$GLOBALS["arResort"]["cityIDTV"]?>"
					tv-flydates="<?=$dates?>"
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
								<?foreach ($GLOBALS["arResort"]["monthList"] as $key => $value):?>
									<li><a href="<?=$value["code"]?>/"><?=$value["name"]?></a></li>
								<?endforeach;?>
							</ul>
						</div>
					<?endif;?>
					<?if($GLOBALS["arResort"]["seasonList"]):?>
						<div class="b-tourvisor-nav-item clearfix">
							<h3>Туры по сезонам</h3>
							<ul class="b-seasons">
								<?foreach ($GLOBALS["arResort"]["seasonList"] as $key => $value):?>
									<li class="b-season">
										<img src="<?=SITE_TEMPLATE_PATH?>/html/i/<?=$GLOBALS["seasonsTV"][$key]["img"]?>">
										<a href="<?=$value["code"]?>/"><?=$value["name"]?></a>
									</li>
								<?endforeach;?>
							</ul>
						</div>
					<?endif;?>
					<div class="b-tourvisor-nav-item b-tourvisor-nav-adv">
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
					<!-- <div class="b-tourvisor-nav-item b-nav-seo">
						<h3>Заголовок первого блока</h3>
						<p>Идейные соображения высшего порядка, а также укрепление и развитие структуры представляет собой интересный эксперимент проверки дальнейших направлений развития. </p>
					</div>
					<div class="b-tourvisor-nav-item b-nav-seo">
						<h3 class="with-icon">
							<span class="seo-icon seo-icon-gift"></span><span class="title">Заголовок второго блока с иконкой</span></span>
						</h3>
						<p>Равным образом рамки и место обучения кадров требуют от нас анализа дальнейших направлений развития. Разнообразный и богатый опыт новая модель организационной деятельности обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.<br><br>Значимость этих проблем настолько очевидна, что укрепление и развитие структуры требуют определения и уточнения форм развития.</p>
					</div> -->
					<div class="b-tourvisor-nav-item b-nav-seo">
						<?=$GLOBALS["arResort"]["seoText"]?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="b-content-deatail">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?
	$type = (int)$arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"];
	switch ($type) {
	    case 1:
	?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b-country-desc detail-margin-b" style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>')">
			<div class="b-block">
				<h2 class="b-title"><b><?=$arItem["PROPERTIES"]["B_1_HEADER"]["VALUE"]?></b></h2>
				<p><?=$arItem["PROPERTIES"]["B_1_TEXT"]["VALUE"]?></p>
			</div>
		</div>
	<?
	        break;
	    case 2:
	?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b-country-adv detail-margin-b-s">
			<div class="b-block">
				<div class="detail-wide">
					<h2 class="b-title detail-wide-cancel"><?=$arItem["NAME"];?></h2>
					<?=$arItem["PREVIEW_TEXT"];?>
				</div>
			</div>
		</div>
	<?
	        break;
	    case 3:
	?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b b-feedback b-feedback-shadow detail-margin-b">
			<div class="b-block">
				<div class="b-feedback-text">
					<h2><?=$arItem["PROPERTIES"]["B_FORM_HEADER"]["VALUE"]?></h2>
					<p><?=$arItem["PROPERTIES"]["B_FORM_TEXT"]["VALUE"]?></p>
					<form class="b-feedback-form" method="post" action="/subscribe.php">
						<input type="text" name="name" placeholder="Ваше имя" required>
						<input type="text" name="phone" placeholder="Ваш телефон" required>
						<input type="text" name="MAIL" required="" placeholder="Ваш e-mail">
						<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
						<a href="#" class="b-btn b-btn-orange ajax">
							<p class="btn-bold">Подберите мне тур</p>
							<p class="btn-regular">Хочу довериться профессионалам</p>
						</a>
						<div class="b-checkbox">
							<input id="personal-1" type="checkbox" name="personal" checked required>
							<label for="personal-1">
								<div class="b-checked icon-checked"></div>
								<p>Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных.</a></p>
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
	<?
	    	break;
	    case 4:
	?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b-country-resorts detail-margin-b-s">
			<div class="b-block">
				<h2 class="b-title regular"><b><?=$arItem["NAME"]?></b></h2>
				<div class="b-resorts-list detail-wide">
					<?=$arItem["PREVIEW_TEXT"]?>
				</div>
			</div>
		</div>
	<?
	    	break;
	    case 5:
	?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b b-mailing detail-margin-b">
			<div class="b-block">
				<div class="b-mailing-cont">
					<div class="b-head-gradient"></div>
					<div class="gradient-after">
						<h2><?=$arItem["PROPERTIES"]["B_MAILING_HEADER"]["VALUE"]?></h2>
						<p class="mailing-text"><?=$arItem["PROPERTIES"]["B_MAILING_TEXT"]["VALUE"]?></p>
						<form class="b-mailing-form" method="post" action="/subscribe.php">
							<input type="text" name="email" placeholder="Ваш e-mail" required>
							<input type="text" name="MAIL" required="" placeholder="Ваш e-mail">
							<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
							<a href="#" class="b-btn b-btn-orange one-line b-btn-submit ajax">
								<p class="btn-bold">Подписаться</p>
							</a>
							<div class="b-checkbox">
								<input id="checkbox-politics-1" type="checkbox" name="politics" checked required>
								<label for="checkbox-politics-1">
									<div class="b-checked icon-checked"></div>
									<p>Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных.</a></p>
								</label>
							</div>
							<input type="submit" value="Подписаться" style="display:none;">
						</form>
					</div>
				</div>
				<!-- VK Widget -->
				<div class="b-widget-vk">
					<div id="vk_groups"></div>
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
	<?
	    	break;
	    case 6:
	?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b b-articles detail-margin-b-s">
			<div class="b-block">
				<h2 class="b-title"><?=$arItem["NAME"]?></h2>
				<div class="b-article-list b-article-slider mobile-slider detail-wide">
					<?$GLOBALS["articlesFilter"] = array("PROPERTY_COUNTRY" => $GLOBALS["arCountry"]["id"]);?>
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
		</div>
	<?
	    	break;
	    case 7:
	?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<?=$arItem["PREVIEW_TEXT"]?>
		</div>
	<?
			break;
		}?>
<?endforeach;?>
</div>