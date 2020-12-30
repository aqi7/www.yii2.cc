<?php

namespace backend\controllers;
use backend\models\MjAdmin;
use yii;


class LoginController extends \yii\web\Controller
{
 	/**
     * 
     * 登陆功能
     */
    public function actionIndex()
    {
    	$request = Yii::$app->request;
	  	if($request->isPost)
    	{
    		$admin = MjAdmin::find();
            $user = $request->post()['MjAdmin']['ename'];
    		 $pwd =  $request->post()['MjAdmin']['pwd'] ;
		 
    	    $num = $admin->where(['ename'=>$user,'pwd'=>$pwd])->andwhere(['status'=>1])->count();
    		
    		if($num >= 1)
    		{   
				$one = $admin->where(['ename'=>$user,'pwd'=>$pwd])->andwhere(['status'=>1])->asArray()->one();
    			$session = Yii::$app->session;
    			$session->open();
    			$session->set('eid',$one['eid']);//员工id
			    $session->set('ename',$one['ename']); //用户名
			    $session->set('type',$one['type']);//管理员类型
    			//echo $session->get('a_id');
				\Yii::$app->getSession()->setFlash('success', '登陆成功');
    			 return $this->redirect(['/mj-order/index']);
    		}
    		else
    		{    \Yii::$app->getSession()->setFlash('error', '用户名或者密码错误');
    			 return $this->redirect(['/login/index']);
    		}
    	}
    	else
    	{
	    	$model = new MjAdmin();
	    	return $this->renderPartial('index',['model'=>$model]);
    	}

    }
    
    public function actionExit()
    {
    	$session = Yii::$app->session;
    	$session->open();
    	$session->destroy();
    	return $this->redirect(['/login/index']); 
    }


    public function actionEditpwd(){
        
        $kkpwd = Yii::$app->session->get('eid');
        $model = MjAdmin::findOne($kkpwd);
        $kpwd = $model->pwd;
        if ($model->load(Yii::$app->request->post()) ) {
            $a_pwd = Yii::$app->request->post()['MjAdmin']['xinmi']; //新密码
            $a_qpwd = Yii::$app->request->post()['MjAdmin']['quemi']; //确认密码
            $a_ypwd = Yii::$app->request->post()['MjAdmin']['yuanmi']; //原密码
            if($kpwd==$a_ypwd){
                if($a_pwd==$a_qpwd){
                    $model->pwd = $a_qpwd;
                    $model->save();
					\Yii::$app->getSession()->setFlash('success', '修改密码成功');


                    return $this->redirect(['login/editpwd']);
                }
                else{
                    echo '确认密码错误';
                }
            }else{
                echo '原密码错误';
            }

        } else {
            return $this->render('editpwd', [
                'model' => $model
            ]);
        }
    }
    public function actionGetmima()
    {
        $session = Yii::$app->session;
        $session->open();
        $em_id = $session->get('eid'); 

        $mi = Yii::$app->request->get('mi'); //新的密码

        $emp = MjAdmin::find()->where(['eid'=>$em_id])->asArray()->one();

        if($emp['pwd'] != $mi)
        {
           echo 402;
        }
    }

}
