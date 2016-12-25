<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fcm".
 *
 * @property integer $id
 * @property integer $fcm
 */
class Fcm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fcm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'fcm'], 'required'],
            [['id', 'fcm'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fcm' => 'Fcm',
        ];
    }
}
