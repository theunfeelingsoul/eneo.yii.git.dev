<?php

namespace app\controllers;

use Yii;
use app\models\Advideos;
use app\models\AdvideosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * AdvideosController implements the CRUD actions for Advideos model.
 */
class AdvideosController extends Controller
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

    /**
     * Lists all Advideos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "adminlayout";
        
        $searchModel = new AdvideosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advideos model.
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
     * Creates a new Advideos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
    {
        $this->layout = "adminlayout";
        
        $model = new Advideos();

        //to do check if id is ok
        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    // public function old_actionCreate()
    // {
    //     $this->layout = "adminlayout";
        
    //     $model = new Advideos();

    //     if ($model->load(Yii::$app->request->post()) ) {                

    //         $model->imageFile = UploadedFile::getInstance($model, 'url');
    //         // Create a name
    //         $x = rand();
    //         $model->url = $x;
            
    //         if ($model->upload($x)) { 
    //             // file is uploaded successfully
    //             if ($model->save(false)) {
    //                return $this ->redirect(['view', 'id' => $model->id]);
    //             }else{
    //                 return $model->getErrors();
    //             }
    //         }else{
    //             echo "did not upload";
    //         }

            
    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //         ]);
    //     }

    //     // if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //     //     return $this->redirect(['view', 'id' => $model->id]);
    //     // } else {
    //     //     return $this->render('create', [
    //     //         'model' => $model,
    //     //     ]);
    //     // }
    // }

    /**
     * Updates an existing Advideos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = "adminlayout";
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Advideos model.
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
     * Finds the Advideos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advideos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advideos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
