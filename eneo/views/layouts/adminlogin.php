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
		
<?= $content ?>
	<!-- .row -->
	</div> 
<!-- .container-fluid -->
</div>

 <?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>