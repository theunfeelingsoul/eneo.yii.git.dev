<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Surveyans */

$this->title = 'Create Surveyans';
$this->params['breadcrumbs'][] = ['label' => 'Surveyans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surveyans-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
