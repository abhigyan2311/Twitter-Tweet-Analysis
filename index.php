<!DOCTYPE HTML>
<html>
<head>
<title>Housing Tweet Analysis</title>
<script src="ajax_call.js"></script>
<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" href="css/materialize.css">
<script src="js/materialize.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
	<link rel="manifest" href="favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">


</head>
<body>
  <div class="row">
   <div class="col s6 offset-s3">
       <div align="center"><img class="responsive-img" width="20%" src="img/tweet.png"/></div>
                <div class="bform">
                       <form>
                        <div class="row">
                                 <div class="input-field col s6 offset-s3">
                                   <input id="tweetid" type="text" length="18" value="592001004469522432">
                                   <label class="active blue-text" for="tweetid">Tweet ID</label>
                                 </div>
                        </div>
                       </form>
                       <div align="center">
			                       <button class="btn waves-effect waves-light blue" onclick="homepage(); homepage2();"  type="submit" name="action">Analyze
                         <i class="mdi-action-autorenew right"></i>
                       </button>
                       </div>
                </div>
        <div class="results">
        <h4 class="rheading" align="center">Results</h4>
        <div id="div1"></div> 
        <br> 
        <div id="div2"></div>  
        </div>        
       </div>
   </div>
</body>
</html>
