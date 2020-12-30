<?php

namespace backend\controllers;

use backend\models\Hobby;
use backend\models\MjStudent;
use backend\models\Room;
use Yii;
use backend\models\Student;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;



/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends CommonController
{
   
    //这个东西是必须要配置的，位置的话没什么特别的要求，直接加到控制器里面就行了，具体的
    //配置参照注释
    public function actions()
    {
        return [
            'upload' => [
                'class' => 'common\widgets\file_upload\UploadAction',
                'config' => [
                    // "imageUrlPrefix"  => "",//图片访问路径前缀
                    'imagePathFormat' => "/uploads/{yyyy}{mm}{dd}/{time}{rand:6}", //上传保存路径
                    // "imageFieldName"          => "xxx",  //这个我怀疑是随便写都行
                    // "imageActionName"         => "imagefile",  //这里uploadimage一定要用小写，请求的时候，会自动拼接action 上去，类似于：
    //http://xxxxxx.com/index.php?r=xxxx/upload&action=uploadimage    具体参考UEditorAction的48行
                ],
            ]
        ];
    }
   
    // public function actions()
    // {
    //     return [
    //         'upload'=>[
    //             'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
    //             'config' => [
    //                 'imagePathFormat' => "/uploads/{yyyy}{mm}{dd}/{time}{rand:6}",
    //             ]
    //         ]
    //     ];
    // }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query=Student::find()->joinwith('room');

        $dataProvider = new ActiveDataProvider([
            'query' => Student::find(),
            'pagination' => [
                'pagesize' => '4',
            ],
            // 'orderby' => 'sid desc'
        ]);
        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),
        ]);
        $data = $query->orderBy('sid desc')
        ->limit($pagination->limit);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'pages' => $pagination,
            // 'model'=>$query
        ]);
    }

    /**
     * Displays a single Student model.
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
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Student();
        $request=Yii::$app->request;
        // $query=Student::find()->joinwith('eroom');
        if ($model->load(Yii::$app->request->post())&&$model->save()) {
          
            // // if($model2=UploadedFile::getInstance($model, 'imageFile')){

			    // $ext = $model2->getExtension();
				// $newName = time().rand(100,999).'.'.$ext;
				// $model2->saveAs('uploads/' .$newName);
			    // $model->imageFile = $newName;
			// }
			// $model->sid=Yii::$app->session->get('sid');
			// $model->save();
		 
            return $this->redirect(['view', 'id' => $model->sid]);
        } else {
            $admin = Room::find()->all();
            $data=Hobby::find()->all();
            if($model->imageFile == "" && $model->imageFile==null){
                $model->imageFile="uploads/1.jpg";
            }
            return $this->render('create', [
                'model' => $model,
                'admin' => $admin,
                'data' =>$data,
            ]);
        }
    }

    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())&&$model->save()) {
            // $hids=$model->hid;
            // $hobby=explode(',',$hids);
            // $model->hid=$hobby;
            //    print_r($model->hid);die;
                return $this->redirect(['view', 'id' => $model->sid]);
            } else {
                $data=Hobby::find()->all();
                $admin = Room::find()->all();
                return $this->render('update', [
                'admin' => $admin,
                'data' =>$data,
                'model' => $model,
                ]);
            }
        
    }

    /**
     * Deletes an existing Student model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /*
    * 批量删除
    */  
    public function actionDeleteall(){
        $model = new Student();
        $condigtion = '';
        $ids_str = '';
        $ids_str = Yii::$app->request->post('ids_str');
        echo $ids_str;
        $ids=explode(',',$ids_str);
        foreach($ids as $v){
            $this->findModel($v)->delete();
        }
        if(!empty($ids_str)){
            $condition = 'sid in('.$ids_str.')';
            $lists = $model->find()->where($condition)->all();
            foreach ($lists as $key => $val) {
                //删除旧文件
                if(!empty($val['imageFile'])){
                    @unlink($val['imageFile']);
                }
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}