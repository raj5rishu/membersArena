var prof=document.getElementById("profile");
var legacy=document.getElementById("legacy");
var admin=document.getElementById("admin");
var recruit=document.getElementById("recruitment");
var output=document.getElementById("output");
var tabOut=document.getElementById("tabOut");
var opt = document.getElementById("slct");

//var arr = ["View All","First Round","Interview","Remaining"];



//legacy.addEventListener("click",legacyRend , false);
//admin.addEventListener("click", adminRend, false);
recruit.addEventListener("click", recruitRend, false);
prof.addEventListener("click", profRend, false);
opt.addEventListener("click",getSelectedValue,false);


function recruitRend()
{
 document.getElementById("tabOut").style.display="none";
 document.getElementById("recruitOut").style.display="block";
 
}

function profRend()
{
  document.getElementById("recruitOut").style.display="none";
  document.getElementById("tabOut").style.display="block";
  callFile("ajax_calls/memProf.php"); 
}

function getSelectedValue()
{
 opt = document.getElementById("slct");
 var slctVal = opt.options[opt.selectedIndex].value;
 
 if(slctVal != "")
 {
 callFile("ajax_calls/recruit.php"+"?option="+slctVal);
 tabOut.style.display="block";
 }
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