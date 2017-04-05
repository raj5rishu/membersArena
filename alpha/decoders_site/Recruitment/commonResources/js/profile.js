var prof=document.getElementById("profile");
var evnt=document.getElementById("event");
var articles=document.getElementById("articles");
var legacy=document.getElementById("legacy");
var admin=document.getElementById("admin");
var output=document.getElementById("output");




prof.addEventListener("click", function(){callFile("../ajax_calls/profile.php");}, false);
evnt.addEventListener("click", function(){callFile("../ajax_calls/events.php");}, false);
articles.addEventListener("click", function(){callFile("../ajax_calls/articles.php");}, false);
legacy.addEventListener("click", function(){callFile("../ajax_calls/legacy.php");}, false);
admin.addEventListener("click", function(){callFile("../ajax_calls/admin.php");}, false);


function callFile(fileName)
{
	
  var xhttp; 
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
	{
    document.getElementById("output").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET",fileName, true);
  xhttp.send();
	
}