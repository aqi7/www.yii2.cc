<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MjArticle */

$this->title = '更新文章: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Mj Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->aid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mj-article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'admin' => $admin
    ]) ?>

</div>
