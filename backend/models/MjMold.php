<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mj_mold".
 *
 * @property integer $tid
 * @property string $type
 */
class MjMold extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mj_mold';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'string', 'max' => 200],
            [['type'], 'required'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tid' => '类型序号',
            'type' => '类型',
        ];
    }

    public function getTypeof()
    {
        /**
        * 第一个参数为要关联的子表模型类名称，
        *第二个参数指定 通过子表的 customer_id 去关联主表的 id 字段
        */
        return $this->hasMany(MjArticle::className(), ['tid' => 'tid']);
    }
}
