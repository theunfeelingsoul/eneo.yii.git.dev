<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $searchModel app\models\BackendusersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Backendusers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-9">
    <div class="backendusers-index">

        <div class="widget-breadcrums">
             <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create Backendusers', ['create'], ['class' => 'btn btn-primary']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'username',
                'password',
                'gender',
                'country',
                // 'email:email',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>
</div>