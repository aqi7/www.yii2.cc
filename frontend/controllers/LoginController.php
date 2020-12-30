<?php
namespace frontend\controllers;

use backend\models\Yuangong;
use yii\db\Query;
use yii;
use Codeception\Test\Loader;

class LoginController extends \yii\web\Controller
{
    
    /**
     * 用户登陆
     */
    public function actionIndex()
    {
    	$model = new Yuangong();
    	if(Yii::$app->request->post()){
    		$user=Yii::$app->request->post('name');
    		$pwd=Yii::$app->request->post('pwd');
    		$num=$model->find()->where(['y_name' => $user,'y_pwd'=>$pwd])->count('y_id');
    		if($num>0)
    		{
    			$session = Yii::$app->session;
    			$session->open();
    			$session->set('y_id',$model['y_id']);
			    $session->set('y_name',$model['y_name']);
			    $session->set('y_pwd',$model['y_pwd']);
    			return $this->redirect(['/index/index']);
    		}
    		else
    		{
    			echo '登录失败';
    		}
    	}
     	else{

     		return $this->render("sign");
     	}
        
    }
    
    /**
     * 
     * 退出登陆
     */
	public function actionExit()
    {
        $session = Yii::$app->session;
    	$session->open();
    	$session->destroy();
    	return $this->redirect(['/login/index']);
    }
    
    /**
     * 
     * 用户注册
     */
    public function actionRegister()
    {

    		return $this->render('register');

    }
    
    public function actionYzm()
    {
    	$session = Yii::$app->session;
    	$session->open();
		
		//创建真彩色白纸 
		$im = @imagecreatetruecolor(50, 20) or die("建立图像失败"); 
		//获取背景颜色 
		$background_color = imagecolorallocate($im, 255, 255, 255); 
		//填充背景颜色(这个东西类似油桶) 
		imagefill($im,0,0,$background_color); 
		//获取边框颜色 
		$border_color = imagecolorallocate($im,200,200,200); 
		//画矩形，边框颜色200,200,200 
		imagerectangle($im,0,0,49,19,$border_color); 
		
		//逐行炫耀背景，全屏用1或0 
		for($i=2;$i<18;$i++){ 
		//获取随机淡色 
		$line_color = imagecolorallocate($im,rand(200,255),rand(200,255),rand(200,255)); 
		//画线 
		imageline($im,2,$i,47,$i,$line_color); 
		} 
		
		//设置字体大小 
		$font_size=12; 
		
		//设置印上去的文字 
		$Str[0] = "01234567891234567890123456"; 
		$Str[1] = "01234567891234567890123456"; 
		$Str[2] = "01234567891234567890123456"; 
		
		//获取第1个随机文字 
		$imstr[0]["s"] = $Str[rand(0,2)][rand(0,25)]; 
		$imstr[0]["x"] = rand(2,5); 
		$imstr[0]["y"] = rand(1,4); 
		
		//获取第2个随机文字 
		$imstr[1]["s"] = $Str[rand(0,2)][rand(0,25)]; 
		$imstr[1]["x"] = $imstr[0]["x"]+$font_size-1+rand(0,1); 
		$imstr[1]["y"] = rand(1,3); 
		
		//获取第3个随机文字 
		$imstr[2]["s"] = $Str[rand(0,2)][rand(0,25)]; 
		$imstr[2]["x"] = $imstr[1]["x"]+$font_size-1+rand(0,1); 
		$imstr[2]["y"] = rand(1,4); 
		
		//获取第4个随机文字 
		$imstr[3]["s"] = $Str[rand(0,2)][rand(0,25)]; 
		$imstr[3]["x"] = $imstr[2]["x"]+$font_size-1+rand(0,1); 
		$imstr[3]["y"] = rand(1,3); 
		
		//写入随机字串 
		for($i=0;$i<4;$i++){ 
		//获取随机较深颜色 
		$text_color = imagecolorallocate($im,rand(50,180),rand(50,180),rand(50,180)); 
		//画文字 
		imagechar($im,$font_size,$imstr[$i]["x"],$imstr[$i]["y"],$imstr[$i]["s"],$text_color);
		$as[]=$imstr[$i]['s'];
		} 
		$session->set('yzm',implode('',$as));
		//显示图片 
		imagepng($im); 
		//销毁图片 
		//imagedestroy($im);
    }

}
