<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use common\widgets\DbText;

	/* @var $this yii\web\View */
	/* @var $form yii\widgets\ActiveForm */
	/* @var $model \frontend\modules\user\models\SignupForm */

	$this->title = Yii::t('frontend', 'Signup');
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-8 col-md-8 col-sm-8">

	<h1 class="pagetitle"> РЕГИСТРАЦИЯ</h1>
	<!-- Картинка -->
	<?php echo DbText::widget(['key' => 'login_baner']) ?>
	<!--- Форма ------>
	<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
		<div class="forgot">
			<p>Введите желаемый логин и пароль для регистрации</p>
			<fieldset>
				<?php echo $form->field($model, 'username', ['inputOptions' => ['class' => '', 'id' => 'login', 'placeholder' => 'ЛОГИН']]) ?>
			</fieldset>
			<fieldset>
				<?php echo $form->field($model, 'email', ['inputOptions' => ['class' => '', 'id' => 'mail', 'placeholder' => 'ЭЛЕКТРОННАЯ ПОЧТА']]) ?>

			</fieldset>
			<fieldset>
				<?php echo $form->field($model, 'password', ['inputOptions' => ['class' => '', 'placeholder' => 'ЖЕЛАЕМЫЙ ПАРОЛЬ']])->passwordInput() ?>
			</fieldset>
			<?php echo Html::submitButton(Yii::t('ЗАРЕГИСТРИРОВАТЬСЯ', 'ЗАРЕГИСТРИРОВАТЬСЯ'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>

			<div class="col-lg-6 col-xs-6">
				<a href="/user/sign-in/request-password-reset">Забыли пароль?</a>
			</div>
			<div class="col-lg-6 col-xs-6 registr">
				<a href="/user/sign-in/login">Вход</a>
			</div>
			<div class="clearfix"></div>
		</div>
	<?php ActiveForm::end(); ?>

	<!------! Форма !--->


	<?php /* ?>
	<div class="site-signup">
		<h1><?php echo Html::encode($this->title) ?></h1>

		<div class="row">
			<div class="col-lg-5">
				<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
				<?php echo $form->field($model, 'username') ?>
				<?php echo $form->field($model, 'email') ?>
				<?php echo $form->field($model, 'password')->passwordInput() ?>
				<div class="form-group">
					<?php echo Html::submitButton(Yii::t('frontend', 'Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
				</div>
				<h2><?php //echo Yii::t('frontend', 'Sign up with')  ?></h2>

				<div class="form-group">
					<?php /*echo yii\authclient\widgets\AuthChoice::widget([
                        'baseAuthUrl' => ['/user/sign-in/oauth']
                    ])  ?>
				</div>
				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
 <?php */ ?>
</div>
