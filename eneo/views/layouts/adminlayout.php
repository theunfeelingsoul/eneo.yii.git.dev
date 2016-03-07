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


<div class="container-fluid">
	<div class="row">
		<div class="sidebar col-md-2">
			<div class="row">
				<ul class="nav-sidebar">
					<!-- <div>Admin</div> -->
					<li class="active nav-sidebar-seperator">
						<?= Html::a('Categories', ['category/index'], ['class' => '']) ?>
					</li>
					<!-- <li class="nav-sidebar-seperator"></li> -->
					<!-- <div>Users</div> -->
					<li>
						<?= Html::a('Profile', ['eneobizinfo/index'], ['class' => '']) ?>
					</li>
					<li>
						<?= Html::a('Videos', ['advideos/index'], ['class' => '']) ?>
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