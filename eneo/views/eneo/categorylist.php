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
	<div id="main-content">
		<!-- Begin categories -->
		<!-- <div id="business-categories"> -->
		<div id="">
			<div class="container">
				<div class="row">
					<div class="">
						<div class="main">
							<div class="col-md-12">
								<div class="page-title-content">
									<h2 class="page-title">
										<?= $cat->title; ?> CATEGORY
									</h2>
									<p class="page-title-description">
										<?= $cat->descrption;  ?>
									</p>
								</div>
							</div>
							<div class="cat-content">
								<?php foreach ($catlists as $key => $catlist): ?>

									<div class="cat-row cat-row-1 col-md-4">
										<div class="cat-row-inner">
											<div class="cat-row-image">
												<div class="Cat-image">
													<?php echo Html::a('<img src="'.Yii::$app->getUrlManager()->getBaseUrl().'/images/uploads/cat/'.$catlist['cat_list_img_path'].'" width="400" height="240">', ['eneo/listing','id' => $catlist['id']], ['class' => '']) ?>
												</div>
											</div>
											<div class="views-field views-field-title">
												<a href=""><?= $catlist['name'];?></a>
											</div>	

											<div class="views-field views-field-address">
												<i class="fa fa-home"></i>
												<?= $catlist['address'];?>
											</div>

											<div class="views-field views-field-phone">
												<i class="fa fa-phone"></i>
												<?= $catlist['tel'];?>
											</div>
											

											<div class="views-field views-field-website">
												<i class="fa fa-globe"></i>
												<a href="<?= $catlist['website'];?>"><?= $catlist['website'];?></a>
											</div>
											
											<div class="cat-row-address">
												
											</div>
											<div class="cat-row-phone">
												
											</div>
											<div class="cat-row-website">
												
											</div>
										</div>
									</div>
								<?php endforeach ; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End categories -->
	</div>
	<!-- End main-content -->
</div>
<!-- End page -->