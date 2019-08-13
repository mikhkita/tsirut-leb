<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отдых в России");
?>

<div class="b-block">
	<div class="b b-tourvisor">
		<div class="filter-mobile-cont hide">
			<a href="#b-popup-filter-mobile" class="fancy b-btn-filter-mobile">Открыть фильтр</a>
		</div>
		<div class="tourvisor-preloader"><img src="<?=SITE_TEMPLATE_PATH?>/html/i/preloader-dark.svg"></div>
		<div class="b b-tourvisor-header b-tourvisor-search b-tourvisor-with-filter" data-country="Россия">
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
						<label for="rating-all" data-TV="Любой рейтинг">Любой рейтинг</label>
					</li>
					<li>
						<input id="rating-4_5" type="radio" name="rating" value="4.5">
						<label for="rating-4_5" data-TV="> 4.5"><b>4.5+</b>&nbsp;Превосходно</label>
					</li>
					<li>
						<input id="rating-4_0" type="radio" name="rating" value="4.0">
						<label for="rating-4_0" data-TV="> 4.0"><b>4.0+</b>&nbsp;Очень хорошо</label>
					</li>
					<li>
						<input id="rating-3_5" type="radio" name="rating" value="3.5">
						<label for="rating-3_5" data-TV="> 3.5"><b>3.5+</b>&nbsp;Хорошо</label>
					</li>
					<li>
						<input id="rating-3_0" type="radio" name="rating" value="3.0">
						<label for="rating-3_0" data-TV="> 3.0"><b>3.0+</b>&nbsp;Удовлетворительно</label>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="b b-popular">
	<div class="b-block">
		<h2 class="b-title">Популярные направления</h2>
		<div class="b-country-list square clearfix">
		<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "russia-list", Array(
	"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
		"FILTER_NAME" => "sectionsFilter",	// Имя массива со значениями фильтра разделов
		"IBLOCK_ID" => "1",	// Инфоблок
		"IBLOCK_TYPE" => "content",	// Тип инфоблока
		"SECTION_CODE" => "",	// Код раздела
		"SECTION_FIELDS" => array(	// Поля разделов
			0 => "PICTURE",
			1 => "",
		),
		"SECTION_ID" => "2",	// ID раздела
		"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
		"SECTION_USER_FIELDS" => array(	// Свойства разделов
			"UF_PRICE_FROM","UF_COUNTRY_NAME",
		),
		"SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
		"TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
		"VIEW_MODE" => "LINE",	// Вид списка подразделов
	),
	false
);?>
		</div>
	</div>
</div>

<div class="b b-feedback">
	<div class="b-feedback-back"></div>
	<div class="b-block">
		<div class="b-feedback-text">
			<h2><?=includeArea("russia-form-head");?></h2>
			<div class="div-p"><?=includeArea("russia-form-text");?></div>
			<form class="b-feedback-form" method="post" action="/searchTour.php">
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

<div class="b b-mailing">
	<div class="b-block">
		<div class="b-mailing-cont">
			<div class="b-head-gradient"></div>
			<div class="gradient-after">
				<h2><?=includeArea("russia-mail-head");?></h2>
				<div class="mailing-text"><?=includeArea("russia-mail-text");?></div>
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

<div class="b-block">
	<div class="b-seo-separator-wide">
	</div>
</div>
<div class="b-seo b-block">
	<div class="b-seo-two-blocks">
		<div class="seo-block first">
			<h2 class="with-icon"><span class="seo-icon seo-icon-coin"></span>Заголовок первого блока</h2>
			<p>
			</p>
			<p>
				 Идейные соображения высшего порядка, а также укрепление и развитие структуры представляет собой интересный эксперимент проверки дальнейших направлений развития. Товарищи! укрепление и развитие структуры влечет за собой процесс внедрения и модернизации новых предложений. Равным образом укрепление и развитие структуры в значительной степени обуславливает создание направлений прогрессивного развития.
			</p>
		</div>
		<div class="seo-block second">
			<h2 class="with-icon"><span class="seo-icon seo-icon-gift"></span>Заголовок второго блока</h2>
			<p>
			</p>
			<p>
				 Равным образом рамки и место обучения кадров требуют от нас анализа дальнейших направлений развития. Разнообразный и богатый опыт новая модель организационной деятельности обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития.
			</p>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>