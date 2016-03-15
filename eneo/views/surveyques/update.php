<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Surveyques */

$this->title = 'Update Surveyques: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Surveyques', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="surveyques-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
