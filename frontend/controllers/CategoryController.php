<?php
	/**
	 * Created by PhpStorm.
	 * User: zein
	 * Date: 7/4/14
	 * Time: 2:01 PM
	 */

	namespace frontend\controllers;

	use common\models\Article;
	use common\models\ArticleAttachment;
	use common\models\ArticleCategory;
	use frontend\models\search\ArticleSearch;
	use yii\data\Pagination;
	use yii\web\Controller;
	use yii\web\NotFoundHttpException;

	class CategoryController extends Controller
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
		
		public function beforeAction($action)
		{
			$this->enableCsrfValidation = false;

			return parent::beforeAction($action);
		}

		public function actionView($slug)
		{

			$this->processPageRequest('page');

			$query = Article::find();
			$query->join('LEFT JOIN', 'article_category', 'article_category.id = article.category_id');
			$query->where(['article_category.slug' => $slug]);

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
				return $this->render('view', [
					'models' => $models,
					'pages'  => $pages
				]);
			}
		}

		protected function processPageRequest($param = 'page')
		{
			if (\Yii::$app->request->getIsAjax() && isset($_POST[$param]))
				$_GET[$param] = \Yii::$app->request->post($param);
		}


	}
