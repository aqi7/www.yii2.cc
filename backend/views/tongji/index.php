<?php
use backend\models\MjAdmin;
use app\models\Vip;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url; 
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use backend\models\MjOrder;
use yii\db\Query;
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
       
           
            <li class='active'><i class="fa fa-table"></i> 维修订单统计</li>

		
            
        </ol>
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            此版块统计了每个技术人员业绩统计情况
        </div>
    </div>
</div><!-- /.row -->



<div class="row">
 <div class="col-sm-10">
 <?php
 $k_time=Yii::$app->request->get('k_time');
 $d_time=Yii::$app->request->get('d_time');

 ?>
 <?php $form =ActiveForm::begin(['id' => 'admin-user-search-form', 'method'=>'get', 'options' => ['class' => 'form-inline']]); ?>
                
			<div class="form-group one" style="margin: 5px;">

			<input type="button" name="button5" class="btn btn-primary btn-sm" value="今日" onclick="today()"/>

                 <input type="button" name="button" class="btn btn-primary btn-sm" value=" 上周" onclick="shang()" />

              <input type="button" name="button2" class="btn btn-primary btn-sm" value="本周" onclick="ben()"/>

              <input type="button" name="button3" class="btn btn-primary btn-sm" value="本月" onclick="yue()" />

              <input type="button" name="button4" class="btn btn-primary btn-sm" value="本年" onclick="nian()" />


                <div class="form-group" style="margin: 5px;">
                    <label>开始时间:</label>
                    <input type="date" class="form-control" id="kai" name="k_time"  value="<?=isset($k_time) ? $k_time : ''; ?>">
                </div>
                <div class="form-group" style="margin: 5px;">
                    <label>结束时间:</label>
                    <input type="date" class="form-control" id="jie" name="d_time"  value="<?=isset($d_time) ? $d_time : ''; ?>">
                </div>

			   <div class="form-group two" >
                  <button type="submit" name="submit"  class="btn btn-primary btn-sm">搜索</button>
                  <button type="reset" name="reset"  class="btn btn-danger btn-sm" >清空</button>
              </div>

			 

			  

		 

			   <?php ActiveForm::end(); ?>
  </div>
   
</div>
                
              
<div class="col-lg-12">

    <div class="table-responsive"  >
        <table class="table table-bordered table-hover table-striped tablesorter"  id="data_table">
            <thead>
            <tr>
                <?php

				 echo '<th>'.$modelLabel->getAttributeLabel('ename').'</th>';

				 echo '<th>领取任务数量</th>';
                 echo '<th>完成任务数量</th>';
            
                 echo '<th>未完成任务数量</th>';
            
                 echo '<th>商品总金额（元）</th>';
               
				 
                ?>
					   
                <th >操作 </th>
			 
            </tr>
            </thead>
            <tbody>
           <?php
           $money=0;
           foreach ($data as $val)
           {   
			    $model=  MjOrder::find()->where(['eid'=>$val->eid]);
				
				if (!empty($k_time))
				{
                  $model->andWhere(['>=', 'addtime', $k_time]);
				}
				if (!empty($d_time))
				{ $d_time=$d_time.' 23:59:59';
                  $model->andWhere(['<=', 'addtime', $d_time]);
				}
				$count=$model->count();
				$finish=$model->andwhere(['renwusta'=>4])->count();
				$wei=$count-$finish;
				
                echo '<tr>';
				echo '  <td>' . $val->ename . '</td>';   
				echo '  <td>' .$count. '</td>'; 
				echo '  <td>' .$finish. '</td>'; 
				echo '  <td>' .@$wei. '</td>';
				
				$query = (new \yii\db\Query())
                     ->select('sum(price) as money')
                     ->from('mj_order')->where(['eid'=>$val->eid]);
				if (!empty($k_time))
				{
                  $query->andWhere(['>=', 'addtime', $k_time]);
				}
				if (!empty($d_time))
				{ $d_time=$d_time.' 23:59:59';
                  $query->andWhere(['<=', 'addtime', $d_time]);
				}
					
				$rs=$query->one();
				// print_r($query);
                   
                echo '  <td>' .$rs['money']. '</td>';

				 echo '<td><a id="edit_btn" onclick="editAction(' . $val->eid.')" class="btn btn-primary btn-sm"
                                      href=index.php?r=mj-order/index&eid='.$val->eid.'&k_time='.$k_time.'&d_time='.$d_time.'>
                                    <i class="glyphicon glyphicon-edit icon-white"></i>明细</a>&nbsp</td>';
				echo '</tr>';
           
		   

                
               
				 
	 
               
            } 
            ?>
</tbody></table>
 

</div><!-- /.row -->
<script src="./assets/1ee688ce/jquery.js"></script>  
<script type="text/javascript">
  function today(){
      document.getElementById('kai').value="<?php echo date("Y-m-d",time()+24*3600)?>";

      document.getElementById('jie').value="<?php echo date("Y-m-d",time()+24*3600)?>";

  
  }

  function shang()
  {
      document.getElementById('kai').value="<?php echo date("Y-m-d",mktime(0, 0 , 0,date("m"),date("d")-date("w")+1-7,date("Y")))?>";

      document.getElementById('jie').value="<?php echo date("Y-m-d",mktime(0,0,0,date("m"),date("d")-date("w")+7-7,date("Y")))?>";
  }

  function ben()
  {
      document.getElementById('kai').value="<?php echo date("Y-m-d",mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y")))?>";

      document.getElementById('jie').value="<?php echo date("Y-m-d",mktime(0,0,0,date("m"),date("d")-date("w")+7,date("Y")))?>";
  }

  function yue()
  {
      document.getElementById("kai").value='<?php echo date("Y-m-d",mktime(0, 0 , 0,date("m"),1,date("Y")));?>' ;
      document.getElementById("jie").value='<?php echo date("Y-m-d",mktime(23,59,59,date("m"),date("t"),date("Y")))?>';
  }

  function nian()
  {
      document.getElementById("kai").value='<?php echo  date("Y",time())."-01"."-01";?>' ;
      document.getElementById("jie").value='<?php echo  date("Y",time())."-12"."-31";?>';
  }
</script>

