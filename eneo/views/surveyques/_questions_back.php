<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Surveyques */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
<div class="surveyques-form">



	<?php $form = ActiveForm::begin(); ?>

	    <?php 
	    	$i = 1;
	    	// loop through the questions
	    	foreach ($q as $key => $value):
	    	// convert the string options to arrays
			$opt = explode(',', $value['opt']);
	     ?>
	     	<?php if ($i==1):?>
				<h3>Basic Information</h3>
			<?php endif; ?>

			<?php if ($i==12):?>
				<h3>Survey</h3>
			<?php endif; ?>

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
			<hr>
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
