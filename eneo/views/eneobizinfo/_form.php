<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Eneobizinfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eneobizinfo-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_id')->dropDownList(
        ArrayHelper::map(Category::find()->all(),'id','title'),
        ['prompt'=>'Select Category']
    ); ?>

    <?= $form->field($model, 'cat_list_img_path')->fileInput() ?>

    <?= $form->field($model, 'des')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'geocode')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'highlights')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> Yii::$app->user->identity->id])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
