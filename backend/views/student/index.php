<?php

use backend\models\Hobby;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '学生列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('添加学生', ['create'], ['class' => 'btn btn-success']) ?>
        <?= '<button class="btn btn-danger" data-control="student" onClick="delete_all(this)">批量删除</button>' ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'showFooter'=>true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
            'footerOptions' => [ 'class'=>'control','class'=>'hide'],],
            [                
                'class' => 'yii\grid\CheckboxColumn',
                'name' => 'id',
                'footerOptions' => ['class'=>'hide'],
                
            ],
            // 'sid',
            [
                'attribute'=>'imageFile',
                "format" => ["image", 
                    ["width"=>"84","height"=>"84"]
                ],
                "value" => function ($model) { 
                    if($model->imageFile){
                        return $model->imageFile;
                    }else{
                        return 'uploads/1.jpg'; 
                    }
                    // return 'uploads/'.$model->imageFile; 
                },
                'footerOptions' => ['class'=>'hide'],
                
            ],
            ['attribute' => 'sname',
            'footerOptions' => ['class'=>'hide'],
            ],
            [
                'attribute' => 'sex',
                'value' => function($model) {
                    return $model->sex == 1 ? '男' : '女';
                },
                'footerOptions' => ['class'=>'hide'],
            ],
            [
                'attribute' => 'hid',
                // 'label'=>'爱好',
                'value'=>function ($model){
                    $dept=Hobby::find()
                            ->select(['hobby'])
                            ->where(['in','hid',$model->hid])
                            ->column();
                    return implode(',', $dept);
                }
                ,'footerOptions' => ['class'=>'hide'],
                
            ],
             ['attribute' => 'phone',
            'footerOptions' => ['class'=>'hide'],
            ],
            ['attribute' => 'address',
            'footerOptions' => ['class'=>'hide'],
            ],
            
            ['attribute' => 'room.rname',
            'footerOptions' => ['class'=>'hide'],
            ],
            ['attribute' => 'idcard',
            'footerOptions' => ['class'=>'hide'],
            ],
            ['attribute' => 'createtime',
            'footerOptions' => ['class'=>'hide'],
            ],
            ['class' => 'yii\grid\ActionColumn','header' => '操作','headerOptions' => ['width' => '70'],'footerOptions' => ['class'=>'hide'],],
           
        ],
        'pager' => [//自定义分页样式以及显示内容
            'firstPageLabel' => '首页',
            'prevPageLabel'=>'上一页',
            'nextPageLabel'=>'下一页',
            'lastPageLabel' => '尾页',
            'options'=>['style'=>'margin-left:800px;','class'=>"pagination"],
        ],
        'options' => ['id'=>'sid'],
    ]); 
    ?>
</div>

<script>
function delete_all(obj){
    var control = $(obj).attr("data-control");
    var ids = $("#sid").yiiGridView("getSelectedRows");
    if(ids == ""){
        alert('请至少选择一项！');
        return false;
    }
    var ids_str = ids.join(",");
    // alert(ids_str);
    if(confirm("确认删除么？")){
        $.ajax({
           type: "POST",
           url: "./index.php?r="+control+"%2Fdeleteall",
           data: "ids_str="+ids_str,
           dataType: "json",
           success: function(msg){
             window.location.reload();
           }
        });
    }
    
}
</script>

<?php
$this->registerJs('');
?>