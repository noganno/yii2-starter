<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
?>

<h3 class="block_title"><a href="/article/?actual=1"><?php echo Yii::t('frontend', 'АКТУАЛЬНО <strong>СЕЙЧАС</strong>') ?></a></h3>

<!--- Карусель --->
<div class="carousel_2 owl-carousel owl-theme">
	<?php foreach ($result as $key => $item) { ?>
	<div class="item">
		<div class="comment" style="display:none"><?= $item['comments'] ?></div>
		<img src="<?= Yii::$app->glide->createSignedUrl([
			'glide/index',
			'path' => $item['thumbnail_path'],
			'w'    => 200,
			'h' => 133,
			'fit' => 'crop'
		], true) ?>" alt="">

		<div class="caption">
			<a style="color: #fff" href="<?= Url::to(['article/view', 'slug' => $item['slug']]) ?>"><?= $item['title'] ?></a>
		</div>
	</div>
	<?php } ?>

</div><!-----!Карусель!-------->
