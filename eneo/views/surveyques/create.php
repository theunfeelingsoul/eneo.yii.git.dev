<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Surveyques */

$this->title = 'Create Surveyques';
$this->params['breadcrumbs'][] = ['label' => 'Surveyques', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surveyques-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
