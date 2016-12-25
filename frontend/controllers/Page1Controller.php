<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:01 PM
 */

namespace frontend\controllers;

use Yii;
use common\models\Page1;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class Page1Controller extends Controller
{
	public function behaviors()
		{
			return [
				[
					'class' => 'yii\filters\PageCache',
					'only' => ['index', 'view'],
					'duration' => 3660,
					'variations' => [
						\Yii::$app->language,
					]
				],
			];
		}
		
    public function actionView($slug)
    {
        $model = Page1::find()->where(['slug'=>$slug, 'status'=>Page1::STATUS_PUBLISHED])->one();
        if (!$model) {
            throw new NotFoundHttpException(Yii::t('frontend', 'Page not found'));
        }

        $viewFile = $model->view ?: 'view';
        return $this->render($viewFile, ['model'=>$model]);
    }
}