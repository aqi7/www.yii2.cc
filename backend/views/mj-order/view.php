<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MjOrder */

$this->title = $model->danwei;
$ename = @$model->eadmin->ename?$model->eadmin->ename:'无';
$this->params['breadcrumbs'][] = ['label' => 'Mj Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mj-order-view">

    <h4>客户:<?= Html::encode($this->title) ;?>——技术员:<?=$ename;?></h4>

    <p>



	 <?php echo  Html::a('返回任务列表', ['index'], ['class' => 'btn btn-primary']);

	 ?>
	 <?php if(Yii::$app->session['type']<>3){
         echo  Html::a('修改', ['update', 'id' => $model->w_id], ['class' => 'btn btn-primary']);
		 echo " ";
        echo Html::a(' 删除', ['delete', 'id' => $model->w_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]); 
		
		} ?>
		<br><br>

	 <?php
	   if( Yii::$app->session['type']<>4){
	   
	 
	 
	 ?> 
		
		<?php
		if($model->eid==0  || ($model->eid==Yii::$app->session['eid'] && $model->renwusta==1)   ){
		  echo Html::a('领取', ['obtain', 'id' => $model->w_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定要领取此任务吗?',
                'method' => 'post',
            ],
        ]);
	 
		    echo " <font color='#5BC0DE'>当前状态:待领取</font>";
		}
		
      ?>
		<?php
		if($model->eid==Yii::$app->session['eid'] && $model->renwusta==2){
		  echo Html::a('开始处理', ['handle', 'id' => $model->w_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定要开始处理此任务吗?',
                'method' => 'post',
            ],
        ]);
		  echo " <font color='#5BC0DE'>当前状态:待处理</font>";
		}
      ?>

	  <?php
		if($model->eid==Yii::$app->session['eid'] && $model->renwusta==3){
		  echo Html::a('结果反馈', ['finish', 'id' => $model->w_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定要反馈结果吗?',
                'method' => 'post',
            ],
        ]);
      
       echo " <font color='#5BC0DE'>当前状态:处理中</font>";
		}
      ?>

	   <?php
		if($model->eid==Yii::$app->session['eid'] && $model->renwusta==5){
		  echo Html::a('结果反馈', ['finish', 'id' => $model->w_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定要反馈结果吗?',
                'method' => 'post',
            ],
        ]);
     
       echo " <font color='#5BC0DE'>当前状态:未完成</font>";
		}
      ?>

	  <?php
		if($model->eid==Yii::$app->session['eid'] && $model->renwusta==4){
		  echo Html::a('结果反馈', ['finish', 'id' => $model->w_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定要反馈结果吗?',
                'method' => 'post',
            ],
        ]);
       echo " <font color='#5BC0DE'>当前状态:已完成</font>";
		}

		  }
      ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'w_id',
			'danwei',
			'keshi',
			'content',              
            'tel',
			[
              'attribute' => 'dengji',
			  'format' => 'html',
			  'value' => function ($model) {
								 if($model['dengji']==1){
								    $is_tuisong='一般';
								 }else
								 if($model['dengji']==2){
								    $is_tuisong='<font color=red>急</font>';
								 }else{
								   $is_tuisong='<font color=red><b>很急</b></font>';
								 }
                                return  $is_tuisong;
                            }
                             
             ],
			[
              'attribute' => 'renwusta',
			  'format' => 'html',
			  'value' => function ($model) {
							   if(@$model->typeof->type){
							     return @$model->typeof->type;
							   }else{
							     return '无';
							   }
                                
                            }
                             
             ],
			[
              'attribute' => 'eid',
			  'format' => 'html',
			  'value' => function ($model) {
							   if(@$model->eadmin->ename){
							     return @$model->eadmin->ename;
							   }else{
							     return '无';
							   }
                                
                            }
                             
             ],

			 [
              'attribute' => 'aid',
			  'format' => 'html',
			  'value' => function ($model) {
							   if(@$model->adduser->ename){
							     return @$model->adduser->ename;
							   }else{
							     return '无';
							   }
                                
                            }
                             
             ],
          
          
                   
			
			'product',
			'price',
			[
              'attribute' => 'is_dy',
			  'format' => 'html',
			  'value' => function ($model) {
							   if(@$model->is_dy==1){
							     return '已打印';
							   }else{
							     return '未打印';
							   }
                                
                            }
                             
             ],
            
            
            'addtime',
            'ltime',
            'wtime',
			'beizhu'
        ],
    ]) ?>

</div>
