<?php 


namespace app\controllers;

use Yii;
use yii\web\Controller;

/**
* 
*/
class AdminController extends Controller
{
	
	public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {   
        $this->layout = "adminlayout";
        return $this->render('index');
    }

    public function actionAddCategory(){
        $this->layout = "adminlayout";
        return $this->render('category');
    }
}









 ?>