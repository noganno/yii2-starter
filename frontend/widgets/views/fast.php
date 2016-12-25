<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
?>
<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 attention"><?php echo Yii::t('frontend', 'Срочно') ?></div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-7 text">
		<div class="carousel owl-carousel owl-theme">
			<?php foreach ($result as $key => $item) { ?>
			<div class="item">
				<p><a href="<?= Url::to(['article/view', 'slug' => $item['slug']]) ?>"><?= $item['title'] ?></a></p>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="clearfix"></div>
</div>