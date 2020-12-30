<?php

namespace backend\controllers;

use Yii;
use backend\models\MjAdmin;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
/**
 * TongjiController implements the CRUD actions for Tongji model.
 */
class TongjiController extends Controller
{
    

    /**
     * Lists all Tongji models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new MjAdmin();
		$data=$model->find()->where(['<','type',4])->all();
		return $this->render('index', [
            'data' => $data,
	    ]);
    }

    
}
