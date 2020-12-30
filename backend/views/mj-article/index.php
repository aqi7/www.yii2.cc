<?php

use backend\models\MjMold;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MjArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章列表';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="mj-article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 
    <p>
        <?= Html::a('创建文章', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['width' => '50']],

            // [
            //     'attribute' => 'aid',
            //     'headerOptions' => ['width' => '80']
            // ],
            [
                'attribute' => 'time',
                'headerOptions' => ['width' => '150']
            ],
            [
                'attribute' => 'typeof.type',
                'headerOptions' => ['width' => '100']

            ],
            [
                'attribute' => 'status',
                'value' => function($dataProvider) {
                    return $dataProvider->status == 1 ? '已发布' : '审核中';
                },
                'headerOptions' => ['width' => '100']

            ],
            // 'article:ntext',
            [
                'attribute' => 'author',
                'headerOptions' => ['width' => '100']

            ],
            [
                'attribute' =>'issuer',
                'headerOptions' => ['width' => '100']

            ],
            [
                'attribute' => 'title',
                'headerOptions' => ['width' => '150']
            ],
            
            [
                'attribute' => 'resume',
                'value' => function($dataProvider){
                    $str = $dataProvider->resume;
                    if(strlen($str)>10){
                        return mb_substr($str,0,10).'...';
                    }else{
                        return $str;
                    }
                },
                'headerOptions' => ['width' => '150']
            ],
            ['class' => 'yii\grid\ActionColumn','header' => '操作',
            'headerOptions' => ['width' => '70']],
        ],
    ]); 
    ?>
</div>
