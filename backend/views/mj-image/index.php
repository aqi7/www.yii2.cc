<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mj Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mj-image-index">

    <h1><?= Html::encode($this->title) ?></h1>

 
    <p>
        <?= Html::a('Create Mj Image', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'imageFiles',
                "format" => ["image", 
                    ["width"=>"84","height"=>"84"]
                ],
                "value" => function ($model) { 
                    if($model->imageFiles){
                        return $model->imageFiles;
                    }else{
                        return 'uploads/1.jpg'; 
                    }
                    // return 'uploads/'.$model->imageFile; 
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
