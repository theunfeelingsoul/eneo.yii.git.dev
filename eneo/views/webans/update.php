<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Webans */

$this->title = 'Update Webans: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Webans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="webans-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
