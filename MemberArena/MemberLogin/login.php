<?php   

include('connectdb.php');
$username=$_POST["username"];
$password=$_POST["password"];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM login where username='$username' and password='$password' ";
$result = $conn->query($sql);

if ($result->num_rows == 1) 
{
    echo "login successful welcome ". $username;
    startSession($username);
} 
else 
{
    echo "Invalid username or password";
}

header('Location: http://localhost/MemberArena/MemberLogin%20-%20Copy/index.html');

void startSession($username)
{
  

}

?>