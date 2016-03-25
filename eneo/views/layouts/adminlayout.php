<?php 
use yii\helpers\Html;
use app\assets\AdminAsset;
use app\assets\EneoAsset;
use app\models\Category;
AdminAsset::register($this);
EneoAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>	
</head>
<body>
<?php $this->beginBody() ?>																																																																																					

<?= $this->render('_eneoheader') ?>
<div id="business-banner-line">
</div>

<div class="container">
	<div class="row">
		<?php if(isset(Yii::$app->user->identity->role)): ?>
			<div class="sidebar col-md-2">
				<div class="row">
					<ul class="nav-sidebar">
						<!-- <li><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;&nbsp;Sidebar</li> -->
						<li>Menu</li>
						<!-- if user is admin -->
						<?php 
							if (isset(Yii::$app->user->identity->role) && Yii::$app->user->identity->role =='admin' ):
						 ?>
							<?= 
								Yii::$app->controller->id == 'category' ? 
								'<li class="nav-sidebar-active">':
								'<li class="">';
							 ?>
								<span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;&nbsp;
								<?= Html::a('Categories', ['category/index'], ['class' => '']) ?>
							</li>
							<?= 
								Yii::$app->controller->id == 'surveyans' ? 
								'<li class="nav-sidebar-active">':
								'<li class="">';
							 ?>
								<span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;&nbsp;
								<?= Html::a('Survey Ans', ['surveyans/index'], ['class' => '']) ?>
							</li>
							<?= 
								Yii::$app->controller->id == 'backendusers' ? 
								'<li class="nav-sidebar-active">':
								'<li class="">';
							 ?>
								<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;
								<?= Html::a('Users', ['backendusers/index'], ['class' => '']) ?>
							</li>
							<?= 
								Yii::$app->controller->id == 'surveyques' ? 
								'<li class="nav-sidebar-active">':
								'<li class="">';
							 ?>
								<span class="glyphicon glyphicon-align-justify"></span>&nbsp;&nbsp;&nbsp;
								<?= Html::a('Survey Index', ['surveyques/index'], ['class' => '']) ?>
							</li>

							<li class="nav-sidebar-seperator">
								<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;
								<?= Html::a('Survey', ['surveyques/survey'], ['class' => '']) ?>
							</li>
						<?php endif; ?>
						<!-- /if user is admin -->

						
						<!-- <li class="nav-sidebar-seperator"></li> -->
						<!-- <div>Users</div> -->
						<?= 
							Yii::$app->controller->id == 'eneobizinfo' ? 
							'<li class="nav-sidebar-active">':
							'<li class="">';
						 ?>
							<span class="glyphicon glyphicon-align-left"></span>&nbsp;&nbsp;&nbsp;
							<!-- <span class="glyphicon glyphicon-tasks"></span> -->
							<?= Html::a('Business Profile', ['eneobizinfo/index'], ['class' => '']) ?>
						</li>
						<?= 
							Yii::$app->controller->id == 'advideos' ? 
							'<li class="nav-sidebar-active">':
							'<li class="">';
						 ?>
							<span class="glyphicon glyphicon-facetime-video"></span>&nbsp;&nbsp;&nbsp;
							<?= Html::a('Videos', ['advideos/index'], ['class' => '']) ?>
						</li>
					<!-- 	
							Yii::$app->controller->id == 'videocat' ? 
							'<li class="nav-sidebar-active">':
							'<li class="">';
						 ?>
							<span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;&nbsp;
							 Html::a('Video Categories', ['videocat/index'], ['class' => '']) 
						</li> -->
					</ul>
				</div>
			</div>
		<?php endif; ?>	
		<?= $content ?>
	<!-- .row -->
	</div> 
<!-- .container-fluid -->
</div>

	<!-- Start footer -->
	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-2">
					<h3 class="footer-col-title">CATEGORIES</h3>
					<div class="footer-col-list">
						<?php $c = Category::find()->all(); ?>
						<?php foreach($c as $v): ?>
							<div>
							<?php echo Html::a($v['title'], ['eneo/categorylist','id' => $v['id']], ['class' => '']) ?>
							</div>
						<?php endforeach; ?>
					<!-- </ul> -->
					</div>
				</div>

				<div class="col-md-4">
					<h3 class="footer-col-title">ABOUT US</h3>
					<p>We aim to create good relationsips using digital media between you and many possible partners. </p>
				</div>
			</div>
		</div>
	</div>
	<!-- End footer -->

 <?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>