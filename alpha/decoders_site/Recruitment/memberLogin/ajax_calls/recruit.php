<?php  

switch($_GET["option"])
{
	case "view": $sql = "SELECT * FROM `candidate`"; 
				 break;
	case "round1": $sql = "SELECT * FROM `round1`"; 
				 break;
	case "interview": $sql = "SELECT * FROM `interview`"; 
				 break;
	case "remaining": $sql = "SELECT * FROM ``"; 
				 break;
	
	
	
}
require_once '../connect.inc.php';
if ($conn->connect_error) 
		{
		die("Connection failed: " . $conn->connect_error);
		}


$result = $conn->query($sql);
if($result)
{
 echo '<br>';
 $str ="<table  class='table table-striped'>
      <tr> <th>USN</th>
	  <th>Name</th>
	  <th>Email</th>
	  <th>CGPA</th>
	  <th>Year</th>
	  <th>Phone</th>
	  <th>Resume</th>
	  <th>Profile</th>
 </tr>";
 echo $str;
 while ($row = mysqli_fetch_array($result)) {
 $name   = $row['name'];
 $usn = $row['usn'];
 $email = $row['email'];
 $cgpa = $row['cgpa'];
 $year = $row['year'];
 $phone = $row['phone'];
 $resume = $row['resume'];
  echo "<tr><td>".$usn. "</td><td>".$name. "</td><td>".$email. "</td><td>".$cgpa. "</td><td>".$year. "</td><td>".$phone. "</td><td><a href='resume/".$resume. "' target='_blank' >Click to view</a></td><td><a href='profile.php?usn=".$usn."' target='_blank' >View Profile</a></td></tr>";
 }
 echo "</table>";
}



?>



