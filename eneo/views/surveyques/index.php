<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SurveyquesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surveyques';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-10">
    <div class="surveyques-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create Surveyques', ['create'], ['class' => 'btn btn-primary']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'q',
                'opt:ntext',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>
</div>