<?/** @var $block array */?>

<div class="b b-mailing">
	<div class="b-block">
		<div class="b-mailing-cont">
			<div class="b-head-gradient"></div>
			<div class="gradient-after">
				<h2><b><?=$block['value_title'];?></b></h2>
				<div class="mailing-text"><?=$block['value'];?></div>
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