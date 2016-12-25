<?php

	namespace frontend\controllers;

	use common\models\Article;
	use common\models\ArticleAttachment;
	use common\models\ArticleCategory;
	use frontend\models\search\ArticleSearch;
	use yii\data\Pagination;
	use yii\web\Controller;
	use yii\web\NotFoundHttpException;
	use yii\web\Response;
	use yii\db\Query;

	/**
	 * @author Eugene Terentev <eugene@terentev.net>
	 */
	class RestcatController extends Controller
	{

		public function actionIndex() {
			$query = new Query();
			$result = $query->from('article_category')->where('top_menu=1')->orderBy(['id' => SORT_ASC])->all();
			
			foreach ($result as $item) {

				$item['count_news'] = Article::find()
					->select(['COUNT(*) AS cnt'])
					->where('category_id = '.$item['id'])
					->groupBy(['id'])
					->count();

				$arr['sections'][]  = $item;
			}

			\Yii::$app->response->format = Response::FORMAT_JSON;
			return $arr;
		}

		/**
		 * @return string
		 */
		public function actionView($id)
		{
			$limit = \Yii::$app->getRequest()->get('cnt') ? \Yii::$app->getRequest()->get('cnt') : 15;
			$query = Article::find();	
			$query->select('article.*, article_category.title as category_name,  article_category.title_uz as category_name_uz');		
			$query->join('LEFT JOIN', 'article_category', 'article_category.id = article.category_id');			
			$query->where(['article_category.id' => $id]);			
			$query->asArray();
			if(\Yii::$app->getRequest()->get('where')) {
				$query->andWhere([\Yii::$app->getRequest()->get('where') => 1]);
			}
			$query->asArray();
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

			$pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => $limit]);

			$pages->pageSizeParam = false;
			$models = $query->offset($pages->offset)
				->limit($pages->limit)
				->all();

			\Yii::$app->response->format = Response::FORMAT_JSON;

			return ([
				'models' => $models,
				'pages'  => $pages
			]);

		}
		/**
		 * @return string
		 */
		public function actionSort()
		{
			$limit = \Yii::$app->getRequest()->get('cnt') ? \Yii::$app->getRequest()->get('cnt') : 10;
			$query = Article::find();
			$query->join('LEFT JOIN', 'article_category', 'article_category.id = article.category_id');

			if(\Yii::$app->getRequest()->get('where')) {
				$query->andWhere([\Yii::$app->getRequest()->get('where') => 1]);
			}
			$query->asArray();
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
					case 'actual':
						$query->orderBy(['article.actual' => SORT_DESC]);
						break;
				}
			} else {
				$query->orderBy(['article.id' => SORT_DESC]);
			}

			$result = $query->limit($limit)->all();

			$countQuery = clone $query;

			$pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => $limit]);

			$pages->pageSizeParam = false;
			$models = $query->offset($pages->offset)
				->limit($pages->limit)
				->all();

			\Yii::$app->response->format = Response::FORMAT_JSON;

			return ([
				'models' => $models,
				'pages'  => $pages
			]);
		}

		public function actionFrontpage(){
			$limit = \Yii::$app->getRequest()->get('cnt') ? \Yii::$app->getRequest()->get('cnt') : 10;

			// read news
			$query = Article::find();
			$query->select('article.*, article_category.title as category_name,  article_category.title_uz as category_name_uz');
			$query->join('LEFT JOIN', 'article_category', 'article_category.id = article.category_id');
			$query->asArray();
			$query->orderBy(['article.views' => SORT_DESC]);
			$read_news = $query->all();

			$result['read_news'] =$read_news;

			// last news
			$query = Article::find();
			$query->select('article.*, article_category.title as category_name,  article_category.title_uz as category_name_uz');
			$query->join('LEFT JOIN', 'article_category', 'article_category.id = article.category_id');
			$query->asArray();
			$query->orderBy(['article.id' => SORT_DESC]);

			$result['last_news'] = $query->limit(3)->all();

			// comments news
			$query = Article::find();
			$query->select('article.*, article_category.title as category_name,  article_category.title_uz as category_name_uz');
			$query->join('LEFT JOIN', 'article_category', 'article_category.id = article.category_id');
			$query->asArray();
			$query->orderBy(['article.comments' => SORT_DESC]);

			$result['comments_news'] = $query->limit(3)->all();

			// actual
			//$query = Article::find();
			//$result['actual_news'] = $query->from('article')->where('actual=1')->orderBy(['id' => SORT_DESC])->limit(10)->all();

			$query = Article::find();
			$result['actual_news'] = $query->select('article.*, article_category.title as category_name, article_category.title_uz as category_name_uz')->from('article')->join('LEFT JOIN', 'article_category', 'article_category.id = article.category_id')->where('actual=1')->orderBy(['id' => SORT_DESC])->limit(10)->all();
			

			// video
			$query = Article::find();
			$result['video_news'] = $query->from('article')->where(['category_id' => 19])->limit(6)->all();

			\Yii::$app->response->format = Response::FORMAT_JSON;
			return $result;
		}

	}
