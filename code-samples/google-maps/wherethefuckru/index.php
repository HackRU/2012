<?
	/*** This is an example Google Maps Application>
	 * It hits Google Maps for directions between an address and specified Rutgers bus stops, and tells you which Rutgers bus stop is closest.
     * It uses the Google Maps Javascript API for directions.
	 */
	$apikey='AIzaSyBFCdq0tMeKhbcP1DFT-bsNGrBrF2hDxyo';

	$stops = array (
			array (
				'tag' => 'scott',
				'title'=> 'Scott Hall',
				'lat' => 40.499567,
				'lon' => -74.448238,
				'stopId' => 1055,
			),
			array
			(
				'tag' => 'busch_a',
				'title' => 'Busch Campus Center',
				'lat' => 40.523768,
				'lon' => -74.458305,
				'stopId' => 1008,
			),

			array
			(
				'tag' => 'livstud',
				'title' => 'Livingston Student Center',
				'lat' => 40.523959,
				'lon' => -74.436622,
				'stopId' => 1030,
			),

			array
			(
				'tag' => 'pubsafn',
				'title' => 'Public Safety Building',
				'lat' => 40.487978,
				'lon' => -74.439329,
				'stopId' => 1016,
			),
		);



?>

<html>
	<head>

		<title> WherethefuckRU - Rutgers Off Campus Bus Stop Assistant </title>
		<link href="style.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=<?=$apikey?>&sensor=false"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	</head>

	<body>
		<div id="center">
			<h1> WherethefuckRU </h1>
			<form id="stop-form" action="" method="get">
				Address<br />
				<input id="address" type="text" name="address" value="<?=@ htmlentities($_REQUEST['address']); ?>" /><br />
				<br />
				Stops to search:<br />
				<?php
					$default_search_stops = array();
					if(isset($_REQUEST['search_stops']))
						$default_search_stops = $_REQUEST['search_stops'];
					foreach($stops as $stop) {
						echo ' <input type="checkbox" '.((in_array($stop['stopId'], $default_search_stops)) ? 'checked="checked"' : '').' name="search_stops[]" value="'.$stop['stopId'].'"> &nbsp;&nbsp;&nbsp; '.$stop['title'].'<br />';
					}

				?>

				<input id="submit" type="Submit" value="Submit"/>
			</form>
			
			<script type="text/javascript">
				var directionDisplay;
				var directionsService = new google.maps.DirectionsService();
				var map;


				function initialize() {
					directionsDisplay = new google.maps.DirectionsRenderer();
					var myOptions = {
						zoom:7,
						mapTypeId: google.maps.MapTypeId.ROADMAP,
					};
					map = new google.maps.Map($("#map_canvas")[0], myOptions);
					directionsDisplay.setMap(map);
				};

				$(window).load(initialize);


				var geocoded = '';
				var stops = <?=json_encode($stops)?>;

				var minstop = '';
				var minduration = 10000000000;
				var mindistance_text = '';
				var minduration_text = '';

				var address;
				var init_address;

				$("#stop-form").submit(function() {
					minduration = 10000000000;
					address = $("#address").val();

					init_address = address;

					//we want to find results close to NB.
					address += " near New Brunswick, NJ";

					//get the checked stops.
					var checkboxes = $(this).find(':checked');
					var checked_boxes = [];

					$.each(checkboxes, function(index, element) {
						checked_boxes.push(element.value);
					});

					var geocoder = new google.maps.Geocoder();

					//geocode this address.
					geocoder.geocode({'address': address}, function(results, status) {
						if(status == google.maps.GeocoderStatus.OK) {
							geocoded = results[0].geometry.location;

							var table_div = $('#table_div');
							table_div.html('');

							var table = $('<table>').appendTo('#table_div');
							table.append('<tr><th>Stop</th><th>Distance</th><th>Walking Time</th></tr>');
							$.each(stops, function(index, stop) {

								var origin = geocoded;
								var dest = new google.maps.LatLng(stop.lat, stop.lon);
		
								var request = {
									origin:origin, 
									destination:dest,
									travelMode: google.maps.DirectionsTravelMode.WALKING,
								};

								//get the directions from this stop to the lat/long
								directionsService.route(request, function(response, status) {
									console.log(response);
									if (status == google.maps.DirectionsStatus.OK) {
										var info = response.routes[0].legs[0];
										var duration = info.duration.value;

										var distance = info.distance.value;

										if(duration < minduration)
										{
											minduration = duration;
											mindistance = distance;
											mindistance_text = info.distance.text;
											minduration_text = info.duration.text;

											directionsDisplay.setDirections(response);

											$('#map_text').html('<br />And here\'s a pretty map to make you happy..\n<br />');

											$('#closest_span').html('The closest Rutgers bus stop to '+(init_address)+' is '+stop.title+', which is <b>'+mindistance_text+'</b> away, and <b>'+minduration_text+'</b> of a walk.\n<br />');
										}

										table.append('<tr><td>'+stop.title+'</td><td>'+info.distance.text+'</td><td>'+info.duration.text+'</td></tr>');
									}
								});
							});
						}
					});

					return false;
				});

			</script>

			<div id="table_div"> </div>

			<span id="closest_span"> </span>

			<span id="map_text"> </span>
			<div id="map_canvas" style="width: 800px; height: 600px;"> </div>

		</div>
		<center id="copyright"> Copyright&copy; 2011 <a href="/"> Vaibhav Verma </a> </center>
	</body>
</html>
