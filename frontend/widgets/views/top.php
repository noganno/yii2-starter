<?php
	use yii\helpers\Html;
	use yii\helpers\Url;

?>
<?php foreach ($result as $key => $item) {
?>
<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 img">
		<img src="<?= Yii::$app->glide->createSignedUrl([
			'glide/index',
			'path' => $item['thumbnail_path'],
			'w'    => 70,
			'h'    => 70,
			'fit'  => 'crop'
		], true) ?>" alt=""/>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
		<a href="<?= Url::to(['article/view', 'slug' => $item['slug']]) ?>">
			<h4><?php echo $item['title'] ?></h4>
			<span class="meta"><?=Yii::$app->formatter->asDatetime($item['published_at'])?></span>
		</a>
	</div>
</div>
<?php } ?>