<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mj_hobby".
 *
 * @property integer $hid
 * @property string $hobby
 */
class Hobby extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mj_hobby';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hobby'], 'required'],
            [['hobby'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hid' => 'Hid',
            'hobby' => 'Hobby',
        ];
    }
}
