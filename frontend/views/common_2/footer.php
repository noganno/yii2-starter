<?php
	use common\widgets\DbText;
	use common\widgets\DbMenu;
?>

</div>
<!--- Футер ---->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="footer_content">
					<h3 class="block_title">Информация <strong>о нас</strong></h3>
					<?php echo \frontend\widgets\InfoWidget::widget(['type' => 'info', 'id' => 2]); ?>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="footer_content">
					<h3 class="block_title">Полезные <strong>ссылки</strong></h3>
					<div class="footer_links">
						<?php echo DbMenu::widget(['key' => 'bottom-index']) ?>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="footer_content">
					<h3 class="block_title">Today <strong>.uz</strong></h3>
					<div class="col-xs-5 mobile_img">
						<a href="#"><img src="/images/mobile-app.png" alt="" /></a>
					</div>
					<div class="col-xs-7 mobile_description">
						<a href="#">НАШЕ МОБИЛЬНОЕ ПРИЛОЖЕНИЕ <strong>TODAY.UZ</strong></a>
					</div>
				</div>
			</div>
		</div>
		<p class="copyright">Ташкент . Узбекистан 2016год. Все права защищены. Информационный портал узбекистана Tpday.uz</p>
	</div>
</footer>

<div class="download">
	<p>Скачивайте приложение:</p>
	<a href="" class="download_link"><img src="/images/app_store.png" height="38" width="122" alt=""></a>
	<a href="" class="download_link"><img src="/images/g_app.png" height="38" width="122" alt=""></a>
</div>

<div class="webspektr">
	<a href="#">
		<img src="/images/webspektr.png" alt="" />
	</a>
</div>
</div>
<div class="background">
	<div class="i">
		<a href="#">
			<img src="/images/info.png" alt="" />
		</a>
	</div>
	<img src="/images/background.jpg" alt="" class="background" />
</div>
