<?php 
	$img="user.png";
	$un="Member";
	require_once 'connect.inc.php';
	session_start();
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
			$un = $row['first_name']." ".$row['last_name'];
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

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Decoders - Member login</title>
	<link rel="icon" href="../commonResources/img/title.jpg">
	<!--CSS-->	
	<link href="../commonResources/css/bootstrap.min.css" rel="stylesheet">
	<link href="../commonResources/css/bootstrap1.min.css" rel="stylesheet">
	<link href="styles/indexStyle2.css" rel="stylesheet">
    
	
</head>
<body>
		<div class="col-md-12 top">
				<div class="col-sm-7 col-sm-offset-3">
					<div class="col-sm-3">
						<img src="img/logo.png" style="width:100%;">
					</div>
					<div class="col-sm-9"  style="padding-top:2%;padding-bottom:2%;">
						<h1 class="h1-responsive text">MEMBERS' ARENA</h1>
					</div>
				</div>
		</div>
		<div class="col-sm-12 User_Bar">
			<div class="Welcome__username">
				<div class="col-md-6 col-md-offset-6" style="text-align:right;">	
					WELCOME,&nbsp<?php echo $un?>&nbsp
					<img src="img/team/<?php echo $img?>" class="img-circle" style="width:10%;">
				</div>
			</div>
		</div>
		
			<div class="col-sm-2 Left_Rectangle">
				<div id="profile" class="Button">
					<p class="ButtonText" style="top:30%;">Profile</p>
				</div>
				<div id="recruitment" class="Button">
					<p class="ButtonText" style="top:30%;">Recruitment</p>
				</div>
			
				<div id="legacy" class="Button">
					<p class="ButtonText" style="top:30%;">Our Legacy</p>
				</div>
				<div id="admin" class="ButtonInactive">
					<p class="ButtonText " style="top:30%;">Admin. Controls</p>
				</div>
				
				<div style="bottom: 0px; position:absolute;">
					<p class="ButtonText"><u><a href="logout.php">Logout</a></u></p>
				</div>
			</div>
			<div id="output" class="col-sm-10" style="height:inherit;">
			     <div id="profOut" style="display:None; position:relative" >
                  <h1 class="h1-responsive" style="font-family:Tahoma;"> <u>DeCoders Recruitment 2k17</u></h1>
				   <br>
				  <select id="slct" > 
				   <option value="">Select</option>
				   <option value="view">View All</option>
				   <option value="round1">First Round</option>
				   <option value="interview">Interview</option>
				   <option value="remaining">Remaining</option>
				  </select>
				  
				 </div>
				 
				 
				 <div id="tabOut" style="display:none ">
                  <h2 class="h2-responsive">Welcome Member</h2><br>
				   
				  

				 </div>
				
				
			</div>
			
<script type="text/javascript" src="js/renderOnClick.js"></script>


 
</body>
</html>