var prof=document.getElementById("profile");
var admin=document.getElementById("admin");
var output=document.getElementById("output");
var tabOut=document.getElementById("tabOut");

//Event Listeners

prof.addEventListener("click", profRend, false);


function profRend()
{
  document.getElementById("tabOut").style.display="block";
  callFile("ajax_calls/memProf.php"); 
}

function callFile(fileName)
{
	
  var xhttp; 
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() 
  {
    if (this.readyState == 4 && this.status == 200) 
	{
    document.getElementById("tabOut").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET",fileName, true);
  xhttp.send();
	
}