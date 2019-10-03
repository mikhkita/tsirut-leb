<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("header-text", "Онлайн поиск и бронирование автобусных туров в Европу. <br>Экскурсионные туры в Прагу, Вену, Париж, Амстердам,<br> Рим, Будапешт.");
$APPLICATION->SetPageProperty("header-title", "Автобусные туры из Белгорода");
$APPLICATION->SetTitle("Автобусные туры из Белгорода");

?>
<div class="b-content-back b-contacts-top">
	<div class="b-bus-tours">
		<div class="b-bus-tours-main clearfix">
			<div class="b-bus-tours-left">
				<div class="b-bus-tours-filter">
					<h3>Фильтр туров</h3>
					<ul>
						<li class="b-checkbox">
							<input id="bus-city-1" type="checkbox" name="">
							<label for="bus-city-1">
								<div class="b-checked icon-checked"></div>
								<p>Абхазия</p>
							</label>
						</li>
						<li class="b-checkbox">
							<input id="bus-city-2" type="checkbox" name="">
							<label for="bus-city-2">
								<div class="b-checked icon-checked"></div>
								<p>Адлер</p>
							</label>
						</li>
						<li class="b-checkbox">
							<input id="bus-city-3" type="checkbox" name="">
							<label for="bus-city-3">
								<div class="b-checked icon-checked"></div>
								<p>Абхазия</p>
							</label>
						</li>
						<li class="b-checkbox">
							<input id="bus-city-4" type="checkbox" name="">
							<label for="bus-city-4">
								<div class="b-checked icon-checked"></div>
								<p>Адлер</p>
							</label>
						</li>
					</ul>
					<div class="center">
						<a href="#" class="b-btn b-btn-rect">Найти туры</a><br>
						<a href="#" class="filter-refresh dashed">Сбросить фильтр</a>
					</div>
				</div>
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
				</div>
			</div>
			<div class="b-bus-tours-right">
				<div class="b-bus-tours-item">
					<a class="b-img" href="#" style="background-image: url(/upload/iblock/35d/article-1.jpg)"></a>
					<div class="b-right">
						<a href="#"><h3>Тур к Матроне Московской</h3></a>
						<div class="city">Москва, Россия</div>
						<p>Ещё до прославления в лике святых люди знали и почитали блаженную Матрону. На могилке у неё всегда была людская очередь, горели свечи и лампады, люди шли к Матронушке за помощью и исцелением. И по вере получали просимое.</p>
						<div class="price"><span>3 000 руб.</span><span class="icon-next"></span></div>
					</div>
				</div>
				<div class="b-bus-tours-item">
					<a class="b-img" href="#" style="background-image: url(/upload/iblock/35d/article-1.jpg)"></a>
					<div class="b-right">
						<a href="#"><h3>Коломна + мыловаренная мануфактура + дегустация (1 день)</h3></a>
						<div class="city">Москва, Россия</div>
						<p>Ещё до прославления в лике святых люди знали и почитали блаженную Матрону. На могилке у неё всегда была людская очередь, горели свечи и лампады, люди шли к Матронушке за помощью и исцелением. И по вере получали просимое.</p>
						<div class="price"><span>3 000 руб.</span><span class="icon-next"></span></div>
					</div>
				</div>
				<div class="b-bus-tours-item">
					<a class="b-img" href="#" style="background-image: url(/upload/iblock/35d/article-1.jpg)"></a>
					<div class="b-right">
						<a href="#"><h3>Тур к Матроне Московской</h3></a>
						<div class="city">Москва, Россия</div>
						<p>Ещё до прославления в лике святых люди знали и почитали блаженную Матрону. На могилке у неё всегда была людская очередь, горели свечи и лампады, люди шли к Матронушке за помощью и исцелением. И по вере получали просимое.</p>
						<div class="price"><span>3 000 руб.</span><span class="icon-next"></span></div>
					</div>
				</div>
				<div class="b-search-subscribe b-bus-search-subscribe">
					<div class="b-subscribe-cont">
						<div class="b-subscribe-form">
							<h2><?=includeArea("bus-form-head")?></h2>
							<div class="mailing-text"><?=includeArea("bus-form-text")?></div>
							<form class="b-mailing-form" method="post" action="/searchTour.php" novalidate="novalidate">
								<input type="text" name="name" placeholder="Ваше имя" required="">
								<input type="text" name="phone" placeholder="Ваш телефон" required="">
								<input type="text" name="MAIL" required="" placeholder="Ваш e-mail">
								<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
								<a href="#" class="b-btn b-btn-orange one-line b-btn-submit ajax">
									<p class="btn-bold"><?=includeArea("bus-form-button")?></p>
								</a>
								<div class="b-checkbox">
									<input id="checkbox-search-2" type="checkbox" name="politics" checked="" required="">
									<label for="checkbox-search-2">
										<div class="b-checked icon-checked"></div>
										<p>Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных.</a></p>
									</label>
								</div>
								<input type="submit" value="Подписаться" style="display:none;">
							</form>
						</div>
					</div>
				</div>
				<div class="b-bus-tours-item">
					<a class="b-img" href="#" style="background-image: url(/upload/iblock/35d/article-1.jpg)"></a>
					<div class="b-right">
						<a href="#"><h3>Тур к Матроне Московской</h3></a>
						<div class="city">Москва, Россия</div>
						<p>Ещё до прославления в лике святых люди знали и почитали блаженную Матрону. На могилке у неё всегда была людская очередь, горели свечи и лампады, люди шли к Матронушке за помощью и исцелением. И по вере получали просимое.</p>
						<div class="price"><span>3 000 руб.</span><span class="icon-next"></span></div>
					</div>
				</div>
				<div class="b-bus-tours-item">
					<a class="b-img" href="#" style="background-image: url(/upload/iblock/35d/article-1.jpg)"></a>
					<div class="b-right">
						<a href="#"><h3>Тур к Матроне Московской</h3></a>
						<div class="city">Москва, Россия</div>
						<p>Ещё до прославления в лике святых люди знали и почитали блаженную Матрону. На могилке у неё всегда была людская очередь, горели свечи и лампады, люди шли к Матронушке за помощью и исцелением. И по вере получали просимое.</p>
						<div class="price"><span>3 000 руб.</span><span class="icon-next"></span></div>
					</div>
				</div>
			</div>
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
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>