<?php
	/* @var $this \yii\web\View */
	use yii\helpers\ArrayHelper;
	use yii\widgets\Breadcrumbs;

	$this->beginContent('@frontend/views/layouts/base.php');
	$this->registerLinkTag([
    'rel' => 'shortcut icon',
    'type' => 'image/x-icon',
    'href' => '/favicon.png',
]);

?>

<?= $this->render('//common/top') ?>

<?php echo $content ?>

<?= $this->render('//common/rigth') ?>

<?= $this->render('//common/footer') ?>

<?php $this->endContent() ?>