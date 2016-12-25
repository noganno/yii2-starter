<?php
	namespace frontend\controllers;

	use Yii;
	use common\models\User;
	use yii\data\ActiveDataProvider;
	use yii\web\Controller;
	use yii\web\NotFoundHttpException;
	use yii\filters\VerbFilter;
	use yii\filters\auth\CompositeAuth;
	use yii\filters\auth\HttpBasicAuth;
	use yii\filters\auth\HttpBearerAuth;
	use yii\filters\auth\QueryParamAuth;


	class LoginController extends Controller
	{
		public $modelClass = 'common\models\User';

	/*	public function behaviors()
		{
			$behaviors = parent::behaviors();
			$behaviors['authenticator']['class'] = HttpBasicAuth::className();
			$behaviors['authenticator']['auth'] = function ($username, $password) {
				return \common\models\User::findOne([
					'username' => $username,
					'password' => $password,
				]);
			};

			return $behaviors;
		}*/
		
		public function auth(){
			echo '<pre>' . __LINE__ . ' ' . __FILE__ . '<br>';
			print_r($_REQUEST);
			echo '</pre>';
		}


	}