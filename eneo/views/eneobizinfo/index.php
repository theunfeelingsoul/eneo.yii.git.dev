<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EneobizinfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Eneobizinfos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-10">
    <div class="eneobizinfo-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create Eneobizinfo', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
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
                        return Html::img('images/uploads/' . $data['cat_list_img_path'],
                            ['width' => '60px']);
                    },
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>
</div>
