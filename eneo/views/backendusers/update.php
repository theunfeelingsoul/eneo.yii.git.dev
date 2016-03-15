<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $model app\models\Backendusers */

$this->title = 'Update Backendusers: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Backendusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-md-6 col-md-offset-1">
	<div class="backendusers-update">
		<div class="widget-breadcrums">
             <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>

	    <h1><?= Html::encode($this->title) ?></h1>

	    <?= $this->render('_updateform', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>