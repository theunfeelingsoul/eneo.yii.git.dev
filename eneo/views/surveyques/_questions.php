<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Surveyques */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surveyques-form">



	<?php $form = ActiveForm::begin(); ?>
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							CLick here <span class="glyphicon glyphicon-chevron-right"></span> Part 1 : Basic business information 
						</a>
					</h4>
			    </div>
				<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body">
						<?php 
					    	$i = 1;
					    	// loop through the questions
					    	foreach ($q as $key => $value):
					    	// convert the string options to arrays
							$opt = explode(',', $value['opt']);
					     ?>
					     	<?php if ($i <= 12):?>
								
							<!-- label -->
							<label for=""><?php echo "Q. ".$i; ?>&nbsp;&nbsp;&nbsp;<?php echo $value['q'] ?></label>
							<!-- options -->
							<?php foreach ($opt as $key => $opts):?>

								<?php if ($i==1): ?>
									<div class="form-group">
									<label for="<?= $value['id']  ?>"></label>
									<input type="text" class="form-control" name="<?= $value['id']  ?>"></input>
									</div>
								<?php else: ?>
							 		<div class="radio">
									  <label>
									    <input type="radio" name="<?= $value['id']  ?>" id="" value="<?= $opts ?>" checked>
									    <?= $opts ?>
									  </label>
									</div>
								<?php endif; ?>
							
							<?php endforeach; ?><hr/>
							<!-- /options -->
							<?php endif; ?>
							
						<?php $i++; endforeach; ?>
						<div class="continue-ques">
							<p>Continue</p>
							<span class="glyphicon glyphicon-chevron-down"></span>
						</div>
					</div><!--/.panel-body-->
			    </div><!--/#collapseOne-->
			</div><!--/.panel-->
<!-- part 2 -->

			<div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingTwo">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							CLick here <span class="glyphicon glyphicon-chevron-right"></span> Part 2 : Survey
						</a>
					</h4>
			    </div>
			    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					<div class="panel-body">
						<?php 
					    	$i = 1;
					    	// loop through the questions
					    	foreach ($q as $key => $value):
					    	// convert the string options to arrays
							$opt = explode(',', $value['opt']);
						?>
						<?php if ($i > 12):?>
							
						<!-- label -->
						<label for=""><?php echo "Q. ".$i; ?>&nbsp;&nbsp;&nbsp;<?php echo $value['q'] ?></label>
						<!-- options -->
						<?php foreach ($opt as $key => $opts):?>

							<?php if ($i==1 or $i==2 ): ?>
								<div class="form-group">
								<label for="exampleInputEmail1"></label>
								<input type="text" name="<?= $value['id']  ?>"></input>
								</div>
							<?php else: ?>
						 		<div class="radio">
								  <label>
								    <input type="radio" name="<?= $value['id']  ?>" id="" value="<?= $opts ?>" checked>
								    <?= $opts ?>
								  </label>
								</div>
							<?php endif; ?>
						
						<?php endforeach; ?><hr/>
						<!-- /options -->
						<?php endif; ?>
						
						<?php $i++; endforeach; ?> <!--end of whole loop-->


						<!-- the hidden user id if its there -->
						<?php 
							if (isset(Yii::$app->user->identity->id)):
						?>
							<input type="hidden" name="user_id" value="<?php if (isset(Yii::$app->user->identity->id)){echo Yii::$app->user->identity->id; }  ?>"></input>
						<?php else: ?>
							<input type="hidden" name="user_id" value="none"></input>
						<?php endif; ?>
						<!-- submit button -->
						 <div class="form-group">
					        <?= Html::submitButton($model->isNewRecord ? 'Finish' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
					    </div>
					</div> <!--/.panel-body-->
			    </div><!--/#collapseTwo-->
			</div> <!--/.panel-->
		</div><!--/#accordion-->
	<?php ActiveForm::end(); ?>
	
</div>
