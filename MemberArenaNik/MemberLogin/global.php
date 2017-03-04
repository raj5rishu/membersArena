<?php
require_once 'classes/User.php';
require_once 'classes/UserTools.php';
require_once 'classes/DB.php';
$username=$_POST["username"];
$password=$_POST["password"];
 
//connect to the database
$db = new DB();
$db->connect();
 
//initialize UserTools object
$userTools = new UserTools();

	
//start the session
session_start();
 
//refresh session variables if logged in
if(isset($_SESSION['logged_in'])) {
	$user = unserialize($_SESSION['user']);
	$_SESSION['user'] = serialize($userTools->get($user->id));
}
?>
