<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("header-text", "Онлайн поиск и бронирование автобусных туров в Европу. <br>Экскурсионные туры в Прагу, Вену, Париж, Амстердам,<br>  Рим, Будапешт.");
$APPLICATION->SetPageProperty("header-title", "Экскурсионные туры по Европе");
$APPLICATION->SetTitle("Экскурсионные туры по Европе");

?><div class="b-block">
	<div class="b-block-ttv">
		 <script type="text/javascript" src="https://www.tourtrans.ru/js/online-styles/new/modules.js" charset="uft-8"></script>
		<div class="ttv-search" data-catalog-url="/search/excursions/results.php">
		</div>
		<div class="ttv-hottours" data-catalog-url="/search/excursions/results.php">
		</div>
	</div>
</div>
<div class="b b-excursions-popular">
	<div class="b-block">
		<h2 class="b-title">Самые популярные направления</h2>
		 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"country-list-min",
	Array(
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"COUNT_ELEMENTS_SHOW" => 16,
		"FILTER_NAME" => "sectionsFilter",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "content",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0=>"PICTURE",1=>"",),
		"SECTION_ID" => "1",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array("UF_PRICE_FROM","UF_COUNTRY_NAME",),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "LINE"
	)
);?>
	</div>
</div>
<div class="b-constructor-wide" style="background-image: url('/local/templates/main/html/i/excursions-1.jpg');">
	<div class="b-block">
		<h2 class="b-title">Отдых <b>о котором вы мечтали</b></h2>
		<p>
			 Выбирайте и бронируйте экскурсионные автобусные туры в Европу, которые позволят ознакомиться с самыми яркими достопримечательностями каждого европейского города, в котором вы побываете.<br>
 <br>
			 Отправиться в экскурсионный тур по городам Европы из Москвы можно: на автобусе, самолетом, на поезде. <b>Забронируйте автобусный тур в Европу в Белгороде</b> и все формальности с оформлением визы мы возьмем на себя.
		</p>
	</div>
</div>
<div class="b-block">
	<div class="b-constructor-pic-text">
		<div class="pic-text-left">
 <img src="/local/templates/main/html/i/detail-2.jpg">
		</div>
		<div class="pic-text-right">
			<h3>Экскурсионные <b>туры в Европу</b></h3>
			<p>
				 Европа – одно из самых популярных мест для любителей автобусных туров. Выбрав путешествие по Европе на автобусе, у вас появляется отличная возможность, увидеть несколько городов и посетить интересные экскурсии, попробовать разную национальную кухню и погулять по местным рынкам.<br>
 <br>
 <b>Экскурсионные туры во Францию, Испанию, Италию, Чехию, Швейцарию, Норвегию, Венгрию</b> по доступной цене, никого не оставят равнодушным. А для детей у нас есть туры в Парижский Диснейленд!
			</p>
		</div>
	</div>
</div>
<div class="b b-feedback b-feedback-shadow">
	<div class="b-block">
		<div class="b-feedback-text">
			<h2>Бесплатно подберем для вас лучший тур!</h2>
			<p>
				 Оставьте заявку нашему менеджеру и он проконсультирует Вас абсолютно бесплатно.
			</p>
			<form class="b-feedback-form" method="post" action="/subscribe.php">
 <input type="text" name="name" placeholder="Ваше имя" required=""> <input type="text" name="phone" placeholder="Ваш телефон" required=""> <input type="text" name="MAIL" required="" placeholder="Ваш e-mail"> <a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a> <a href="#" class="b-btn b-btn-orange ajax">
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
<div class="b-constructor-resorts">
	<div class="b-block">
		<h2 class="b-title regular"><b>Популярные курорты в Турции</b></h2>
		<div class="b-resorts-list detail-wide">
			<div class="b-resorts-item">
				<div class="b-resorts-top">
					<div class="b-resorts-img">
 <img src="/local/templates/main/html/i/detail-1.jpg">
					</div>
					<div class="blackout">
					</div>
					<h3>Кемер</h3>
				</div>
				<p>
					 Отдых в Кемере понравится тем, кто предпочитает галечные пляжи – они здесь широкие и чистые. Также путевки в Кемер подойдут любителям ночной жизни – огромный выбор ресторанов, баров и дискотек имеется как в центре курорта, так и в небольших курортных посёлках.
				</p>
 <a href="#">Смотреть туры в Кемер</a>
			</div>
			<div class="b-resorts-item">
				<div class="b-resorts-top">
					<div class="b-resorts-img">
 <img src="/local/templates/main/html/i/detail-2.jpg">
					</div>
					<div class="blackout">
					</div>
					<h3>Кемер</h3>
				</div>
				<p>
					 Отдых в Кемере понравится тем, кто предпочитает галечные пляжи – они здесь широкие и чистые. Также путевки в Кемер подойдут любителям ночной жизни – огромный выбор ресторанов, баров и дискотек имеется как в центре курорта, так и в небольших курортных посёлках.
				</p>
 <a href="#">Смотреть туры в Кемер</a>
			</div>
			<div class="b-resorts-item">
				<div class="b-resorts-top">
					<div class="b-resorts-img">
 <img src="/local/templates/main/html/i/detail-3.jpg">
					</div>
					<div class="blackout">
					</div>
					<h3>Кемер</h3>
				</div>
				<p>
					 Отдых в Кемере понравится тем, кто предпочитает галечные пляжи – они здесь широкие и чистые. Также путевки в Кемер подойдут любителям ночной жизни – огромный выбор ресторанов, баров и дискотек имеется как в центре курорта, так и в небольших курортных посёлках.
				</p>
 <a href="#">Смотреть туры в Кемер</a>
			</div>
		</div>
	</div>
</div>
<div class="b-block">
	<div class="b-seo-separator">
	</div>
</div>
<div class="b-seo b-block">
	<div class="seo-block center">
		<h2><span class="title">Автобусные туры в Европу в 2019 году</span></h2>
		<p>
			 Если вы можете выделить для путешествия в Европу более длительное время, то экскурсионный тур по городам Европы в 2019 году – это отличное решение для отпуска. В таком путешествие вы откроете для себя неизведанные и очень интересные места евпропейских столиц.<br>
 <br>
			 Не зависимо от того, в какое время года вы отправитесь в путешествие, Европа встретит вас потрясающей архитектурой, величественными парками, современными инсталляциями молодых дизайнеров, необыкновенными историческими местами и романтическими кафе.
		</p>
	</div>
</div>
<div class="b b-mailing">
	<div class="b-block">
		<div class="b-mailing-cont">
			<div class="b-head-gradient">
			</div>
			<div class="gradient-after">
				<h2>Подпишитесь на нашу рассылку!</h2>
				<p class="mailing-text">
					 Будьте в курсе о новых акциях, клёвых отелях, горящих турах и лучших предложениях недели!
				</p>
				<form class="b-mailing-form" method="post" action="/subscribe.php">
 <input type="text" name="email" placeholder="Ваш e-mail" required=""> <input type="text" name="MAIL" required="" placeholder="Ваш e-mail"> <a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a> <a href="#" class="b-btn b-btn-orange one-line b-btn-submit ajax">
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
		<p>
			 Идейные соображения высшего порядка, а также укрепление и развитие структуры представляет собой интересный эксперимент проверки дальнейших направлений развития. Товарищи! укрепление и развитие структуры влечет за собой процесс внедрения и модернизации новых предложений. Равным образом укрепление и развитие структуры в значительной степени обуславливает создание направлений прогрессивного развития.
		</p>
	</div>
</div>
<?$APPLICATION->IncludeComponent(
	"redder:constructor",
	"",
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
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "8",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "50",
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
		"PROPERTY_CODE" => array("B_1_HEADER","B_MAILING_HEADER","B_FORM_HEADER","B_1_TEXT","B_MAILING_TEXT","B_FORM_TEXT","TYPE",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"TARGET_ID" => "36"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>