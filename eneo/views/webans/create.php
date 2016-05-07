<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Webans */

$this->title = 'Create Webans';
$this->params['breadcrumbs'][] = ['label' => 'Webans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="webans-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
