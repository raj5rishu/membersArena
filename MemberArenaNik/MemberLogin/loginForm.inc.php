<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$username=$_POST["username"];
	$password=$_POST["password"];
	if ($conn->connect_error) 
	{
    die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT * FROM `members_data` where email_id='$username' and mob_no='$password'";
	$result = $conn->query($sql);
	if($result)
	{
		if ($result->num_rows == 1) 
		{
			$_SESSION['user']=$username;
			header('Location: memberArena.php');
		} 
		else 
		{
			echo "Invalid username or password";
		}
	}
	else
	{
		echo mysql_error();
	}
}
?>

<html>
	<body>

		<form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']?>">

		Username:<input type="text" width=20% name="username"><br>
		Password:<input type="password" width=20% name="password"><br>
		<button value="Submit">Submit</button>
		</form>


	</body>
</html>