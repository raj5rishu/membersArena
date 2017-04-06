<?php
$month=array('Jan','Feb','March','April','May','June','July','Aug','Sep','Oct','Nov','Dec');
require_once 'connect.inc.php';
$sql="Select event_id, event_name, month(event_date) as month  , day(event_date) as day , description from event";
$result=$conn->query($sql);
$len=mysqli_num_rows($result);
$calofevents=array();
$i=0;
while($row=$result->fetch_assoc())
{   
	 $calofevents[$i][0]=$row["event_id"];	
     $calofevents[$i][1]=$row["event_name"];
	 $calofevents[$i][2]=$row["description"];			
	 $calofevents[$i][3]=$month[$row["month"]-1];
	 $calofevents[$i][4]= $row["day"];
				
	$i++;								
	
}

//echo $calofevents[0][1]." ".$calofevents[0][2];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Decoders for Registration</title>
	<link rel="icon" href="../commonResources/img/title.jpg">
    <?php require_once "../commonResources/includeCSS.php";?>
	 <link href="../commonResources/css/um-template.min.css" rel="stylesheet">
	
	
</head>

<body>    
<!-- Modal Login -->
			<?php 
			require_once 'connect.inc.php';
			session_start();
			include '../commonResources/modalLogin.inc.php';
			?>
<!-- Modal Login -->

<!--Navigation-->
			<?php require_once '../commonResources/navigation.inc.php';?>
<!--/.Navigation-->
    
		<!--Carousel Wrapper-->
			<div id="carousel-example-2" class="carousel slide carousel-fade hidden-xs" data-ride="carousel">
				<!--Indicators-->
			<!--	<ol class="carousel-indicators">
					<li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-2" data-slide-to="1"></li>
					<li data-target="#carousel-example-2" data-slide-to="2"></li>
				</ol> -->
				<!--/.Indicators-->
				<!--Slides-->
				<div class="carousel-inner" role="listbox">
					<!--First slide-->
					
					
					<div class="carousel-item active">
						<!--Mask color-->
						<div class="view hm-black-strong"> <!--hm-black-light also an option-->
							<img src="../commonResources/img/1.jpg" class="img-fluid" alt="">
							<div class="full-bg-img welcome">
																										
						
									
								
								<?php include 'carouselText.inc.php';?>
								
								
								<div class="cover blackLight">
										<div class="text-center">
											<p>Companies our alumni work for:</p>
										</div>
								</div>
									
							</div>
						</div>
						
						<!--Caption-->
					<!--	<div class="carousel-caption">
							<div class="animated fadeInDown">
								<h3 class="h3-responsive">Light mask</h3>
								<p>Secondary text</p>
							</div>
						</div> -->
						<!--Caption-->
					</div>
					<!--/First slide-->

					
					
					
					
					
					
					
					<!--Second slide-->
					
					
					
					
					<div class="carousel-item">
						<!--Mask color-->
						<div class="view hm-black-strong"> <!--hm-black-light also an option-->
							<img src="../commonResources/img/2.jpg" class="img-fluid" alt="">
							<div class="full-bg-img welcome">
																										
						
									
								
								<?php include 'carouselText.inc.php';?>
								
								
								<div class="cover blackLight">
										<div class="text-center">
											<p>Companies our alumni work for:</p>
										</div>
								</div>
									
							</div>
					</div>
						
						<!--Caption-->
					<!--	<div class="carousel-caption">
							<div class="animated fadeInDown">
								<h3 class="h3-responsive">Light mask</h3>
								<p>Secondary text</p>
							</div>
						</div> -->
						<!--Caption-->
					</div>
					<!--/Second slide-->
					
					

					<!--Third slide-->
					
					
					
					<div class="carousel-item">
						<!--Mask color-->
						<div class="view hm-black-strong"> <!--hm-black-light also an option-->
							<img src="../commonResources/img/3.jpg" class="img-fluid" alt="">
							<div class="full-bg-img welcome">
																										
						
								
								<?php include 'carouselText.inc.php';?>
								
								
								<div class="cover blackLight">
										<div class="text-center">
											<p>Companies our alumni work for:</p>
										</div>
								</div>
									
							</div>
					</div>
						
						<!--Caption-->
					<!--	<div class="carousel-caption">
							<div class="animated fadeInDown">
								<h3 class="h3-responsive">Light mask</h3>
								<p>Secondary text</p>
							</div>
						</div> -->
						<!--Caption-->
					</div>
				
			</div>
		</div>
		<!--/.Carousel Wrapper-->
		
		<!-- Carousel Alternative for mobile devices-->
		<div class="row display-xs" style="padding-top:65px;padding-bottom:20px">
								<div class="row text-center">
									<div class="col-md-12"><h1 class="h1-responsive"  >Welcome to the official website of<strong>Decoders</strong></h1></div>
									<p>Where coding begins all over again</p>
									
									<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalForm">
										Member Login
									</button>
								</div>	
								
		 </div>
		
		<!-- Alumni images bar-->
		<section id="logos">
							<ul class="list-unstyled">
														<li ><img src="../commonResources/img/logo_zscaler.png" alt="ZeeScaler"></li>
														<li ><img src="../commonResources/img/logo_redbus.png" alt="Redbus"></li>
														<li><img src="../commonResources/img/logo_samsung.png" alt="Samsung"></li>
														<li ><img src="../commonResources/img/logo_sap.png" alt="SAP Labs"></li>
														<li><img src="../commonResources/img/logo_oracle.png" alt="Oracle"></li>
														<li><img src="../commonResources/img/logo_fire_eye.png" alt="Fire Eye"></li>
														<li ><img src="../commonResources/img/logo_pega.png" alt="Pega Systems"></li>
														<li class="hidden-xs"><img src="../commonResources/img/logo_akamai.png" alt="Akamai"></li>
							</ul>
		</section>
        <!--/ .Alumni images bar-->
		
		<!-- RED SECTION //-->
							<section id="section_1">
								<div class="cover rd" >
									<div class="container">
										<div class="row">
											<div class="col-sm-12 col-md-6 col-lg-6">
												<h1>Hone your skills with us.</h1>

												<p>"The World does not run on number of certificates one has, but on the skills our hands have."<strong>- Mr. Narendra Modi</strong></p>
												<p style="display:inline-block">We at Decoders are comitted to help you develope your skills. So pull up your socks <b>AND</b><br>
												choose from the <b style="display:inline-block">MANY</b> sections available to build on the right skills for the industry.</p>
											</div>
											<div class="col-sm-12 col-md-6 col-lg-6" style="padding-top:10%">
												<div class="box">
													<div class="flipper">
														<div class="side front">
															<ul>
																<li id="creative">
																	<img src="../commonResources/img/btn_ds.png" alt="Data Structures">
																	<span>Data Structures</span>
																</li>
																<li id="science">
																	<img src="../commonResources/img/btn_algo.png" alt="Algorithms">
																	<span>Algorithms</span>
																</li>
															</ul>
															<ul>
																<li id="business">
																	<img src="../commonResources/img/btn_c.png" alt="C/C++">
																	<span>C/C++</span>
																</li>
																<li id="health">
																	<img src="../commonResources/img/btn_interview.png" alt="Interview">
																	<span>Interview Experience</span>
																</li>
															</ul>
														</div>
														<div class="side back">
															<a id="closeBox"><img src="../commonResources/img/btn_close.png" alt="Close Box"></a>

															<div id="creativeBox">
																<h2>Data Structures</h2>

																<p>Learn specialized way of organizing data to make your program more efficient than ever !</p>
															</div>
															<div id="scienceBox">
																<h2>Algorithms</h2>

																<p>Algorithms are the foundations on which most successful startups grow into humongous companies. Come, master them with us !  </p>
															</div>
															<div id="businessBox">
																<h2>C/C++</h2>

																<p>Even after 40 years of their inception C/C++ are tough competition for other programming languages in terms of development. Learn, why? </p>
															</div>
															<div id="healthBox">
																<h2>Interview Experience</h2>

																<p>Learn from the interview experiences of your seniors and prepare yourself for the challenge ahead.</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
		
		<!--/.RED SECTION-->
		
		
		
		
	<!--the three cards -->
		
	<div class="container" id="page">     <!-- container for entire page start-->
	<!--<br><br><br><br><br><br>-->
	
		<div class="row">
			<!--card 1 start-->
				<div class="col-md-4 wow fadeInLeft">
					<br>
					<!--Card Start-->
						<div class="card">
							<div class="um-events-tile">
									<div class="row story-heading">
										<div class="col-md-12">
											<h5 class="pull-left">Upcoming Events</h5>

											<p class="text-right small pull-right" style="padding-top: 20px;">Today is <?php echo date("Y/m/d"); ?> </p>
										</div>
									</div>
									<div id="homepage-events">
									
										<?php  
										for($i=0;$i<$len;$i++){
										   
										echo '<div class="row event ">';

										echo '<div class="col-sm-10 col-xs-9 text-left pull-right story-content">';
										echo '		<strong>';
										echo  '		   <a href="event.php?event_id='.$calofevents[$i][0].'">';
										echo	'		<h6 class="title">'.$calofevents[$i][1].'</h6>';
										echo '		   </a>';
										//echo  ' <p style="font-size:10%">'.$calofevents[$i][2].'</p>';
										echo		'</strong>';
												

											  
										echo '	</div>';
										echo '	<div class="col-sm-2 col-xs-3 text-center pull-left story-date" aria-hidden="true">';
										echo '		<div class="date-box" id="posts">';
										echo '			<div class="month">';
										echo			 $calofevents[$i][3];   
										echo	'		</div>';
										echo '			<div class="date">';
										echo 		$calofevents[$i][4];   
										echo '			</div>';
										echo '		</div>';
										echo '	</div>';
											
											
										echo '</div>';
									   }

										?>
										
										
										
										
										
										
										
										
									</div>
									
							 </div>
							<!--card content end-->
						</div>
						<!--Card End-->
				</div>
	
				<!--card 1 end-->
				<!--card 2 start-->
				<div class="col-md-4 wow fadeInUp">
					<br>
						<!--Card Start-->
						<div class="card">

								<!-- start feedwind code --> <script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="21503/"></script> <!-- end feedwind code -->	<!--card content end-->
						</div>
						<!--Card End-->
				</div>
				<!--card 2 end-->
				<!--card 3 start-->
				<div class="col-md-4 wow fadeInRight">
					<br>
						<!--Card Start-->
						<div class="card">

								<!-- start feedwind code --> <script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="21499/"></script> <!-- end feedwind code -->

						</div>
						<!--Card End-->
				</div>
				<!--card 3 end-->
		</div>
	</div>
	
	<!--./the three card -->
	
	<br><br>
		
		
		
	<!--footer start-->
				<?php require_once '../commonResources/footer.inc.php';?>
	<!--footer end-->		
		

    
    

    <!-- SCRIPTS -->
				<?php require_once '../commonResources/includeScripts.php';?>
    
	
	 <script type="text/javascript" src="../commonResources/js/new.js"></script>
	 
	 <script type="text/javascript" src="../commonResources/js/flip.js"></script>
	
	



</body>

</html>