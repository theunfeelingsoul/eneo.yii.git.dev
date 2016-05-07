<?php

namespace app\controllers;

use Yii;
use app\models\Webq;
use app\models\WebqSearch;
use app\models\Webans;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WebqController implements the CRUD actions for Webq model.
 */
class WebqController extends Controller
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
     * Lists all Webq models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WebqSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Webq model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionSurvey(){
        // check if there is data first
        // if so redirect
        $count = Webans::find()
        ->indexBy('id')
        ->count();

        if ($count == 0):
            // $this->layout = "adminlayoutnosidebar";
            $model = new Webq();
            
            $q = Webq::find()->all();
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
                    $a = new Webans();
                    // assign the value from the post to the model
                    $customer = Webq::findOne($key);
                    $qs = $customer->q;

                    $a->qid    =$qs;
                    $a->ans     =$value;
                    $a->save(false);
                }
                return $this->redirect(['webans/index']);
                // return $this->redirect(['surveyans/index']);

            } else {
                return $this->render('question', [
                    'model' => $model,
                    'q' => $q,
                ]);
            }
        else:
            // redirect to edit answers 
            return $this->redirect(['webans/index']);
        endif;
    } // end function

    public function actionThankyou()
    {   
        // $this->layout = "adminlayoutnosidebar";
        return $this->render('response');
    }

    /**
     * Creates a new Webq model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Webq();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Webq model.
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
     * Deletes an existing Webq model.
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
     * Finds the Webq model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Webq the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Webq::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
