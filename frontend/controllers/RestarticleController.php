<?php

	namespace frontend\controllers;

	use common\models\Article;
	use common\models\ArticleAttachment;
	use common\models\ArticleCategory;
	use net\frenzel\comment\models\Comment;
	use frontend\models\search\ArticleSearch;
	use yii\web\Controller;
	use yii\web\NotFoundHttpException;
	use yii\data\Pagination;
	use yii\db\Query;
	use yii\web\Response;


	class RestarticleController extends Controller
	{
		/**
		 * @return string
		 */

		public function beforeAction($action) {
			$this->enableCsrfValidation = ($action->id !== "add-comments");
			return parent::beforeAction($action);
		}

		public function actionIndex()
		{
			$model = Article::find()->select('article.*, article_category.title as category_name,  article_category.title_uz as category_name_uz')->join('LEFT JOIN', 'article_category', 'article_category.id = article.category_id')->andWhere(['article.id' => \Yii::$app->request->get('id')])->asArray()->one();

			$query = Article::find();
			$query->select('article.*, article_category.title as category_name,  article_category.title_uz as category_name_uz');
			$query->join('LEFT JOIN', 'article_category', 'article_category.id = article.category_id');
			$query->where(['article_category.id' => 'article.category_id']);
			$query->where(['article.id' => \Yii::$app->request->get('id')]);

			if (!$model) {
				\Yii::$app->response->format = Response::FORMAT_JSON;
				return null;
			}


			\Yii::$app->db->createCommand("UPDATE article SET views=views+1 WHERE id=:id")
				->bindValue(':id', \Yii::$app->request->get('id'))
				->execute();
				
			$result = [];

			if(!empty($model['tags'])) {
				$arr = explode(',', $model['tags'] );
				$query = Article::find();
				$query->select('article.*, article_category.title as category_name,  article_category.title_uz as category_name_uz');
				$query->join('LEFT JOIN', 'article_category', 'article_category.id = article.category_id');
				foreach ($arr as $item) {
					$query->orFilterWhere(['like', 'tags', trim($item)]);
				}

				//$query->limit(2);
				$query->asArray();
				$result = $query->all();
			}						

			foreach ($model as $key => $item) {
				if($key == 'body_uz') {
					$model['body_uz']  = str_replace("<img", "<img style='height: auto; max-width: 100%' ", $item);
				}
				if($key == 'body') {
					$model['body']  = str_replace("<img", "<img style='height: auto; max-width: 100%' ", $item);
				}
			}
			
			foreach ($model as $key => $item) {
				if($key == 'body_uz') {
					$model['body_uz']  = str_replace("<iframe", "<iframe style='height: auto; max-width: 100%; width:100% !important' ", $item);
				}
				if($key == 'body') {
					$model['body']  = str_replace("<iframe", "<iframe style='height: auto; max-width: 100%'; width:100% !important ", $item);
				}
			}

			
			\Yii::$app->response->format = Response::FORMAT_JSON;
			return [
				'data' => $model,
				'related_news' => $result
			];

		}

		/**
		 * @return string
		 */
		public function actionSearch()
		{
			$text = \Yii::$app->request->get('text');
			$query = Article::find();
			$query->filterWhere(['like', 'title', $text])
				->orFilterWhere(['like', 'body', $text])
				->orFilterWhere(['like', 'title_uz', $text])
				->orFilterWhere(['like', 'body_uz', $text]);

			$countQuery = clone $query;

			$pages = new Pagination(['totalCount' => $countQuery->count()]);
			$pages->setPageSize(30);

			$model = $query->offset($pages->offset)->limit($pages->limit)->all();

			if (!$model) {
				\Yii::$app->response->format = Response::FORMAT_JSON;

				return null;
			}

			\Yii::$app->response->format = Response::FORMAT_JSON;

			return ($model);
		}


		public function actionComments($id)
		{
			$query = new Query();
			$query->from('comment');
			$query->join('LEFT JOIN', 'user', 'user.id = comment.created_by');
			$query->join('LEFT JOIN', 'user_profile', 'user.id = user_profile.user_id');
			$model = $query->where(['comment.entity_id' => $id,'comment.deleted_at' => NULL])->orderBy(['comment.updated_at' => 'DESC', 'comment.parent_id' => 'DESC'])->limit(30)->all();

			if (!$model) {
				\Yii::$app->response->format = Response::FORMAT_JSON;
				return ['message' => 'Not found'];
			}

			\Yii::$app->response->format = Response::FORMAT_JSON;

			return ($model);
		}

		public function actionAddComments()
		{
			\Yii::$app->db->createCommand()
				->insert('comment', [
					'entity' => 'common\models\Article',
					'entity_id' => \Yii::$app->request->post('id'),
					'text' => \Yii::$app->request->post('comment'),
					'created_by' => \Yii::$app->request->post('user_id'),
					'updated_by' => \Yii::$app->request->post('user_id'),
					'created_at' => time(),
					'updated_at' => time(),
					]
				)
				->execute();

			\Yii::$app->response->format = Response::FORMAT_JSON;
			if(\Yii::$app->db->getLastInsertID()) {
				return [
					'status' => 'success',
					'id' => \Yii::$app->db->getLastInsertID()
				];
			} else {
				return [
					'status' => 'unsuccess'
				];
			}

		}

		public function actionPage($id)
		{
			$query = new Query();
			$model = $query->from('page')->where(['id' => $id,'status' => 1])->all();

			if (!$model) {
				\Yii::$app->response->format = Response::FORMAT_JSON;
				return null;
			}

			\Yii::$app->response->format = Response::FORMAT_JSON;

			return ($model);
		}
		
		public function actionAddFcm($slug)
        {
            $id = \Yii::$app->db->createCommand()
                ->insert('fcm', [
                    'fcm' => $slug
                ])->execute();
				
			\Yii::$app->response->format = Response::FORMAT_JSON;

			return array('id' => $id);
			
            return $id;
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

	}
