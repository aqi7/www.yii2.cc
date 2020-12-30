<?php

namespace app;

class HoolController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
