var xmlhttp = createXmlHttpRequestObject();
var xmlHttp;
function createXmlHttpRequestObject() {
	if (window.ActiveXObject){
		try{
			xmlhttp = new ActiveXObject("Microsofot.XMLHTTP");
			xmlHttp = new ActiveXObject("Microsofot.XMLHTTP");
		} catch (e) {
			xmlhttp = false;
			xmlHttp = false;
		}
	}else{
		try{
			xmlhttp = new XMLHttpRequest();
			xmlHttp = new XMLHttpRequest();
		} catch (e) {
			xmlhttp = false;
			xmlHttp = false;
		}
	}

	if (!xmlhttp && !xmlHttp) {
		alert("Could not create XML Object");
	} else {
		return xmlhttp;
	}
}
function homepage() 
{
   var tweetid = document.getElementById("tweetid").value;
   $.get('find_tweet.php?tweetid='+tweetid, function(d){
   	$("#div1").html(d);
   });	
}
function homepage2() 
{
   $.get('php_calc.php', function(d){
   	$("#div2").html(d);
   });	  	
}


