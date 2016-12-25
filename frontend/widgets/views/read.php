<?php
	use yii\helpers\Html;
	use yii\helpers\Url;

?>
<!--- Самые читаемые--->

<h3 class="block_title"><a href="/article/?sort=read" aria-expanded="true"><?php echo Yii::t('frontend', 'Самые <strong>читаемые</strong>') ?></a></h3>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="thumbnail">
		<div class="hover">
			<ul class="social">
				<li><a href="http://www.facebook.com/share.php?u=<?= Url::to('@frontendUrl'). Url::to(['article/view', 'slug' => $result[0]['slug']]) ?>&title=<?php echo $result[0]['title'] ?>"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://plus.google.com/share?url=<?= Url::to('@frontendUrl').  Url::to(['article/view', 'slug' => $result[0]['slug']]) ?>"><i class="fa fa-plus"></i></a></li>
				<li><a href="http://twitter.com/home?status=<?php echo $result[0]['title'] ?>+<?=Url::to('@frontendUrl').  Url::to(['article/view', 'slug' => $result[0]['slug']]) ?>"><i class="fa fa-twitter"></i></a></li>
				<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?= Url::to('@frontendUrl'). Url::to(['article/view', 'slug' => $result[0]['slug']]) ?>&title=<?php echo $result[0]['title'] ?>&source=[SOURCE/DOMAIN]"><i class="fa fa-linkedin"></i></a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="comment" style="display:none"><?= $result[0]['comments'] ?></div>
		<div class="caption">
			<?= $result[0]['title'] ?>
		</div>
		<img src="<?= Yii::$app->glide->createSignedUrl([
			'glide/index',
			'path' => $result[0]['thumbnail_path'],
			'w'    => 314,
			'h'    => 209,
			'fit'  => 'crop'
		], true) ?>" alt=""/>
	</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 news">
	<?php foreach ($result as $key => $item) {
		if ($key == 0) continue;
		?>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 thumbnail"><!---! col-lg-6 col-md-6 col-sm-6 col-xs-12 !--->
			<a href="<?= Url::to(['article/view', 'slug' => $item['slug']]) ?>">
				<img src="<?= Yii::$app->glide->createSignedUrl([
					'glide/index',
					'path' => $item['thumbnail_path'],
					'w'    => 200,
					'h'    => 133,
					'fit'  => 'crop'
				], true) ?>" alt=""/>
			</a>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style=""><!---! col-lg-6 col-md-6 col-sm-6 col-xs-12  style=width:70%--->
			<a href="<?= Url::to(['article/view', 'slug' => $item['slug']]) ?>">
				<h4 style=""><?= $item['title'] ?></h4>
				<span class="meta"><?=Yii::$app->formatter->asDatetime($item['published_at'])?></span>
			</a>
		</div>
		<div class="clearfix"></div>
	<?php } ?>

	<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<!---! Самые читаемые !--->