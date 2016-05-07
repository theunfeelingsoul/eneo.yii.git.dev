<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
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

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Victor Njoroge Ngugi',
        'brandUrl' => ['/webq/survey'],
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Questions', 'url' => ['/webq/survey']],
            ['label' => 'Update Answers', 'url' => ['/webans/index']],
            // Yii::$app->user->isGuest ?
            //     ['label' => 'Login', 'url' => ['/site/login']] :
            //     [
            //         'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            //         'url' => ['/site/logout'],
            //         'linkOptions' => ['data-method' => 'post']
            //     ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink' => [ 
                      'label' => Yii::t('yii', 'questions'),
                      'url' => ['/webq/survey'],
                 ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Victor Njoroge <?= date('Y') ?> 
        <a target="_blank" href="https://www.facebook.com/theunfeelingsoul"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
        <a target="_blank" href="https://twitter.com/unfeelingsoul"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
        <a target="_blank" href="https://plus.google.com/u/2/110762474978617684531"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
        <a target="_blank" href="https://www.linkedin.com/in/victor-njoroge-96205444"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
        </p>

        <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
    </div>
</footer>

<?php $this->endBody() ?>
<script type="text/javascript">
    // $('.breadcrumb').affix()
</script>
</body>
</html>
<?php $this->endPage() ?>
