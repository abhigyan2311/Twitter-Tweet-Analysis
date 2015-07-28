<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	$t = 'howare are you?';   //append -sale
	// searching if the string has the word sale
	if (strpos($t,'sale') == false) {

		// if the word doesnt appear in the text tweet

		$query="land%20scam%20in%20patna%20-sale";
		$url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=".$query;
		$body = file_get_contents($url);
		$json = json_decode($body);
		$ar = new SplFixedArray(count($json->responseData->results));
		$apple = "";
		for($x=0;$x<count($json->responseData->results);$x++){

		//echo "<b>Result ".($x+1)."</b>";
		/*echo "<br>URL: ";
		echo $json->responseData->results[$x]->url;*/
		$ar[$x]= $json->responseData->results[$x]->visibleUrl;
		$apple .=$ar[$x];
		}
	//print_r($apple);
	$reg = "/timesofindia|oneindia/";
	$result = preg_match($reg,$apple);
	if ($result == 1) {
		# code...
		echo $result;    
	}
	else
	{
		echo '0';
	}

	}
	?>
</body>
</html>