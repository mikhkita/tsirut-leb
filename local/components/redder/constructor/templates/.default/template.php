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
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b-constructor-desc detail-margin-b" style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>')">
			<div class="b-block">
				<?if($arItem["PROPERTIES"]["TITLE_SHOW"]["VALUE"]):?>
					<h2 class="b-title"><b><?=$arItem["NAME"]?></b></h2>
				<?endif;?>
				<div class="preview-text"><?=$arItem["PREVIEW_TEXT"];?></div>
			</div>
		</div>
	<?
	        break;
	    case 2:
	?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b-constructor-adv detail-margin-b-s">
			<div class="b-block">
				<div class="detail-wide">
					<?if($arItem["PROPERTIES"]["TITLE_SHOW"]["VALUE"]):?>
						<h2 class="b-title detail-wide-cancel"><?=$arItem["NAME"];?></h2>
					<?endif;?>
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
					<?if($arItem["PROPERTIES"]["TITLE_SHOW"]["VALUE"]):?>
						<h2><b><?=$arItem["NAME"];?></b></h2>
					<?endif;?>
					<p><?=$arItem["PREVIEW_TEXT"];?></p>
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
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="b-constructor-resorts detail-margin-b-s">
			<div class="b-block">
				<?if($arItem["PROPERTIES"]["TITLE_SHOW"]["VALUE"]):?>
					<h2 class="b-title"><?=$arItem["NAME"];?></h2>
				<?endif;?>
				<div class="b-resorts-list detail-wide">
					<?=$arItem["PREVIEW_TEXT"];?>
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
						<?if($arItem["PROPERTIES"]["TITLE_SHOW"]["VALUE"]):?>
							<h2><b><?=$arItem["NAME"];?></b></h2>
						<?endif;?>
						<p class="mailing-text"><?=$arItem["PREVIEW_TEXT"];?></p>
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
				<?if($arItem["PROPERTIES"]["TITLE_SHOW"]["VALUE"]):?>
					<h2 class="b-title"><?=$arItem["NAME"];?></h2>
				<?endif;?>
					<?
					$tags = array();
					foreach ($arItem["PROPERTIES"]["TAGS"]["VALUE"] as $value) {
						$tags[] = $value;
					}
					$tags = implode("|", $tags);
					$GLOBALS["articlesFilter"] = array("?TAGS" => $tags);?>
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
	<?
	    	break;
	    case 7:
	?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<?if($arItem["PROPERTIES"]["TITLE_SHOW"]["VALUE"]):?>
				<h2 class="b-title"><?=$arItem["NAME"];?></h2>
			<?endif;?>
			<?=$arItem["PREVIEW_TEXT"]?>
		</div>
	<?
			break;
		}?>
<?endforeach;?>
