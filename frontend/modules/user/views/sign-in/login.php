<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use common\widgets\DbText;

	/* @var $this yii\web\View */
	/* @var $form yii\widgets\ActiveForm */
	/* @var $model \frontend\modules\user\models\LoginForm */

	$this->title = Yii::t('frontend', 'Login');
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-8 col-md-8 col-sm-8">

	<h1 class="pagetitle"><?php echo Html::encode($this->title) ?></h1>
	<!-- Картинка -->
	<?php echo DbText::widget(['key' => 'login_baner']) ?>
	<!---->

	<!--- Форма ------>
	<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
	<div class="forgot">
		<p>Введите логин и пароль для входа</p>
		<fieldset>
			<?php echo $form->field($model, 'identity', ['inputOptions' => ['class' => '', 'id' => 'login']]) ?>

		</fieldset>
		<fieldset>
			<?php echo $form->field($model, 'password', ['inputOptions' => ['class' => '']])->passwordInput() ?>
		</fieldset>
		<?php echo Html::submitInput(Yii::t('frontend', 'Login'), ['class' => '', 'name' => 'login-button']) ?>
		<p class="or">ИЛИ</p>
		<?php echo yii\authclient\widgets\AuthChoice::widget([
			'baseAuthUrl' => ['/user/sign-in/oauth']
		]) ?>
		<div class="col-lg-6 col-xs-6">
			<?php echo Yii::t('frontend', 'If you forgot your password you can reset it <a href="{link}">here</a>', [
				'link' => yii\helpers\Url::to(['sign-in/request-password-reset'])
			]) ?>
		</div>
		<div class="col-lg-6 col-xs-6 registr">
			<?php echo Html::a(Yii::t('frontend', 'Need an account? Sign up.'), ['signup']) ?>
		</div>
		<div class="clearfix"></div>
	</div>
	<?php ActiveForm::end(); ?>

	<!------! Форма !--->

	<?php /* ?>
	<div class="site-login">
    <h1><?php echo Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?php echo $form->field($model, 'identity') ?>
                <?php echo $form->field($model, 'password')->passwordInput() ?>
                <?php echo $form->field($model, 'rememberMe')->checkbox() ?>
                <div style="color:#999;margin:1em 0">
                    <?php echo Yii::t('frontend', 'If you forgot your password you can reset it <a href="{link}">here</a>', [
                        'link'=>yii\helpers\Url::to(['sign-in/request-password-reset'])
                    ]) ?>
                </div>
                <div class="form-group">
                    <?php echo Html::submitButton(Yii::t('frontend', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
                <div class="form-group">
                    <?php echo Html::a(Yii::t('frontend', 'Need an account? Sign up.'), ['signup']) ?>
                </div>
                <h2><?php //echo Yii::t('frontend', 'Log in with')  ?></h2>
                <div class="form-group">
                    <?php /*echo yii\authclient\widgets\AuthChoice::widget([
                        'baseAuthUrl' => ['/user/sign-in/oauth']
                    ]) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php */ ?>
</div>