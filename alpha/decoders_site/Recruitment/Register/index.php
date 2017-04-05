<?php
$Name=$usn=$email=$phone=$branch=$cgpa=$year="";
$NameError=$usnError=$emailError=$phoneError=$branchError=$cgpaError=$resumeError=$imgError="";
$globalError="";
$resume_name=$img_name="";

if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		
			readForm();
			$x=validate($Name,$usn,$email,$phone,$cgpa,$branch);
			if($x==1)
			{
				$i=uploadResume();
				$j=uploadImg();
				if($i==1 && $j==1)
				{
					$r=insertInTable($Name,$usn,$email,$phone,$cgpa,$branch,$year,$resume_name,$img_name); //r=0 means insert failed
					//require 'mail.php';
					if($r==1)
					{
					//mailHelper($teamId,$teamName,$domain,$institute,$membersCount,$abstract_name,$member,$time,$subDomain);
					header ('Location: success2.php');
					exit;
					}
					
				}
				else
				{
					echo "upload error!!";
				}
			}
			else
			{
				$globalError = "*The form is not correctly filled. Please fill in the form properly.";
			}	
		
	}

function uploadResume()
{
		global $Name;
		global $usn;
		global $resumeError;
		global $resume_name;
		$i=0;
					
					@$name = $_FILES['resume']['name'];
					@$size = $_FILES['resume']['size'];
					@$type = $_FILES['resume']['type'];
					@$temp_name = $_FILES['resume']['tmp_name'];
					@$error = $_FILES['resume']['error'];
					$extention = strtolower(substr($name, strpos($name,'.')+1));
					$resume_name = $Name.'_'.$usn.'.'.$extention;
					$location = '../resume/';

					if(isset($name))
					{
						if(!empty($name))
						{
								if(move_uploaded_file($temp_name,$location.$resume_name))
									$i=1;
							
						}
						else
						{
							$resumeError = '*Please choose a file';
							$i=0;
						}
					}
					return $i;
}

function uploadImg()
{
		global $Name;
		global $usn;
		global $imgError;
		global $img_name;
		@$name = $_FILES['img']['name'];
					@$size = $_FILES['img']['size'];
					@$type = $_FILES['img']['type'];
					@$temp_name = $_FILES['img']['tmp_name'];
					@$error = $_FILES['img']['error'];
					$extention = strtolower(substr($name, strpos($name,'.')+1));
					$file_name = $Name.'_'.$usn.'.'.$extention;
					$img_name = $file_name;
					$location = '../images/';
					$i=0;
					if(isset($name))
					{
						if(!empty($name))
						{
							if(($extention=='jpg'||$extention=='jpeg')&&$type=='image/jpeg')
							{
								if(move_uploaded_file($temp_name,$location.$file_name))
									$i=1;
							}
							else
							{
								$imgError = '*File must be jpeg/jpg';
								$i=0;
							}
						}
						else
						{
							$imgError= '*Please choose a file';
							$i=0;
						}
					}
					return $i;
}
	
	
function readForm()
{
			 
	global $Name;
	global $usn;
	global $email;
	global $phone;
	global $branch;
	global $cgpa;
	global $year;
	
			 @$Name = $_POST['Name'];
			 @$usn = $_POST['usn'];
			 @$email = $_POST['email'];
			 @$phone = $_POST['phone'];
			 @$branch = $_POST['branch'];
			 @$cgpa = $_POST['cgpa'];
			 @$year = $_POST['year'];
			 
}


function validate($Name,$usn,$email,$phone,$cgpa,$branch)
{
	//validate team name
	global $NameError;
	global $usnError;
	global $emailError;
	global $phoneError;
	global $cgpaError;
	global $branchError;
	if (empty($Name))
		{
			$NameError = "*Name is required";
			$i1=0;
		}
		else 
		{
		// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$Name))
			{
				$NameError = "*Only letters and white space allowed";
				 $i1=0;
			}
			else
				$i1=1;
		}
		//validate cgpa
		if(empty($cgpa))
		{
			$cgpaError="*CGPA Required ";
			$i2=0;
		}
		else
		{
			if($cgpa>=0 && $cgpa<=10)
				$i2=1;
			else
			{
				$phoneError="*Invalid CGPA";
				$i2=0;
			}
		}
		
		//validate phone
		if(empty($phone))
		{
			$phoneError="*Contact Number Required ";
			$i3=0;
		}
		else
		{
			if($phone>1000000000)
				$i3=1;
			else
			{
				$phoneError="*Invalid Phone Number";
				$i3=0;
			}
		}
		//validate branch
		if (empty($branch))
		{
			$branchError = "*Branch is required";
			$i4=0;
		}
		else 
		{
		// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$branch))
			{
				$branchError = "*Only letters and white space allowed";
				 $i4=0;
			}
			else
				$i4=1;
		}
		//check USN
		if(empty($usn))
		{
			$usnError="*USN Required ";
			$i5=0;
		}
		else
		{
			if (!preg_match("/^[0-9][a-zA-Z][a-zA-Z][0-9][0-9][a-zA-Z][a-zA-Z][0-9][0-9][0-9]$/",$usn))
			{
				$usnError = "*Invalid USN";
					$i5=0;
			}
			else
				$i5=1;
			
		}
		//check email
		if(empty($email))
		{
			$emailError="*Email Required";
			$i6=0;
		}
		else
		{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$emailError="*Invalid Email";
				$i6=0;
			}
			else
				$i6=1;
		}
		if($i1==1&&$i2==1&&$i3==1&&$i4==1&&$i5==1&&$i6==1)
			return 1;
		else
			return 0;
		
}

function insertInTable($Name,$usn,$email,$phone,$cgpa,$branch,$year,$resume_name,$img_name)
	{
		global $globalError;
		require 'connect.ini.localhost.php';	//for local hosting
		//require 'connect.ini.php';			//for online hosting at decoderssit.esy.es
		$table = 'candidate';
		$r=1;
		$query1 = "INSERT INTO `$table` (`name`,`usn`,`email`,`phone`,`year`,`branch`,`cgpa`,`image`,`resume`) VALUES ('$Name','$usn','$email','$phone','$year','$branch','$cgpa','$img_name','$resume_name')";
		if($query_run = mysql_query($query1))
		{
			//header ('Location: success.html');
			//echo "query 1 success";
			//exit;
		}
		else
		{
			$r=0;
			if(mysql_errno()==1062)
			{
				$globalError = "Entry already present for USN: ".$usn;
			}
		}
		
		return $r;
		
	
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
		<?php include('../commonResources/navbar.php');?>
			
			<!--poster-->
							<div class="row text-center">
									<img src="../commonResources/img/cover.jpg" class="shift img-fluid" alt="">
							</div>	
							
			<!--/.poster-->
			<!--main content-->
							<div class="main-content shift">
								<div class="container">
									<div class="header-title">
										<center><h2 class="h2-responsive">Recruitment 2K17<a href="https://www.facebook.com/Sit.Decoders" target="_blank"><img src="../commonResources/img/fb.png" class="fb-icon"></a></h2></center>
									</div>
										<center><h4 class="h4-responsive question" style="font-family:Arial;"><b><u>SUBMIT YOUR DETAILS</u></b></h4></center>
										
								<!--form-->
								
								<div class="col-md-10 col-md-offset-1">
									<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype='multipart/form-data'>
										<p class="has-danger"><b>*All fields are required.</b></p>
										<p class="has-danger"><b><?php echo $globalError;?></b></p>
										<div class="form-group">
											<label class="form-label">NAME</label>
											<input type="text" class="form-control" value="<?php echo @$Name;?>" id="" name="Name" placeholder="Enter your name">
											<span class="has-danger"><?php echo @$NameError?></span>
										</div>
										<div class="form-group">
											<label class="form-label">USN</label>
											<input type="text" class="form-control" value="<?php echo @$usn;?>" id="" name="usn" placeholder="Enter your USN">
											<span class="has-danger"><?php echo @$usnError?></span>
										</div>
										<div class="form-group">
											<label class="form-label">Email</label>
											<input type="text" class="form-control" value="<?php echo @$email;?>" id="" name="email" placeholder="Enter your email id">
											<span class="has-danger"><?php echo @$emailError?></span>
										</div>
										<div class="form-group">
											<label class="form-label">Phone</label>
											<input type="text" class="form-control" value="<?php echo @$phone;?>" id="" name="phone" placeholder="Enter your Phone no.">
											<span class="has-danger"><?php echo @$phoneError?></span>
										</div>
										<div class="form-group">
											<label class="form-label">Year</label>
											<select class="form-control" name="year" id="year">
																<option value="1">1st Year</option>
																<option value="2">2nd Year</option>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Branch</label>
											<input type="text" class="form-control" value="<?php echo @$branch;?>" id="" name="branch" placeholder="Enter your branch of engineering">
											<span class="has-danger"><?php echo @$branchError?></span>
										</div>
										<div class="form-group">
											<label class="form-label">CGPA</label>
											<input type="text" class="form-control" value="<?php echo @$cgpa;?>" id="" name="cgpa" placeholder="Enter your CGPA">
											<span class="has-danger"><?php echo @$cgpaError?></span>
										</div>
										<div class="form-group">
											<label class="form-label">Resume</label>
											<br>
											Upload your filled in resume here.
											<br><a href="../commonResources/docs/abstract.pdf" download>Click here to download resume(if not downloaded) </a>

											<input type="file" id="" name="resume" accept="file" value="">
											<span class="has-danger" name="resumeError"><?php echo $resumeError?></span>
										</div>
										<div class="form-group">
											<label class="form-label">Upload Image (JPEG/JPG only)</label>
											Upload your recent image here.
											<br>
											<input type="file" id="img_id" name="img">
											<span class="has-danger"><?php echo $imgError;?></span>
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
			
			<?php include('../commonResources/footer.php');?>
							
							
							
 <!-- SCRIPTS -->

    <?php include('../commonResources/includeScripts.php');?>
	
	 <script type="text/javascript" src="../commonResources/js/radioButton.js"></script>
	 
	 <script type="text/javascript" src="checkbox.js"></script>
	 
	 
</body>
</html>