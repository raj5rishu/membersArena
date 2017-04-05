<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		session_start();
		$user = $_SESSION['user'];
		$name=$_POST['name'];
		$date=$_POST['date'];
		$desc=$_POST['desc'];
		require_once 'connect.inc.php';
		$query = "INSERT INTO `event` (`event_name`,`event_date`,`description`,`mem_id`) values ('$name','$date','$desc','$user')";
		echo $query;
		if($result = $conn->query($query))
			header ('Location: Success.php');
		else
			header ('Location: Failure.php');
	}
	
?>
<html>
<body>
	<div class="col-md-6 col-md-offset-3">
	<center><h2 class="h2-responsive"> Create Event </h2><br><br></center>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype='multipart/form-data'>
		<div class="form-group">
			<label class="form-label">EVENT NAME</label>
			<input type="text" class="form-control" id="" name="name" placeholder="Enter the event's name">
		</div>
		<div class="form-group">
			<label class="form-label">DATE</label>
			<input type="date" class="form-control" id="" name="date" placeholder="Enter the event's date">
		</div>	
		<div class="form-group">
					<label class="form-label">EVENT DESCRIPTION</label><br>
					<textarea style="width:100%;height:150px;" placeholder="Enter the description of the event(max 500 characters)" name="desc" maxlength="500"></textarea>
		</div>
		<center><button type="submit" class="btn btn-primary" id="subForm">Submit</button><br><br><br>
	</form>
	</div>
		
										
</body>
</html>