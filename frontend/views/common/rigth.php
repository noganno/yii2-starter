<?php
	use common\widgets\DbText;
?>


<aside class="col-lg-4 col-md-4 col-sm-4">

	<?php echo DbText::widget(['key' => 'rigth_banner']) ?>	<!--- Баннер -->

	<h3 class="block_title"><a href="/article/?sort=read" aria-expanded="true" style="color:#000;"><?php echo Yii::t('frontend', 'Самые <strong>читаемые</strong>') ?></a></h3>

	<?php echo \frontend\widgets\ReadrWidget::widget(); ?>

	<?php echo DbText::widget(['key' => 'rigth_banner2']) ?>

	<h3 class="block_title"><a href="/article/?sort=top" aria-expanded="false" style="color:#000;"><?php echo Yii::t('frontend', 'Самые <strong>обсуждаемые</strong>') ?></a></h3>

	<?php echo \frontend\widgets\TopWidget::widget(); ?>

	<?php echo \frontend\widgets\QuoteWidget::widget(); ?>

	<?php //echo \frontend\widgets\TagsWidget::widget() ?>

	<?php echo DbText::widget(['key' => 'rigth_banner3']) ?>


</aside>

<div class="clearfix"></div>

<!--- Баннер  --->
<?php echo DbText::widget(['key' => 'bottom_baner']) ?>
<!-----!Баннер!-------->