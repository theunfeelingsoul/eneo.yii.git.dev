<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Eneobizinfo */

$this->title = 'Update Eneobizinfo: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Eneobizinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-md-6 col-md-offset-1">
	<div class="eneobizinfo-update">

	    <h1><?= Html::encode($this->title) ?></h1>

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
