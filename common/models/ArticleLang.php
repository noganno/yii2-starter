<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article_lang".
 *
 * @property integer $id
 * @property integer $article_id
 * @property integer $lang_id
 * @property string $title
 * @property string $body
 *
 * @property Article $article
 * @property Lang $lang
 */
class ArticleLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'article_id', 'lang_id', 'title', 'body'], 'required'],
            [['id', 'article_id', 'lang_id'], 'integer'],
            [['body'], 'string'],
            [['title'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'lang_id' => 'Lang ID',
            'title' => 'Title',
            'body' => 'Body',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }
}
