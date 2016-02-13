<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Eneobizinfo */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Eneobizinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-11 col-md-offset-1">
    <div class="eneobizinfo-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'tel',
                'website',
                'name',
                'des:ntext',
                'highlights',
                'address',
                'cat_list_img_path',
            ],
        ]) ?>

    </div>
</div>
