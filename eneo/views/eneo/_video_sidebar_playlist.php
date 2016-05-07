<?php use yii\helpers\Html; ?>
<div>Video Playlists</div>
<ul class="side-item-list">
<li><a href="<?='?id='.$biz_id?>">All</a></li>
<?php foreach ($biz_vidz_cats as $key => $value): ?>
	<li>
	<?php echo Html::a($value["cat_name"], ['eneo/digital','id'=>$biz_id,'playlist'=>$value['id'] ], ['class' => '']) ?></li>
<?php endforeach; ?>
</ul>