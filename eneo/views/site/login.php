<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
error_reporting(E_ALL);
ini_set('display_errors', 1);
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */



$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- <div class="col-md-6 col-md-offset-1"> -->
<div class="col-md-offset-1">
    <div class="site-login">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Please fill out the following fields to login:</p>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]); ?>

            <?= $form->field($model, 'username') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <div>
                Dont have an account? <?= Html::a('Create one. <span class="sr-only">(current)</span>', ['backendusers/create'], ['class' => 'nav-link']) ?>
            </div>

        <?php ActiveForm::end(); ?>

      
    </div>
</div>