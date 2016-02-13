<?php 
use yii\helpers\Html;
use app\assets\EneoAsset;

EneoAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
	<!-- Begin header -->
	<!-- Begin humburger -->
	<div class="nav navbar-default burger">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
	  </div>
	</div>
	<!-- End humburger -->

	<!-- Begin mobile header -->
	<div id="header" class=" navbar-inverse visible-xs">
		<div class="container  ">
			<div class="header-bottom">
				<div class="row">
					<div class="clearfix"></div>

					<div class="container">
					  <nav class="navbar navbar-default">
					    <div class="container-fluid">
						    <div class="col-md-3">
								<div id="logo">
									<a href="">
										<img src="images/logo.png" title="Home" alt="Home">
									</a>
								</div>
							</div>
					      <!-- Collect the nav links, forms, and other content for toggling -->
					      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
					        <ul class="nav navbar-nav">
					          <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
					          <li class="dropdown">
					            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Browse<span class="caret"></span></a>
					            <ul class="dropdown-menu">
					              <li><a href="category.php">List Category</a></li>
					              <li role="separator" class="divider"></li>
					            </ul>
					          </li>
					          <li><a href="#">Submit a listing</a></li>
					        </ul>
					      </div><!-- /.navbar-collapse -->
					    </div><!-- /.container-fluid -->
					  </nav>
					</div>
				</div>
				
			</div>
		</div>
	</div>

	<!-- End mobile header -->


	<!-- Begin header-top -->
	<div id="header-top">
		<div class="header-top-inside">
			<div class="container">
				<div class="row header-top-inside-left pull-left">
					<!-- added the .row above and .container-fluid below to remove some wierd padding on the left -->
					<ul class="container-fluid inside-left">
						<li class="first-leaf"><a href="">
								<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>login
							</a>
						</li>
						<li class="last-leaf">
							<a href="">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Register
							</a>
						</li>
					</ul>
				</div>
				<div class="header-top-inside-left pull-right">
					<ul class="inside-right">
						<li> <a href="">Join us</a></li>
						<li><a href=""><i class="fa fa-facebook"></i></a></li>
						<li class="last-leaf"><a href=""><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- End header-top -->

	<!-- Begin header -->
	<div id="header" class=" navbar-defult hidden-xs">
		<div class="container  ">
			<div class="header-bottom">
				<div class="row">
					<div class="clearfix"></div>
					<div class="col-md-3">
						<div id="logo">
							<a href="">
								<img src="images/logo.png" title="Home" alt="Home">
							</a>
						</div>
					</div>
					<div class="container">
					  <nav class="navbar navbar-default">
					    <div class="container-fluid">
					      <!-- Collect the nav links, forms, and other content for toggling -->
					      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					        <ul class="nav navbar-nav">
					          <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
					          <li class="dropdown desktop">
					            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Browse <span class="caret"></span></a>
					            <ul class="dropdown-menu">
					              <li><a href="category.php">List Category</a></li>
					              <li role="separator" class="divider"></li>
					              <li><a href="clisting.php">Category listing</a></li>
					              <li role="separator" class="divider"></li>
					              <li><a href="clistingvideo.php">listing media</a></li>
					            </ul>
					          </li>
					          <li><a href="#">Submit a listing</a></li>
					        </ul>
					      </div><!-- /.navbar-collapse -->
					    </div><!-- /.container-fluid -->
					  </nav>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- End header -->


	<!-- <div class="col-md-3 visible-xs">
		<div id="logo">
			<a href="">
				<img src="images/logo.png" title="Home" alt="Home">
			</a>
		</div>
	</div> -->



	 <?= $content ?>

	<!-- Start footer -->
	<div id="footer">
		<P>END</P>
	</div>
	<!-- End footer -->



 <?php $this->endBody() ?>
	<script>
		function initialize() {
			var mapCanvas = document.getElementById('map');
			var mapOptions = {
				center: new google.maps.LatLng(35.6850, 139.7514),
				zoom: 15,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			var map = new google.maps.Map(mapCanvas, mapOptions);
		} // end initialize

		function initialize_mapc() {
			var mapCanvas_c = document.getElementById('map-c');
			var mapOptions = {
				center: new google.maps.LatLng(35.6850, 139.7514),
				zoom: 15,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			var map_c = new google.maps.Map(mapCanvas_c, mapOptions);
		}

		google.maps.event.addDomListener(window, 'load', initialize_mapc);
		
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
</body>
</html>
 <?php $this->endPage() ?>