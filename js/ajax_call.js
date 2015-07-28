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
function homepage() {
        var name = document.getElementById("name").value;
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		document.getElementById("div1").innerHTML=xmlhttp.responseText;
		}
	  }
        alert(name);
	xmlhttp.open("GET","verify_check.php?id="+name,true);
	xmlhttp.send();
}

