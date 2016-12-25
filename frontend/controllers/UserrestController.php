<?php
	namespace frontend\controllers;

	use Yii;
	use common\models\User;
	use yii\data\ActiveDataProvider;
	use yii\web\Controller;
	use yii\web\NotFoundHttpException;
	use yii\filters\VerbFilter;
	/**
	 * CityController implements the CRUD actions for City model.
	 */
	class UserrestController extends Controller
	{
		public function behaviors()
		{
			return [
				'verbs' => [
					'class' => VerbFilter::className(),
					'actions' => [
						'index'=>['get'],
						'view'=>['get'],
						'create'=>['post', 'get', 'put'],
						'login'=>['post','put', 'get'],
						'update'=>['post'],
						'delete' => ['delete'],
						'deleteall'=>['post'],
					],

				]
			];
		}


		public function beforeAction($event)
		{

			$action = $event->id;
			if (isset($this->actions[$action])) {
				$verbs = $this->actions[$action];


			} elseif (isset($this->actions['*'])) {
				$verbs = $this->actions['*'];
			} else {
				return $event->isValid;
			}
			$verb = Yii::$app->getRequest()->getMethod();

			$allowed = array_map('strtoupper', $verbs);

			if (!in_array($verb, $allowed)) {

				$this->setHeader(400);
				echo json_encode(array('status'=>0,'error_code'=>400,'message'=>'Method not allowed'),JSON_PRETTY_PRINT);
				exit;

			}

			return true;
		}

		/**
		 * Lists all City models.
		 * @return mixed
		 */
		public function actionIndex()
		{

			$params=$_REQUEST;
			$filter=array();
			$sort="";

			$page=1;
			$limit=10;

			if(isset($params['page']))
				$page=$params['page'];


			if(isset($params['limit']))
				$limit=$params['limit'];

			$offset=$limit*($page-1);


			/* Filter elements */
			if(isset($params['filter']))
			{
				$filter=(array)json_decode($params['filter']);
			}

			if(isset($params['datefilter']))
			{
				$datefilter=(array)json_decode($params['datefilter']);
			}


			if(isset($params['sort']))
			{
				$sort=$params['sort'];
				if(isset($params['order']))
				{
					if($params['order']=="false")
						$sort.=" desc";
					else
						$sort.=" asc";

				}
			}



			$models=User::find()
				->offset($offset)
				->limit($limit)
				->select("id,username,created_at,updated_at")
				// ->andFilterWhere(['$gte', 'created_at', $datefilter['from']])
				// ->andFilterWhere(['<=', 'created_at', $datefilter['to']])
				// ->andFilterWhere(['<=', ['created_at'=>$datefilter['to'] ]])
				//->andFilterWhere(['created_at'=>$datefilter['to']])
				// ->andFilterWhere(['created_at'=>'2014-09-04 19:44:40'])
				->andFilterWhere(['like', 'created_at',(string)$datefilter['from']])
				->andFilterWhere(['like', 'created_at',(string)$datefilter['to']])
				//->andFilterWhere(['like', 'created_at',$datefilter['to']])
				//  ->andFilterWhere(['like', 'created_at','2014-09-04'])
				//->andFilterWhere(['like', 'created_at','2014-09-04 19:44:40'])
				->andFilterWhere(['like', 'id', $filter['id']])
				->andFilterWhere(['like', 'username', $filter['name']])


				->orderBy($sort)
				->all();


			$totalItems=User::find()
				->andFilterWhere(['like', 'created_at',(string)$datefilter['from']])
				->andFilterWhere(['like', 'id', $filter['id']])
				->andFilterWhere(['like', 'username', $filter['name']])
				->count();



			$data=array();
			foreach($models as $m)
			{
				$data[]=array_filter($m->attributes);
			}

			$this->setHeader(200);

			echo json_encode(array('status'=>1,'data'=>$data,'totalItems'=>$totalItems),JSON_PRETTY_PRINT);

		}

		/**
		 * Displays a single City model.
		 * @param integer $id
		 * @return mixed
		 */
		public function actionView($id)
		{

			$model=$this->findModel($id);

			$this->setHeader(200);
			echo json_encode(array('status'=>1,'data'=>array_filter($model->attributes)),JSON_PRETTY_PRINT);

		}
		/**
		 * Creates a new City model.
		 * If creation is successful, the browser will be redirected to the 'view' page.
		 * @return mixed
		 */
		public function actionCreate()
		{
			$params=\Yii::$app->request->get();

			$model = new User();
			$model->attributes=$params;
			$hash_pass=Yii::$app->getSecurity()->generatePasswordHash($params['password']);
			$model->password_hash = $hash_pass;

			if ($model->save()) {
				$this->setHeader(200);
				echo json_encode(array('status'=>1,'data'=>array_filter($model->attributes)),JSON_PRETTY_PRINT);
			}
			else
			{
				$this->setHeader(400);
				echo json_encode(array('status'=>0,'error_code'=>400,'errors'=>$model->errors),JSON_PRETTY_PRINT);
			}

		}

		/**
		 * Updates an existing City model.
		 * If update is successful, the browser will be redirected to the 'view' page.
		 * @param integer $id
		 * @return mixed
		 */
		public function actionUpdate($id)
		{
			$params=$_REQUEST;

			$model = $this->findModel($id);

			$model->attributes=$params;
			if ($model->save()) {

				$this->setHeader(200);
				echo json_encode(array('status'=>1,'data'=>array_filter($model->attributes)),JSON_PRETTY_PRINT);

			}
			else
			{
				$this->setHeader(400);
				echo json_encode(array('status'=>0,'error_code'=>400,'errors'=>$model->errors),JSON_PRETTY_PRINT);
			}

		}
		/**
		 * Deletes an existing City model.
		 * If deletion is successful, the browser will be redirected to the 'index' page.
		 * @param integer $id
		 * @return mixed
		 */
		public function actionDelete($id)
		{
			$model=$this->findModel($id);

			if($model->delete())
			{
				$this->setHeader(200);
				echo json_encode(array('status'=>1,'data'=>array_filter($model->attributes)),JSON_PRETTY_PRINT);

			}
			else
			{

				$this->setHeader(400);
				echo json_encode(array('status'=>0,'error_code'=>400,'errors'=>$model->errors),JSON_PRETTY_PRINT);
			}
		}
		public function actionDeleteall()
		{
			$ids=json_decode($_REQUEST['ids']);

			$data=array();

			foreach($ids as $id)
			{
				$model=$this->findModel($id);

				if($model->delete())
					$data[]=array_filter($model->attributes);
				else
				{
					$this->setHeader(400);
					echo json_encode(array('status'=>0,'error_code'=>400,'errors'=>$model->errors),JSON_PRETTY_PRINT);
					return;
				}
			}

			$this->setHeader(200);
			echo json_encode(array('status'=>1,'data'=>$data),JSON_PRETTY_PRINT);
		}
		/**
		 * Finds the City model based on its primary key value.
		 * If the model is not found, a 404 HTTP exception will be thrown.
		 * @param integer $id
		 * @return City the loaded model
		 * @throws NotFoundHttpException if the model cannot be found
		 */
		protected function findModel($id)
		{
			if (($model = User::findOne($id)) !== null) {
				return $model;
			} else {

				$this->setHeader(400);
				echo json_encode(array('status'=>0,'error_code'=>400,'message'=>'Bad request'),JSON_PRETTY_PRINT);
				exit;
				// throw new NotFoundHttpException('The requested page does not exist.');
			}
		}

		private function setHeader($status)
		{

			$status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
			$content_type="application/json; charset=utf-8";

			header($status_header);
			header('Content-type: ' . $content_type);
			header('X-Powered-By: ' . "Nintriva <nintriva.com>");
		}
		private function _getStatusCodeMessage($status)
		{
			// these could be stored in a .ini file and loaded
			// via parse_ini_file()... however, this will suffice
			// for an example
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

		public $auth;

	}