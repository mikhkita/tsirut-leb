			<?if(!in_array($urlArr[1], $GLOBALS["pagesList"]) && !$GLOBALS["isMain"]):?>
						</div> <!-- b-content-back b-contacts-top -->
					</div> <!-- b-block -->
				</div> <!-- b-text -->
			<?endif;?>
		</div> <!-- b-content -->

		<div class="b b-footer">
			<div class="b-block">
				<div class="b-footer-top clearfix">
					<div class="b-footer-item column-1">
						<a href="/" class="b-footer-logo"></a>
						<div class="b-social-wrap">
							<div class="b-social clearfix">
								<div class="left social-item">
									<a href="https://vk.com" class="icon-vk" target="_blank">Вконтакте</a>
								</div>
								<div class="left social-item">
									<a href="https://www.instagram.com" class="icon-instagram" target="_blank">Facebook</a>
								</div>
								<div class="left social-item">
									<a href="https://facebook.com" class="icon-facebook" target="_blank">Twitter</a>
								</div>
							</div>
							<div class="visa-master"></div>
						</div>
					</div>
					<div class="b-footer-item column-2">
						<h2><?=includeArea("footer-title-1")?></h2>
						<?$APPLICATION->IncludeComponent("bitrix:menu", "footer-menu", Array(
								"ROOT_MENU_TYPE" => "footer1",	// Тип меню для первого уровня
								"MENU_CACHE_TYPE" => "N",	// Тип кеширования
								"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
								"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
								"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
									0 => "",
								),
								"MAX_LEVEL" => "1",	// Уровень вложенности меню
								"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
								"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
								"DELAY" => "N",	// Откладывать выполнение шаблона меню
								"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
							),
							false
						);?>
					</div>
					<div class="b-footer-item column-3">
						<h2><?=includeArea("footer-title-2")?></h2>
						<?$APPLICATION->IncludeComponent("bitrix:menu", "footer-menu", Array(
								"ROOT_MENU_TYPE" => "footer2",	// Тип меню для первого уровня
								"MENU_CACHE_TYPE" => "N",	// Тип кеширования
								"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
								"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
								"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
									0 => "",
								),
								"MAX_LEVEL" => "1",	// Уровень вложенности меню
								"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
								"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
								"DELAY" => "N",	// Откладывать выполнение шаблона меню
								"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
							),
							false
						);?>
					</div>
					<div class="b-footer-item b-footer-contacts">
						<div class="b-footer-phone">
							<a href="tel:<?=includeArea("phone", true)?>"><?=includeArea("phone")?></a><br>
							<a href="tel:<?=includeArea("phone2", true)?>"><?=includeArea("phone2")?></a>	
						</div>
						<p><?=includeArea("footer-addr")?></p>
						<p><b>Время работы:</b><br><?=includeArea("working")?></p>
					</div>
				</div>
				<div class="b-footer-bottom">
					<div class="b-footer-bottom-left">
						<div class="b-copyright">© 2008-2019 Аквамарин. Все права защищены</div>
						<a href="#" class="b-footer-politics">Политика обработки персональных данных</a>
					</div>
					<div class="b-redder">
						<!-- <span>Разработка стайта:</span>
						<a href="http://redder.pro/" class="b-redder-logo" target="_blank"></a> -->
						<div class="visa-master"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="b-menu-overlay" id="b-menu-overlay" style="display: none;"></div>
	</div>
	
	<div style="display:none;">

		<?if($GLOBALS["isDetail"] || $GLOBALS["page"] == "search"):?>
			<div class="b-search-subscribe-1" id="b-search-subscribe-1">
				<div class="b-search-subscribe b-mailing-cont">
					<div class="b-head-gradient"></div>
					<div class="gradient-after">
						<h2><?=includeArea("detail-mail-head");?></h2>
						<div class="mailing-text"><?=includeArea("detail-mail-text");?></div>
						<?=includeArea("subscribe-form");?>
					</div>
				</div>
			</div>
			<div class="b-search-subscribe b-search-subscribe-2" id="b-search-subscribe-2">
				<div class="b-subscribe-cont">
					<div class="b-subscribe-form">
						<h2>Не можете определиться с выбором?</h2>
						<div class="mailing-text">Оставьте заявку нашему менеджеру и он проконсультирует Вас абсолютно бесплатно!</div>
						<form class="b-mailing-form" method="post" action="/searchTour.php">
							<input type="text" name="name" placeholder="Ваше имя" required>
							<input type="text" name="phone" placeholder="Ваш телефон" required>
							<input type="text" name="MAIL" required="" placeholder="Ваш e-mail">
							<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
							<a href="#" class="b-btn b-btn-orange one-line b-btn-submit ajax">
								<p class="btn-bold">Подписаться</p>
							</a>
							<div class="b-checkbox">
								<input id="TVcheckbox-politics-2" type="checkbox" name="politics" checked required>
								<label for="TVcheckbox-politics-2">
									<div class="b-checked icon-checked"></div>
									<p>Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных.</a></p>
								</label>
							</div>
							<input type="submit" value="Подписаться" style="display:none;">
						</form>
					</div>
				</div>
			</div>
			<div class="b-search-subscribe b-search-pay" id="b-search-pay">
				<div class="b-search-pay-wrap">
					<div class="b-search-pay-content">
						<h2>Боитесь упустить выгодное предложение?</h2>
						<p>Вы можете забронировать понравившийся вам тур и оплатить его прямо на сайте!</p>
					</div>
					<img src="<?=SITE_TEMPLATE_PATH?>/html/i/search-pay.svg">
				</div>
			</div>
		<?endif;?>

		<!-- <a href="#b-detail-popup" class="fancy"></a>
		<div class="b-popup b-detail-popup" id="b-detail-popup">
			<div class="b-for-detail">
				
			</div>
		</div> -->

		<a href="#b-filter-city" class="fancy"></a>
		<div class="b-popup b-filter-popup b-city-popup" id="b-filter-city">
			<div class="b-popup-content">
				<h3>Город вылета</h3>
				<ul class="b-choose-list b-popup-city-list">
					
				</ul>
			</div>
		</div>

		<a href="#b-filter-country" class="fancy"></a>
		<div class="b-popup b-filter-popup b-country-popup" id="b-filter-country">
			<div class="b-popup-content">
				<h3>Выбор страны</h3>
				<ul class="b-choose-list b-popup-country-list">
					
				</ul>
			</div>
		</div>

		<!-- <a href="#b-filter-regions" class="fancy"></a>
		<div class="b-popup b-filter-popup b-regions-popup" id="b-filter-regions">
			<h3>Выбор курорта</h3>
			<div class="b-for-regions">
				
			</div>
			<div class="center">
				<a href="#" class="b-btn b-btn-orange one-line">
					<p class="btn-bold">Перейти к выбору отеля</p>
				</a>
			</div>
		</div>

		<a href="#b-filter-hotels" class="fancy"></a>
		<div class="b-popup b-filter-popup b-hotels-popup" id="b-filter-hotels">
			<h3>Выбор отеля</h3>
			<div class="b-for-hotels">
				
			</div>
			<div class="center">
				<a href="#" class="b-btn b-btn-orange one-line">
					<p class="btn-bold">Выбрать</p>
				</a>
			</div>
		</div> -->

		<a href="#b-filter-nights" class="fancy"></a>
		<div class="b-popup b-filter-popup b-nights-popup" id="b-filter-nights">
			<div class="b-popup-content">
				<h3>Количество ночей</h3>
				<div class="b-from-to">
					<div class="b-from">10</div>
					<div class="b-separator">-</div>
					<div class="b-to">23</div>
				</div>
				<table cellpadding="0" cellspacing="0" class="b-nights-table">
					<tr>
						<td><span>#</span>1<span>#</span></td>
						<td><span>#</span>2<span>#</span></td>
						<td><span>#</span>3<span>#</span></td>
						<td><span>#</span>4<span>#</span></td>
						<td><span>#</span>5<span>#</span></td>
						<td><span>#</span>6<span>#</span></td>
						<td><span>#</span>7<span>#</span></td>
					</tr>
					<tr>
						<td><span>#</span>8<span>#</span></td>
						<td><span>#</span>9<span>#</span></td>
						<td><span>#</span>10<span>#</span></td>
						<td><span>#</span>11<span>#</span></td>
						<td><span>#</span>12<span>#</span></td>
						<td><span>#</span>13<span>#</span></td>
						<td><span>#</span>14<span>#</span></td>
					</tr>
					<tr>
						<td><span>#</span>15<span>#</span></td>
						<td><span>#</span>16<span>#</span></td>
						<td><span>#</span>17<span>#</span></td>
						<td><span>#</span>18<span>#</span></td>
						<td><span>#</span>19<span>#</span></td>
						<td><span>#</span>20<span>#</span></td>
						<td><span>#</span>21<span>#</span></td>
					</tr>
					<tr>
						<td><span>#</span>22<span>#</span></td>
						<td><span>#</span>23<span>#</span></td>
						<td><span>#</span>24<span>#</span></td>
						<td><span>#</span>25<span>#</span></td>
						<td><span>#</span>26<span>#</span></td>
						<td><span>#</span>27<span>#</span></td>
						<td><span>#</span>28<span>#</span></td>
					</tr>
				</table>
				<div class="center">
					<a href="#" class="b-btn b-btn-orange one-line">
						<p class="btn-bold">Применить</p>
					</a>
				</div>
			</div>
		</div>

		<a href="#b-filter-tourists" class="fancy"></a>
		<div class="b-popup b-filter-popup b-tourists-popup" id="b-filter-tourists">
			<div class="b-popup-content">
				<h3>Количество человек</h3>
				<div class="b-tourists-popup-content">
					
				</div>
			</div>
		</div>

		<a href="#b-filter-dates" class="fancy"></a>
		<div class="b-popup b-filter-popup b-dates-popup" id="b-filter-dates">
			<div class="b-popup-content">
				<h3>Даты вылета</h3>
				<div class="b-from-to">
					<div class="b-from">20 января</div>
					<div class="b-separator">-</div>
					<div class="b-to">31 января</div>
				</div>
				<div class="b-for-datepicker">
					
				</div>
				<div class="center">
					<a href="#" class="b-btn b-btn-orange one-line">
						<p class="btn-bold">Применить</p>
					</a>
				</div>
				<!-- <div class="b-btn-cont"><a href="#" class="b-btn b-blue-btn b-submit-btn">Применить</a></div> -->
			</div>
		</div>

		<a href="#b-filter-rating" class="fancy"></a>
		<div class="b-popup b-filter-popup b-rating-popup" id="b-filter-rating">
			<div class="b-popup-content">
				<h3>Рейтинг отеля</h3>
				<ul class="b-choose-list b-popup-rating-list">
					
				</ul>
			</div>
		</div>

		<a href="#b-filter-meal" class="fancy"></a>
		<div class="b-popup b-filter-popup b-meal-popup" id="b-filter-meal">
			<div class="b-popup-content">
				<h3>Тип питания</h3>
				<ul class="b-choose-list b-popup-meal-list">
					
				</ul>
			</div>
		</div>

		<a href="#b-filter-resort" class="fancy"></a>
		<div class="b-popup b-filter-popup b-resort-popup" id="b-filter-resort">
			<div class="b-popup-content">
				<h3>Курорт/отель</h3>

			</div>
		</div>

		<a href="#b-filter-hotel-type" class="fancy"></a>
		<div class="b-popup b-filter-popup b-hotel-type-popup" id="b-filter-hotel-type">
			<div class="b-popup-content">
				<h3>Тип отеля</h3>

			</div>
		</div>

		<div class="b-popup b-aqua-popup b-popup-back-2" id="b-popup-call">
			<div class="b-popup-content">
				<h2 class="small-mb">Заказать обратный звонок</h2>
				<h4>Оставьте заявку и наш менеджер перезвонит Вам в ближайшее время</h4>
				<form action="/subscribe.php" method="POST">
					<input type="text" name="name" placeholder="Вашe имя" required>
					<input type="text" name="phone" placeholder="Ваш телефон" required>
					<input type="text" name="MAIL" required placeholder="Ваш e-mail">
					<a href="#" class="b-btn b-btn-orange ajax b-btn-full">
						<p class="btn-bold">Оставить заявку</p>
						<p class="btn-regular">на обратный звонок</p>
					</a>
					<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
					<div class="b-checkbox">
						<input id="agree-1" type="checkbox" name="agree-1" checked required> 
						<label for="agree-1">
						<div class="b-checked icon-checked"></div>
						<p>Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных</a> и получение информационных писем</p>
						</label>
					</div>
				</form>
			</div>
		</div>

		<div class="b-popup b-aqua-popup b-popup-back-2" id="b-popup-tour-selection">
			<div class="b-popup-content">
				<h2 class="small-mb">Заявка на подбор тура</h2>
				<h4>Оставьте заявку нашему менеджеру  и он подберет для вас лучший тур по цене туроператора</h4>
				<form action="/subscribe.php" method="POST">
					<input type="text" name="name" placeholder="Вашe имя" required>
					<input type="text" name="phone" placeholder="Ваш телефон" required>
					<input type="text" name="MAIL" required placeholder="Ваш e-mail">
					<a href="#" class="b-btn b-btn-orange ajax b-btn-full">
						<p class="btn-bold">Оставить заявку</p>
						<p class="btn-regular">на подбор тура</p>
					</a>
					<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
					<div class="b-checkbox">
						<input id="agree-2" type="checkbox" name="agree-2" checked required> 
						<label for="agree-2">
						<div class="b-checked icon-checked"></div>
						<p>Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных</a> и получение информационных писем</p>
						</label>
					</div>
				</form>
			</div>
		</div>

		<div class="b-popup b-aqua-popup b-popup-back-2" id="b-popup-review-form">
			<div class="b-popup-content">
				<h2 class="small-mb">Оставить отзыв</h2>
				<form action="/ajax/?action=ADDREVIEW" method="POST" id="b-review-form" data-file-action="/send/addPhoto.php">
					<input type="text" name="name" placeholder="Вашe имя" required>
					<input type="text" name="tour" placeholder="Место отдыха" required>
					<textarea name="comment" rows="6" placeholder="Ваш отзыв"></textarea>
					<div class="b-plup-photo">
						<div id="plup-actions">
							<input id="plup-photo-file" type="hidden" name="FILE">
							<a id="plup-button" class="plup-button" href="javascript:;">
								<div class="add-photo">
									<span class="add-icon"></span>
									<span class="name">Загрузить фото</span>
								</div>
								<div class="success-photo" style="display: none;">
									<span class="success-icon icon-checked"></span>
									<span class="name">Фото загружено</span>
								</div>
							</a>
						</div>
					</div>
					<input type="text" name="MAIL">
					<a href="#" class="b-btn b-btn-orange ajax b-btn-full">
						<p class="btn-bold">Оставить отзыв</p>
						<p class="btn-regular">о вашем путешествии</p>
					</a>
					<a href="#b-review-success" class="b-thanks-link fancy" style="display:none;"></a>
					<div class="b-checkbox">
						<input id="agree-3" type="checkbox" name="agree-3" checked required> 
						<label for="agree-3">
						<div class="b-checked icon-checked"></div>
						<p>Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных</a> и получение информационных писем</p>
						</label>
					</div>
				</form>
			</div>
		</div>

		<div class="b-popup" id="b-popup-filter-mobile">
			<div class="b-popup-content">
				<div class="TVSideFilterForm TVTheme2">
					<div class="defaultTVFilterForm"></div>
				</div>
			</div>
		</div>

		<div class="b-popup" id="b-popup-review">
			<div class="b-popup-content">
				<div class="center">
					<a href="#" class="b-btn b-btn-blue one-line" onclick="$.fancybox.close(); return false;">
						<p class="btn-bold">Закрыть</p>
					</a>
				</div>
			</div>
		</div>

		<div class="b-popup b-hotel-popup" id="b-hotel-popup">
			<div class="b-popup-content">
				<div class="b">
					<!-- <div class="tourvisor-preloader"><img src="<?=SITE_TEMPLATE_PATH?>/html/i/preloader-dark.svg"></div> -->
					<div class="tv-country tv-moduleid-982989"></div>
				</div>
			</div>
		</div>

		<div class="b-popup b-popup-quiz" id="b-popup-quiz">
			<div class="b-popup-head">
				<div class="b-popup-head-gradient"></div>
				<div class="b-popup-head-white"></div>
			</div>
			<div class="b-popup-content">
				<form id="b-quiz-form" class="b-quiz-form" action="quiz.php" method="POST">
					<h2 class="b-title white">Рассчитайте стоимость <br> вашего путешествия</h2>
					<div class="b-quiz b-quiz-screen-1">
						<h3>В какой стране вы хотите отдохнуть?</h3>
						<div class="b-quiz-error"></div>
						<ul class="b-quiz-list b-quiz-months clearfix">
							<li>
								<input id="country-1" type="radio" name="country" value="Турция" required>
								<label for="country-1">Турция</label>
							</li>
							<li>
								<input id="country-2" type="radio" name="country" value="Таиланд">
								<label for="country-2">Таиланд</label>
							</li>
							<li>
								<input id="country-3" type="radio" name="country" value="Вьетнам">
								<label for="country-3">Вьетнам</label>
							</li>
							<li>
								<input id="country-4" type="radio" name="country" value="Индия">
								<label for="country-4">Индия</label>
							</li>
							<li>
								<input id="country-5" type="radio" name="country" value="Китай">
								<label for="country-5">Китай</label>
							</li>
							<li>
								<input id="country-6" type="radio" name="country" value="ОАЭ">
								<label for="country-6">ОАЭ</label>
							</li>
							<li>
								<input id="country-7" type="radio" name="country" value="Кипр">
								<label for="country-7">Кипр</label>
							</li>
							<li>
								<input id="country-8" type="radio" name="country" value="Греция">
								<label for="country-8">Греция</label>
							</li>
							<li>
								<input id="country-9" type="radio" name="country" value="other">
								<label for="country-9">Другая страна</label>
							</li>
						</ul>
						<div class="center b-input b-quiz-other-country">
							<input class="b-input-country-other" type="text" name="country-other" placeholder="Введите название страны">
						</div>
						<div class="center">
							 <a href="#" class="b-btn b-btn-orange one-line b-btn-next" data-next=".b-quiz-screen-2">
								<p class="btn-bold">Дальше</p>
							 </a>
							<p class="steps">Осталось всего 4 шага</p>
						</div>
					</div>
					<div class="b-quiz b-quiz-screen-2">
						<h3>Когда вы планируете свой отпуск?</h3>
						<div class="b-quiz-error"></div>
						<ul class="b-quiz-list b-quiz-months clearfix">
							<?
							$months = array(
								"1"=>"Январь",
								"2"=>"Февраль",
								"3"=>"Март",
								"4"=>"Апрель",
								"5"=>"Май",
								"6"=>"Июнь",
								"7"=>"Июль",
								"8"=>"Август",
								"9"=>"Сентябрь",
								"10"=>"Октябрь",
								"11"=>"Ноябрь",
								"12"=>"Декабрь"
							);
							$curMonth = date('n');
							?>
							<?for ($i = 0; $i < 6; $i++):?>
							<?
								$validMonth = ($curMonth + $i > 12) ? $curMonth + $i - 12 : $curMonth + $i;
								$m = $months[$validMonth];
								if($i == 5){
									$m = "Позднее";
								}
							?>
								<li>
									<input id="month-<?=$i?>" type="radio" name="month" value="<?=$m?>" <?if($i == 0) echo 'required'?>>
									<label for="month-<?=$i?>"><?=$m?></label>
								</li>
							<?endfor;?>
						</ul>
						<div class="center">
							 <a href="#" class="b-btn b-btn-orange one-line b-btn-next" data-next=".b-quiz-screen-3">
								<p class="btn-bold">Дальше</p>
							 </a>
							<p class="steps">Осталось всего 3 шага</p>
						</div>
					</div>
					<div class="b-quiz b-quiz-screen-3">
						<h3>Сколько отдыхающих взрослых?</h3>
						<div class="b-quiz-error"></div>
						<ul class="b-quiz-list b-quiz-counts b-quiz-adults clearfix">
							<li>
								<input id="adults-1" type="radio" name="adults" value="1" required checked>
								<label for="adults-1">1</label>
							</li>
							<li>
								<input id="adults-2" type="radio" name="adults" value="2">
								<label for="adults-2">2</label>
							</li>
							<li>
								<input id="adults-3" type="radio" name="adults" value="3">
								<label for="adults-3">3</label>
							</li>
							<li>
								<input id="adults-4" type="radio" name="adults" value="4">
								<label for="adults-4">4</label>
							</li>
							<li>
								<input id="adults-5" type="radio" name="adults" value="5">
								<label for="adults-5">5</label>
							</li>
						</ul>
						<h3>Сколько детей?</h3>
						<ul class="b-quiz-list b-quiz-counts clearfix">
							<li>
								<input id="children-0" type="radio" name="children" value="0" required checked>
								<label for="children-0">0</label>
							</li>
							<li>
								<input id="children-1" type="radio" name="children" value="1">
								<label for="children-1">1</label>
							</li>
							<li>
								<input id="children-2" type="radio" name="children" value="2">
								<label for="children-2">2</label>
							</li>
							<li>
								<input id="children-3" type="radio" name="children" value="3">
								<label for="children-3">3</label>
							</li>
							<li>
								<input id="children-4" type="radio" name="children" value="4">
								<label for="children-4">4</label>
							</li>
						</ul>
						<div class="center">
							 <a href="#" class="b-btn b-btn-orange one-line b-btn-next" data-next=".b-quiz-screen-4">
								<p class="btn-bold">Дальше</p>
							 </a>
							<p class="steps">Осталось всего 2 шага</p>
						</div>
					</div>
					<div class="b-quiz b-quiz-screen-4">
						<h3>Сколько ночей хотели бы отдохнуть?</h3>
						<div class="b-quiz-error"></div>
						<ul class="b-quiz-list b-quiz-months clearfix">
							<li>
								<input id="night-1" type="radio" name="night" value="5–7 ночей" required>
								<label for="night-1">5–7 ночей</label>
							</li>
							<li>
								<input id="night-2" type="radio" name="night" value="8–10 ночей">
								<label for="night-2">8–10 ночей</label>
							</li>
							<li>
								<input id="night-3" type="radio" name="night" value="11–13 ночей">
								<label for="night-3">11–13 ночей</label>
							</li>
							<li>
								<input id="night-4" type="radio" name="night" value="14–16 ночей">
								<label for="night-4">14–16 ночей</label>
							</li>
							<li>
								<input id="night-5" type="radio" name="night" value="Более 16 ночей">
								<label for="night-5">Более 16 ночей</label>
							</li>
							<li>
								<input id="night-6" type="radio" name="night" value="Не важно">
								<label for="night-6">Не важно</label>
							</li>
						</ul>
						<div class="center">
							 <a href="#" class="b-btn b-btn-orange one-line b-btn-next" data-next=".b-quiz-screen-5">
								<p class="btn-bold">Дальше</p>
							 </a>
							<p class="steps">Остался всего 1 шаг</p>
						</div>
					</div>
					<div class="b-quiz b-quiz-screen-5">
						<h3>Остался всего один шаг!</h3>
						<h4>Оставьте заявку нашему менеджеру, он рассчитает стоимость тура и перезвонит вам в ближайшее время</h4>
						<div class="center b-quiz-send">
							<input type="text" name="name" placeholder="Вашe имя" required>
							<input type="text" name="phone" placeholder="Ваш телефон" required>
							<input type="text" name="email" placeholder="Ваш e-mail" required>
							<input type="text" name="MAIL" required placeholder="Ваш e-mail">
							<a href="#" class="b-btn b-btn-orange b-quiz-submit ajax">
								<p class="btn-bold">Подберите мне тур</p>
								<p class="btn-regular">Хочу довериться профессионалам</p>
							</a>
							<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
							<div class="b-checkbox">
 								<input id="personal-quiz" type="checkbox" name="personal" checked required> 
 								<label for="personal-quiz">
									<div class="b-checked icon-checked"></div>
									<p>Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных</a> и получение информационных писем</p>
 								</label>
							</div>
							<input type="submit" value="Подписаться" style="display:none;">
						</div>
					</div>
				</form>
			</div>
		</div>

		<a href="#b-popup-error" class="b-error-link fancy" style="display:none;"></a>

		<div class="b-thanks b-aqua-popup b-popup b-popup-back-1" id="b-popup-success">
			<div class="b-popup-content">
				<h2>Спасибо!</h2>
				<h4>Ваша заявка успешно отправлена. <br/>Наш менеджер свяжется с Вами в ближайшее время</h4>
				<a href="#" class="b-btn b-btn-orange one-line" onclick="$.fancybox.close(); return false;">
					<p class="btn-bold">Закрыть</p>
				</a>
			</div>
		</div>

		<div class="b-thanks b-aqua-popup b-popup b-popup-back-1" id="b-subscribe-success" >
			<div class="b-popup-content">
				<h2>Подписка успешно оформлена</h2>
				<h4>Теперь Вы будете в курсе о новых акциях, клёвых отелях, горящих турах и лучших предложениях недели.</h4>
				<a href="#" class="b-btn b-btn-orange one-line" onclick="$.fancybox.close(); return false;">
					<p class="btn-bold">Закрыть</p>
				</a>
			</div>
		</div>

		<div class="b-thanks b-aqua-popup b-popup b-popup-back-1" id="b-review-success" >
			<div class="b-popup-content">
				<h2>Спасибо за отзыв!</h2>
				<h4>Ваш отзыв успешно отправлен.  Мы опубликуем его на сайте сразу после проверки менеджером</h4>
				<a href="#" class="b-btn b-btn-orange one-line" onclick="$.fancybox.close(); return false;">
					<p class="btn-bold">Закрыть</p>
				</a>
			</div>
		</div>

		<div class="b-thanks b-aqua-popup b-popup b-popup-back-1" id="b-popup-error">
			<div class="b-popup-content">
				<h3>Ошибка отправки!</h3>
				<h4>Пожалуйста, попробуйте отправить Вашу заявку позже или позвоните нам по телефону: <a href="tel:+74722400200"><b>+7 (4722) 400-200</b></a></h4>
				<a href="#" class="b-btn b-btn-orange one-line" onclick="$.fancybox.close(); return false;">
					<p class="btn-bold">Закрыть</p>
				</a>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/html/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/html/js/jquery.fancybox.min.js"></script>
	<!-- <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false&key=AIzaSyD6Sy5r7sWQAelSn-4mu2JtVptFkEQ03YI"></script> -->
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/html/js/jquery.touch.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/html/js/jquery.maskedinput.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/html/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/html/js/KitAnimate.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/html/js/mask.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/html/js/KitSend.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/html/js/slick.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/html/js/parallax.min.js"></script>
	<script type="text/javascript" src="//tourvisor.ru/module/init.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/html/js/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/html/js/slideout.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/html/js/jquery.sticky-kit.min.js"></script>
	<? if( isset( $GLOBALS["depends"][$GLOBALS["page"]] ) ): ?>
		<? foreach ($GLOBALS["depends"][$GLOBALS["page"]]["js"] as $scriptName): ?>
			<script type="text/javascript" src="<?=$scriptName?>"></script>
		<? endforeach; ?>
	<? endif; ?>
	<? if($GLOBALS["isMain"]): ?>
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/html/js/plupload.full.min.js"></script>
	<? endif; ?>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/html/js/main.js?<?=$GLOBALS["version"]?>"></script>
</body>
</html>