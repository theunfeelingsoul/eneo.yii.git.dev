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
		<P>END</P>
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


		// this map is the big maps
		function initialize() {
			var i;
			//get all the geocodes in the database
			// this is a string
			var map_gecode = document.getElementById('group-map-geocode');
			// console.log(map_gecode);
			var map_gecode = map_gecode.innerHTML;

			// split the gecodes and add them in arrays
			var arr1 = map_gecode.split("#");
			var arr2 = [];
			for (i = 0; i < arr1.length; i++) {
			        arr2[i]=arr1[i].split(",");
			} 
			

 			
			var locations = arr2;

			console.log(locations);

			// create the map
		    var map = new google.maps.Map(document.getElementById('map'), {
		      zoom: 15,
		      center: new google.maps.LatLng(-7.443954, 36.719101),
		      mapTypeId: google.maps.MapTypeId.ROADMAP
		    });


		    var infowindow = new google.maps.InfoWindow({map: map});

		    var marker, i;

		    // image for the markers
		    var image8 = {
				url: 'images/maps/red.png',
				// This marker is 20 pixels wide by 32 pixels high.
				// size: new google.maps.Size(20, 32),
				// The origin for this image is (0, 0).
				// origin: new google.maps.Point(0, 0),
				// The anchor for this image is the base of the flagpole at (0, 32).
				// anchor: new google.maps.Point(0, 32)
			};

			var image = ['images/maps/cat/5.png','images/maps/cat/8.png','images/maps/cat/8.png','images/maps/cat/8.png','images/maps/cat/8.png'];

			// var shape = {
			// 	coords: [1, 1, 1, 20, 18, 20, 18, 1],
			// 	type: 'poly'
			// };

			// create the markers
		    for (i = 0; i < locations.length; i++) {
		      // var i =  locations[i][2];
		      // var image =  image+locations[i][2];
		      // console.log(image);
		      var x = parseInt(locations[i][2]);
		      console.log(x);
		      marker = new google.maps.Marker({
		        position: new google.maps.LatLng(locations[i][0], locations[i][1]),
		        map: map,
		        icon: 'images/maps/cat/'+locations[i][2]+'.png'
				// shape: shape
		      });

		      // google.maps.event.addListener(marker, 'click', (function(marker, i) {
		      //   return function() {
		      //     infowindow.setContent(locations[i][0]);
		      //     infowindow.open(map, marker);
		      //   }
		      // })(marker, i));
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
					handleLocationError(true, infowindow, map.getCenter());
				});
			} else {
				// Browser doesn't support Geolocation
				handleLocationError(false, infowindow, map.getCenter());
			}


			function handleLocationError(browserHasGeolocation, infoWindow, pos) {
			  infowindow.setPosition(pos);
			  infowindow.setContent(browserHasGeolocation ?
			                        'Error: The Geolocation service failed.' :
			                        'Error: Your browser doesn\'t support geolocation.');
			}

		} // end initialize





		function initialize_mapc() {
			var mapCanvas_c = document.getElementById('map-c');

			var map_gecode = document.getElementById('map-gecode');
			var map_gecode = map_gecode.innerHTML;
			// console.log(map_gecode);
			
			var map_gecode_lat_lang = map_gecode.split(",");
			console.log(map_gecode_lat_lang[0]);
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
		}

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