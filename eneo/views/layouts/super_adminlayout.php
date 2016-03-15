<?php 
use yii\helpers\Html;
use app\assets\AdminAsset;
use app\assets\EneoAsset;

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
			<div class="sidebar col-md-2">
				<div class="row">
					<ul class="nav-sidebar">
						<!-- <li><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;&nbsp;Sidebar</li> -->
						<li>Sidebar</li>
						
						<?= 
							Yii::$app->controller->id == 'category' ? 
							'<li class="nav-sidebar-active nav-sidebar-seperator">':
							'<li class="nav-sidebar-seperator">';
						 ?>
							<span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;&nbsp;
							<?= Html::a('Categories', ['category/index'], ['class' => '']) ?>
						</li>
						
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
						<?= 
							Yii::$app->controller->id == 'videocat' ? 
							'<li class="nav-sidebar-active">':
							'<li class="">';
						 ?>
							<span class="glyphicon glyphicon-th-large"></span>&nbsp;&nbsp;&nbsp;
							<?= Html::a('Video Categories', ['videocat/index'], ['class' => '']) ?>
						</li>
					</ul>
				</div>
			</div>
		<?= $content ?>
	<!-- .row -->
	</div> 
<!-- .container-fluid -->
</div>

<div class="row">
	<!-- Start footer -->
		<div id="footer">
			<P>END</P>
		</div>
	<!-- End footer -->
</div>

 <?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>