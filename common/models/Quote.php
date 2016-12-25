<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quote".
 *
 * @property integer $id
 * @property string $title
 * @property string $title_uz
 * @property string $body
 * @property string $body_uz
 * @property integer $status
 */
class Quote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quote';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'title_uz', 'body', 'body_uz'], 'required'],
            [['status'], 'integer'],
            [['title', 'title_uz', 'body', 'body_uz'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'title_uz' => 'Title Uz',
            'body' => 'Body',
            'body_uz' => 'Body Uz',
            'status' => 'Status',
        ];
    }
}
