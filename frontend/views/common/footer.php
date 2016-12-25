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
					<h3 class="block_title"><?php echo Yii::t('frontend', 'О ПРОЕКТЕ') ?></h3>
					<?php echo \frontend\widgets\InfoWidget::widget(['type' => 'info', 'id' => 5]); ?>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="footer_content">
					<h3 class="block_title"><?php echo Yii::t('frontend', 'Полезные <strong>ссылки</strong>') ?></h3>
					<div class="footer_links">
					<?php 
					if(\Yii::$app->language == 'uz') { ?>
						<?php echo DbMenu::widget(['key' => 'bottom-index-uz']) ?>
					<?php } else { ?>
						<?php echo DbMenu::widget(['key' => 'bottom-index']) ?>
					<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="footer_content">
					<h3 class="block_title">Today <strong>.uz</strong></h3>
					<div class="col-xs-5 mobile_img">
						<a href="https://play.google.com/store/apps/details?id=com.today"><img src="/images/mobile-app.png" alt="" /></a>
					</div>
					<div class="col-xs-7 mobile_description">
						<a href="https://play.google.com/store/apps/details?id=com.today"><?php echo Yii::t('frontend', 'НАШЕ МОБИЛЬНОЕ ПРИЛОЖЕНИЕ') ?> <strong>TODAY.UZ</strong></a>
					</div>
				</div>
			</div>
		</div>
		<p class="copyright"> Barcha huquqlar himoyalangan. O’zbekiston yangiliklar portal Today.uz. Toshkent 2016 yil</p>
		<!--- Все права защищены. Новостной портал Узбекистана Today.uz Ташкент 2016---->
	</div>
	
	<!--- Google analytics  ---->
	
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74777181-1', 'auto');
  ga('send', 'pageview');

</script>
	
<!-- START WWW.UZ TOP-RATING --><SCRIPT language="javascript" type="text/javascript">
<!--
top_js="1.0";top_r="id=37600&r="+escape(document.referrer)+"&pg="+escape(window.location.href);document.cookie="smart_top=1; path=/"; top_r+="&c="+(document.cookie?"Y":"N")
//-->
</SCRIPT>
<SCRIPT language="javascript1.1" type="text/javascript">
<!--
top_js="1.1";top_r+="&j="+(navigator.javaEnabled()?"Y":"N")
//-->
</SCRIPT>
<SCRIPT language="javascript1.2" type="text/javascript">
<!--
top_js="1.2";top_r+="&wh="+screen.width+'x'+screen.height+"&px="+
(((navigator.appName.substring(0,3)=="Mic"))?screen.colorDepth:screen.pixelDepth)
//-->
</SCRIPT>
<SCRIPT language="javascript1.3" type="text/javascript">
<!--
top_js="1.3";
//-->
</SCRIPT>
<SCRIPT language="JavaScript" type="text/javascript">
<!--
top_rat="&col=340F6E&t=ffffff&p=BD6F6F";top_r+="&js="+top_js+"";document.write('<img src="http://cnt0.www.uz/counter/collect?'+top_r+top_rat+'" width=0 height=0 border=0 />')//-->
</SCRIPT><NOSCRIPT><IMG height=0 src="http://cnt0.www.uz/counter/collect?id=37600&pg=http%3A//uzinfocom.uz&col=340F6E&t=ffffff&p=BD6F6F" width=0 border=0 /></NOSCRIPT><!-- FINISH WWW.UZ TOP-RATING -->  	
	
	
</footer>

<div class="download">
	<p><?php echo Yii::t('frontend', 'Скачивайте приложение') ?>:</p>
	<a href="https://appsto.re/ru/NDGScb.i" class="download_link"><img src="/images/app_store.png" height="38" width="122" alt=""></a>
	<a href="https://play.google.com/store/apps/details?id=com.today" class="download_link"><img src="/images/gplay.png" height="38" width="122" alt=""></a>
</div>

<div class="webspektr">
	<a href="http://webspektr.uz/ " target="_blank">
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

<!-- toTop begin -->
 <script type="text/javascript">
// create the back to top button
$('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');

var amountScrolled = 300;

$(window).scroll(function() {
	if ( $(window).scrollTop() > amountScrolled ) {
		$('a.back-to-top').fadeIn('slow');
	} else {
		$('a.back-to-top').fadeOut('slow');
	}
});

$('a.back-to-top, a.simple-back-to-top').click(function() {
	$('html, body').animate({
		scrollTop: 0
	}, 1000);
	return false;
});
</script>
<!-- toTop end -->