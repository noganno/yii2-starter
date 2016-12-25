<?php
	use common\widgets\DbText;
?>


<aside class="col-lg-4 col-md-4 col-sm-4">

	<?php echo DbText::widget(['key' => 'rigth_banner']) ?>	<!--- Баннер -->

	<h3 class="block_title">Самые <strong>читаемое</strong></h3>

	<?php echo \frontend\widgets\ReadrWidget::widget(); ?>

	<?php echo DbText::widget(['key' => 'rigth_banner2']) ?>

	<h3 class="block_title">Самые <strong>обсуждаемые</strong></h3>

	<?php echo \frontend\widgets\TopWidget::widget(); ?>

	<?php echo DbText::widget(['key' => 'rigth_banner3']) ?>

</aside>

<div class="clearfix"></div>

<!--- Баннер  --->
<?php echo DbText::widget(['key' => 'bottom_baner']) ?>
<!-----!Баннер!-------->