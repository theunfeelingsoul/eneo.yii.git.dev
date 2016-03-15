<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Surveyans */

$this->title = 'Update Surveyans: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Surveyans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="surveyans-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
