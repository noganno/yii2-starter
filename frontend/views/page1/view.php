<?php
	/**
	 * @var $this \yii\web\View
	 * @var $model \common\models\Page
	 */
	$this->title = $model->title;

?>
<div class="col-lg-8 col-md-8 col-sm-8">

		<h1><?php echo $model->title ?></h1>
		<?php echo $model->body ?>

</div>