<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MjArticle */

$this->title = '创建文章';
$this->params['breadcrumbs'][] = ['label' => 'Mj Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mj-article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'admin' =>$admin
    ]) ?>

</div>
