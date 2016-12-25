<?php

namespace backend\controllers;

use yii\db\Query;
use Yii;

class PushController extends \yii\web\Controller
{
    public function beforeAction($action) {
        $this->enableCsrfValidation = ($action->id !== "send");
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $query = new Query();
        $result = $query->from('article')->where('status=1')->orderBy(['id' => SORT_DESC])->limit(100)->all();

        return $this->render('index', ['result' => $result]);
    }
    public function actionSend()
    {

        $query = new Query();
        $resultArticle = $query->from('article')->where('id='.(int)$_POST['id'])->one();

        $query = new  Query();
        $result = $query->from('fcm')->orderBy(['id' => SORT_DESC])->all();

        foreach ($result as $item) {
            $this->sendPushNotificationToGCMSever($item['fcm'], $resultArticle);
        }

        return $this->redirect(array('index','send'=>'Y'));

    }

    public function sendPushNotificationToGCMSever($token, $message)
    {
        $path_to_firebase_cm = 'https://fcm.googleapis.com/fcm/send';

        $fields = array(
            'to'           => $token,
            'notification' => array('title' => $message['title'], 'body' => $message['title_uz']),
            'data'         => array('message' => $message['id'])
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

}
