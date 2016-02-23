    <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Advideos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advideos-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="col-md-9">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'des')->textarea(['rows' => 6]) ?>

        <!-- = $form->field($model, 'url')->textInput(['maxlength' => true])  -->

        <?= $form->field($model, 'url')->fileInput() ?>
    </div>

    <div class="col-md-3">
        <?= $form->field($model, 'vid_cat_id')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'biz_id')->textInput(['maxlength' => true]) ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>


    </div>

    <?php ActiveForm::end(); ?>

</div>
