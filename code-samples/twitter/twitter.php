<?php

$query = rawurlencode("cats OR kittens");
$cats = json_decode(file_get_contents("http://search.twitter.com/search.json?q=".$query."&rpp=100"));
$length = count($cats->results);

require('./template.php');

?>