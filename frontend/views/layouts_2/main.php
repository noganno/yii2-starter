<?php
	/* @var $this \yii\web\View */
	use yii\helpers\ArrayHelper;
	use yii\widgets\Breadcrumbs;

	$this->beginContent('@frontend/views/layouts/base.php')
?>

<?= $this->render('//common/top') ?>

<?php echo $content ?>

<?= $this->render('//common/rigth') ?>

<?= $this->render('//common/footer') ?>

<?php $this->endContent() ?>