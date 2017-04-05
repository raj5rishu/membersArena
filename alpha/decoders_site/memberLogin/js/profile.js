var prof=document.getElementById("profile");
var evnt=document.getElementById("event");
var articles=document.getElementById("articles");
var legacy=document.getElementById("legacy");
var admin=document.getElementById("admin");
var recruit=document.getElementById("recruitment");
var output=document.getElementById("output");




//prof.addEventListener("click", renderProfile, false);
/*evnt.addEventListener("click", function(){callFile("profile.php");}, false);
articles.addEventListener("click", function(){callFile("profile.php");}, false);
legacy.addEventListener("click", function(){callFile("profile.php");}, false);
admin.addEventListener("click", function(){callFile("profile.php");}, false);*/



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
