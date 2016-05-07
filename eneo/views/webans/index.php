<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WebansSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Your Answers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="webans-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p class="alert alert-info" role="alert">Once you have answered the questions, you can edit or update them here any time.</p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?= Html::a('Create Webans', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'qid',
            // 'qq:ntext',
            'ans:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
