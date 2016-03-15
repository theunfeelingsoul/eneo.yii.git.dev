<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Surveyques */

$this->title = 'Questionnaire';
$this->params['breadcrumbs'][] = ['label' => 'Surveyques', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="surveyques-create">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
		    
		    <h3>ICT and digital media in marketing questionnaire</h3> 
		    <p>This questionnaire is meant to collect information regarding digital media for marketing. Information will be gathered and used for academic purposes only. Your responses will be treated with the highest degree of confidentiality. Therefore, I request you to answer the following questions as openly as you can.</p>
		    <p>There are 20 questions in this survey.</p>


		    <?= $this->render('_questions', [
		        'model' => $model,
		        'q' => $q,
		    ]) ?>

		</div>
	</div>
</div>
