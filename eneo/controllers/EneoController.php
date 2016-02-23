<?php

namespace app\controllers;
use app\models\Category;
use app\models\Eneobizinfo;

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

        // get data from category model
        $c = Category::find()->all();
        
        return $this->render('index',['categories' =>$c]);
    }

    public function actionCategorylist($id)
    {
        $this->layout = "eneolayout";

        // get category details for the id // I want the name
        $cat = $this->catNameByID($id);

        // find by cat_id
        $l = Eneobizinfo::find()
        ->where(['cat_id' => $id])
        ->all();

        return $this->render('categorylist',['catlists'=>$l,'cat'=>$cat]);
    }
    
    public function actionListing($id)
    {
        $this->layout = "eneolayout";

        // find by ID
        $biz = Eneobizinfo::find()
        ->where(['id' => $id])
        ->one();
        return $this->render('listing',['biz'=>$biz]);
    }

    public function actionDigital()
    {
        $this->layout = "eneolayout";

        // FIND BY ID

        return $this->render('digital');
    }

    public function actionVideo()
    {
        $this->layout = "eneolayout";
        return $this->render('digital-video');
    }

    public function catNameByID($id){
        $cat_name = Category::find()
        ->where(['id' => $id])
        ->one();

        return $cat_name;
    }







} // end SiteController class  
