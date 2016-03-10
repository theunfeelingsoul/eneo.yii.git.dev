    <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Videocat;
use app\models\EneoBizinfo;

/* @var $this yii\web\View */
/* @var $model app\models\Advideos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advideos-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'des')->textarea(['rows' => 6]) ?>

        <!-- = $form->field($model, 'url')->fileInput()  -->

        <?= $form->field($model, 'vid_cat_id')->dropDownList(
            ArrayHelper::map(Videocat::find() ->where(['user_id' => Yii::$app->user->identity->id])->all(),'id','cat_name'),
            ['prompt'=>'Select Category']
        ); ?>

        <?= $form->field($model, 'biz_id')->dropDownList(
            ArrayHelper::map(EneoBizinfo::find() ->where(['user_id' => Yii::$app->user->identity->id])->all(),'id','name'),
            ['prompt'=>'Select Buisness ID']
        ); ?>

        <?= $form->field($model, 'user_id')->hiddenInput(['value'=> Yii::$app->user->identity->id])->label(false); ?>

        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>



    <?php ActiveForm::end(); ?>

</div>
