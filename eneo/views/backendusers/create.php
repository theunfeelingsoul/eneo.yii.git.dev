<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $model app\models\Backendusers */

$this->title = 'Create an account';
$this->params['breadcrumbs'][] = ['label' => 'Backendusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-6 col-md-offset-1">
	<div class="backendusers-create">

	    <h2><?= Html::encode($this->title) ?></h2>
	    <span id="helpBlock" class="help-block">Its free.</span>

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>