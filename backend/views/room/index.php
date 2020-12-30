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
          
            <li><a href="<?=Url::toRoute('room/create');?>"><i class="fa fa-dashboard"></i> 添加班级</a></li>
  
			 <li class='active'><i class="fa fa-table"></i> 班级列表</li>
			
        </ol>
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            此版块记录了每个班级信息情况
        </div>
    </div>
</div><!-- /.row -->



<div class="row">
 
                
<div class="col-sm-10">
 搜索：<span id='sou'>显示 </span><span id='sou2'>隐藏 </span>
 <?php $form =ActiveForm::begin([ 'method'=>'get']); ?>
                
			<div class="form-group one" style="margin: 5px;">

                <label>关键词:</label>
                <input type="text" class="form-control" id="query[keyword]" name="keyword"
                        value="<?=isset($arr["keyword"]) ? $arr["keyword"] : "" ?>">
              </div>

			   <div class="form-group two" >
                  <button type="submit" name="submit"  class="btn btn-primary btn-sm">搜索</button>
                  <button type="reset" name="reset" onclick="reset()"  class="btn btn-danger btn-sm" >清空</button>
              </div>

			  
			   <?php ActiveForm::end(); ?> 

  </div>
      
<div class="col-lg-12">

    <div class="table-responsive"  >
        <table class="table table-bordered table-hover table-striped tablesorter"  id="data_table">
            <thead>
            <tr>
                <?php

				
                echo '<th>'.$modelLabel->getAttributeLabel('班级id').'</th>';
                echo '<th>'.$modelLabel->getAttributeLabel('班级名称').'</th>';
                echo '<th>'.$modelLabel->getAttributeLabel('班级学生').'</th>';
                
				 if(Yii::$app->session['type']<>3){
                ?>
					   
                <th >操作 </th>
				<?php }?>
             
            </tr>
            </thead>
            <tbody>
           <?php
            
           foreach ($data as $val)
           {    
                echo '<td>' . $val->rid . '</td>';
                echo '<td>' . $val->rname . '</td>';
                $stuinfo="";

                //print_r($val->stu);
                foreach($val->stu as $v){
                    $stuinfo.=$v['sname'].',';
 
                }
                echo '<td>' . $stuinfo . '</td>';

			    if(Yii::$app->session['type']<>3){
   				echo '<td>';
              echo '<a id="edit_btn" onclick="editAction(' . $val->rid .')" class="btn btn-primary btn-sm"
                                      href=index.php?r=room/view&id='.$val->rid.'>
                                    <i class="glyphicon glyphicon-edit icon-white"></i>详情</a>&nbsp';
									

                 echo '<a id="delete_btn"   class="btn btn-danger btn-sm" href=index.php?r=room/delete&id='. $val->rid.'>
                                    <i class="glyphicon glyphicon-trash icon-white"></i>删除</a>&nbsp;&nbsp'; 
                 
               
              
                echo '</td>';
				}
               echo '</tr>';
               
            } 
            ?>
</tbody></table>
<div class="infos">
                    从
                    <?=$pages->getPage() * $pages->getPageSize() + 1 ?>到 
                    <?= ($pageCount = ($pages->getPage() + 1) * $pages->getPageSize()) < $pages->totalCount ?  $pageCount : $pages->totalCount?>                   
                    共 <?= $pages->totalCount?> 条记录</div>
                    <ul class="pagination">

                    <?= LinkPager::widget([
                        'pagination' => $pages,
                        'nextPageLabel' => '下一页',
                        'prevPageLabel' => '上一页',
                        'firstPageLabel' => '首页',
                        'lastPageLabel' => '尾页',
                    ]); 
                    ?>
              </ul>
            </div>

</div><!-- /.row -->
<script src="./assets/1ee688ce/jquery.js"></script>  
