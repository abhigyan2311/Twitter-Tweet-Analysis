<?php
  session_start();
  $vcheck = $_SESSION['vcheck'];
  $ucheck = $_SESSION['ucheck'];
  $rtc = $_SESSION['rtc'];
  $ftc = $_SESSION['ftc'];
  $text = $_SESSION['text'];
  $tlen = $_SESSION['textlen'];
  $tplen = ($tlen/140)*10;
  $progress = 0;


  //URL Analysis

  $domain = $_SESSION['eurl'];
  $domain = explode("://",$domain);
  $domain = $domain[1];
  $tlds = array("gov","mil","nic","org","edu");
  $domainExt = explode(".",$domain);
   foreach($tlds as $n)
   {
      if($n == $domainExt[1])
      {
         $progress = $progress + 10;
      }
   }

   //function to get the remote data
function url_get_contents ($url) {
    if (function_exists('curl_exec')){ 
        $conn = curl_init($url);
        curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($conn, CURLOPT_FRESH_CONNECT,  true);
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
        $url_get_contents_data = (curl_exec($conn));
        curl_close($conn);
    }elseif(function_exists('file_get_contents')){
        $url_get_contents_data = file_get_contents($url);
    }elseif(function_exists('fopen') && function_exists('stream_get_contents')){
        $handle = fopen ($url, "r");
        $url_get_contents_data = stream_get_contents($handle);
    }else{
        $url_get_contents_data = false;
    }
return $url_get_contents_data;
} 

  //Sentiment Analysis
  $key = "7cb8c3d6-1f57-4525-b368-8cab997adf85";
  $url = "https://api.havenondemand.com/1/api/sync/analyzesentiment/v1?text=".$text."&apikey=".$key;
  $result = file_get_contents($url);
  $yoyo = $result['aggregate']['sentiment'];
  print_r($yoyo);	
  
  //Google Search | News Check Logic

	// searching if the string has the word sale
	// if (strpos($text,'sale') == false) {

	// 	// if the word doesnt appear in the text tweet
 //        $text.="%20-sale";
	// 	$query=$text;
	// 	$url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=".$query;
	// 	$body = file_get_contents($url);
	// 	$json = json_decode($body);
	// 	$ar = new SplFixedArray(count($json->responseData->results));
	// 	$apple = "";
	// 	for($x=0;$x<count($json->responseData->results);$x++){
	// 	$ar[$x]= $json->responseData->results[$x]->visibleUrl;
	// 	$apple .=$ar[$x];
	// 	}
	// $reg = "/timesofindia|oneindia/";
	// $result = preg_match($reg,$apple);
	// if ($result == 1) {

	// 	echo $result;    
	// }
	// else
	// {
	// 	echo '0';
	// }

	// }




  //Credebility Logic

  $progress = $progress + $tplen;
  if ($vcheck == 1)
  {
  	$progress = $progress + 30;
  }
  if ($rtc >= 10 && $rtc<100)
  {
  	$progress = $progress + 5;
  }
  else if ($rtc >= 100 && $rtc<1000)
  {
  	$progress = $progress + 10;
  }
  else
  {
  	$progress = $progress + 20;
  }




  if ($ftc >= 10 && $ftc<100)
  {
  	$progress = $progress + 5;
  }
  else if ($ftc >= 100 && $ftc<1000)
  {
  	$progress = $progress + 10;
  }
  else
  {
  	$progress = $progress + 20;
  }
  if ($ucheck == 1)
  {
  	$progress = $progress + 10;
  }

if (!$text)
{
	$progress=0;
}

  //More Checks and filters for refining the credebility.

$tprog = sprintf('%0.2f', $progress);

if ($tprog < 50)
{
	$colorclass = "red-text";
}
else
{
	$colorclass = "green-text";
}
echo '<div class="progress"><div class="determinate" style="width: ';
echo $tprog;
echo '%"></div></div><div align="center"><h5 class="credtext" style="display:inline;">Credibility : </h5><h5 style="display:inline;" class="';
echo $colorclass;
echo '">';
echo $tprog;
echo ' %</h5></div>';

?>