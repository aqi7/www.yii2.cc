<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mj_order".
 *
 * @property integer $w_id
 * @property string $name
 * @property string $tel
 * @property string $danwei
 * @property string $keshi
 * @property string $content
 * @property integer $dengji
 * @property integer $renwusta
 * @property integer $eid
 * @property integer $addtime
 * @property integer $ltime
 * @property integer $wtime
 */
class MjOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mj_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dengji', 'renwusta', 'eid','aid','is_dy'], 'integer'],
			[['addtime', 'ltime', 'wtime'],'safe'],
			[['tel','danwei','keshi'], 'required'],
         	[['price'], 'number'],
            [['tel'], 'string', 'max' => 11],
            [['danwei', 'keshi'], 'string', 'max' => 50],
            [['content','beizhu','product'], 'string', 'max' => 5000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'w_id' => '维修编号',
          // 'name' => '客户姓名',
            'tel' => '电话',
            'danwei' => '单位',
            'keshi' => '科室',
            'content' => '维修内容',
            'dengji' => '等级',
            'renwusta' => '任务状态',
            'eid' => '员工',
            'addtime' => '订单时间',
            'ltime' => '领取时间',
            'wtime' => '完成时间',
			 'beizhu' => '备注',
			'product'=>'销售产品',
			'price'=>'产品总价',
			'is_dy'=>'是否打单',
			'aid'=>'发布人'
        ];
    }

	/*
    *关联项目表
    */
    public function getEadmin()
    {
        /**
        * 第一个参数为要关联的子表模型类名称，
        *第二个参数指定 通过子表的 customer_id 去关联主表的 id 字段
        */
        return $this->hasOne(MjAdmin::className(), ['eid' => 'eid']);
    }


	/*
    *关联发布人
    */
    public function getAdduser()
    {
        /**
        * 第一个参数为要关联的子表模型类名称，
        *第二个参数指定 通过子表的 customer_id 去关联主表的 id 字段
        */
        return $this->hasOne(MjAdmin::className(), ['eid' => 'aid']);
    }

	public function getTypeof()
    {
        /**
        * 第一个参数为要关联的子表模型类名称，
        *第二个参数指定 通过子表的 customer_id 去关联主表的 id 字段
        */
        return $this->hasOne(MjType::className(), ['t_id' => 'renwusta']);
    }
}
