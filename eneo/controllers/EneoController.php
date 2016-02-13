<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;


class EneoController extends Controller
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
        $this->layout = "eneolayout";
        return $this->render('index');
    }

    public function actionCategory()
    {
        $this->layout = "eneolayout";
        return $this->render('categorylist');
    }
    
    public function actionListing()
    {
        $this->layout = "eneolayout";
        return $this->render('listing');
    }

    public function actionDigital()
    {
        $this->layout = "eneolayout";
        return $this->render('digital');
    }

    public function actionVideo()
    {
        $this->layout = "eneolayout";
        return $this->render('digital-video');
    }







} // end SiteController class  
