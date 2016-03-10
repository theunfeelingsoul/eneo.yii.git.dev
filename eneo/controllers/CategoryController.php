<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->layout = "adminlayout";

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {   
        $this->layout = "adminlayout";

        $model = new Category(['scenario' => 'create']);

        if ($model->load(Yii::$app->request->post()) ) {

            $model->imageFile = UploadedFile::getInstance($model, 'img_path');
            $img_name = mt_rand();
            $model->img_path = $img_name.'.'.$model->imageFile->extension;
            if ($model->upload($img_name)) { 
                // file is uploaded successfully
                if ($model->save(false)) {
                   return $this->redirect(['view', 'id' => $model->id]);
                }else{
                    return $model->getErrors();
                }
            }else{
                echo "did not upload";
            }

            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {   
        // add the scenario
        // i.e img_path is not required in update
        $model = new Category;
        $model->scenario = 'update';

        $model = $this->findModel($id);

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
    }

    /**
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
