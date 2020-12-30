<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mj_article".
 *
 * @property integer $aid
 * @property string $time
 * @property int $tid
 * @property integer $status
 * @property string $article
 * @property string $author
 * @property string $issuer
 * @property string $title
 * @property string $resume
 */
class MjArticle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mj_article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time'], 'safe'],
            [['tid', 'status', 'article', 'author'], 'required'],
            [['tid', 'status'], 'integer'],
            [['article', 'resume'], 'string'],
            [['author', 'issuer'], 'string', 'max' => 80],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'aid' => '文章序号',
            'time' => '发布时间',
            'tid' => '类型',
            'status' => '状态',
            'article' => '文章内容',
            'author' => '作者',
            'issuer' => '发布人',
            'title' => '标题',
            'resume' => '摘要',
        ];
    }
    public function getTypeof()
    {
        /**
        * 第一个参数为要关联的子表模型类名称，
        *第二个参数指定 通过子表的 customer_id 去关联主表的 id 字段
        */
        return $this->hasOne(MjMold::className(), ['tid' => 'tid']);
    }
}
