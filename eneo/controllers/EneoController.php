<?php

namespace app\controllers;
use app\models\Category;
use app\models\Eneobizinfo;
use app\models\Advideos;

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
        
        $g = $this->groupGeocodes();
        return $this->render('index',['categories' =>$c,'groupcodes' => $g]);
    }

    function groupGeocodes(){
        $geocodes = Eneobizinfo::find()->all();
        $g='';
        foreach ($geocodes as $key => $geocode) {
            if (!empty($geocode['geocode'])) {
                $g.=$geocode['geocode'].','.$geocode['cat_id'].','.$geocode['name'].','.$geocode['cat_list_img_path'].'#';
            }
            
        }

        return $g;
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

        $g = $this->groupGeocodes();
        return $this->render('categorylist',['catlists'=>$l,'cat'=>$cat,'groupcodes' => $g]);
    }
    
    public function actionListing($id)
    {
        $this->layout = "eneolayout";

        $biz_vidz = Advideos::find()
        ->where(['biz_id' => $id])
        ->limit(5)
        ->all();
        // find by ID
        $biz = Eneobizinfo::find()
        ->where(['id' => $id])
        ->one();
        return $this->render('listing',['biz'=>$biz,'biz_vidz'=>$biz_vidz]);
    }


    public function actionDigital($id)
    {
        $this->layout = "eneolayout";

        // FIND BY ID
        $biz_vidz = Advideos::find()
        ->where(['biz_id' => $id])
        ->all();

        return $this->render('digital',['biz_vidz' => $biz_vidz]);
    }

    /**
     * actionVideo()
     *
     * show the chosen video
     *
     * @param   (int)       (id)            video id to be shown
     * @return  (mixed)
     */
    public function actionVideo($vid_id,$biz_id)
    {
        $this->layout = "eneolayout";

        $biz_vidz = Advideos::find()
        ->where(['id' => $vid_id])
        ->one();

        $biz = Eneobizinfo::find()
        ->where(['id' => $biz_id])
        ->one();
        return $this->render('digital-video',['biz_vidz' => $biz_vidz,'biz'=>$biz]);
    }

    public function catNameByID($id){
        $cat_name = Category::find()
        ->where(['id' => $id])
        ->one();

        return $cat_name;
    }







} // end SiteController class  
