<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Videocat */

$this->title = 'Update Videocat: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Videocats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-md-6 col-md-offset-1">
	<div class="videocat-update">

	    <h1><?= Html::encode($this->title) ?></h1>

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>