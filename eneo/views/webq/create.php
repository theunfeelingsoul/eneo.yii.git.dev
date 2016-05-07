<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Webq */

$this->title = 'Create Webq';
$this->params['breadcrumbs'][] = ['label' => 'Webqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="webq-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
