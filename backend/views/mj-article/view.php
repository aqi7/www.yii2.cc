<?php

use backend\models\MjMold;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MjArticle */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Mj Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mj-article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Html::a('主页', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('更新', ['update', 'id' => $model->aid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->aid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除此项吗？',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'aid',
            'time',
            'typeof.type',
            [
                'attribute' => 'status',
                'value' => function($dataProvider) {
                    return $dataProvider->status == 1 ? '已发布' : '审核中';
                },
            ],
            'article:ntext',
            'author',
            'issuer',
            'title',
            'resume',
            
        ],
    ]) ?>

</div>
