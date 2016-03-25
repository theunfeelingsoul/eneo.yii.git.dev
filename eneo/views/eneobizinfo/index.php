<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $searchModel app\models\EneobizinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Business Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-10">
    <div class="eneobizinfo-index">
        <div class="widget-breadcrums">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>

        <h2><?= Html::encode($this->title) ?></h2>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create profile', ['create'], ['class' => 'btn btn-primary']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                'tel',
                'website',
                'name',
                // 'des:ntext',
                // 'highlights',
                // 'address',
                [
                    'attribute' => 'img',
                    'format' => 'html',
                    'label' => 'Category List Image',
                    'value' => function ($data) {
                        return Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/uploads/cat/' . $data['cat_list_img_path'],
                            ['width' => '60px']);
                    },
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>
</div>
