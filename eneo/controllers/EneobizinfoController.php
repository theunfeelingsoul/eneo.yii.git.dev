<?php

namespace app\controllers;

use Yii;
use app\models\Eneobizinfo;
use app\models\EneobizinfoSearch;
use app\models\Category;
use app\models\LoginForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * EneobizinfoController implements the CRUD actions for Eneobizinfo model.
 */
class EneobizinfoController extends Controller
{   
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],

            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'index'],
                'rules' => [
                    // [
                    //     'allow' => true,
                    //     'actions' => ['index'],
                    //     'roles' => ['?'],
                    // ],
                    [
                        'allow' => true,
                        'actions' => ['create', 'update', 'index'],
                        'roles' => ['@'],
                    ],
                ],
            ],

            
        ];

        

    }

     public function actionLogin()
    {
        

        $this->layout = "adminlogin";

        // if (!\Yii::$app->user->isGuest) {
        //     return $this->goHome();
        // }
        $model = new LoginForm();
        // if ($model->load(Yii::$app->request->post()) && $model->login()) {
        //     // return $this->goBack();
        //     return $this->redirect(['eneobizinfo/index']);

        // }
        return $this->render('../site/login', [
            'model' => $model,
        ]);
    }

    /**
     * Lists all Eneobizinfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EneobizinfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->layout = "adminlayout";

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Eneobizinfo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $this->layout = "adminlayout";

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Eneobizinfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {   
        $this->layout = "adminlayout";

        $model = new Eneobizinfo(['scenario' => 'create']);

        // check post request // upload image // save record
        if ($model->load(Yii::$app->request->post()) ) {

            $model->imageFile = UploadedFile::getInstance($model, 'cat_list_img_path'); // get image
            
            // get a random number as the image name
            $img_name = mt_rand();
            // save it to the variable 
            $model->cat_list_img_path = $img_name.'.'.$model->imageFile->extension;
            if ($model->upload($img_name)) { 
                // file is uploaded successfully
                if ($model->save(false)) {
                    return $this->redirect(['view', 'id' => $model->id]);
                    exit();
                }else{
                    return $model->getErrors();
                }
            }else{
                echo "did not upload";
            }
        } // endif 
            

        return $this->render('create', ['model' => $model]);

    }

    /**
     * Updates an existing Eneobizinfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {   
        $this->layout = "adminlayout";

        /*commented out for now. Seems not to be needed */
        //add the scenario
        //i.e img_path is not required in update
        //$model = new Eneobizinfo;
        //$model->scenario = 'update';
         

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            // check of there is any image
            $i=$model->imageFile = UploadedFile::getInstance($model, 'cat_list_img_path');

            // get a random number as the image name
            $img_name = mt_rand();
            // save it to the variable 
            $model->cat_list_img_path = $img_name.'.'.$model->imageFile->extension;

            if ($i) {
                // upload
                $model->upload($img_name);
                // set the image path
                $model->cat_list_img_path = $img_name.'.'.$model->imageFile->extension;
            }

            // save set to false...still dont knw why, but works like this.
            if ($model->save(false)) {
               return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $model->getErrors();
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // } else {
        //     return $this->render('update', [
        //         'model' => $model,
        //     ]);
        // }
    }

    /**
     * Deletes an existing Eneobizinfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Eneobizinfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Eneobizinfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Eneobizinfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
