var prof=document.getElementById("profile");
var admin=document.getElementById("admin");
var output=document.getElementById("output");
var tabOut=document.getElementById("tabOut");
var evnt=document.getElementById("event");
var ce=document.getElementById("ce");
var de=document.getElementById("de");
var viewEvent=document.getElementById("viewEvent");
var viewReg=document.getElementById("viewReg");

//Event Listeners

prof.addEventListener("click", profRend, false);
evnt.addEventListener("click", evntRend, false);
ce.addEventListener("click", ceRend,false);
de.addEventListener("click", deRend,false);
viewEvent.addEventListener("click", viewEventRend,false);
viewReg.addEventListener("click", viewRegRend,false);

function ceRend()
{
	document.getElementById("tabOut").style.display="block";
  callFile("ajax_calls/ce.php");
}

function deRend()
{
	document.getElementById("tabOut").style.display="block";
  callFile("ajax_calls/de.php");
}
function viewEventRend()
{
	document.getElementById("tabOut").style.display="block";
  callFile("ajax_calls/viewEvent.php");
}
function viewRegRend()
{
	document.getElementById("tabOut").style.display="block";
  callFile("ajax_calls/viewReg.php");
}



function profRend()
{
  document.getElementById("tabOut").style.display="block";
  document.getElementById("event_span").style.display="none";
  callFile("ajax_calls/memProf.php"); 
}

function evntRend()
{
  document.getElementById("tabOut").style.display="none";
 document.getElementById("event_span").style.display="block";
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