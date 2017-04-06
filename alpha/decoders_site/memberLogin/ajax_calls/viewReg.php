<?php

?>
<html>
<body>
	<div class="col-md-6 col-md-offset-3">
	<center><h2 class="h2-responsive">View Registrations</h2><br><br></center>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype='multipart/form-data'>
		<div class="form-group">
			<label class="form-label">EVENT ID</label>
			<input type="text" class="form-control" id="" name="name" placeholder="Enter the event's id to view its registrations">
		</div>
		<center><button type="submit" class="btn btn-primary" id="subForm">Submit</button><br><br><br>
	</form>
	</div>
</body>
</html>