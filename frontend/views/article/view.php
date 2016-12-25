<?php
	/* @var $this yii\web\View */
	/* @var $model common\models\Article */
	use common\widgets\DbText;
	use yii\helpers\Url;
	use yii\helpers\Html;

	$this->title = $model->title;
	if(!empty($model->description)) {
		$this->registerMetaTag([
			'name' => 'description',
			'content' => $model->description
		]);
	} else {
		$this->registerMetaTag([
			'name' => 'description',
			'content' => \yii\helpers\StringHelper::truncate(strip_tags($model->body), 150)
		]);
	}

	$this->registerMetaTag([
		'name' => 'title',
		'content' => $model->title
	]);
	$this->registerMetaTag([
		'property' => 'og:title',
		'content' => $model->title
	]);
	$this->registerMetaTag([
		'property' => 'og:image',
		'content' => 'http://storage.today.dev/cache/'.$model->thumbnail_path
	]);
	$this->registerMetaTag([
		'property' => 'og:description',
		'content' => $model->body
	]);
	$this->registerMetaTag([
		'property' => 'og:url',
		'content' => $model->body
	]);
	$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Articles'), 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>

<link rel="image_src" href="<?= 'http://storage.today.dev/cache/'.$model->thumbnail_path ?>" />

<!--- Баннер  -->
<?php echo DbText::widget(['key' => 'top_banner']) ?>
<!-----!Баннер!-->

<!--- Левый контент -->
<div class="col-lg-8 col-md-8 col-sm-8">
	<article>
	<div class="myartimg">
		<p>
			<time><?php echo Yii::$app->formatter->asDatetime($model->created_at) ?></time>
			<?php echo Yii::t('frontend', '') ?> <?php echo $model->category->title ?></p>
		<?php if ($model->thumbnail_path): ?>
			<?php echo \yii\helpers\Html::img(
				Yii::$app->glide->createSignedUrl([
					'glide/index',
					'path' => $model->thumbnail_path,
					'w'    => 960,
					'fit'  => 'crop'
				], true),
				['class' => 'article-thumb img-rounded pull-left']
			) ?>
		<?php endif; ?>
	</div>
		<h1 class="block_title headline"><?php echo $model->title ?></h1>
	<div class="myartiframe">	
		<?php echo $model->body ?>
	</div>	
		<!-- Banner Google play App Store -->
		<div class="single_footer clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 my_banner_ga"><p><?php echo Yii::t('frontend', 'Today.uz скачивайте мобильный приложение') ?></p></div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="download1" style="margin-top:3px;">
					<a href="https://appsto.re/ru/NDGScb.i" class="download_link"><img src="/images/app_store.png" height="38" width="122" alt=""></a>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="download1" style="padding:0px;">
					<a href="#" class="download_link1"><img src="/images/today1.png" height="64" width="64" alt=""></a>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="download1">
					<a href="https://play.google.com/store/apps/details?id=com.today" class="download_link"><img src="/images/gplay.png" height="38" width="122" alt=""></a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

		<!-- Комменты -->		
		<div class="single_footer clearfix">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 share"><?php echo Yii::t('frontend', 'Поделиться новостью') ?>:</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

				<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
				<script src="//yastatic.net/share2/share.js"></script>
				<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir"></div>


				<script type="text/javascript">(function() {
						if (window.pluso)if (typeof window.pluso.start == "function") return;
						if (window.ifpluso==undefined) { window.ifpluso = 1;
							var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
							s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
							s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
							var h=d[g]('body')[0];
							h.appendChild(s);
						}})();</script>
				<div class="pluso" data-background="transparent" data-options="small,square,line,horizontal,nocounter,theme=08" data-services="facebook,twitter,google"></div>

				<ul class="social">
					<li><a target="_blank" href="http://www.facebook.com/share.php?u=<?= Url::to('@frontendUrl'). Url::to(['article/view', 'slug' => $model->slug]) ?>&title=<?php echo $model->title ?>"> <img src="/images/fb_icon.png"> </a></li>
					<li><a href="http://twitter.com/home?status=<?php echo $model->title ?>+<?= Url::to('@frontendUrl'). Url::to(['article/view', 'slug' => $model->slug]) ?>"> <img src="/images/tw_icon.png"> </a></li>
					<li><a href="https://plus.google.com/share?url=<?= Url::to('@frontendUrl'). Url::to(['article/view', 'slug' => $model->slug]) ?>">
<img src="/images/google_icon.png"> </a></li>
					<!--<li><a href="#">
<img src="/images/telg_icon.png" style="width:27px"> </a></li>-->
					<!--<li><a href="#"><img src="/images/share_icon.png"></a></li>-->

					</a>
				</ul>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><?php echo Yii::t('frontend', 'Комментариев') ?>: <?php echo $model->comments ?></div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><a href="/user/sign-in/login" class="big"><?php echo Yii::t('frontend', 'КОММЕНТИРОВАТЬ') ?></a></div>
			<div class="clearfix"></div>
		</div>

		<div class="comments">
			<?= \net\frenzel\comment\views\widgets\Comments::widget(['model' => $model]); ?>
			<div class="clearfix"></div>
		</div>
	</article>
	<div class="clearfix"></div>
	
		<h3 class="block_title"><!--Похожие<strong> Новости</strong>--><?php echo Yii::t('frontend', 'ПОХОЖИЕ <strong>НОВОСТИ</strong>') ?></h3>

	<?php foreach ($tags as $tag) {?>
	<article class="last_news">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 thumbnail">
			<div class="comment" style="display:none"><?php echo $tag->comments ?></div>
			<?php echo Html::img(
				Yii::$app->glide->createSignedUrl([
					'glide/index',
					'path' => $tag->thumbnail_path,
					'w'    => 200,
					'h' => 133,
					'fit' => 'crop'
				], true),
				['class' => 'article-thumb img-rounded pull-left']
			) ?>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
			<h3>
				<?php echo Html::a($tag->title, ['article/view', 'slug' => $tag->slug]) ?>
			</h3>
			<p class="meta">
				<div class="my_meta">
					<ul>
						<li><span class="date"><?php echo Yii::$app->formatter->asDatetime($tag->created_at) ?> </span> <?php echo Yii::t('frontend', '') ?> <span class="author">,</span></li>
						<li><img src="../../images/views12.png" /></li>
						<li><span class="views"><?php echo $tag->views; ?>,</span> <?php echo Yii::t('frontend', '') ?>
							<a href="<?= Url::to(['category/view', 'slug' => $tag->category->slug]) ?>"><?= $tag->category->title ?></a></li>
					</ul>
				</div>
			</p>
			<div class="my_content">
				<p class="content1">
					<?php echo \yii\helpers\StringHelper::truncate(strip_tags($tag->body), 150) ?>
				</p>
			</div>						
		</div>
		<div class="clearfix"></div>
	</article>
	<div><div class="clearfix"></div></div>
	
	<?php } ?>
	
	
</div>
<!-- !Левый контент! -->

