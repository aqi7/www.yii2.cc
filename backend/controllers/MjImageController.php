<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\MjImage;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;

class MjImageController extends Controller
{

    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $model = new MjImage();
        $dataProvider = new ActiveDataProvider([
            'query' => MjImage::find(),
            
            // 'orderby' => 'sid desc'
        ]);
        if($request->isPost)
        {
            $file=$model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            //print_r($file);die;
            foreach ($file as $key => $v) {
                $image[]=$v->name;                
            }
            //print_r($image);die;  
            $images=implode(',',$image);
            if($model->upload())
            {
                $connection = \Yii::$app->db;
                $connection->createCommand()->insert('mj_image', [
                    'imageFiles' => $images,
                ])->execute();
            }
            return $this->render('index',['model' => $model,'dataProvider'=>$dataProvider]);

        }
        else
        {
            return $this->render('_form',['model' => $model]);


        }
    }
}