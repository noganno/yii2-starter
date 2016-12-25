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
	class RestpageController extends Controller
	{

		public function actionIndex() {
			$query = new Query();
			$result = $query->from('article')->where('category_id=1')->orderBy(['id' => SORT_ASC])->all();

			foreach ($result as $item) {

				$item['count_news'] = Article::find()
					->select(['COUNT(*) AS cnt'])
					->where('id = '.$item['id'])
					->groupBy(['id'])
					->count();

				$arr['sections'][]  = $item;
			}

			\Yii::$app->response->format = Response::FORMAT_JSON;
			return $arr;
		}
		

		public function actionFrontpage(){
			$limit = \Yii::$app->getRequest()->get('cnt') ? \Yii::$app->getRequest()->get('cnt') : 2;

			// read news
			$query = Article::find();
			$query->select('article.*, article_category.title as category_name,  article_category.title_uz as category_name_uz');
			$query->join('LEFT JOIN', 'article_category', 'article_category.id = article.category_id');
			$query->asArray();
			$query->orderBy(['article.views' => SORT_DESC]);
			$read_news = $query->limit(5)->all();

			$result['read_news'] =$read_news;

			// last news
			$query = Article::find();
			$query->select('article.*, article_category.title as category_name,  article_category.title_uz as category_name_uz');
			$query->join('LEFT JOIN', 'article_category', 'article_category.id = article.category_id');
			$query->asArray();
			$query->orderBy(['article.id' => SORT_DESC]);

			$result['last_news'] = $query->limit(5)->all();

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
