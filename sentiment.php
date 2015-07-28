<html>
<head>
	<title>Data fetch</title>
</head>
<body>
<?php
$text = rawurlencode("this is happy");
$key = "7cb8c3d6-1f57-4525-b368-8cab997adf85";

$url = 'https://api.idolondemand.com/1/api/sync/analyzesentiment/v1?text='.$text.'&apikey='.$key;
$result = json_decode(file_get_contents($url), true);
//print_r($result);
$yoyo = $result['aggregate']['sentiment'];
print_r($yoyo);	
?>
</body>
</html>
