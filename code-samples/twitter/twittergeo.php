<?php

$search = $_POST['catsearch'];

$geoData = json_decode(file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=".rawurlencode($search)."&sensor=false"));
$lat = $geoData->results[0]->geometry->location->lat;
$lng = $geoData->results[0]->geometry->location->lng;
$query = rawurlencode("cats OR kittens");
$cats = json_decode(file_get_contents("http://search.twitter.com/search.json?q=".$query."&rpp=100&geocode=".rawurlencode($lat.",".$lng.
",10mi")));
$length = count($cats->results);

require('./template.php');

?>