<?php

namespace app\controllers;

use Yii;
use app\models\Backendusers;
use app\models\LoginForm;
use app\models\BackendusersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;


/**
 * BackendusersController implements the CRUD actions for Backendusers model.
 */
class BackendusersController extends Controller
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
                    [
                        'allow' => true,
                        'actions' => ['index','create'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update', 'index'],
                        'roles' => ['@'],
                    ],
                ],
            ],

        ];
    }

    /**
     * Lists all Backendusers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "adminlayout";

        $searchModel = new BackendusersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Backendusers model.
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
     * Creates a new Backendusers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = "adminlayout";

        $model = new Backendusers();
        $LoginFormModel = new LoginForm();

        if ($model->load(Yii::$app->request->post())) {

            // check of there is any image
            $i=$model->imageFile = UploadedFile::getInstance($model, 'img_path');
            if ($i) {
                // upload
                $img_name = mt_rand();
                $model->upload($img_name);
                // set the image path
                // $model->img_path = $img_name;
                $model->img_path = $img_name.'.'.$model->imageFile->extension;
            }

            // create a hash
            $model->pass_hash = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $model->role='normal';

            if ($model->save(false)) {
                // log in user the redirect
                Yii::$app->user->login($model);
                // return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['eneo/index']);
            }else{
                echo "not saved";
                return $model->getErrors();
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Backendusers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = "adminlayout";
        
        $model = $this->findModel($id);

       

        // if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {

            // check of there is any image
            $i=$model->imageFile = UploadedFile::getInstance($model, 'img_path');
            if ($i) {
                // upload
                $img_name = mt_rand();
                $model->upload($img_name);
                // set the image path
                // $model->img_path = $img_name;
                $model->img_path = $img_name.'.'.$model->imageFile->extension;
            }

            // then update the model
            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->render('update', [
                    'model' => $model,
                ]); 
            }
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Backendusers model.
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
     * Finds the Backendusers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Backendusers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Backendusers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
