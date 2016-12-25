<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
?>
<!--- Интересное видео ---->
<h3 class="block_title"><a href="<?= Url::to(['category/view', 'slug' => 'video']) ?>"><?php echo Yii::t('frontend', 'Интересное <strong>видео</strong>') ?></a></h3>

<div class="row video-box">
	<?php foreach ($result as $key => $item) {?>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6"><!-- col-lg-4 col-md-4 col-sm-6 col-xs-12  -->
	
		<div class="myvideo">
		<a href="<?= Url::to(['article/view', 'slug' => $item['slug']]) ?>"><div class="my_play" style="display:block;"></div></a>
			<a href="<?= Url::to(['article/view', 'slug' => $item['slug']]) ?>"><img src="<?= Yii::$app->glide->createSignedUrl([
				'glide/index',
				'path' => $item['thumbnail_path'],
				'w'    => 193,
				'h'    => 140,
				'fit'  => 'crop'
			], true) ?>" alt=""/></a>
		</div>
	</div>
	<?php } ?>
</div>
<!--- !Интересное видео! ---->