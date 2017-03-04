<?php
$img="user.png";
	require_once '../memberLogin/connect.inc.php';
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
<nav class="navbar navbar-fixed-top z-depth-1 scrolling-navbar" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
																
			<a href="#"><h5 class="top-left">Decoders Official</h5></a>
		</div>
		<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px ;float:right" >
			<ul class="nav navbar-nav">
				<li class="active"><a href="#" class="waves-effect waves-light">User Login<span class="sr-only">(current)</span></a></li>
				<li><a href="#" class="waves-effect waves-light">Contact Us</a></li>
				<li class="dropdown">
				<a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" role="button" aria-expanded="false">More</a>
					<ul class="dropdown-menu pull-right"  role="menu">
					    <li><a href="#">Aptitude</a></li>
						<li><a href="#">Technical</a></li>
						<li><a href="#">Interview Experiences</a></li>
						<li class="divider"></li>
						<li><a href="#">Members</a></li>
						<li class="divider"></li>
						<li><a href="#">Testimonials</a></li>
						
					</ul>
				</li>
				<li class="waves-effect waves-light" ><img src="../memberLogin/img/team/<?php echo $img?>" style="border-radius:50%; width:100%; padding-top:10%"  >  </img></li>
				
				
			</ul>
								
		</div>
	</div>
</nav>	