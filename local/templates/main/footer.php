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
					<div class="visa-master"></div>
					<div class="b-redder">
						<span>Разработка стайта:</span>
						<a href="http://redder.pro/" class="b-redder-logo" target="_blank"></a>
					</div>
				</div>
			</div>
		</div>
		<div class="b-menu-overlay" id="b-menu-overlay" style="display: none;"></div>
	</div>
	
	<div style="display:none;">

		<?if($GLOBALS["isDetail"]):?>
			<div class="b-search-subscribe-1" id="b-search-subscribe-1">
				<div class="b-search-subscribe b-mailing-cont">
					<div class="b-head-gradient"></div>
					<div class="gradient-after">
						<h2><?=includeArea("detail-mail-head");?></h2>
						<div class="mailing-text"><?=includeArea("detail-mail-text");?></div>
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
						</form>
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
								<input id="checkbox-politics-2" type="checkbox" name="politics" checked required>
								<label for="checkbox-politics-2">
									<div class="b-checked icon-checked"></div>
									<p>Заполняя форму вы подтверждаете <a href="#" target="_blank">согласие на обработку персональных данных.</a></p>
								</label>
							</div>
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
			<h3>Город вылета</h3>
			<ul class="b-choose-list b-popup-city-list">
				
			</ul>
		</div>

		<a href="#b-filter-country" class="fancy"></a>
		<div class="b-popup b-filter-popup b-country-popup" id="b-filter-country">
			<h3>Выбор страны</h3>
			<ul class="b-choose-list b-popup-country-list">
				
			</ul>
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

		<a href="#b-filter-tourists" class="fancy"></a>
		<div class="b-popup b-filter-popup b-tourists-popup" id="b-filter-tourists">
			<h3>Количество человек</h3>

			<div class="b-select-age" style="display: none;">
				<div class="b-select" id="child-1">
					<select name="child-1">
						<option value="< 2 лет">< 2 лет</option>
						<option value="2 года" selected>2 года</option>
						<option value="3 года">3 года</option>
						<option value="4 года">4 года</option>
						<option value="5 лет">5 лет</option>
						<option value="6 лет">6 лет</option>
						<option value="7 лет">7 лет</option>
						<option value="8 лет">8 лет</option>
						<option value="9 лет">9 лет</option>
						<option value="10 лет">10 лет</option>
						<option value="11 лет">11 лет</option>
						<option value="12 лет">12 лет</option>
						<option value="13 лет">13 лет</option>
						<option value="14 лет">14 лет</option>
						<option value="15 лет">15 лет</option>
						<option value="16 лет">16 лет</option>
					</select>
				</div>
				<div class="b-select" id="child-2">
					<select name="child-2">
						<option value="< 2 лет">< 2 лет</option>
						<option value="2 года" selected>2 года</option>
						<option value="3 года">3 года</option>
						<option value="4 года">4 года</option>
						<option value="5 лет">5 лет</option>
						<option value="6 лет">6 лет</option>
						<option value="7 лет">7 лет</option>
						<option value="8 лет">8 лет</option>
						<option value="9 лет">9 лет</option>
						<option value="10 лет">10 лет</option>
						<option value="11 лет">11 лет</option>
						<option value="12 лет">12 лет</option>
						<option value="13 лет">13 лет</option>
						<option value="14 лет">14 лет</option>
						<option value="15 лет">15 лет</option>
						<option value="16 лет">16 лет</option>
					</select>
				</div>
				<div class="b-select" id="child-3">
					<select name="child-3">
						<option value="< 2 лет">< 2 лет</option>
						<option value="2 года" selected>2 года</option>
						<option value="3 года">3 года</option>
						<option value="4 года">4 года</option>
						<option value="5 лет">5 лет</option>
						<option value="6 лет">6 лет</option>
						<option value="7 лет">7 лет</option>
						<option value="8 лет">8 лет</option>
						<option value="9 лет">9 лет</option>
						<option value="10 лет">10 лет</option>
						<option value="11 лет">11 лет</option>
						<option value="12 лет">12 лет</option>
						<option value="13 лет">13 лет</option>
						<option value="14 лет">14 лет</option>
						<option value="15 лет">15 лет</option>
						<option value="16 лет">16 лет</option>
					</select>
				</div>
			</div>
			
		</div>

		<a href="#b-filter-dates" class="fancy"></a>
		<div class="b-popup b-filter-popup b-dates-popup" id="b-filter-dates">
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

		<a href="#b-filter-rating" class="fancy"></a>
		<div class="b-popup b-filter-popup b-rating-popup" id="b-filter-rating">
			<h3>Рейтинг отеля</h3>
			<ul class="b-choose-list b-popup-rating-list">
				
			</ul>
		</div>

		<a href="#b-filter-meal" class="fancy"></a>
		<div class="b-popup b-filter-popup b-meal-popup" id="b-filter-meal">
			<h3>Тип питания</h3>
			<ul class="b-choose-list b-popup-meal-list">
				
			</ul>
		</div>

		<a href="#b-filter-resort" class="fancy"></a>
		<div class="b-popup b-filter-popup b-resort-popup" id="b-filter-resort">
			<h3>Курорт/отель</h3>
			
		</div>

		<div class="b-popup" id="b-popup-call">
			<h3>Заказ обратного звонка</h3>
			
		</div>

		<div class="b-popup" id="b-popup-filter-mobile">
			<div class="TVSideFilterForm TVTheme2">
				<div class="defaultTVFilterForm"></div>
			</div>
		</div>

		<div class="b-popup" id="b-popup-review">
			<div class="center">
				<a href="#" class="b-btn b-btn-blue one-line" onclick="$.fancybox.close(); return false;">
					<p class="btn-bold">Закрыть</p>
				</a>
			</div>
		</div>

		<a href="#b-popup-error" class="b-error-link fancy" style="display:none;"></a>
		<div class="b-popup" id="b-popup-1">
			<h3>Оставьте заявку</h3>
			<h4>и наши специалисты<br>свяжутся с Вами в ближайшее время</h4>
			<form action="kitsend.php" data-goal="CALLBACK" method="POST" id="b-form-1">
				<div class="b-popup-form">
					<label for="name">Введите Ваше имя</label>
					<input type="text" id="name" name="name" required/>
					<label for="tel">Введите Ваш номер телефона</label>
					<input type="text" id="tel" name="phone" required/>
					<label for="tel">Введите Ваш E-mail</label>
					<input type="text" id="tel" name="email" required/>
					<input type="hidden" name="subject" value="Заказ"/>
					<input type="submit" style="display:none;">
					<a href="#" class="b-btn b-blue-btn ajax">Заказать</a>
					<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
				</div>
			</form>
		</div>
		<div class="b-thanks b-popup" id="b-popup-success">
			<h3>Спасибо!</h3>
			<h4>Ваша заявка успешно отправлена.<br/>Наш менеджер свяжется с Вами в течение часа.</h4>
			<a href="#" class="b-btn b-btn-orange one-line" onclick="$.fancybox.close(); return false;">
				<p class="btn-bold">Закрыть</p>
			</a>
		</div>
		<div class="b-thanks b-popup" id="b-popup-error">
			<h3>Ошибка отправки!</h3>
			<h4>Приносим свои извинения. Пожалуйста, попробуйте отправить Вашу заявку позже.</h4>
			<a href="#" class="b-btn b-btn-orange one-line" onclick="$.fancybox.close(); return false;">
				<p class="btn-bold">Закрыть</p>
			</a>
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
	<? if( isset( $GLOBALS["depends"][$GLOBALS["page"]] ) ): ?>
		<? foreach ($GLOBALS["depends"][$GLOBALS["page"]]["js"] as $scriptName): ?>
			<script type="text/javascript" src="<?=$scriptName?>"></script>
		<? endforeach; ?>
	<? endif; ?>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/html/js/main.js?<?=$GLOBALS["version"]?>"></script>
</body>
</html>