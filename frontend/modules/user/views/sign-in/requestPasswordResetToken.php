<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use common\widgets\DbText;

	/* @var $this yii\web\View */
	/* @var $form yii\widgets\ActiveForm */
	/* @var $model \frontend\modules\user\models\PasswordResetRequestForm */

	$this->title = Yii::t('frontend', 'Request password reset');
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-8 col-md-8 col-sm-8">

	<h1 class="pagetitle">РЕГИСТРАЦИЯ</h1>
	<!-- Картинка -->
	<?php echo DbText::widget(['key' => 'login_baner']) ?>
	<!--- Форма ------>

	<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
		<div class="forgot">
			<p>Введите электронную почту, на которую будет выслана информация по восстановлению.</p>
			<fieldset>
				<?php echo $form->field($model, 'email', ['inputOptions' => ['class' => '', 'id' => 'mail', 'placeholder' => 'ЭЛЕКТРОННАЯ ПОЧТА']]) ?>
			</fieldset>
			<?php echo Html::submitInput(Yii::t('ВОССТАНОВИТЬ ПАРОЛЬ', 'ВОССТАНОВИТЬ ПАРОЛЬ'), ['class' => '']) ?>

			<!---->
			<div class="col-lg-6 col-xs-6">
				<a href="/user/sign-in/signup">Регистрация</a>
			</div>
			<div class="col-lg-6 col-xs-6 registr">
				<a href="/user/sign-in/login">Вход</a>
			</div>
			<div class="clearfix"></div>
		</div>
	<?php ActiveForm::end(); ?>

<?php /*?>
	<div class="site-request-password-reset">
		<h1><?php echo Html::encode($this->title) ?></h1>

		<div class="row">
			<div class="col-lg-5">
				<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
				<?php echo $form->field($model, 'email') ?>
				<div class="form-group">
					<?php echo Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
				</div>
				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>

 <?php */?>

</div>
