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
									<a href="<?= $biz['website'] ?>"><?= $biz['website'] ?></a>
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
				<div class="col-md-4">
					<!-- <div class="business-detail-article">
						<div class="side-item">
							<div>Business Topics</div>
							<ul class="side-item-list">
								<li><a href="">Business Skills<span class="info-text">(5)</span></a></li>
								<li><a href="">Productivity<span class="info-text">(9)</span></a></li>
								<li><a href="">Operating Systems<span class="info-text">(4)</span></a></li>
							</ul>
						</div>

						<div class="side-item">
							<div>Business Software</div>
							<ul class="side-item-list">
								<li><a href="">Microsoft<span class="info-text">(5)</span></a></li>
								<li><a href="">Office<span class="info-text">(6)</span></a></li>
								<li><a href="">Word<span class="info-text">(1)</span></a></li>
							</ul>
						</div>
					</div> -->
				</div>
				<div class="col-md-8">
					<div class="business-detail-article">
						<div class="comtainer-fluid">
							<div class="row">
								<h2 class="business-sidebar-article-title"><?= $biz_vidz['title'] ?></h2>
								<div class="text-centerk">
									<!-- <iframe width="730" height="315" src="<?php echo $biz_vidz['url'] ?>" frameborder="0" allowfullscreen></iframe> -->
									<iframe width="730" height="315"src="http://www.youtube.com/embed/<?=$biz_vidz['url'];?>"> </iframe>
									<!-- <video width="730" height="315"> <source src="images/uploads/"'.$biz_vid['url'].' type="video/mp4"></video> -->
									<!-- <iframe width="730" height="415" src="https://www.youtube.com/embed/Xuav1TPhLQw" frameborder="0" allowfullscreen></iframe> -->
								</div>
							</div>
							<div class="row">
								<div class="col-md-10">
									<h4>Video details</h4>
									<hr>
									<p><?= $biz_vidz['des'] ?></p>
									<!-- Nav tabs -->
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
