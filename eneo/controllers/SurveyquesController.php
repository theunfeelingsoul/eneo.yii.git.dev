<?php

namespace app\controllers;

use Yii;
use app\models\Surveyques;
use app\models\Surveyans;
use app\models\SurveyquesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SurveyquesController implements the CRUD actions for Surveyques model.
 */
class SurveyquesController extends Controller
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
        ];
    }

    /**
     * Lists all Surveyques models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "adminlayout";
        $searchModel = new SurveyquesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     public function actionCollapse()
    {
        $this->layout = "adminlayoutnosidebar";
        return $this->render('collapse');
    }

    /**
     * Displays a single Surveyques model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionThankyou()
    {   
        $this->layout = "adminlayoutnosidebar";
        return $this->render('response');
    }

    public function actionSurvey(){
        $this->layout = "adminlayoutnosidebar";
        $model = new Surveyques();
        
        $q = Surveyques::find()->all();
        $request = Yii::$app->request;
         
        if ($request->post()) {
            // get the post data
            $post = $request->post(); 
            unset($post['_csrf']);
            // echo "<pre>";
            // print_r($post);
            // echo "</pre>";

            // exit();
            // use a loop to save teh form data
            foreach ($post as $key => $value) {
                // instatiate the model at the begining of the loop
                // because because it will only save the last record if i dont 
                $a = new Surveyans();
                // assign the value from the post to the model
                $a->q_id    =$key;
                $a->ans     =$value;
                $a->user_id =$post['user_id']; // user id from post
                $a->save(false);
            }
            return $this->redirect(['thankyou']);
            // return $this->redirect(['surveyans/index']);

        } else {
            return $this->render('questions', [
                'model' => $model,
                'q' => $q,
            ]);
        }
    }

    /**
     * Creates a new Surveyques model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Surveyques();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Surveyques model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Surveyques model.
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
     * Finds the Surveyques model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Surveyques the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Surveyques::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
