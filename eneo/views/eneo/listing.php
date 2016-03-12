<?php use yii\helpers\Html; ?>
<div class="container-fluid">
	<div class="row">
		<!-- #business-banner -->
		<div id="business-banner">
			<div class="container">
				<div class="row">
					<div class="business-banner-content">
						<div class="col-md-8">
							<div class="business-banner-title">
								<?= $biz['name'] ?>
							</div>
							<div class="business-banner-detail">
								<div class="business-banner-detail-address">
									<span class="glyphicon glyphicon-home"></span>
									<?= $biz['address'] ?>
								</div>
								<div class="business-banner-detail-phone">
									<span class="glyphicon glyphicon-phone-alt"></span>
									<?= $biz['tel'] ?>
								</div>
								<div class="business-banner-detail-website">
									<span class="glyphicon glyphicon-globe"></span>
									<a href=""><?= $biz['website'] ?></a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div id="map-gecode"><?=$biz['geocode'];?></div>
							<div class="field-map" id="map-c">
								<!-- <div class="field-map"></div> -->
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div id="business-detail-review">
				<div class="col-ms-8">
					<div class="business-detail-review-rating"></div>
					<div class="business-detail-review-comment">
						<a href="" class="btn btn-primary">Write a comment</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- EOF: .conatiner-fluid -->
</div>

<div id="Page">
	<div id="main-content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="business-detail-article">

						<div class="field field-name-field-photos">
							<div class="field-label ">Photos</div>
							<div class="container-fluid">
								<div class="field-items row">
							<!-- 		<div class="field-item-odd">
										<a href="">
											<img src="images/food1.jpg">
										</a>
									</div>
									<div class="field-item-even">
										<a href="">
											<img src="images/food2.jpg">
										</a>
									</div>
									<div class="field-item-odd">
										<a href="">
											<img src="images/food3.jpg">
										</a>
									</div>
									<div class="field-item-even">
										<a href="">
											<img src="images/food4.jpg">
										</a>
									</div> -->
									<div class="field-item-odd field-item-view-more">
										
										<?= Html::a('View More', ['eneo/digital','id' => $biz['id']], ['class' => '']) ?>
									</div>
								</div>
							</div>
						</div>

						<div class="field field-name-field-videos">
							<div class="field-label ">Videos</div>
							<div class="container-fluid">
								<div class="field-items row">
									<?php $i = 1; foreach ($biz_vidz as $key => $biz_vid): ?>

										<?php if ($i % 2 == 0) :?>
											<div class="field-item-even">
										<?php else: ?>
											<div class="field-item-odd">
										<?php endif; ?>
											<a href="clistingvideo.php">
												<?php echo Html::a('<img height="100"src="http://img.youtube.com/vi/'.$biz_vid['url'].'/default.jpg">',['eneo/video','vid_id'=>$biz_vid['id'],'biz_id'=>$biz['id']], ['class' => '']) ?>
											</a>
										</div>
									
								<?php $i++; endforeach; ?>
									
									<?php if ($i % 2 == 0) :?> <div class="field-item-even field-item-view-more"><?php else: ?> <div class="field-item-odd field-item-view-more"><?php endif; ?>
									<!-- <div class="field-item-odd field-item-view-more"> -->
										<?= Html::a('View More', ['eneo/digital','id' => $biz['id']], ['class' => '']) ?>
									</div>
								</div>
							</div>
						</div>

						<div class="field field-name-body">
							<div class="field-label ">Description:&nbsp;</div>
							<div class="field-items">
								<p>
									<?= $biz['des'] ?>
								</p>
							</div>
						</div>

					<!-- 	<div class="field field-name-field-open-time">
							<div class="field-label ">Open Time:&nbsp;</div>
							<div class="field-items">
								<p>
									9 AM to 6:30 PM Mon to Sun
								</p>
							</div>
						</div> -->


						<!-- <div class="field field-name-field-price-range">
							<div class="field-label ">Price range:&nbsp;</div>
							<div class="field-items">
								<p>
									Middle End
								</p>
							</div>
						</div> -->

						<div class="field field-name-field-highlights">
							<div class="field-label ">Highlights:&nbsp;</div>
							<div class="field-items">
								<p><?php echo $biz['des'] ?>
								</p>
							</div>
						</div>

					<!-- 	<div class="field field-name-field-tags">
							<div class="field-label ">TAGS:&nbsp;</div>
							<div class="field-items">
								<p>
									9JeanYouthStylish
								</p>
							</div>
						</div> -->

						
					</div>
				</div>
				<div class="col-md-4">
					<div id="business-sidebar-article"> 
						<h2 class="business-sidebar-article-title">Similar Business</h2>
						<div class="sidebar-content">
							<div class="sidebar-row">
								<div class="sidebar-row-image">
									<img src="images/s1.jpg">
								</div>
								<div class="sidebar-row-inner">
									<div class="sidebar-row-inner-title">
										<a href="">Oldman Sport Store</a>
									</div>
									<div class="sidebar-row-inner-rating">
										stars
									</div>
								</div>
							</div>

							<div class="sidebar-row">
								<div class="sidebar-row-image">
									<img src="images/s1.jpg">
								</div>
								<div class="sidebar-row-inner">
									<div class="sidebar-row-inner-title">
										<a href="">Oldman Sport Store</a>
									</div>
									<div class="sidebar-row-inner-rating">
										stars
									</div>
								</div>
							</div>

							<div class="sidebar-row">
								<div class="sidebar-row-image">
									<img src="images/s1.jpg">
								</div>
								<div class="sidebar-row-inner">
									<div class="sidebar-row-inner-title">
										<a href="">Oldman Sport Store</a>
									</div>
									<div class="sidebar-row-inner-rating">
										stars
									</div>
								</div>
							</div>

							<div class="sidebar-row">
								<div class="sidebar-row-image">
									<img src="images/s1.jpg">
								</div>
								<div class="sidebar-row-inner">
									<div class="sidebar-row-inner-title">
										<a href="">Oldman Sport Store</a>
									</div>
									<div class="sidebar-row-inner-rating">
										stars
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
