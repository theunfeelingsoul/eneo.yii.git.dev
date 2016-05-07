<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Surveyques */

$this->title = 'Questionnaire';
$this->params['breadcrumbs'][] = ['label' => 'webq', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="surveyques-create">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
		    
		    <h3>Here are a few questions just to get a grasp to make the prototype.</h3> 
		    <p>You do not have to fill all of them. Just make sure to save after you are done</p>
		    <p>There are 21 questions on this page.</p>
		    <p>I apologise if some questions are mendokusaii.</p>


		    <?= $this->render('_q', [
		        'model' => $model,
		        'q' => $q,
		    ]) ?>

		</div>
	</div>
</div>
