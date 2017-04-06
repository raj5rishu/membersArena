<?php
  if($_SERVER['REQUEST_METHOD']=='POST') 
  { $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $phone=$_POST['phone'];
   $email=$_POST['email'];
   $article_domain=$_POST['domain'];
   $article_title=$_POST['title'];
   $subject=$_POST['subject'];
   $body=$_POST['body'];
  
  



		//require 'connect.ini.localhost.php';	//for local hosting
			require 'connect.inc.php';			//for online hosting at decoderssit.esy.es
		
			$r=1;
			$query1 = "INSERT INTO  author(`phone`,`email`) VALUES ('$phone','$email')";
			
			$conn->query($query1);
			
			$query2 = "Select author_id from author where phone='$phone'";
			
			$r=$conn->query($query2);
			
			$row=@mysqli_fetch_assoc($r);
			$auth_id=$row['author_id'];
			
			$query3 = "Insert into author_name(`author_id`,`fname`,`lname`) values ('$auth_id','$fname','$lname')";
			
			$conn->query($query3);
			$query4 = "Insert into article(`author_id`,`article_name`,`article_domain`,`subject`,`body`,`date_of_pub`) values ('$auth_id','$article_title','$article_domain','$subject','$body',CURRENT_TIMESTAMP)";
			$conn->query($query4);
			
			header('Location:  ./success2.php');
		
		
	
		

  }
	
?>


<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Decoders - Register for The HackFest 2K17</title>
	<link rel="icon" href="../commonResources/img/title.jpg">
    <?php include('../commonResources/includeCss.php');?>
	
</head>
<body>
		<?php include('../commonResources/navigation.inc.php');?>
			
			<!--poster-->
							<div class="row text-center">
									<img src="../commonResources/img/background.jpg" class="shift img-fluid" alt="">
							</div>	
							
			<!--/.poster-->
			<!--main content-->
							<div class="main-content shift">
								<div class="container">
									<div class="header-title">
										<center><h2 class="h2-responsive">Article Submission</h2></center>
									</div>
										<center><h4 class="h4-responsive question" style="font-family:Arial;"><b><u>SUBMIT YOUR DETAILS</u></b></h4></center>
										
								<!--form-->
								
								<div class="col-md-10 col-md-offset-1">
									<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype='multipart/form-data'>
										<p class="has-danger"><b>*All fields are required.</b></p>
										<p class="has-danger"><b></b></p>
										<div class="form-group">
											<label class="form-label">Name</label>
											<input type="text" class="form-control" value="" id="" name="fname" placeholder="Enter your first name">
											<input type="text" class="form-control" value="" id="" name="lname" placeholder="Enter your last name">
											<span class="has-danger"></span>
										</div>
										<div class="form-group">
											<label class="form-label">Email</label>
											<input type="text" class="form-control" value="" id="" name="email" placeholder="Enter your email id">
											<span class="has-danger"><?php echo @$emailError?></span>
										</div>
										<div class="form-group">
											<label class="form-label">Phone</label>
											<input type="text" class="form-control" value="" id="" name="phone" placeholder="Enter your Phone no." maxlength=10>
											<span class="has-danger"></span>
										</div>
										
										<div class="form-group">
											<label class="form-label">Article Domain</label>
											<select class="form-control" name="domain" id="year">
																<option value="apti">Aptitude</option>
																<option value="cprog">C/C++</option>
																<option value="ds">Data Structures</option>
																<option value="ada">Algorithms</option>
																<option value="intexp">Interview Experience</option>
											</select>
										</div>
										
										
										<div class="form-group">
											<label class="form-label">Title</label>
											<br>
											
											<input type="text" id="" name="title" value="">
											<span class="has-danger" name="resumeError"></span>
										</div>
										<div class="form-group">
											<label class="form-label">Subject</label>
											<br>
											<input type="text" id="" name="subject" placeholder>
											<span class="has-danger"></span>
										</div>
										<div class="form-group">
											<label class="form-label">Body</label>
											<br>
											<textarea id="" name="body" style="width:100%;height:360px"> </textarea>
											<span class="has-danger"></span>
										</div>
										<div class="col-md-10 col-md-offset-1 form-group">  <!--buttons-->
													<center><button type="submit" class="btn btn-primary" id="subForm">Submit</button>
													<button type="reset" class="btn btn-primary">Reset</button></center>
													<br><br>
												</div>
										
									</form>
								</div>
										
										
										
								</div>
							</div>
							
			<!--main content-->
			
			<?php include('../commonResources/footer.inc.php');?>
							
							
							
 <!-- SCRIPTS -->

    <?php include('../commonResources/includeScripts.php');?>
	
	 <script type="text/javascript" src="../commonResources/js/radioButton.js"></script>
	 
	 <script type="text/javascript" src="checkbox.js"></script>
	 
	 
</body>
</html>