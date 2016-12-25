<?php
namespace frontend\controllers;

use Yii;
use frontend\models\ContactForm;
use yii\web\Controller;
use yii\db\Query;
use common\models\Page;
use common\models\User;
use yii\web\Response;
use yii\helpers\Html;
use yii\db\Expression;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'set-locale'=>[
                'class'=>'common\actions\SetLocaleAction',
                'locales'=>array_keys(Yii::$app->params['availableLocales'])
            ]
        ];
    }

    public function actionIndex()
    {

		$query = new Query();
		$query_advert = $query->from('article')->orderBy('id desc');
		$command = $query_advert->where('category_id=1');
		$command = $query_advert->limit(2);
		$result_news = $command->all();
		$count_news = $command->count();

		$about_quert = Page::find()->where(['slug'=>'about', 'status'=>Page::STATUS_PUBLISHED])->one();

        return $this->render('index', [
			'news' => $result_news,
			'about' => $about_quert
		]);
    }



    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'),
                    'options'=>['class'=>'alert-success']
                ]);
                return $this->refresh();
            } else {
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>\Yii::t('frontend', 'There was an error sending email.'),
                    'options'=>['class'=>'alert-danger']
                ]);
            }
        }

        return $this->render('contact', [
            'model' => $model
        ]);
    }

    public function actionBlockout()
    {
		$query = new Query();
		$result = $query->from('quote')->where('status=1')->orderBy(new Expression('rand()'))->limit(1)->all();
		$i = 0;
		foreach ($result as $item) {

			if(\Yii::$app->language == 'uz') {

				$result[$i]['title'] = $item['title_uz'];
				$result[$i]['body'] = $item['body_uz'];
			}
			$i++;
		}
		$this->setHeader(200);
		echo json_encode(array('status' => 1, 'title' => $result[0]['title'], 'body' => $result[0]['body']), JSON_PRETTY_PRINT);
		die;
    }
	
	public function actionAuth()
	{
		$post = Yii::$app->request->get();

		$model = User::findOne(["email" => $post["email"]]);
		if (empty($model))
			throw new \yii\web\NotFoundHttpException('User not found');
		
		if ($model->validatePassword($post["password"])) {
			$model->save(false);

			if (!$model) {
				\Yii::$app->response->format = Response::FORMAT_JSON;
				return null;
			}

			\Yii::$app->response->format = Response::FORMAT_JSON;

			return ($model);//return whole user model including auth_key or you can just return $model["auth_key"];

		} else {			
			\Yii::$app->response->format = Response::FORMAT_JSON;
			throw new \yii\web\ForbiddenHttpException();
			die;
		}
	}
	
		/**
		 * Requests password reset.
		 *
		 * @return mixed
		 */
		public function actionRequestPasswordReset()
		{
			$user = User::findOne([
				'status' => User::STATUS_ACTIVE,
				'email'  => Yii::$app->request->get('email'),
			]);

			if ($user) {

				$user->generatePasswordResetToken();
				if ($user->save()) {

					$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['/user/sign-in/reset-password', 'token' => $user->password_reset_token]);

					$text = 'Hello ' . $user->username . ', Follow the link below to reset your password:';
					$text .= Html::a(Html::encode($resetLink), $resetLink);
					mail(Yii::$app->request->get('email'), 'Password reset for ' . \Yii::$app->name, $text);
					return 'Check your email';
				}
			}

			return 'Not found email';
		}
		

	/**
	 * Logs out the current user.
	 *
	 * @return mixed
	 */
	public function actionLogout()
	{
		Yii::$app->user->logout();

		return $this->goHome();
	}

	private function setHeader($status)
	{

		$status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
		$content_type = "application/json; charset=utf-8";

		header($status_header);
		header('Content-type: ' . $content_type);
		header('X-Powered-By: ' . "Nintriva <nintriva.com>");
	}

	private function _getStatusCodeMessage($status)
	{
		$codes = Array(
			200 => 'OK',
			400 => 'Bad Request',
			401 => 'Unauthorized',
			402 => 'Payment Required',
			403 => 'Forbidden',
			404 => 'Not Found',
			500 => 'Internal Server Error',
			501 => 'Not Implemented',
		);

		return (isset($codes[$status])) ? $codes[$status] : '';
	}

}
