<div class="b-articles-page">
	<div class="b-content-back b-contacts-top">
		<div class="b-block">
			<div class="b-articles-sort">
				<p>Сортировать по: </p>
				<form method="GET" action="" class="b-articles-sort-form">
					<div class="b-select-chosen">
						<select class="select-sort" name="SORT">
							<option value="asc" <?if(isset($_REQUEST["SORT"]) && $_REQUEST["SORT"] == "asc") echo "selected"?>>Возрастанию даты</option>
							<option value="desc" <?if(isset($_REQUEST["SORT"]) && $_REQUEST["SORT"] == "desc") echo "selected"?>>Убыванию даты</option>
						</select>
					</div>
				</form>
			</div>
			<div class="b-text">
				<div class="b-articles-page-top">
					<div class="b-articles-page-left">
						 <?
					$params = Array(
						"ACTIVE_DATE_FORMAT" => "j F Y",
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
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"DISPLAY_TOP_PAGER" => "N",
						"FIELD_CODE" => array("DATE_CREATE", ""),
						"FILTER_NAME" => "",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"IBLOCK_ID" => "6",
						"IBLOCK_TYPE" => "content",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"INCLUDE_SUBSECTIONS" => "Y",
						"MESSAGE_404" => "",
						"NEWS_COUNT" => "7",
						"PAGER_BASE_LINK_ENABLE" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_TEMPLATE" => "articles-page",
						"PAGER_TITLE" => "Статьи",
						"PARENT_SECTION" => "",
						"PARENT_SECTION_CODE" => "",
						"PREVIEW_TRUNCATE_LEN" => "",
						"PROPERTY_CODE" => array("", ""),
						"SET_BROWSER_TITLE" => "Y",
						"SET_LAST_MODIFIED" => "N",
						"SET_META_DESCRIPTION" => "Y",
						"SET_META_KEYWORDS" => "Y",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "N",
						"SHOW_404" => "N",
						"SORT_BY1" => "CREATED",
						"SORT_BY2" => "SORT",
						"SORT_ORDER1" => "ASC",
						"SORT_ORDER2" => "ASC",
						"STRICT_SECTION_CHECK" => "N"
					);
					//Сортировка
					if(isset($_REQUEST["SORT"]) && !empty($_REQUEST["SORT"])){
						$params["SORT_BY1"] = "CREATED";
						$params["SORT_BY2"] = "SORT";
						$params["SORT_ORDER1"] = $_REQUEST["SORT"];
						$params["SORT_ORDER2"] = "ASC";
					}
					//Наличие тега
					if(isset($_REQUEST["TAG"]) && !empty($_REQUEST["TAG"])){
						$GLOBALS["arrFilter"] = array("?TAGS" => $_REQUEST["TAG"]);
						$params["FILTER_NAME"] = "arrFilter";
						$params["INCLUDE_IBLOCK_INTO_CHAIN"] = "Y";
					}
					
					$APPLICATION->IncludeComponent(
						"bitrix:news.list",
						"articles-page",
						$params
					);
					?>
					</div>
					<div class="b-articles-page-right">
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
							<div class="b-tourvisor-nav-item">
								<h3>Теги</h3>
								 <?$APPLICATION->IncludeComponent(
	"bitrix:search.tags.cloud",
	"articles-page",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COLOR_NEW" => "3E74E6",
		"COLOR_OLD" => "C0C0C0",
		"COLOR_TYPE" => "Y",
		"FILTER_NAME" => "",
		"FONT_MAX" => "50",
		"FONT_MIN" => "10",
		"PAGE_ELEMENTS" => "150",
		"PERIOD" => "",
		"PERIOD_NEW_TAGS" => "",
		"SHOW_CHAIN" => "N",
		"SORT" => "NAME",
		"TAGS_INHERIT" => "Y",
		"URL_SEARCH" => "",
		"WIDTH" => "100%",
		"arrFILTER" => array()
	)
);?>
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
								<div class="mailing-text">
									 <?=includeArea("mail-text");?>
								</div>
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
</div>