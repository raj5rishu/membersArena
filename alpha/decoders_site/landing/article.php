<?php
require 'connect.inc.php';
$domain=$_GET['domain'];
$sql="Select * from article,author_name where article.author_id=author_name.author_id and article_domain='$domain'";
$result=$conn->query($sql);
$len=@mysqli_num_rows($result);
$articles=array();
$i=0;
while($row=mysqli_fetch_assoc($result))
{    

	
	 $articles[$i][0]=$row["article_name"];	
	 $articles[$i][1]=$row["subject"];			
	 $articles[$i][2]=$row["body"];
	 $articles[$i][3]=$row["date_of_pub"];
	 $articles[$i][4]=$row["fname"]." ".$row["lname"];
	 
		
				
	$i++;								
	
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Decoders - Articles</title>

    <link rel="icon" href="../commonResources/img/title.jpg">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="../commonResources/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="../commonResources/css/mdb.min.css" rel="stylesheet">

    <!-- Your custom styles (optional) -->
    <link href="../commonResources/css/style.css" rel="stylesheet">
	
	<!-- Font Awesome -->
    <link rel="stylesheet" href="../commonResources/css/font-awesome1.min.css">

    <!-- Bootstrap core CSS -->
   <link href="../commonResources/css/bootstrap1.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="../commonResources/css/mdb1.min.css" rel="stylesheet">

</head>

<body>
  <u><center><h3 class="h3-responsive">Articles</h3></center></u>
		<!--Section: Blog v.1-->
<section class="section extra-margins">

    <!--Section heading-->
    <center><u><h5 class="section-heading"><?php echo $articles[0][0];  ?></h5></u><center>
    <!--Section sescription-->
    <p class="section-description"><?php ?></p>

    <!--First row-->
    
        <!--/First column-->

        <!--Second column-->
        <div class="col-md-12 mb-r">
            <!--Excerpt-->
            
            <h4><?php echo $articles[0][1]; ?></h4>
            <p><?php echo $articles[0][2]; ?></p>
            <p>by <a><strong><?php echo $articles[0][3]; ?></strong></a>, <?php echo $articles[0][4] ;?>  </p>
           
        </div>
        <!--/Second column-->

    
    <!--/First row-->

    


</section>

			

</body>

</html>