<?php use yii\helpers\Url; ?>
<?php 
	if(count($result) == 0 )
		return;
?>
<div class="carousel_1 owl-carousel owl-theme">
	<?php foreach ($result as $item) { ?>
		<div class="item">
			<a href="<?= Url::to(['article/view', 'slug' => $item['slug']]) ?>"><img src="<?= Yii::$app->glide->createSignedUrl([
				'glide/index',
				'path' => $item['thumbnail_path'],
				'w'    => 960,
				'h' => 400,
				'fit' => 'crop'
			], true) ?>" alt=""/></a>

			<div class="caption">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 red">
					<?php echo Yii::t('frontend', 'НОВОСТЬ ДНЯ') ?>:
				</div>
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 black">
					<?= $item['title'] ?>
				</div>
			</div>
		</div>
	<?php } ?>
</div><!-----!Слайдер!-------->