<?php
namespace backend\controllers;
    use Yii;
    use common\models\Article;
    use common\models\Tags;
    use backend\models\search\ArticleSearch;
    use \common\models\ArticleCategory;
    use yii\db\Query;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post']
                ]
            ]
        ];
    }

    public function rules()
    {
        return [
            [['editorTags'], 'safe'],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder'=>['published_at'=>SORT_DESC]
        ];
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();
        $connection = \Yii::$app->db;

        if(isset($_POST['tags']) && is_array($_POST['tags'])) {
            $model->tags = implode(',',$_POST['tags'] );
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $connection->createCommand()->delete('tags', 'article_id = '.$model->id)->execute();
            if(isset($_POST['tags']) && is_array($_POST['tags'])) {
                $arrTags = explode(',', $model->tags);
                foreach ($arrTags as $arrTag) {
                    $connection->createCommand()->insert('tags', ['name' => trim($arrTag), 'article_id' => $model->id])->execute();
                }
            }

            if($model->facebook == 1) {

                require_once $_SERVER['DOCUMENT_ROOT'] . '/Facebook/autoload.php';

                $app_id = "161618067560115";
                $app_secret = "da40e83fa35ffea4caa02a3ebd08b7df";

                $page_id = "1092620430802583";
                $group_id = "1092620430802583";
                $token = "CAACSZCaOBlrMBAGJedLmmJVtv0TkhMkHxNCLmuqJeZCSc6K0rFBGm4g3CbeoKkeprVj0phJ6JzUXeVkTiSuPYLrMcUTnkwarficZC34cZAKOiu2GhBuY1p1U8E0ULscPwHmJ9VdmqCqe3z1q5ZBdoTjhwTY5e4eA0feyajBGb8DWlZBG8O15zt8xLq37yh0KBAg3bcsL6MggZDZD";
                $token = "CAACSZCaOBlrMBAIajImqYhyUVQKHJoE8Ryn2YOHNWZB8yrhLgWNw2S0eBSjL4aezjUKuOnqXtZA6NJryx2EZBrADq48yuDfz26KgCbJwDepROZAeNaUvF35Ob2uvCQpZAEapl6EhUDXkPfGmFoV1B5O49zjqWqvZAlU7MjkKqPPZCObbfyegdth4hm0jxXF8ZBf49pcx1McFSsQZDZD";
                $id = Yii::$app->db->getLastInsertID();
                $model = $this->findModel($id);

                if ($model->facebook == 0)
                    return $this->redirect(['index']);

                $fb = new \Facebook\Facebook([
                    'app_id'                => $app_id,
                    'app_secret'            => $app_secret,
                    'default_graph_version' => 'v2.4',
                ]);

                $linkData = [
                    'link'        => 'http://today.uz/article/' . $model->slug,
                    'message'     => '',
                    'name'        => strip_tags($model->title),
                    'description' => strip_tags($model->body),
                    'picture'     => $model->thumbnail_base_url . '/' . $model->thumbnail_path,
                ];

                try {
                    $response = $fb->post("/{$page_id}/feed", $linkData, $token);
                } catch (Facebook\Exceptions\FacebookResponseException $e) {
                    echo 'Graph returned an error: ' . $e->getMessage();
                } catch (Facebook\Exceptions\FacebookSDKException $e) {
                    echo 'Facebook SDK returned an error: ' . $e->getMessage();
                }

                $graphNode = $response->getGraphNode();

            }
			

            if ($model->push == 1) {
                $query = new  Query();
                $result = $query->from('fcm')->orderBy(['id' => SORT_DESC])->all();

                foreach ($result as $item) {
                    $this->sendPushNotificationToGCMSever($item['fcm'], $model);
                }
            }

            return $this->redirect(['index']);
        } else {

            $tagsSql = $connection->createCommand('SELECT name,COUNT(*) AS total FROM tags GROUP BY name ORDER BY total DESC');

            $tags = $tagsSql->queryAll();

            return $this->render('create', [
                'model' => $model,
                'tags' => $tags,
                'categories' => ArticleCategory::find()->active()->all(),
            ]);
        }
    }
    
    public function sendPushNotificationToGCMSever($token, $message)
        {

            $path_to_firebase_cm = 'https://fcm.googleapis.com/fcm/send';

            $fields = array(
                'to'           => $token,
                'notification' => array('title' => $message->title, 'body' => $message->id),
                'data'         => array('message' => $message->id)
            );


            $headers = array(
                'Authorization:key=AIzaSyDF_2ZBGPkLXHpsgeLtSInD7tlqtMTscKo',
                'Content-Type:application/json'
            );
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $path_to_firebase_cm);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

            $result = curl_exec($ch);

            curl_close($ch);

            return $result;
        }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $connection = \Yii::$app->db;

        if(isset($_POST['tags']) && is_array($_POST['tags']) ) {
            $model->tags = implode(',',$_POST['tags'] );
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $connection->createCommand()->delete('tags', 'article_id = '.$model->id)->execute();
            if(isset($_POST['tags']) && is_array($_POST['tags'])) {
                $arrTags = explode(',', $model->tags);
               // $arrTags = $_POST['tags'];

                foreach ($arrTags as $arrTag) {
                    $connection->createCommand()->insert('tags', ['name' => trim($arrTag), 'article_id' => $model->id])->execute();
                }
            }
            return $this->redirect(['index']);
        } else {
            $tagsSql = $connection->createCommand('SELECT name,COUNT(*) AS total FROM tags GROUP BY name ORDER BY total DESC');

            $tags = $tagsSql->queryAll();
             return $this->render('update', [
                'model' => $model,
                'tags' => $tags,
                'categories' => ArticleCategory::find()->active()->all(),
            ]);
        }
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
