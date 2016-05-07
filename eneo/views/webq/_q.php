<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Surveyques */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surveyques-form">



	<?php $form = ActiveForm::begin(); ?>
			
						<?php 
					    	$i = 1;
					    	// loop through the questions
					    	foreach ($q as $key => $value):
					    	// convert the string options to arrays
					     ?>
								
							<!-- label -->
							<label for=""><?php echo "Q. ".$i; ?>&nbsp;&nbsp;&nbsp;<?php echo $value['q'] ?></label>
							<!-- options -->

									<div class="form-group">
									<label for="<?= $value['id']  ?>"></label>
									<textarea class="form-control" rows="3" name="<?= $value['id']?>"></textarea>
									</div>
							 		
							
							<!-- /options -->
							
						
<!-- part 2 -->

			
						
						<?php $i++; endforeach; ?> <!--end of whole loop-->


						
						
						<!-- submit button -->
						 <div class="form-group">
					        <?= Html::submitButton($model->isNewRecord ? 'Finish' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
					    </div>
					
	<?php ActiveForm::end(); ?>
	
</div>
