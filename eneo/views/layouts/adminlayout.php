<?php 
use yii\helpers\Html;
use app\assets\AdminAsset;

AdminAsset::register($this);
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

<div class="eneo-nav">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <!-- <a class="navbar-brand" href="#">Brand</a> -->
	      <a class="navbar-brand" href="#">
	        <img alt="Brand" src="images/logo.png">
	      </a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="sidebar col-md-1">
			<div class="row">
				<ul class="nav-sidebar">
					<li class="active">
						<?= Html::a('Categories', ['category/index'], ['class' => '']) ?>
					</li>
					<li>
						<?= Html::a('Add New', ['category/create'], ['class' => '']) ?>
					</li>
					<div>Users</div>
					<li>
						<?= Html::a('Profile', ['eneobizinfo/index'], ['class' => '']) ?>
					</li>
				</ul>
			</div>
		</div>

<?= $content ?>
	<!-- .row -->
	</div> 
<!-- .container-fluid -->
</div>

 <?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>