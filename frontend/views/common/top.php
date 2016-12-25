<?php
/**
 * @var $this yii\web\View
 */
use backend\assets\BackendAsset;
use backend\widgets\Menu;
use common\models\TimelineEvent;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$bundle = BackendAsset::register($this);
?>

<?php
	use common\widgets\DbText;

?>
	<div class="main">

	<!-- Левое меню для мобильных устройств -->
	<div class="mobile">
		<div id="sidebar">
				<img src="/images/uznews.png" alt="" class="logo"/>
			<h1><?php echo Yii::t('frontend', 'НОВОСТНОЙ ПОРТАЛ УЗБЕКИСТАНА') ?></h1>
			<ul class="nav nav-tabs">
				<li class="active"><a href="/article/?sort=new" aria-expanded="false" style="line-height: 2.9em;"><?php echo Yii::t('frontend', 'Новые') ?></a></li>
				<li><a href="/article/?sort=read" aria-expanded="true"><?php echo Yii::t('frontend', 'Самые читаемые') ?></a></li>
				<li><a href="/article/?sort=top" aria-expanded="false"><?php echo Yii::t('frontend', 'Самые обсуждаемые') ?></a></li>
			</ul>
			<div id="myTabContent1" class="tab-content">

				<!-- Вкладка 1 -->
				<div class="tab-pane fade active in" id="new1">
					<?php echo \frontend\widgets\CategriesMobileWidget::widget(['type' => 'new']); ?>
				</div>
			</div>
			
		</div>
		<div class="main-content">
			<div class="swipe-area"></div>
			<a href="#" data-toggle=".mobile" id="sidebar-toggle"
			   onclick="$('#sidebar-toggle1').toggleClass('display'); $('.replace1').toggleClass('block')"></a>

			<div class="replace"></div>
		</div>
	</div>
	<!-- !Левое меню для мобильных устройств! -->
	
	<!-- Правое меню поиск для мобильных устройств -->
	<div class="mobile1">

		<div id="sidebar1">				
			<?php echo \yii\helpers\Html::beginForm(\yii\helpers\Url::to('/article/search/'), 'get', ['class' => 'search navbar-right']); ?>
				<?php echo \yii\helpers\Html::textInput('text', '', ['placeholder' => Yii::t('frontend', 'Поиск по новостям...')]) ?>
				<?php echo \yii\helpers\Html::submitInput(''); ?>

				<?php echo \yii\helpers\Html::endForm(); ?>
			<!-- mobile lang begin -->
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" style="width:321px;margin-bottom:30px;">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 lang">
				<ul>					
					<?php if(\Yii::$app->language == 'uz') { ?>
						<li class="dropdown1" id="uzbek1">
				 		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
						aria-expanded="false" style="margin-left:24px">O'zbekcha<span class="caret"></span></a>
					 <ul class="dropdown-menu" role="menu">
						<li><a href="/site/set-locale?locale=ru-RU">Русский</a></li>
							</ul>
						</li>					
						   <?php }else { ?>
						<li class="dropdown1" id="russian1">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
								aria-expanded="false" style="margin-left:24px">Русский <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="/site/set-locale?locale=uz-UZ">O'zbekcha</a></li>
									</ul>
						</li>
								<?php } ?>
							</ul>

						</div>
					</div>
					<div class="clearfix"></div>
<!-- mobile lang end1 -->	


			<?//= $this->render('//common/informer_mobile') ?>

			<div class="col-xs-12">
				<!-- Картинка -->
				<?php echo DbText::widget(['key' => 'top_banner']) ?>

			</div>
			<div class="clearfix"></div>
		</div>
		<div class="main-content">
			<div class="swipe-area1"></div>
			<a href="#" data-toggle=".mobile1" id="sidebar-toggle1"
			   onclick="$('#sidebar-toggle').toggleClass('display'); $('.replace').toggleClass('block')"></a>

			<div class="replace1"></div>
		</div>
	</div>
	<!-- Правое меню поиск для мобильных устройств -->
	
	<!-- Правое меню для мобильных устройств -->
	<div class="mobile1">

		<div id="sidebar1">
			<!-- mobile lang begin -->
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" style="width:321px;margin-bottom:30px;">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 lang">
				<ul>					
					<?php if(\Yii::$app->language == 'uz') { ?>
						<li class="dropdown1" id="uzbek1">
				 		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
						aria-expanded="false" style="margin-left:24px">O'zbekcha<span class="caret"></span></a>
					 <ul class="dropdown-menu" role="menu">
						<li><a href="/site/set-locale?locale=ru-RU">Русский</a></li>
							</ul>
						</li>					
						   <?php }else { ?>
						<li class="dropdown1" id="russian1">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
								aria-expanded="false" style="margin-left:24px">Русский <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="/site/set-locale?locale=uz-UZ">O'zbekcha</a></li>
									</ul>
						</li>
								<?php } ?>
							</ul>

						</div>
					</div>
					<div class="clearfix"></div>
<!-- mobile lang end1 -->				




			<h2><?php echo Yii::t('frontend', 'ИНФОРМАЦИЯ НА СЕГОДНЯ') ?></h2>

			<?= $this->render('//common/informer_mobile') ?>

			<div class="col-xs-12">
				<!-- Картинка -->
				<?php echo DbText::widget(['key' => 'top_banner']) ?>

			</div>
			<div class="clearfix"></div>
			<div class="sidebar_footer_1">
			<h3><?php echo Yii::t('frontend', 'ОЦЕНИТЕ ПРИЛОЖЕНИЕ') ?></h3>
				<a href="https://appsto.re/ru/NDGScb.i">
					<img src="/images/appstore.png" alt=""/>
				</a>
				<a href="https://play.google.com/store/apps/details?id=com.today">
					<img src="/images/gplaym.png" alt=""/>
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
			<a href="#" data-toggle=".mobile1" id="sidebar-toggle1"
			   onclick="$('#sidebar-toggle').toggleClass('display'); $('.replace').toggleClass('block')"></a>

			<div class="replace1"></div>
		</div>
	</div>
	<!-- Правое меню для мобильных устройств -->

	<!-- Покрывающий слой -->

	<div id="all_content" class="closed">
	<header>
		<div id="search">
		  <div class="container-2">
		  <form action="/article/search/" method="get">
			  <input id="search1" name="text" type="search1" placeholder=""><input id="search_submit1" value="Rechercher" type="submit">
			</form>
		  </div>			  
		</div>

		<div class="top">
			<div class="container-fluid">
				<div class="container">

					<?php echo \frontend\widgets\FastWidget::widget(); ?>

					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 lang">
							<ul>
								<?php if(\Yii::$app->language == 'uz') { ?>
								<li class="dropdown" id="uzbek">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
									   aria-expanded="false">O'zbekcha<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="/site/set-locale?locale=ru-RU">Русский</a></li>
									</ul>
								</li>
								<?php }else { ?>
									<li class="dropdown" id="russian">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
										   aria-expanded="false">Русский <span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu">
											<li><a href="/site/set-locale?locale=uz-UZ">O'zbekcha</a></li>
										</ul>
									</li>
								<?php } ?>
							</ul>

						</div>
						<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 buttons">
							<?php
								$guest = Yii::$app->user->isGuest;
								if ($guest) { ?>
									<a href="/user/sign-in/login" class="enter_btn btn"><?php echo Yii::t('frontend', 'Вход') ?></a>
									<a href="/user/sign-in/signup" class="registration_btn btn"><?php echo Yii::t('frontend', 'Регистрация') ?></a>
								<?php } else { ?>
									<a href="/user/sign-in/login" class="enter_btn btn"><?php echo Yii::t('frontend', 'Профиль') ?></a>
						<?php echo Html::a(Yii::t('frontend', 'Logout'), ['/user/sign-in/logout'], ['class'=>'enter_btn btn', 'data-method' => 'post']) ?>
								<?php } ?>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- End .top -->
		<div class="container">
			<div class="mobile_cont">
				<div class="col-md-3 col-sm-3 col-xs-12 logo2">
					<a href="/"><img src="/images/logo1.png" alt=""/></a>
				</div>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<nav class="mobile_menu">
						<?php echo \frontend\widgets\TopmenuWidget::widget(['type' => 'top_menu_mobile']); ?>
						<div class="clearfix"></div>
					</nav>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 title_cont">
				<div class="title">
					<h1><?php echo Yii::t('frontend', 'НОВОСТНОЙ ПОРТАЛ<br/>УЗБЕКИСТАНА') ?></h1>

					<h2>www.today.uz</h2>
				</div>
				<ul class="social">
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus"></a></i></li>
				</ul>
				<ul class="app">
					
					
				</ul>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form_cont">
				<?php echo \yii\helpers\Html::beginForm(\yii\helpers\Url::to('/article/search/'), 'get', ['class' => 'search navbar-right']); ?>
				<?php echo \yii\helpers\Html::textInput('text', '', ['placeholder' => Yii::t('frontend', 'Поиск по новостям...')]) ?>
				<?php echo \yii\helpers\Html::submitInput(''); ?>

				<?php echo \yii\helpers\Html::endForm(); ?>
				<?php if(\Yii::$app->language == 'uz') { ?>
					<a href="/"><img src="/images/logo_uz.png" alt="" class="logo navbar-right"/></a>
				<?php } else { ?>
					<a href="/"><img src="/images/logo.png" alt="" class="logo navbar-right"/></a>
				<?php } ?>



				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<?= $this->render('//common/informer') ?>
			<!-- Меню -->
			<nav class="navbar navbar-inverse">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
							data-target="#bs-example-navbar-collapse-2">
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
			<!-- !Меню! -->
		</div>
		<!-- End .container -->
	</header>
	<div class="container">

