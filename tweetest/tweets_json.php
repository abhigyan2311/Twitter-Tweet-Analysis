<?php
require 'tmhOAuth.php'; // Get it from: https://github.com/themattharris/tmhOAuth

// Use the data from http://dev.twitter.com/apps to fill out this info
// notice the slight name difference in the last two items)

$connection = new tmhOAuth(array(
  'consumer_key' => 'VRywS5XVsZTFbo1lMnM2RVud8',
	'consumer_secret' => 'ClJvZ2fQCcUMgVvMajDmEHoEjpzHs7cUT7EHGAGoBdkbYCUdBq',
	'user_token' => 'Rfxw6CJkPMkWDly5WydtrPhE8Fu3VKW0PN6bGnaCPRd8w', //access token
	'user_secret' => 'ClJvZ2fQCcUMgVvMajDmEHoEjpzHs7cUT7EHGAGoBdkbYCUdBq' //access token secret
));

// set up parameters to pass
$parameters = array();

if ($_GET['count']) {
	$parameters['count'] = strip_tags($_GET['count']);
}

if ($_GET['screen_name']) {
	$parameters['screen_name'] = strip_tags($_GET['screen_name']);
}

$twitter_path = 'https://api.twitter.com/1.1/statuses/user_timeline.json';


$http_code = $connection->request('GET', $connection->url($twitter_path), $parameters );

if ($http_code === 200) { // if everything's good
	$response = strip_tags($connection->response['response']);

	if ($_GET['callback']) { // if we ask for a jsonp callback function
		echo $_GET['callback'],'(', $response,');';
	} else {
		echo $response;	
	}
} else {
	echo "Error ID: ",$http_code, "<br>\n";
	echo "Error: ",$connection->response['error'], "<br>\n";
}

// You may have to download and copy http://curl.haxx.se/ca/cacert.pem
