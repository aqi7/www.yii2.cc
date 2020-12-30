<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mj_room".
 *
 * @property integer $rid
 * @property string $rname
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mj_room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['rid'], 'required'],
            [['rname'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rid' => '班级id',
            'rname' => '班级名称',
            'sid' =>'班级学生'
        ];
    }
    /**
     * 关联学生表
     *
     * @return void
     */
    public function getStu()
    {
        /**
         * 第一个是关联的表的名称(这里用了方法来调用，避免gii以后改变了)，
         * 第二个参数是一个数组。a=>b，a是关联表用于关联的字段，b是当前表的字段
         * 
         * 第一个参数为要关联的子表模型类名称，
         * 第二个参数指定 通过子表的 customer_id 去关联主表的 id 字段
        */
        return $this->hasMany(Student::className(), ['rid' => 'rid']);
    }
}
