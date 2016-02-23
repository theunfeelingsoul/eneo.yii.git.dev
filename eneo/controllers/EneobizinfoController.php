<?php

namespace app\controllers;

use Yii;
use app\models\Eneobizinfo;
use app\models\EneobizinfoSearch;
use app\models\Category;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
        ];
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
        // $model = new Eneobizinfo();

        // get data from catergory model
        // $c = Category::find()->all();
        $c =array('ccc' => 'dcdc','ccc' => 'dcdc' );


        // check post request // upload image // save record
        if ($model->load(Yii::$app->request->post()) ) {


            $img_name=$model->imageFile = UploadedFile::getInstance($model, 'cat_list_img_path'); // get image
            $model->cat_list_img_path = $img_name; // add the name to the model
            
            if ($model->upload()) { 
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
            $image=$model->imageFile = UploadedFile::getInstance($model, 'cat_list_img_path');
            if ($image) {
                // upload
                $model->upload();
                // set the image path
                $model->cat_list_img_path = $image;
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
