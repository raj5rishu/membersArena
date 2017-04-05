<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$name=$_POST['name'];
		require_once 'connect.inc.php';
		$query = "delete from `event` WHERE `event_id`=$name";
		$result = $conn->query($query);
		$n = mysqli_affected_rows($conn);
		if($n > 0)
			header ('Location: Success.php');
		else
			header ('Location: Failure.php');
	}
?>

<html>
<body>
	<div class="col-md-6 col-md-offset-3">
	<center><h2 class="h2-responsive"> Delete Event </h2><br><br></center>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype='multipart/form-data'>
		<div class="form-group">
			<label class="form-label">EVENT ID TO DELETE</label>
			<input type="text" class="form-control" id="" name="name" placeholder="Enter the event's id to delete">
		</div>
		<center><button type="submit" class="btn btn-primary" id="subForm">Submit</button><br><br><br>
	</form>
	</div>
</body>
</html>