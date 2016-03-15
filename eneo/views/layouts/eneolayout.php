<?php 
use yii\helpers\Html;
use app\assets\EneoAsset;
use app\models\Category;

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
	
	<?= $this->render('_eneoheader') ?>

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
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-2">
					<h3 class="footer-col-title">CATEGORIES</h3>
					<div class="footer-col-list">
						<?php $c = Category::find()->all(); ?>
						<?php foreach($c as $v): ?>
							<div>
							<?php echo Html::a($v['title'], ['eneo/categorylist','id' => $v['id']], ['class' => '']) ?>
							</div>
						<?php endforeach; ?>
					<!-- </ul> -->
					</div>
				</div>

				<div class="col-md-4">
					<h3 class="footer-col-title">ABOUT US</h3>
					<p>We aim to create good relationsips using digital media between you and many possible partners. </p>
				</div>
			</div>
		</div>
	</div>
	<!-- End footer -->



 <?php $this->endBody() ?>
	<script>
		function initialize_() {
			var mapCanvas = document.getElementById('map');
			var mapOptions = {
				center: new google.maps.LatLng(35.6850, 139.7514),
				zoom: 15,
				scrollwheel: false,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			var map = new google.maps.Map(mapCanvas, mapOptions);
		} // end initialize



		/**
		 * Displays a google map with business coordinates.
		 * Also shows the geolocation of user if permitted.
		 *
		 * @return {Number} sum
		 */

		 function initialize()
		 {
		 	/* step 1. First get all the geocodes from a poulated div called #group-map-geocode */
			    var i;
				// get all the geocodes in the database
				// this is a string
				var map_gecode = document.getElementById('group-map-geocode');
				// console.log(map_gecode);

				// get the content of the div
				var map_gecode = map_gecode.innerHTML;

				// split the gecodes string and add convert them to arrays
				var locations = map_gecode.split("#");
				// var arr2 = [];
				for (i = 0; i < locations.length; i++) {
				        locations[i]=locations[i].split(",");
				} 

			/* step 2. Create the map*/
			    var map = new google.maps.Map(document.getElementById('map'), {
			      zoom: 15,
			      center: new google.maps.LatLng(-1.290915, 36.823788),
			      scrollwheel: false,
			      mapTypeId: google.maps.MapTypeId.ROADMAP
			    });

			    var infowindow = new google.maps.InfoWindow();

			    var marker, i;
			    var image = 'images/marker-icon.png';
			    for (i = 0; i < locations.length; i++) {  
			    	var x = parseInt(locations[i][2]);
						// console.log(x);

			      marker = new google.maps.Marker({
			        position: new google.maps.LatLng(locations[i][0], locations[i][1]),
			        map: map,
			        // icon: image
			        	// icon: 'images/maps/cat/5.png',
			        icon: 'images/maps/cat/'+locations[i][2]+'.png'
			      });

			      // thsi is the speechbox that appears when you click the marker
			      google.maps.event.addListener(marker, 'click', (function(marker, i) {
			        return function() {
			          infowindow.setContent(locations[i][3]+'<br/><img width ="100"src="images/uploads/cat/'+locations[i][4]+'">');
			          infowindow.open(map, marker);
			        }
			      })(marker, i));
			    }


			    // Try HTML5 geolocation.
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(function(position) {
						var pos = {
							lat: position.coords.latitude,
							lng: position.coords.longitude
						};

						// infowindow.setPosition(pos);
						// infowindow.setContent('Location found.');
						map.setCenter(pos);
					}, function() {
						// handleLocationError(true, infowindow, map.getCenter());
					});
				} else {
					// Browser doesn't support Geolocation
					// handleLocationError(false, infowindow, map.getCenter());
				}


				function handleLocationError(browserHasGeolocation, infoWindow, pos) {
				  infowindow.setPosition(pos);
				  infowindow.setContent(browserHasGeolocation ?
				                        'Error: The Geolocation service failed.' :
				                        'Error: Your browser doesn\'t support geolocation.');
				}










		} // end


		





		function initialize_mapc() 
		{

			if (document.getElementById('map-c')) {
				var mapCanvas_c = document.getElementById('map-c');

				var map_gecode = document.getElementById('map-gecode');
				var map_gecode = map_gecode.innerHTML;
				// console.log(map_gecode);
				
				var map_gecode_lat_lang = map_gecode.split(",");
				// console.log(map_gecode_lat_lang[0]);
				var mapOptions = {
					center: new google.maps.LatLng(map_gecode_lat_lang[0],map_gecode_lat_lang[1]),
					zoom: 15,
					// scrollwheel: false,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				var map_c = new google.maps.Map(mapCanvas_c, mapOptions);

				// geocodes need to be strings
				// used parseFloat() to convert them to strings
				var myLatLng = {lat: parseFloat(map_gecode_lat_lang[0]), lng: parseFloat(map_gecode_lat_lang[1])};
				var marker = new google.maps.Marker({
					position: myLatLng,
					map: map_c,
					title: 'Hello World!',
					draggable: true,
					animation: google.maps.Animation.DROP,
				});

				marker.addListener('click', toggleBounce);
			} // end if
		} // end initialize_mapc()

		function toggleBounce() {
		  if (marker.getAnimation() !== null) {
		    marker.setAnimation(null);
		  } else {
		    marker.setAnimation(google.maps.Animation.BOUNCE);
		  }
		}

		google.maps.event.addDomListener(window, 'load', initialize_mapc);
		
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
</body>
</html>
 <?php $this->endPage() ?>