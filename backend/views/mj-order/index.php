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
$modelLabel = new \backend\models\MjOrder();
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
          <?php if(Yii::$app->session['type']<>3){ ?>
            <li><a href="<?=Url::toRoute('mj-order/create');?>"><i class="fa fa-dashboard"></i> 添加维修订单</a></li>

			<?php } ?>

			<?php
			if($fl==1){?>

			<li ><a href="<?=Url::toRoute(['mj-order/index']);?>"><i class="fa fa-dashboard"></i> 维修订单明细</a></li>

			<?php if(Yii::$app->session['type']==3){ ?>
			 <li class='active'><i class="fa fa-table"></i> 个人维修记录</li>

			 <?php }?>
			
			<?php
			
			}else{
			?>
           
            <li class='active'><i class="fa fa-table"></i> 维修订单明细</li>

			 <?php if(Yii::$app->session['type']==3){ ?>
            <li><a href="<?=Url::toRoute(['mj-order/index','fl'=>1]);?>"><i class="fa fa-dashboard"></i> 个人维修记录</a></li>
			
			 <?php }?>

			<?php
			if(Yii::$app->session['type']==4){ 
				
			}else{?>
			
			<li ><a href="index.php?r=mj-order/import&keyword=<?=$_GET['keyword']?>&k_time=<?=$_GET['k_time']?>&d_time=<?=$_GET['d_time']?>&type=<?=$_GET['type']?>"><i class="fa fa-dashboard"></i> 导出</a></li>
		 

			<?php } }?>
			
			

		
            
        </ol>
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            此版块记录了每个维修订单明细
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

			  <div class="form-group" style="margin: 5px;">
                  <label>开始时间:</label>
                  <input type="date" class="form-control" id="query[v_cometime]" name="k_time"  value="<?=isset($arr["k_time"]) ? $arr["k_time"] : date('Y-m-d',time()-30*24*60*60); ?>">
              </div>
              <div class="form-group" style="margin: 5px;">
                  <label>结束时间:</label>
                  <input type="date" class="form-control" id="query[v_lasttime]" name="d_time"  value="<?=isset($arr["d_time"]) ? $arr["d_time"] : date('Y-m-d',time()); ?>">
              </div>

			   <div class="form-group two" >
                  <button type="submit" name="submit"  class="btn btn-primary btn-sm">搜索</button>
                  <button type="reset" name="reset"  class="btn btn-danger btn-sm" >清空</button>
              </div>

			  
			   <?php ActiveForm::end(); ?> 
			    <div class="form-group two" >
				<br>
				 <a href='index.php?r=mj-order/index'>全部</a> &nbsp;
                 <a href='index.php?r=mj-order/index&type=1&fl=<?=$fl;?>&eid=<?=$eid;?>'>新发</a> &nbsp;
				  <a href='index.php?r=mj-order/index&type=2&fl=<?=$fl;?>&eid=<?=$eid;?>'>已领</a>
			   &nbsp;<a href='index.php?r=mj-order/index&type=3&fl=<?=$fl;?>&eid=<?=$eid;?>'>处理中</a>
			   &nbsp;  <a href='index.php?r=mj-order/index&type=5&fl=<?=$fl;?>&eid=<?=$eid;?>'>未完成</a>  &nbsp;<a href='index.php?r=mj-order/index&type=4&fl=<?=$fl;?>&eid=<?=$eid;?>'>完成</a>
              </div>

  </div>
   
</div>
<style>

@media screen and (max-width: 500px) {
    .neir {
       width:100px
    }
	.dengji{width:50px}
}

@media screen and (min-width: 800px) {
    .neir {
       width:200px
    }
	.dengji{width:50px}
}
</style>        
 <div class="row">             
<div class="col-lg-12">

    <div class="table-responsive"  >
        <table class="table table-bordered table-hover table-striped tablesorter"  id="data_table">
            <thead>
            <tr>
                <?php

				
				 echo '<th class="dengji">'.$modelLabel->getAttributeLabel('dengji').'</th>';

				echo '<th>'.$modelLabel->getAttributeLabel('danwei').'</th>';

				echo '<th>'.$modelLabel->getAttributeLabel('keshi').'</th>';

				

				echo '<th class="neir">'.$modelLabel->getAttributeLabel('content').'</th>';

                echo '<th>'.$modelLabel->getAttributeLabel('renwusta').'</th>';

				
				 echo '<th>技术员</th>';

				 

				  echo '<th>发布人</th>';


				 echo '<th >'.$modelLabel->getAttributeLabel('addtime').'</th>';
            
               if(Yii::$app->session['type']<>3){
                echo '<th>'.$modelLabel->getAttributeLabel('tel').'</th>';
             
             
              
				echo '<th>'.$modelLabel->getAttributeLabel('product').'</th>';
			    echo '<th>'.$modelLabel->getAttributeLabel('price').'</th>';
           

               
				
				 
                ?>
					   
                <th >操作 </th>
				<?php }?>
             
            </tr>
            </thead>
            <tbody>
           <?php
           $dengji="";
           foreach ($data as $val)
           {    if($val->dengji==1){
		           $dengji="一般";
		        }else if($val->dengji==2){
				   $dengji="<font color=red>急</font>";
				}else{
				   $dengji="<font color=red><b>很急</b></font>";
				}
                echo '  <tr onclick="editAction(' . $val->w_id.')">
                 <td><a href=index.php?r=mj-order/index&dengji='.$val->dengji.'>' . $dengji . '</a>
                 </td>
                 <td>' . $val->danwei . '</td>';
			    echo '  <td>' . $val->keshi . '</td>';    
				
				 echo '  <td>' . $val->content . '</td>';
				
				 echo '  <td><a href=index.php?r=mj-order/index&type='.$val->renwusta.'>' . @$val->typeof->type . '</a></td>';

			 


				if(@$val->eadmin->ename){
				   echo '  <td>' . @$val->eadmin->ename. '</td>';
				}else{
				   echo '  <td> <font color=green> 未领</font>  </td>';
				}


				echo '  <td>' . @$val->adduser->ename . '</td>';

				 

                echo '  <td>' . $val->addtime . '</td>';

			 if(Yii::$app->session['type']<>3){
			
                echo '  <td>' . $val->tel . '</td>';
             //   echo '  <td>' . $val->danwei . '</td>';
      
               
				echo '  <td>' . $val->product . '</td>';
				echo '  <td>' . $val->price . '</td>';

                
               
				
				
               
			  
   				echo '  <td>';
              echo '<a id="edit_btn" onclick="editAction(' . $val->w_id.')" class="btn btn-primary btn-sm"
                                      href=index.php?r=mj-order/view&id='.$val->w_id.'>
                                    <i class="glyphicon glyphicon-edit icon-white"></i>详情</a>&nbsp';
									

                 /* echo '<a id="delete_btn"   class="btn btn-danger btn-sm" href=index.php?r=mj-order/delete&id='. $val->w_id.'>
                                    <i class="glyphicon glyphicon-trash icon-white"></i>删除</a>&nbsp;&nbsp';*/
                 
               
              
                echo '  </td>';
				}
               echo '</tr>';
               
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
<script>
function editAction(wid){
//   alert(wid);
    window.location = 'index.php?r=mj-order/view&id='+wid;
}

$(function(){
   $("#admin-user-search-form").hide();
   $("#sou").click(function(){
      $("#admin-user-search-form").show();   
   });

   $("#sou2").click(function(){
      $("#admin-user-search-form").hide();   
   });


});

</script>

