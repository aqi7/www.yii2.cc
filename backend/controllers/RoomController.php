<?php

namespace backend\controllers;

use Yii;
use backend\models\Room;
//use backend\models\MjClasses as tt;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;//

/**
 * RoomController implements the CRUD actions for Room model.
 */
class RoomController extends CommonController
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
     * Lists all Room models.
     * @return mixed
     */
    public function actionIndex()
    { //  $this->CheckPower();
        //$model = new MjOrder();

	   // $class=tt::find()->all();
		$query=Room::find();
        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);
        //print_r($query->all());


        $arr=[];
		$keyword=Yii::$app->request->get('keyword');
		if($keyword){
             $query->orFilterWhere(['like', 'rname', $keyword]);
            //  ->orFilterWhere(['like', 'danwei', $keyword])
            //  ->orFilterWhere(['like', 'keshi', $keyword])
            //  ->orFilterWhere(['like', 'content', $keyword])
            //  ->orFilterWhere(['like', 'product', $keyword])
            //  ->orFilterWhere(['like', 'beizhu', $keyword])
            //  ->orFilterWhere(['like', 'ename', $keyword]);
			$arr["keyword"]=$keyword;
        }

        $data = $query->orderBy('rid desc')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
            $pagination = new Pagination([
                'defaultPageSize' => 20,
                'totalCount' => $query->count(),
            ]);
        return $this->render('index', [
            'data' => $data,
            'arr'=>$arr,
	        'pages' => $pagination,
			 
        ]);
    }

    /**
     * Displays a single Room model.
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
     * Creates a new Room model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    { 
        $this->CheckPower();
        $model = new Room();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->rid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Room model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {   $this->CheckPower();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->rid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Room model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {   
        // $this->CheckPower();
        // $model=$this->findModel($id);
		// $model->status=2;
        // $model->save();
        
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Room model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Room the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Room::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
