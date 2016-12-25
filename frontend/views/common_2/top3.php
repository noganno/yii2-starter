<?php
	use common\widgets\DbText;
?>

<div class="main">

	<!---- Левое меню для мобильных устройств ---->
	<div class="mobile">
		<div id="sidebar">
			<img src="/images/uznews.png" alt="" class="logo" />
			<h1>НОВОСТНОЙ ПОРТАЛ УЗБЕКИСТАНА</h1>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#new1" data-toggle="tab" aria-expanded="false">Новые</a></li>
				<li><a href="#top1" data-toggle="tab" aria-expanded="true">Топ дня</a></li>
				<li><a href="#popular" data-toggle="tab" aria-expanded="false">Популярные</a></li>
			</ul>
			<div id="myTabContent1" class="tab-content">

				<!--- Вкладка 1 --->
				<div class="tab-pane fade active in" id="new1">
					<ul>
						<li class="all"><a href="#">Все новости <span>&nbsp;&nbsp;(7543)</span></a></li>
						<li class="star"><a href="#">Политика <span>&nbsp;&nbsp;(1202)</span></a></li>
						<li><a href="#">Экономика <span>&nbsp;&nbsp;(2020)</span></a></li>
						<li><a href="#">Местные <span>&nbsp;&nbsp;(1111)</span></a></li>
						<li><a href="#">Медиа <span>&nbsp;&nbsp;(4425)</span></a></li>
						<li><a href="#">Спорт <span>&nbsp;&nbsp;(54)</span></a></li>
						<li><a href="#">Авто <span>&nbsp;&nbsp;(5505)</span></a></li>
						<li class="child"><a href="#">Автосалоны <span>&nbsp;&nbsp;(5505)</span></a></li>
						<li class="child"><a href="#">Пробки <span>&nbsp;&nbsp;(5505)</span></a></li>
						<li><a href="#">It <span>&nbsp;&nbsp;(4550)</span></a></li>
						<li><a href="#">Наука <span>&nbsp;&nbsp;(7522)</span></a></li>
						<li><a href="#">Катировки <span>&nbsp;&nbsp;(7225)</span></a></li>
						<li class="child"><a href="#">UZEX <span>&nbsp;&nbsp;(7225)</span></a></li>
						<li class="child"><a href="#">Forex <span>&nbsp;&nbsp;(7225)</span></a></li>
						<li><a href="#">Факты <span>&nbsp;&nbsp;(2520)</span></a></li>
					</ul>
				</div>
				<div class="tab-pane fade" id="top1">
					<ul>
						<li class="all"><a href="#">Все новости <span>&nbsp;&nbsp;(1222)</span></a></li>
						<li class="star"><a href="#">Политика <span>&nbsp;&nbsp;(1222)</span></a></li>
						<li><a href="#">Экономика <span>&nbsp;&nbsp;(1223)</span></a></li>
						<li><a href="#">Местные <span>&nbsp;&nbsp;(1111)</span></a></li>
						<li><a href="#">Медиа <span>&nbsp;&nbsp;(1111)</span></a></li>
						<li><a href="#">Спорт <span>&nbsp;&nbsp;(1111)</span></a></li>
						<li><a href="#">Авто <span>&nbsp;&nbsp;(1111)</span></a></li>
						<li class="child"><a href="#">Автосалоны <span>&nbsp;&nbsp;(5505)</span></a></li>
						<li class="child"><a href="#">Пробки <span>&nbsp;&nbsp;(5505)</span></a></li>
						<li><a href="#">It <span>&nbsp;&nbsp;(4550)</span></a></li>
						<li><a href="#">Наука <span>&nbsp;&nbsp;(7522)</span></a></li>
						<li><a href="#">Катировки <span>&nbsp;&nbsp;(7225)</span></a></li>
						<li class="child"><a href="#">UZEX <span>&nbsp;&nbsp;(7225)</span></a></li>
						<li class="child"><a href="#">Forex <span>&nbsp;&nbsp;(7225)</span></a></li>
						<li><a href="#">Факты <span>&nbsp;&nbsp;(2520)</span></a></li>
					</ul>
				</div>
				<div class="tab-pane fade" id="popular">
					<ul>
						<li class="all"><a href="#">Все новости <span>&nbsp;&nbsp;(1423)</span></a></li>
						<li class="star"><a href="#">Политика <span>&nbsp;&nbsp;(533)</span></a></li>
						<li><a href="#">Экономика <span>&nbsp;&nbsp;(232)</span></a></li>
						<li><a href="#">Местные <span>&nbsp;&nbsp;(5535)</span></a></li>
						<li><a href="#">Медиа <span>&nbsp;&nbsp;(122)</span></a></li>
						<li><a href="#">Спорт <span>&nbsp;&nbsp;(121)</span></a></li>
						<li><a href="#">Авто <span>&nbsp;&nbsp;(1111)</span></a></li>
						<li class="child"><a href="#">Автосалоны <span>&nbsp;&nbsp;(5505)</span></a></li>
						<li class="child"><a href="#">Пробки <span>&nbsp;&nbsp;(5505)</span></a></li>
						<li><a href="#">It <span>&nbsp;&nbsp;(4550)</span></a></li>
						<li><a href="#">Наука <span>&nbsp;&nbsp;(7522)</span></a></li>
						<li><a href="#">Катировки <span>&nbsp;&nbsp;(7225)</span></a></li>
						<li class="child"><a href="#">UZEX <span>&nbsp;&nbsp;(7225)</span></a></li>
						<li class="child"><a href="#">Forex <span>&nbsp;&nbsp;(7225)</span></a></li>
						<li><a href="#">Факты <span>&nbsp;&nbsp;(2520)</span></a></li>
					</ul>
				</div>
			</div>
			<div class="sidebar_footer">
				<a href="#">
					<img src="/images/web.png" alt="" />
				</a>
			</div>
		</div>
		<div class="main-content">
			<div class="swipe-area"></div>
			<a href="#" data-toggle=".mobile" id="sidebar-toggle" onclick="$('#sidebar-toggle1').toggleClass('display'); $('.replace1').toggleClass('block')"></a>
			<div class="replace"></div>
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
			<div class="col-xs-12 info informer2">
				<!-- Информер 2 -->

				<!---->
			</div>
			<div class="col-xs-12 info">
				<!-- Информер 3 -->
				<a href="http://bank.uz/currency/cb.html" title="Bank.uz - все о банках Узбекистана" target="_blank"><img src="http://bank.uz/scripts/informercb?fg=DC143C&bg=FFFFFF" border="0"/></a>
				<!---->
			</div>
			<div class="col-xs-12">
				<!-- Картинка -->
				<?php echo DbText::widget(['key' => 'top_banner']) ?>
				<!---->
			</div>
			<div class="clearfix"></div>
			<div class="sidebar_footer_1">
				<h3>ОЦЕНИТЕ ПРИЛОЖЕНИЕ</h3>
				<a href="#">
					<img src="/images/appstore.png" alt="" />
				</a>
				<a href="#">
					<img src="/images/googleplay.png" alt="" />
				</a>

				<ul class="social">
					<li><a href="#"><i class="fa fa-star"></i></a></li>
					<li><a href="#"><i class="fa fa-star"></i></a></li>
					<li><a href="#"><i class="fa fa-star"></i></a></li>
					<li><a href="#"><i class="fa fa-star"></i></a></li>
					<li><a href="#"><i class="fa fa-star"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="main-content">
			<div class="swipe-area1"></div>
			<a href="#" data-toggle=".mobile1" id="sidebar-toggle1" onclick="$('#sidebar-toggle').toggleClass('display'); $('.replace').toggleClass('block')"></a>
			<div class="replace1"></div>
		</div>
	</div>
	<!--- Правое меню для мобильных устройств ---->

	<header>
		<div id="search">
			<a href="#"></a>
		</div>
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
										<li><a href="#">English</a></li>
										<li><a href="#">Chinese</a></li>
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
			<div class="mobile_cont">
				<div class="col-md-3 col-sm-3 col-xs-12 logo2">
					<a href="/"><img src="/images/logo1.png" alt="" /></a>
				</div>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<nav class="mobile_menu">
						<ul>
							<li class="active"><a href="#">ВСЕ</a></li>
							<li><a href="#">ПОЛИТИКА</a></li>
							<li><a href="#">МЕСТНЫЕ</a></li>
							<li><a href="#">МЕДИА</a></li>
							<li><a href="#">СПОРТ</a></li>
						</ul>
						<div class="clearfix"></div>
					</nav>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 title_cont">
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
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form_cont">
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
			<div class="informers">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info">
					<!-- Информер 1 -->
					<a href="http://bank.uz/currency/cb.html" title="Bank.uz - все о банках Узбекистана" target="_blank"><img src="http://bank.uz/scripts/informercb?fg=DC143C&bg=FFFFFF" border="0"/></a>
					<!---->
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info"  id="informer1">
					<!-- Информер 2 -->
					<table width="186" border="1"  style="border-collapse: collapse; text-align:center; font-size:11px; color:#000000; "><tr bgcolor=""><td colspan="3"><a href="http://www.forexpf.ru/quote_show.php" title="товарные рынки">Товарные рынки</a></td></tr><tr bgcolor=""><td></td><td>BID</td><td>ASK</td</tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/gold/" title="золото" target="_blank">Золото</a></td><td id="cgoldb">0.00</td><td id="cgolda">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/silver/" title="серебро" target="_blank">Серебро</a></td><td id="csilverb">0.00</td><td id="csilvera">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/platinum/" title="платина" target="_blank">Платина</a></td><td id="cplatb">0.00</td><td id="cplata">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/palladium/" title="палладий" target="_blank">Палладий</a></td><td id="cpallb">0.00</td><td id="cpalla">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/alum/" title="алюминий" target="_blank">Алюминий</a></td><td id="calumb">0.00</td><td id="caluma">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/nikel/" title="никель" target="_blank">Никель</a></td><td id="cnickelb">0.00</td><td id="cnickela">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/copper/" title="медь" target="_blank">Медь</a></td><td id="ccopperb">0.00</td><td id="ccoppera">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/brent/" title="нефть brent" target="_blank">Нефть Брент</a></td><td id="cbrentb">0.00</td><td id="cbrenta">0.00</td></tr><tr bgcolor=""><td><a href="http://www.forexpf.ru/chart/lightsweet/" title="нефть Лайт" target="_blank">Нефть Light</a></td><td id="clightb">0.00</td><td id="clighta">0.00</td></tr><tr bgcolor=""><td id="ccomtm" colspan="3"></td></tr></table><script type="text/javascript" charset="windows-1251" src="http://www.forexpf.ru/_informer_/comod.php?id=017864523"></script>
					<!---->
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info">
					<!-- Информер 3 -->
					<a href="http://bank.uz/currency/cb.html" title="Bank.uz - все о банках Узбекистана" target="_blank"><img src="http://bank.uz/scripts/informercb?fg=DC143C&bg=FFFFFF" border="0"/></a>
					<!---->
				</div>
				<div class="clearfix"></div>
			</div>
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
