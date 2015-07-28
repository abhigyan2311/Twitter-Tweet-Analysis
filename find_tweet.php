<?php
session_start();
ini_set('display_errors', 1);
$tweetid=$_GET['tweetid'];
require_once('TwitterAPIExchange.php');
 
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "429664969-QqY7TBSLrzAL5JsbJWy9MymOCvSZwS9VWp0uxo1y",
    'oauth_access_token_secret' => "Rfxw6CJkPMkWDly5WydtrPhE8Fu3VKW0PN6bGnaCPRd8w",
    'consumer_key' => "VRywS5XVsZTFbo1lMnM2RVud8",
    'consumer_secret' => "ClJvZ2fQCcUMgVvMajDmEHoEjpzHs7cUT7EHGAGoBdkbYCUdBq"
);

$url = "https://api.twitter.com/1.1/statuses/show.json";
$getfield = '?id='.$tweetid;
$requestMethod = "GET";
$twitter = new TwitterAPIExchange($settings);
$twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);

echo "<b>Name</b> : ".$string['user']['name'];
echo "<br>";

$check = $string['user']['verified'];
if($check == 1)
{
  echo "<b>Verified Account</b> : True";
}
else
{
  echo "<b>Verified Account</b> : False";
}

echo "<br>";
echo "<b>Retweet Count</b> : ".$string['retweet_count'];
echo "<br>";
echo "<b>Favourite Count</b> : ".$string['favorite_count'];
echo "<br>";
echo "<b>Hashtags</b> : ";
for($i=0;$i<=25;$i++)
{
   $htag = $string['entities']['hashtags'][$i]['text'];
   echo $htag;
   if(!$htag)
   {
   	break;
   }
   echo "<br>";
}

echo "<b>URL</b> : ";
$htag1 = $string['entities']['urls']['0']['expanded_url'];
echo $htag1;
echo "<br>";
echo "<b>Tweet Text</b>: <blockquote>".$string['text'];
echo "</blockquote><br>";


$tlen = strlen($string['text']);

$_SESSION['rtc'] = $string['retweet_count'];
$_SESSION['ftc'] = $string['favorite_count'];
$_SESSION['vcheck'] = $check;
$_SESSION['text'] = $string['text'];
$_SESSION['textlen'] = $tlen;
$_SESSION['eurl'] = $htag1;


?>
