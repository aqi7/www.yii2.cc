<?php

namespace backend\controllers;

use Yii;
use backend\models\MjAdmin;
//use backend\models\MjClasses as tt;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;//������ҳ��ģ��

/**
 * MjAdminController implements the CRUD actions for MjAdmin model.
 */
class MjAdminController extends CommonController
{
     
     public function CheckPower(){
		$session = Yii::$app->session;
		$session->open();
		$role=$session->get('type');
	    if($role!=1){
	       die('');
	    }
	}
    /**
     * Lists all MjAdmin models.
     * @return mixed
     */
    public function actionIndex()
    { //  $this->CheckPower();
        //$model = new MjOrder();

	   // $class=tt::find()->all();
		$query=MjAdmin::find();
        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);
        //print_r($query->all());
        $data = $query->orderBy('eid desc')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'data' => $data,
	        'pages' => $pagination,
			 
        ]);//����ģ�� ӳ������
    }

    /**
     * Displays a single MjAdmin model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   $this->CheckPower();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MjAdmin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    { //  $this->CheckPower();
        $model = new MjAdmin();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->eid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MjAdmin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {   $this->CheckPower();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->eid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MjAdmin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {   $this->CheckPower();
        $model=$this->findModel($id);
		$model->status=2;
		$model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MjAdmin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MjAdmin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MjAdmin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
