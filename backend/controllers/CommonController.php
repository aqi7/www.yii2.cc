<?php
namespace backend\controllers;

use yii;
use yii\web\Controller;

class CommonController extends Controller
{
	public function __construct($id, $module)
	{
		parent::__construct($id, $module);
		
		$session = Yii::$app->session;
		$session->open();
		 //echo $session->get('em_id');
	 
		if(!$session->get('eid'))
		{ 
		 	return $this->redirect(['/login/index']);
		//	die();
		}
	}
	
}