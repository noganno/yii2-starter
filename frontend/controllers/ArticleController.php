<?php

namespace frontend\controllers;

use common\models\Article;
use common\models\ArticleAttachment;
use common\models\ArticleCategory;
use frontend\models\search\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;
use yii\db\Query;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class ArticleController extends Controller
{
	public function beforeAction($action)
		{
			$this->enableCsrfValidation = false;

			return parent::beforeAction($action);
		}
		
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
    /**
     * @return string
     */
    public function actionIndex()
		{
			$this->processPageRequest('page');

			$query = Article::find();
			$query->join('LEFT JOIN', 'article_category', 'article_category.id = article.category_id');

			if(\Yii::$app->getRequest()->get('sort')) {
				switch(\Yii::$app->getRequest()->get('sort')) {
					case 'new':
						$query->orderBy(['article.id' => SORT_DESC]);
						break;
					case 'top':
						$query->orderBy(['article.comments' => SORT_DESC]);
						break;
					case 'read':
						$query->orderBy(['article.views' => SORT_DESC]);
						break;
				}
			} else {
				$query->orderBy(['article.id' => SORT_DESC]);
			}

			$countQuery = clone $query;

			$pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);

			$pages->pageSizeParam = false;
			$models = $query->offset($pages->offset)
				->limit($pages->limit)
				->all();

			if (\Yii::$app->getRequest()->getIsAjax()) {
				return $this->renderPartial('view_ajax', [
					'models' => $models,
					'pages'  => $pages
				]);
				Yii::app()->end();
			} else {
				return $this->render('index', [
					'models' => $models,
					'pages'  => $pages
				]);
			}
			
		}
    /**
     * @return string
     */
    public function actionSearch($text)
    {
		$query = Article::find();
		$query->filterWhere(['like', 'title', $text])
			->orFilterWhere(['like', 'body', $text])
			->orFilterWhere(['like', 'body_uz', $text])
			->orFilterWhere(['like', 'body_uz', $text]);

		$countQuery = clone $query;

		$pages = new Pagination(['totalCount' => $countQuery->count()]);
		$pages->setPageSize(30);

		$model = $query->offset($pages->offset)->limit($pages->limit)->all();

		$request = \Yii::$app->request;

		return $this->render('search', ['models' => $model, 'pages' => $pages, 'request' => $request]);
    }
    /**
     * @return string
     */
    public function actionTags()
    {
		$tag = \Yii::$app->getRequest()->get('slug');
		$query = new Query();
		$result = $query->select('article_id')->distinct()->from('tags')->where(['like', 'name', $tag])->orderBy(['id' => SORT_DESC])->all();

		foreach ($result as $item) {
			$arrArticle[] = $item['article_id'];
		}

		$query = Article::find();
		$query->where([
			'status' => 1,
			'id' => $arrArticle,
		]);

		$countQuery = clone $query;

		$pages = new Pagination(['totalCount' => $countQuery->count()]);
		$pages->setPageSize(30);

		$model = $query->offset($pages->offset)->limit($pages->limit)->all();

		$request = \Yii::$app->request;



		return $this->render('tags', ['models' => $model, 'pages' => $pages, 'request' => $request]);
    }

    /**
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($slug)
    {
        $model = Article::find()->published()->andWhere(['slug'=>$slug])->one();
		
        $query = Article::find();
        $query->join('LEFT JOIN', 'article_category', 'article_category.id = article.category_id');
        $query->where(['article_category.id' => 'article.category_id']);
        $query->where(['article.slug' => $slug]);
        $models2 = $query->one();

        if (!$model) {
            throw new NotFoundHttpException;
        }


        $model->updateCounters(['views' => 1]);

        $viewFile = $model->view ?: 'view';
		
		$result = [];
        if(!empty($model->tags)) {
				$arr = explode(',', $model->tags );
				$query = Article::find();

				foreach ($arr as $item) {
					$query->orFilterWhere(['like', 'tags', trim($item)]);
				}
				$query->andWhere('id !='.$model->id);
				$query->limit(10);
				$query->orderBy(['id' => SORT_DESC]);
				$result = $query->all();
			}

			return $this->render($viewFile, ['model' => $model, 'tags' => $result]);
    }

    public function actionAttachmentDownload($id)
    {
        $model = ArticleAttachment::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException;
        }

        return \Yii::$app->response->sendStreamAsFile(
            \Yii::$app->fileStorage->getFilesystem()->readStream($model->path),
            $model->name
        );
    }
	
	protected function processPageRequest($param = 'page')
	{
		if (\Yii::$app->request->getIsAjax() && isset($_POST[$param]))
			$_GET[$param] = \Yii::$app->request->post($param);
	}

}
