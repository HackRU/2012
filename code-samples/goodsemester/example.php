<?php

/*
 * View all the available methods at:
 * http://api.goodsemester.com/
 */

/*
 * Unauthenticated requests can simply be done
 * by calling file_get_contents onto the URL or
 * using CURL.
 */

$content = file_get_contents("https://api.goodsemester.com/api/get_public_courses");
$content = json_decode($content, TRUE); // to make sure it gives you array data.
print_r($content); // just printing it to the console.

/*
 * For authenticated requests, you need to use
 * POST to pass a session variable. Do this using CURL.
 */

$cf = curl_init('https://api.goodsemester.com/api/authenticate');
curl_setopt($cf, CURLOPT_POST, 1);

// The following username ans password WILL NOT WORK.
// You can register for a free account at https://goodsemester.com
$username = 'someone@hostname.com'; 
$password = 'somepassword'; 
curl_setopt($cf, CURLOPT_POSTFIELDS, "username=$username&password=$password");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$result = curl_exec($cf);
curl_close($cf);

$result = json_decode($result, TRUE);
print_r($result);

/*
 * Using the session key from above, you can now
 * call on authenticated methods.
 */

$cf = curl_init('https://api.goodsemester.com/api/get_user_feed');
curl_setopt($cf, CURLOPT_POST, 1);

$session_key = 'sdlfkjsdkfjb2912l3k'; // you should dynamically generate this.
curl_setopt($cf, CURLOPT_POSTFIELDS, "session_key=$session_key");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$result = curl_exec($cf);
curl_close($cf);

$result = json_decode($result, TRUE);
print_r($result);
