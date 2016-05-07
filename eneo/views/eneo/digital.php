<?= $this->render('analyticstracking'); ?>
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
								Modern Jeans
							</div>
							<div class="business-banner-detail">
								<div class="business-banner-detail-address">
									<span class="glyphicon glyphicon-home"></span>
									Westlands, Mogotio rd,
								</div>
								<div class="business-banner-detail-phone">
									<span class="glyphicon glyphicon-phone-alt"></span>
									0722383897
								</div>
								<div class="business-banner-detail-website">
									<span class="glyphicon glyphicon-globe"></span>
									<a href="">Symphony</a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						
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
				<div class="col-md-4">
					<div class="business-detail-article">
						<div class="side-item">
							<?= $this->render('_video_sidebar_playlist', [
						        'biz_vidz_cats'=>$biz_vidz_cats,
						        'biz_id'=>$biz_id,
						    ]) ?>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="business-detail-article">
						<div class="container-fluid">
							<div class="row">
								<div class="video-list-head">
									<div class="video-list-head-details">
										<?=$biz_vidz_count?>
									</div>
									<div class="video-list-head-options">
										<form class="form-inline">
											<div class="form-group">
											    <label class="sr-only">Email</label>
											    <p class="form-control-static text-center ">Sort By:</p>
											</div>
											<div class="form-group">
											    <label for="inputPassword2" class="sr-only">Password</label>
											    <select class="">
											    	<option>Newest</option>
											    	<option>Oldest</option>
											    	<option>Title (a-z)</option>
											    </select>
											</div>
										</form>	
									</div>
								</div>
							</div>
						</div>
						<div class="container-fluid">
							<!-- <div class="row"> -->
								<?php 
									foreach ($biz_vidz as $key => $biz_vid):?>
										<div class="row video-list">
											<div class="video-list-">
												<div class="col-sm-3">
													<?php echo Html::a('<img src="http://img.youtube.com/vi/'.$biz_vid['url'].'/default.jpg">',
													[
														'eneo/video','biz_id'=>$biz_vid['biz_id'],'vid_id'=>$biz_vid['id']
													], 
													['class' => '']) ?>
												</div>
												<div class="col-sm-9">
													<h5 class=""><a href="clistingplayvideo.php"><?= $biz_vid['title'] ?></a></h5>
													<p>
														<?= $biz_vid['des'] ?>
													</p>
													<p>10min </p>
												</div>
											</div>
										</div>

									<?php endforeach; ?>
								 
							

								<!-- <div class="row video-list">
									<div class="video-list-">
										<div class="col-sm-3">
											<a href="clistingplayvideo.php"><img src="images/video2.png"></a>
										</div>
										<div class="col-sm-9">
											<h5 class=""><a href="clistingplayvideo.php">Video 2</a></h5>
											<p>
												Minim wisi corporis anim, nemo eius, in egestas.
												Minim wisi corporis anim, nemo eius, in egestas.
											</p>
											<p>10min </p>
										</div>
									</div>
								</div>

								<div class="row video-list">
									<div class="video-list-">
										<div class="col-sm-3">
											<a href="clistingplayvideo.php"><img src="images/video3.png"></a>
										</div>
										<div class="col-sm-9">
											<h5 class=""><a href="clistingplayvideo.php">Video 3</a></h5>
											<p>
												Minim wisi corporis anim, nemo eius, in egestas.
												Minim wisi corporis anim, nemo eius, in egestas.
											</p>
											<p>10min </p>
										</div>
									</div>
								</div> -->
							<!-- </div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


