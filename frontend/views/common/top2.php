<?php
	use common\widgets\DbText;
?>

<div class="main">
	<!---- Левое меню для мобильных устройств ---->
	<div class="mobile">
		<div id="sidebar">
			<img src="/images/logo.png" alt="" />

			<?php echo \frontend\widgets\TopmenuWidget::widget(); ?>

		</div>
		<div class="main-content">
			<div class="swipe-area"></div>
			<a href="#" data-toggle=".mobile" id="sidebar-toggle">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</a>
			<div class="clearfix"></div>
		</div>
	</div>
	<!--- !Левое меню для мобильных устройств! ---->

	<!--- Правое меню для мобильных устройств ---->
	<div class="mobile1">
		<div id="sidebar1">
			<h2>ИНФОРМАЦИЯ НА СЕГОДНЯ</h2>
			<div class="col-xs-12 info">
				<!-- Информер 1 -->
				<a href="http://bank.uz/currency/cb.html" title="Bank.uz - все о банках Узбекистана" target="_blank"><img src="http://bank.uz/scripts/informercb?fg=DC143C&bg=FFFFFF" border="0"/></a>
				<!---->
			</div>
			<div class="col-xs-12 info">
				<!-- Информер 2 -->
				<table width="186" border="1" style="border-collapse: collapse; text-align:center; font-size:11px; color:#000000; "><tr bgcolor=""><td colspan="3"><a href="http://www.forexpf.ru/quote_show.php" title="товарные рынки">Товарные рынки</a></td></tr><tr bgcolor=""><td></td><td>BID</td><td>ASK</td</tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/gold/" title="золото" target="_blank">Золото</a></td><td id="cgoldb">0.00</td><td id="cgolda">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/silver/" title="серебро" target="_blank">Серебро</a></td><td id="csilverb">0.00</td><td id="csilvera">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/platinum/" title="платина" target="_blank">Платина</a></td><td id="cplatb">0.00</td><td id="cplata">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/palladium/" title="палладий" target="_blank">Палладий</a></td><td id="cpallb">0.00</td><td id="cpalla">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/alum/" title="алюминий" target="_blank">Алюминий</a></td><td id="calumb">0.00</td><td id="caluma">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/nikel/" title="никель" target="_blank">Никель</a></td><td id="cnickelb">0.00</td><td id="cnickela">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/copper/" title="медь" target="_blank">Медь</a></td><td id="ccopperb">0.00</td><td id="ccoppera">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/brent/" title="нефть brent" target="_blank">Нефть Брент</a></td><td id="cbrentb">0.00</td><td id="cbrenta">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/lightsweet/" title="нефть Лайт" target="_blank">Нефть Light</a></td><td id="clightb">0.00</td><td id="clighta">0.00</td></tr><tr bgcolor=""><td id="ccomtm" colspan="3"></td></tr></table><script type="text/javascript" charset="windows-1251" src="http://www.forexpf.ru/_informer_/comod.php?id=017864523"></script>
				<!---->
			</div>
			<div class="col-xs-12 info">
				<!-- Информер 3 -->
				<a href="http://bank.uz/currency/cb.html" title="Bank.uz - все о банках Узбекистана" target="_blank"><img src="http://bank.uz/scripts/informercb?fg=DC143C&bg=FFFFFF" border="0"/></a>
				<!---->
			</div>
			<div class="col-xs-12 info">
				<!-- Картинка -->
				<?php echo DbText::widget(['key' => 'top_banner']) ?>
				<!---->
			</div>

		</div>
		<div class="main-content">
			<div class="swipe-area1"></div>
			<a href="#" data-toggle=".mobile1" id="sidebar-toggle1">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</a>
			<div class="clearfix"></div>
		</div>
	</div>
	<!--- Правое меню для мобильных устройств ---->

	<!--- Покрывающий слой ---->
	<div id="cover"></div>

	<header>
		<div class="top">
			<div class="container-fluid">
				<div class="container">

					<?php echo \frontend\widgets\FastWidget::widget(); ?>

					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 lang">
							<ul>
								<li class="dropdown" id="russian">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Русский <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">Узбекский</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 buttons">
							<?php
								$guest = Yii::$app->user->isGuest;
								if($guest) { ?>
									<a href="/user/sign-in/login" class="enter_btn btn">Вход</a>
									<a href="/user/sign-in/signup" class="registration_btn btn">Регистрация</a>
								<?php } else { ?>
									<a href="/user/sign-in/login" class="enter_btn btn">Профиль</a>
								<?php } ?>


						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div> <!-- End .top -->
		<div class="container">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="title">
					<h1>НОВОСТНОЙ ПОРТАЛ <br /> УЗБЕКИСТАНА.</h1>
					<h2>www.today.uz</h2>
				</div>
				<ul class="social">
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus"></a></i></li>
				</ul>
				<ul class="app">
					<li class="android"><a href="#"><img src="/images/android.png" width="25" alt="" /></a></li>
					<li class="apple"><a href="#"><img src="/images/apple.png" width="25" alt="" /></a></li>
				</ul>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

					<?php echo \yii\helpers\Html::beginForm(\yii\helpers\Url::to('/article/search/'), 'get', ['class' => 'search navbar-right']); ?>

					<?php echo \yii\helpers\Html::textInput('text', '', [ 'placeholder' => 'Поиск по новостям...']) ?>

					<?php
						echo \yii\helpers\Html::submitInput('');
					?>

					<?php echo \yii\helpers\Html::endForm(); ?>

				<a href="/"><img src="/images/logo.png" alt="" class="logo navbar-right" /></a>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<?php /** ?>
			<div class="informers">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info">
					<!-- Информер 1 -->
					<a href="http://bank.uz/currency/cb.html" title="Bank.uz - все о банках Узбекистана" target="_blank"><img src="http://bank.uz/scripts/informercb?fg=DC143C&bg=FFFFFF" border="0"/></a>
					<!---->
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info">
					<!-- Информер 2 -->
					<table width="186" border="1" style="border-collapse: collapse; text-align:center; font-size:11px; color:#000000; "><tr bgcolor=""><td colspan="3"><a href="http://www.forexpf.ru/quote_show.php" title="товарные рынки">Товарные рынки</a></td></tr><tr bgcolor=""><td></td><td>BID</td><td>ASK</td</tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/gold/" title="золото" target="_blank">Золото</a></td><td id="cgoldb">0.00</td><td id="cgolda">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/silver/" title="серебро" target="_blank">Серебро</a></td><td id="csilverb">0.00</td><td id="csilvera">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/platinum/" title="платина" target="_blank">Платина</a></td><td id="cplatb">0.00</td><td id="cplata">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/palladium/" title="палладий" target="_blank">Палладий</a></td><td id="cpallb">0.00</td><td id="cpalla">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/alum/" title="алюминий" target="_blank">Алюминий</a></td><td id="calumb">0.00</td><td id="caluma">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/nikel/" title="никель" target="_blank">Никель</a></td><td id="cnickelb">0.00</td><td id="cnickela">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/copper/" title="медь" target="_blank">Медь</a></td><td id="ccopperb">0.00</td><td id="ccoppera">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/brent/" title="нефть brent" target="_blank">Нефть Брент</a></td><td id="cbrentb">0.00</td><td id="cbrenta">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/lightsweet/" title="нефть Лайт" target="_blank">Нефть Light</a></td><td id="clightb">0.00</td><td id="clighta">0.00</td></tr><tr bgcolor=""><td id="ccomtm" colspan="3"></td></tr></table><script type="text/javascript" charset="windows-1251" src="http://www.forexpf.ru/_informer_/comod.php?id=017864523"></script>
					<!---->
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info">
					<!-- Информер 3 -->
					<a href="http://bank.uz/currency/cb.html" title="Bank.uz - все о банках Узбекистана" target="_blank"><img src="http://bank.uz/scripts/informercb?fg=DC143C&bg=FFFFFF" border="0"/></a>
					<!---->
				</div>
				<div class="clearfix"></div>
			</div>
 <?php
			 */ ?>
			<!--- Меню -->
			<nav class="navbar navbar-inverse">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">

					<?php echo \frontend\widgets\TopmenuWidget::widget(); ?>

				</div>
			</nav>
			<!-- !Меню! --->
		</div>  <!-- End .container -->
	</header>
	<div class="container">
