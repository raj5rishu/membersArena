<?php 
session_start();
require_once 'connect.inc.php';
if(isset($_SESSION['user'])||!empty($_SESSION['user']))
	{
		$user = $_SESSION['user'];
		if ($conn->connect_error) 
		{
		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT * FROM `members_data` where email_id='$user'";
		$result = $conn->query($sql);
		if($result)
		{
			$row=$result->fetch_assoc();
			$name = $row['first_name']." ".$row['last_name'];
			$phone = $row['mob_no'];
			$batch = $row['batch'];
			$email = $row['email_id'];
			$img = $row['image'];
		}
		else
		{
			echo $conn->error();
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<body>
<div class="row"> 
		<br><br>
		<center>
			<div class="col-md-4" >	
				<img src="../commonResources/img/team/<?php echo $img?>" style="width:45%;border-radius:5%">
			</div>
		</center>
		
		<div class="col-md-8">      
			<table class="table table-striped" style="width:70%"> 
				<tr>
                     <td><strong>NAME</strong></td><td><?php echo $name; ?></td>						
				</tr>
				<tr>
                    <td><strong>PHONE</strong></td><td><?php echo $phone; ?></td>						
				</tr>
				<tr>
                    <td><strong>BATCH</strong></td><td><?php echo $batch; ?></td>						
				</tr>
				<tr>
                    <td><strong>EMAIL</strong></td><td><?php echo $email; ?></td>						
				</tr>
						
			</table>
						
		</div>
</div>		
</body>
</html>