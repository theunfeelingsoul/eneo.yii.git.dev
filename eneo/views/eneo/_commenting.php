<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 ?>
<div class="col-md-12" id="biz-comment-box">
	<h2>REVEIWS</h2>
	<div class="biz-comment-container">
		<?php foreach ($biz_comments as $key => $value): ?>
			<div class="col-md-12 biz-comments">
				<div class="col-md-2 biz-comment-profile-img">
					<?php echo Html::img('@web/images/uploads/profiles/'.$this->context->getUser($value["user_id"],"img_path")) ?>
					<!-- user name -->
					<div class="biz-comments-user">
						<?php echo $this->context->getUser($value['user_id']) ?>
					</div>
				</div>
				<div class="col-md-8 biz-comment">
					<div class="biz-comment-rating">
						<!-- <p>Name</p> -->
						**** - 
						<span class="biz-comment-date"><?=gmdate("M j, Y", 	$value['post_date']); ?></span>
					</div>
					<div class="biz-comment-text">
				<p><?=$value['comment'] ?></p>
					</div>
				</div>
			</div><!--/.biz-comments-->
		<?php endforeach; ?>
	</div>
	<div class="biz-comments-form">
		<?php if(isset(Yii::$app->user->identity->role)): ?>
			<!-- <form> -->
			<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'action' => ['comments/create'],]); ?>
				<!-- <label for="" class="col-sm-2 control-label">Email</label> -->
				<?= $form->field($commentModel, 'comment')->textarea(['rows' => 4,'placeholder'=>'Add a comment'])->label(false); ?>
				<?= $form->field($commentModel, 'user_id')->hiddenInput(['value'=> Yii::$app->user->identity->id])->label(false); ?>

				<?= $form->field($commentModel, $comment_page)->hiddenInput(['value'=>$comment_page_value])->label(false); ?>

				<?= $form->field($commentModel, 'biz_id')->hiddenInput(['value'=> $biz['id']])->label(false); ?>

				<?= $form->field($commentModel, 'post_date')->hiddenInput(['value'=>time()])->label(false); ?>

				 <div class="form-group">
			        <?= Html::submitButton($commentModel->isNewRecord ? 'Post' : 'Update', ['class' => $commentModel->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
			    </div>
		<?php ActiveForm::end(); ?>
		<?php else: ?>
			<p><?=Html::a('LOG IN ', ['site/login']) ?>or REGISTER to post comments</p>
		<?php endif; ?>
	</div>
</div> <!--/#biz-comment-box-->