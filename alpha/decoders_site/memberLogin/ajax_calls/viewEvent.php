<?php
		require_once 'connect.inc.php';
		$query = "select * from `event`";
		$result = $conn->query($query);
?>
<html>
<body>
	<div class="col-md-6 col-md-offset-3">
	<center><h2 class="h2-responsive"> All Events </h2><br><br></center>
	<?php
		if($result)
{
 echo '<br>';
 $str ="<table  class='table table-striped'>
      <tr> 
	  <th>S.No.</th>
	  <th>Event ID</th>
	  <th>Event Name</th>
	  <th>Date</th>
	  <th>Created By</th>
	  <th>Max Regs Allowed</th>
	</tr>";
 echo $str;
 $i=0;
 while ($row = mysqli_fetch_array($result)) {
 $id   = $row['event_id'];
 $name   = $row['event_name'];
 $date = $row['event_date'];
 $created = $row['mem_id'];
 $regs = $row['no_of_reg'];
 
 $i++;
  echo "<tr><td>".$i."</td><td>".$id. "</td><td>".$name. "</td><td>".$date. "</td><td>".$created. "</td><td>".$regs. "</td><td></tr>";
 }
 echo "</table>";
}

	?>
	</div>
</body>
</html>