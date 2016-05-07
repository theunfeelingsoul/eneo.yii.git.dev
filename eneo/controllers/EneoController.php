<?php

namespace app\controllers;
use app\models\Category;
use app\models\Eneobizinfo;
use app\models\Advideos;
use app\models\Comments;
use app\models\Backendusers;
use app\models\Videocat;

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

     /**
     * getUser()
     *
     * Get user data
     *
     * @param   (int)       (id)            video id to be shown
     * @return  (mixed)
     */
    public function getUser($id,$field="username"){
        $user = Backendusers::find()
        ->where(['id' => $id])
        ->one();
        // return $user['username'];
        return $user[$field];
    }
    
    public function actionListing($id)
    {
        $this->layout = "eneolayout";

        $commentModel = new Comments();

        // get the comments belongng ti the business post - bp
        // sort by id desc
         $biz_comments = Comments::find()
        ->where(['biz_id' => $id,'bp'=>1])
        ->orderBy(['id' => SORT_DESC, ])
        ->all();

        //add a variable that tell the comment form what comment page it is
        $comment_page="bp";

        // value of the bp
        $comment_page_value = 1; 

        $biz_vidz = Advideos::find()
        ->where(['biz_id' => $id])
        ->limit(5)
        ->all();
        // find by ID
        $biz = Eneobizinfo::find()
        ->where(['id' => $id])
        ->one();

        // get the user id from eneoinfobiz table
        $user_id = Eneobizinfo::find()
        ->where(['id'=> $id])
        ->one();

        // the using the user id above get the video categories
        $biz_vidz_cats = Videocat::find()
        ->where(['user_id' =>$user_id['user_id']])
        ->all();
        return $this->render('listing',[
                                        'biz'=>$biz,
                                        'biz_vidz'=>$biz_vidz,
                                        'biz_id'=>$id,
                                        'commentModel'=>$commentModel,
                                        'biz_comments'=>$biz_comments,
                                        'comment_page_value'=>$comment_page_value,
                                        'biz_vidz_cats' => $biz_vidz_cats,
                                        'comment_page'=>$comment_page
                                        ]
                            );
    }


     /**
     * actionDigital()
     *
     * Get video, playlist, user_id, number of videos in playlist
     *
     * @param   (int)       (id)            video id to be shown (var)  video playlist default is false
     * @return  (mixed)
     */
    public function actionDigital($id,$playlist=FALSE)
    {
        $this->layout = "eneolayout";

        // get the user id from eneoinfobiz table
        $user_id = Eneobizinfo::find()
        ->where(['id'=> $id])
        ->one();

        // the using the user id above get the video categories
        $biz_vidz_cats = Videocat::find()
        ->where(['user_id' =>$user_id['user_id']])
        ->all();

        // FIND videos BY ID
        if ($playlist):
            $biz_vidz = Advideos::find()
            ->where(['biz_id' => $id,'vid_cat_id' =>$playlist])
            ->all();

            $biz_vidz_count = Advideos::find()
            ->where(['biz_id' => $id,'vid_cat_id' =>$playlist])
            ->count();
        else:
            $biz_vidz = Advideos::find()
            ->where(['biz_id' => $id])
            ->all();

             $biz_vidz_count = Advideos::find()
            ->where(['biz_id' => $id])
            ->count();
        endif;
        
        return $this->render('digital',[
                                        'biz_vidz' => $biz_vidz,
                                        'biz_vidz_cats' => $biz_vidz_cats,
                                        'biz_id' => $id,
                                        'biz_vidz_count' => $biz_vidz_count
                                        ]
                            );
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

        $commentModel = new Comments();

        // get the comments belongng ti the business post - bp
        // sort by id desc
         $biz_comments = Comments::find()
        ->where(['biz_id' => $biz_id,'vp'=>$vid_id])
        ->orderBy(['id' => SORT_DESC, ])
        ->all();

        //add a variable that tell the comment form what comment page it is
        $comment_page="vp";
        // value of vp
        $comment_page_value = $vid_id;

        $biz_vidz = Advideos::find()
        ->where(['id' => $vid_id])
        ->one();

        $biz = Eneobizinfo::find()
        ->where(['id' => $biz_id])
        ->one();

        // get the user id from eneoinfobiz table
        $user_id = Eneobizinfo::find()
        ->where(['id'=> $biz_id])
        ->one();

        // the using the user id above get the video categories
        $biz_vidz_cats = Videocat::find()
        ->where(['user_id' =>$user_id['user_id']])
        ->all();

        return $this->render('digital-video',['biz_vidz' => $biz_vidz,
                                                'biz'=>$biz,
                                                'biz_id' => $biz_id,
                                                'commentModel'=>$commentModel,
                                                'biz_vidz_cats' => $biz_vidz_cats,
                                                'biz_comments'=>$biz_comments,
                                                'comment_page'=>$comment_page,
                                                'comment_page_value'=>$comment_page_value
            ]);
    }

    //  *
    //  * actionComment()
    //  *
    //  * add
    //  *
    //  * @param   (int)       (id)            video id to be shown
    //  * @return  (mixed)
     
    // public function actionComment(){

    // }

    public function catNameByID($id){
        $cat_name = Category::find()
        ->where(['id' => $id])
        ->one();

        return $cat_name;
    }







} // end SiteController class  
