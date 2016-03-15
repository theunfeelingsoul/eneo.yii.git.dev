<?php 
use yii\helpers\Html;

// use app\assets\EneoAsset;

// EneoAsset::register($this);
$x=  Yii::$app->getRequest()->getQueryParam('r');
?>
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
									<img src="<?=Yii::$app->getUrlManager()->getBaseUrl() ?>/images/logo.png" title="Home" alt="Home">
								</a>
							</div>
						</div>
				      <!-- Collect the nav links, forms, and other content for toggling -->
				      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
				        <ul class="nav navbar-nav">
				          <?php if (strpos($x, 'eneo') !== false) {echo '<li class="active">'; }else{echo '<li>'; } ?>
					          <?= Html::a('Home <span class="sr-only">(current)</span>', ['eneo/index'], ['class' => 'nav-link']) ?>
				          </li>
				          <!-- <li class="dropdown"> -->
				          <?php if (strpos($x, 'category') !== false) {echo '<li class=" desktop active">'; }else{echo '<li class=" desktop">'; } ?>
				            <a href="#business-categories">Categories</a>
				          </li>
				          <li>
					          <?= Html::a('Submit a listing <span class="sr-only">(current)</span>', ['eneobizinfo/index'], ['class' => 'nav-link']) ?>
				          </li>
				          <li>
					          <?= Html::a('Survey <span class="sr-only">(current)</span>', ['surveyques/survey'], ['class' => 'nav-link']) ?>
				          </li>
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
					<li class="first-leaf">
					<!-- <a href="">
							<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>login
						</a> -->
						
						<?php echo Yii::$app->user->isGuest ?
							Html::a('<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>login', ['site/login'], ['class' => '']):
							Html::a('<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>logout('.Yii::$app->user->identity->username.')', ['site/logout'],  ['data-method' => 'post'])
						?>
					</li>
					<li class="last-leaf">
						
						<?php if (!Yii::$app->user->isGuest):?>
							<?=Html::a('<span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>Dashboard', ['eneobizinfo/index'], ['class' => ''])  ?>
						<?php endif; ?>
						<!-- <a href="">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Register
						</a> -->
					</li>
				</ul>
			</div>
			<div class="header-top-inside-left pull-right">
				<ul class="inside-right">
					<li> <a href="">Join us</a></li>
					<li><a href="https://www.facebook.com/EneoSearch/?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a></li>
					<li class="last-leaf"><a href="https://twitter.com/eneosearch" target="_blank"><i class="fa fa-twitter"></i></a></li>
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
							<img src="<?=Yii::$app->getUrlManager()->getBaseUrl() ?>/images/logo.png" title="Home" alt="Home">
						</a>
					</div>
				</div>
				<div class="container">
				  <nav class="navbar navbar-default">
				    <div class="container-fluid">
				      <!-- Collect the nav links, forms, and other content for toggling -->
				      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				        <ul class="nav navbar-nav">
				          <?php if (strpos($x, 'eneo') !== false) {echo '<li class="active">'; }else{echo '<li>'; } ?>
					          <?= Html::a('Home <span class="sr-only">(current)</span>', ['eneo/index'], ['class' => '']) ?>
				          </li>

				          <?php if (strpos($x, 'category') !== false) {echo '<li class=" desktop active">'; }else{echo '<li class=" desktop">'; } ?>
				            <a href="#business-categories">Categories</a>
				          </li>
				           <li>
					          <?= Html::a('Submit a listing <span class="sr-only">(current)</span>', ['eneobizinfo/create'], ['class' => 'nav-link']) ?>
				          </li>
				           <li>
					          <?= Html::a('Survey <span class="sr-only">(current)</span>', ['surveyques/survey'], ['class' => 'nav-link']) ?>
				          </li>
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