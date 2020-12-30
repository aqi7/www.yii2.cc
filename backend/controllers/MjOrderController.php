<?php

namespace backend\controllers;

use Yii;
use backend\models\MjOrder;
use backend\models\MjAdmin;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;//包含分页类模板

use \PHPExcel;
use \PHPExcel_IOFactory;
use \PHPExcel_Style_Fill;

/**
 * MjOrderController implements the CRUD actions for MjOrder model.
 */
class MjOrderController extends CommonController
{
   

    /**
     * Lists all MjOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$model = new MjOrder();
		$query=MjOrder::find()->joinwith('eadmin');

		if(Yii::$app->session->get('type')==4){		
		  $query->andwhere(['aid'=>Yii::$app->session->get('eid')]);
		}


		$arr=[];
		$keyword=Yii::$app->request->get('keyword');
		if($keyword){
             $query->orFilterWhere(['like', 'tel', $keyword])
             ->orFilterWhere(['like', 'danwei', $keyword])
             ->orFilterWhere(['like', 'keshi', $keyword])
             ->orFilterWhere(['like', 'content', $keyword])
             ->orFilterWhere(['like', 'product', $keyword])
             ->orFilterWhere(['like', 'beizhu', $keyword])
             ->orFilterWhere(['like', 'ename', $keyword]);
			 $arr["keyword"]=$keyword;
        }

		$dengji=Yii::$app->request->get('dengji');
		if($dengji){
             $query->andWhere(['dengji'=> $dengji]);
			// $arr["keyword"]=$keyword;
        }
		$eid=Yii::$app->request->get('eid');
		if($eid){
             $query->andWhere(['mj_order.eid'=> $eid]);
			// $arr["keyword"]=$keyword;
        }
		$type=Yii::$app->request->get('type');
		if($type){
             $query->andWhere(['renwusta'=> $type]);
			// $arr["keyword"]=$keyword;
        }

		$k_time=Yii::$app->request->get('k_time');
        if (!empty($k_time))
        {
            $query->andWhere(['>=', 'addtime', $k_time]);
            // $like.=" and addtime >='".$k_time."'";
            $arr['k_time']=$k_time;
        }
        $d_time=Yii::$app->request->get('d_time');
        if (!empty($d_time))
        {   $d_time=$d_time.' 23:59:59';
            $query->andWhere(['<=', 'addtime', $d_time]);
            //$like.=" and addtime <= '".$d_time."'";
            $arr['d_time']=$d_time;
        }

		$fl=Yii::$app->request->get('fl');
		if($fl){
             $query->andWhere(['mj_order.eid'=> Yii::$app->session['eid']]);
			// $arr["keyword"]=$keyword;
        }

		 
      //$pr_name=Yii::$app->request->get('pr_name');
        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);
        //print_r($query->all());
        $data = $query->orderBy('status asc,addtime desc')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'data' => $data,
			'arr'=>$arr,
			 'pages' => $pagination,
			'fl'=>@$fl,
			'eid'=>@$eid
        ]);
    }


	//导出订单列表
    public function actionImport()
    {
         
         
		$query=MjOrder::find()->joinwith('eadmin');
		$arr=[];
		$keyword=Yii::$app->request->get('keyword');
		if($keyword){
             $query->andWhere(['like', 'name', $keyword])->orFilterWhere(['like', 'tel', $keyword])->orFilterWhere(['like', 'danwei', $keyword])->orFilterWhere(['like', 'keshi', $keyword])->orFilterWhere(['like', 'content', $keyword])->orFilterWhere(['like', 'product', $keyword])->orFilterWhere(['like', 'beizhu', $keyword])->orFilterWhere(['like', 'ename', $keyword]);
			 $arr["keyword"]=$keyword;
        }

		$dengji=Yii::$app->request->get('dengji');
		if($dengji){
             $query->andWhere(['dengji'=> $dengji]);
			// $arr["keyword"]=$keyword;
        }
		$eid=Yii::$app->request->get('eid');
		if($eid){
             $query->andWhere(['mj_order.eid'=> $eid]);
			// $arr["keyword"]=$keyword;
        }
		$type=Yii::$app->request->get('type');
		if($type){
             $query->andWhere(['renwusta'=> $type]);
			// $arr["keyword"]=$keyword;
        }

		$k_time=Yii::$app->request->get('k_time');
        if (!empty($k_time))
        {
            $query->andWhere(['>=', 'addtime', $k_time]);
            // $like.=" and addtime >='".$k_time."'";
            $arr['k_time']=$k_time;
        }
        $d_time=Yii::$app->request->get('d_time');
        if (!empty($d_time))
        {   //$d_time=$d_time.' 23:59:59';
            $query->andWhere(['<=', 'addtime', $d_time]);
            //$like.=" and addtime <= '".$d_time."'";
            $arr['d_time']=$d_time;
        }

		$fl=Yii::$app->request->get('fl');
		if($fl){
             $query->andWhere(['mj_order.eid'=> Yii::$app->session['eid']]);
			// $arr["keyword"]=$keyword;
        }

		$data = $query->orderBy('status asc,addtime desc')->all();


        $objPHPExcel = new PHPExcel();
        //设置文件属性
        $objPHPExcel->getProperties()->setTitle("维修订单明细表");
        //添加数据
        $objPHPExcel->setActiveSheetIndex(0);//设置Sheet
        $objPHPExcel->getActiveSheet()->setCellValue('A1', '序号');//可以指定位置
        $objPHPExcel->getActiveSheet()->setCellValue('B1', '订单时间');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', '任务等级');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', "任务状态");
    
        $objPHPExcel->getActiveSheet()->setCellValue('F1', "客户电话");
        $objPHPExcel->getActiveSheet()->setCellValue('G1', "单位");
        $objPHPExcel->getActiveSheet()->setCellValue('H1', "科室");
        $objPHPExcel->getActiveSheet()->setCellValue('I1', "详细信息");
        $objPHPExcel->getActiveSheet()->setCellValue('J1', "销售产品");
        $objPHPExcel->getActiveSheet()->setCellValue('K1', "总价(元)");
		 $objPHPExcel->getActiveSheet()->setCellValue('L1', "员工姓名");
        //设置单元格宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);


        $k=2;
        //循环
        $h=1;
        $dengji='';

        foreach($data as $val){
			  if($val->dengji==1){
		           $dengji="一般";
		        }else if($val->dengji==2){
				   $dengji="急";
				}else{
				   $dengji="很急";
				}
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $k, $h);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $k, $val->addtime);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $k, $dengji);

            $objPHPExcel->getActiveSheet()->setCellValue('D'. $k, $val->typeof->typename);
           
            $objPHPExcel->getActiveSheet()->setCellValue('F'. $k, $val->tel);

            $objPHPExcel->getActiveSheet()->setCellValue('G'. $k, $val->danwei);

           
            $objPHPExcel->getActiveSheet()->setCellValue('H'. $k, $val->keshi);

            
            $objPHPExcel->getActiveSheet()->setCellValue('I'. $k, $val->content);

            $objPHPExcel->getActiveSheet()->setCellValue('J'. $k, $val->product);
            $objPHPExcel->getActiveSheet()->setCellValue('K'. $k, $val->price);
			if(@$val->eadmin->ename){
				   $ename=  $val->eadmin->ename;
				}else{
				   $ename=' 未领';
				}
			$objPHPExcel->getActiveSheet()->setCellValue('L'. $k, $ename);
            $k++;
            $h++;
        }

        //添加注意事项
        /*$objPHPExcel->getActiveSheet()->mergeCells('A'.$k.':B'.$k);
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $k, '注：灰色区域为自动生成内容，不要改变');*/
        $name = '维修订单明细表';
        $filename = "./upload/order".date('Y-m-d',time()).".xlsx";
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        if(is_file($filename)){
            unlink($filename);//删除原来的
        }
        $objWriter->save($filename);
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=order-'.date('Y-m-d',time()).'.xlsx');
        header('Cache-Control: max-age=0');
        header('Content-Length: '.filesize($filename));
        readfile($filename);

        exit();
    }
 

	/*
	ajax 请求新任务订单
	date:2018/2/17
	author：hua
	*/
	public function actionGetnew()
    {
        //$model = new MjOrder();
		$count=MjOrder::find()->andwhere(['renwusta'=>1])->andFilterWhere(['or', 'eid=0', 'eid='.Yii::$app->session['eid']])->count();
		if($count>=1){
		  $rs=MjOrder::find()->andwhere(['renwusta'=>1])->andFilterWhere(['or', 'eid=0', 'eid='.Yii::$app->session['eid']])->one();
          $arr=array('status'=>1,'w_id'=>$rs->w_id,'name'=>$rs->danwei);
		  echo json_encode($arr);
		}else{
		  $arr=array('status'=>0);
		  echo json_encode($arr);
		}
    }

	

    /**
     * Displays a single MjOrder model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MjOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->session['type']==3){
          die('no power');
		}
		$model = new MjOrder();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			if($model->eid==null){
			   $model->eid=0;
			}
			//$model->aid=Yii::$app->session['aid'];
			$model->save();
            return $this->redirect(['view', 'id' => $model->w_id]);
        } else {
            $admin = MjAdmin::find()->where(['status'=>1])->all();
            // echo "<pre>";
            // print_r($admin) ;
            // die;
            return $this->render('create', [
                'model' => $model,
				'admin' => $admin
            ]);
        }
    }

    /**
     * Updates an existing MjOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->w_id]);
        } else {
           $admin = MjAdmin::find()->where(['status'=>1])->all();
            return $this->render('update', [
                'model' => $model,
				'admin' => $admin
            ]);
        }
    }

    /**
     * Deletes an existing MjOrder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

	public function actionObtain($id)
	{
	   $model = $this->findModel($id);
	   if($model->eid==0){
	     //die('此任务已经认领过');
		 $model->eid=Yii::$app->session['eid'];
	   }
	   $model->ltime=date('Y-m-d H:i:s',time());
	   $model->renwusta=2;
	   $model->save();
	 //  return $this->redirect(['index']);
	   return $this->redirect(['view', 'id' => $model->w_id]);	
	}

	public function actionHandle($id)
	{
	   $model = $this->findModel($id);
	   if($model->renwusta==3){
	     die('此任务已经认领过');
	   }
	  // $model->eid=Yii::$app->session['eid'];
	   $model->ltime=date('Y-m-d H:i:s',time());
	   $model->renwusta=3;
	   $model->save();
	 //  return $this->redirect(['index']);
	   return $this->redirect(['view', 'id' => $model->w_id]);	
	}


	public function actionWfinish($id)
	{
	   $model = $this->findModel($id);
	   if($model->renwusta==4){
	     die('此任务已经完成过');
	   }
	  // $model->eid=Yii::$app->session['eid'];
	  // $model->wtime=date('Y-m-d H:i:s',time());
	   $model->renwusta=5;
	    $model->status=0;
	   $model->save();
	 //  return $this->redirect(['index']);
	   return $this->redirect(['view', 'id' => $model->w_id]);	
	}

	public function actionFinish($id)
	{

		$model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

			if($model->renwusta==4){
			  $model->status=1;
			}else{
			  $model->status=0;
			}

			$model->save();
            return $this->redirect(['view', 'id' => $model->w_id]);
        } else {          
            return $this->render('finish', [
                'model' => $model,
				 
            ]);
        }
 
	 //  return $this->redirect(['index']);
	   
	}

    /**
     * Finds the MjOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MjOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MjOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
