<?php
use backend\models\Admin;
use app\models\Vip;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url; 
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$modelLabel = new \backend\models\MjAdmin();
$this->title = 'Manages';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- 引用css -->

 </head>
    <!-- Bootstrap core CSS -->

</head>

<body>


<div class="row">
    <div class="col-lg-12">
        <!-- <h1>Tables <small>Sort Your Data</small></h1> -->
        <ol class="breadcrumb">
          
            <li><a href="<?=Url::toRoute('mj-admin/create');?>"><i class="fa fa-dashboard"></i> 添加员工</a></li>
  
			 <li class='active'><i class="fa fa-table"></i> 员工列表</li>
			
			 
			

		
            
        </ol>
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            此版块记录了每个员工信息情况
        </div>
    </div>
</div><!-- /.row -->



<div class="row">
 
                
              
<div class="col-lg-12">

    <div class="table-responsive"  >
        <table class="table table-bordered table-hover table-striped tablesorter"  id="data_table">
            <thead>
            <tr>
                <?php

				 echo '<th>'.$modelLabel->getAttributeLabel('esno').'</th>';

				 echo '<th>'.$modelLabel->getAttributeLabel('ename').'</th>';
                echo '<th>'.$modelLabel->getAttributeLabel('tel1').'</th>';
            
                echo '<th>'.$modelLabel->getAttributeLabel('tel2').'</th>';
                echo '<th>'.$modelLabel->getAttributeLabel('birth').'</th>';
                echo '<th>'.$modelLabel->getAttributeLabel('type').'</th>';
				 echo '<th>'.$modelLabel->getAttributeLabel('status').'</th>';
                
				 if(Yii::$app->session['type']<>3){
                ?>
					   
                <th >操作 </th>
				<?php }?>
             
            </tr>
            </thead>
            <tbody>
           <?php
           $dengji="";
           foreach ($data as $val)
           {    if($val->type==1){
		           $dengji="管理员";
		        }else if($val->type==2){
				   $dengji="商务";
				}else if($val->type==3){
				   $dengji="技术";
				}else{
				   $dengji="其他单位";
				}

				if($val->status==1){
		           $status="在职";
		        }else{
				   $status="离职";
				}
               
                echo '  <td>' . $val->esno . '</td>';
                echo '  <td>' . $val->ename . '</td>';
                echo '  <td>' . $val->tel1. '</td>';    
                echo '  <td>' . $val->tel2 . '</td>';
				echo '  <td>' . $val->birth . '</td>';
				echo '  <td>' . $dengji . '</td>';
				echo '  <td>' . $status . '</td>';

				

                
               
				 
               
			    if(Yii::$app->session['type']<>3){
   				echo '  <td>';
              echo '<a id="edit_btn" onclick="editAction(' . $val->eid.')" class="btn btn-primary btn-sm"
                                      href=index.php?r=mj-admin/view&id='.$val->eid.'>
                                    <i class="glyphicon glyphicon-edit icon-white"></i>详情</a>&nbsp';
									

                 echo '<a id="delete_btn"   class="btn btn-danger btn-sm" href=index.php?r=mj-admin/delete&id='. $val->eid.'>
                                    <i class="glyphicon glyphicon-trash icon-white"></i>停用</a>&nbsp;&nbsp'; 
                 
               
              
                echo '  </td>';
				}
               echo '<tr/>';
               
            } 
            ?>
</tbody></table>
<div class="infos">
                    从<?= $pages->getPage() * $pages->getPageSize() + 1 ?>到 <?= ($pageCount = ($pages->getPage() + 1) * $pages->getPageSize()) < $pages->totalCount ?  $pageCount : $pages->totalCount?>                   共 <?= $pages->totalCount?> 条记录</div>
                   <ul class="pagination">

                    <?= LinkPager::widget([
                    'pagination' => $pages,
                    'nextPageLabel' => '下一页',
                    'prevPageLabel' => '上一页',
                    'firstPageLabel' => '首页',
                    'lastPageLabel' => '尾页',
                ]); ?>
              </ul>
            </div>

</div><!-- /.row -->
<script src="./assets/1ee688ce/jquery.js"></script>  
