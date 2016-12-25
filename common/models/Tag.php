<?php

namespace common\models;

use Yii;
use sjaakp\taggable\TagBehavior;
/**
 * This is the model class for table "tag".
 *
 * @property integer $id
 * @property string $name
 * @property integer $count
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
    }

    public function behaviors()
    {
        return [
            'tag' => [
                'class' => TagBehavior::className(),
                'junctionTable' => 'article_tag',
            ]
        ];
    }

    public function getArticles() {
        return $this->hasMany(Article::className(), [ 'id' => 'model_id' ])
            ->viaTable('article_tag', [ 'tag_id' => 'id' ]);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'count'], 'required'],
            [['count'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'count' => 'Count',
        ];
    }
}
