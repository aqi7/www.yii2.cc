<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "t_admin".
 *
 * @property integer $a_id
 * @property string $a_name
 * @property string $a_pwd
 * @property string $a_tel
 * @property integer $a_role
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['a_name', 'a_pwd', 'a_tel', 'a_role'], 'required'],
            [['a_role'], 'integer'],
            [['a_name', 'a_pwd'], 'string', 'max' => 30],
            [['a_tel'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'a_id' => '编号',
            'a_name' => '姓名',
            'a_pwd' => '密码',
            'a_tel' => '电话',
            'a_role' => '角色',
        ];
    }
}
