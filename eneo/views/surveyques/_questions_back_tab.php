<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Surveyques */
/* @var $form yii\widgets\ActiveForm */
?>

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Part 1: Basic Infomation</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Part 2: Survey</a></li>
  </ul>

  

<div class="surveyques-form">



	<?php $form = ActiveForm::begin(); ?>
	<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="home">
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
			
			<?php endforeach; ?>
			<!-- /options -->
			<?php endif; ?>
			
		<?php $i++; endforeach; ?>
		</div>
   
<!-- part 2 -->

<div role="tabpanel" class="tab-pane" id="profile">
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
			
			<?php endforeach; ?>
			<!-- /options -->
			<?php endif; ?>
			
		<?php $i++; endforeach; ?>


    

		<!-- the hiided user id if its there -->
		<?php 
			if (isset(Yii::$app->user->identity->id)):
		 ?>
			<input type="hidden" name="user_id" value="<?php if (isset(Yii::$app->user->identity->id)){echo Yii::$app->user->identity->id; }  ?>"></input>
		<?php else: ?>
			<input type="hidden" name="user_id" value="none"></input>
		<?php endif; ?>

		 <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Finnish' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
	    </div>
	<?php ActiveForm::end(); ?>
	
</div>
</div>
</div>
