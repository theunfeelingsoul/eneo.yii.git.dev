<?php 
use yii\helpers\Html;
use app\assets\AdminAsset;
use app\assets\EneoAsset;
use app\models\Category;
// use app\assets\AppAsset;

// AppAsset::register($this);
AdminAsset::register($this);
// EneoAsset::register($this);
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