<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%mj_admin}}".
 *
 * @property integer $eid
 * @property string $ename
 * @property string $pwd
 * @property string $tel1
 * @property string $tel2
 * @property string $birth
 */
class MjAdmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $yuanmi;
	public $xinmi;
	public $quemi;
    public static function tableName()
    {
        return '{{%mj_admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['birth','rzrq','status'], 'safe'],
            [['ename'], 'string', 'max' => 10],
            [['pwd','yuanmi','xinmi','quemi'], 'string', 'max' => 64],
			 [['type','ename','pwd','esno','status'], 'required'],
			[['ename','esno'], 'unique'],		 
            [['tel1', 'tel2'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'eid' => '员工id',
			'esno' => '工号',
            'ename' => '员工姓名',
            'pwd' => '密码',
            'tel1' => '电话1',
            'tel2' => '电话2',
            'birth' => '生日',
			'type'=>'类型',
			'yuanmi'=>'原密码',
			'xinmi'=>'新密码',
			'quemi'=>'确认密码',
		    'rzrq'=>'入职日期',
			'status'=>'状态'
        ];
    }
 
}
