<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mj_type".
 *
 * @property integer $t_id
 * @property string $type
 */
class MjType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mj_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_id' => 'T ID',
            'type' => 'Type',
        ];
    }
}
