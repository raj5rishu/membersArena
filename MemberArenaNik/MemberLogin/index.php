<?php   
require_once 'connect.inc.php';
session_start();
if(isset($_SESSION['user'])||!empty($_SESSION['user']))
	header('Location: memberArena.php');
else
{
	include 'loginForm.inc.php';
}
?>