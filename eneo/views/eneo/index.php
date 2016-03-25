<?= $this->render('analyticstracking'); ?>
<?= $this->render('_searchbar'); ?>
<?php use yii\helpers\Html; ?>
<!-- Begin #geo-loc-map -->
<div id="geo-loc-map">
	<div class="container-fluid">
		<div class="row">
			<div id="group-map-geocode"><?=$groupcodes;?></div>
			<div id="map">
				
			</div>
		</div>
	</div>
</div>
<!-- End #geo-loc-map -->

<div class="page">
	<!-- Begin categories -->
	<div id="business-categories">
		<div class="container">
			<div class="row">
				<div class="cat-header">
					<h2 class="cat-title">
						Browse our categories
					</h2>
					<p class="cat-description">
						Find outr how many lovely places we have in our directory.
					</p>
				</div>
				<div class="cat-content">
					<?php foreach ($categories as $key => $category):?>
					<div class="cat-row cat-row-1 col-md-4">
						<div class="cat-row-inner">
							<div class="cat-row-image">
								<div class="Cat-image">
									<?php echo Html::a('<img src="'.Yii::$app->getUrlManager()->getBaseUrl().'/images/uploads/cat/'.$category['img_path'].'" width="400" height="240">', ['eneo/categorylist','id' => $category['id']], ['class' => '']) ?>
									
								</div>
							</div>
							<div class="cat-row-name">
								<a href=""><?= $category['title']; ?></a>
							</div>
							<div class="cat-row-description">
								<p><?= $category['descrption']; ?></p>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
					<!-- <div class="cat-row cat-row-1 col-md-4">
						<div class="cat-row-inner">
							<div class="cat-row-image">
								<div class="Cat-image">
									<a href="">
										<img src="images/2.jpg" width="400" height="240">
									</a>
								</div>
							</div>
							<div class="cat-row-name">
								<a href="">REstaurant</a>
							</div>
							<div class="cat-row-description">
								<p>Purus dolor maecenas, illum culpa aliquam alias blandit in illo.</p>
							</div>
						</div>
					</div>

					<div class="cat-row cat-row-1 col-md-4">
						<div class="cat-row-inner">
							<div class="cat-row-image">
								<div class="Cat-image">
									<a href="">
										<img src="images/3.jpg" width="400" height="240">
									</a>
								</div>
							</div>
							<div class="cat-row-name">
								<a href="">REstaurant</a>
							</div>
							<div class="cat-row-description">
								<p>Purus dolor maecenas, illum culpa aliquam alias blandit in illo.</p>
							</div>
						</div>
					</div>

					<div class="cat-row cat-row-1 col-md-4">
						<div class="cat-row-inner">
							<div class="cat-row-image">
								<div class="Cat-image">
									<a href="">
										<img src="images/4.jpg" width="400" height="240">
									</a>
								</div>
							</div>
							<div class="cat-row-name">
								<a href="">REstaurant</a>
							</div>
							<div class="cat-row-description">
								<p>Purus dolor maecenas, illum culpa aliquam alias blandit in illo.</p>
							</div>
						</div>
					</div>

					<div class="cat-row cat-row-1 col-md-4">
						<div class="cat-row-inner">
							<div class="cat-row-image">
								<div class="Cat-image">
									<a href="">
										<img src="images/5.jpg" width="400" height="240">
									</a>
								</div>
							</div>
							<div class="cat-row-name">
								<a href="">REstaurant</a>
							</div>
							<div class="cat-row-description">
								<p>Purus dolor maecenas, illum culpa aliquam alias blandit in illo.</p>
							</div>
						</div>
					</div>

					<div class="cat-row cat-row-1 col-md-4">
						<div class="cat-row-inner">
							<div class="cat-row-image">
								<div class="Cat-image">
									<a href="">
										<img src="images/6.jpg" width="400" height="240">
									</a>
								</div>
							</div>
							<div class="cat-row-name">
								<a href="">REstaurant</a>
							</div>
							<div class="cat-row-description">
								<p>Purus dolor maecenas, illum culpa aliquam alias blandit in illo.</p>
							</div>
						</div>
					</div> -->



				</div>
			</div>
		</div>
	</div>
	<!-- End categories -->
	</div>
	<!-- End page -->