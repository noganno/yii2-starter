<?php

namespace backend\controllers;

use common\models\Tag;
use sjaakp\taggable\TagSuggestAction;

class TagController extends \yii\web\Controller
{
    public function actions()    {
        return [
            'suggest' => [
                'class' => TagSuggestAction::className(),
                'tagClass' => Tag::className(),
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
