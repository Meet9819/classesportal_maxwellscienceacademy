
<?php include "allcss.php"; ?>


<!-- START HEADER -->
<?php include "header.php"; ?>
<!-- END HEADER --> 

<!-- START SECTION BREADCRUMB -->
<section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="assets/images/about_bg.jpg">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-sm-6">
            	<div class="page-title">
            		<h1>Teacher</h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-sm-end">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Teacher</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->

<!-- START SECTION TEACHER -->
<section class="small_pt">
	<div class="container">	
        <div class="row justify-content-center">
        	   <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * FROM teachers ");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '   <div class="col-lg-3 col-sm-6">
                                                <div class="team_box team_style1 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                                                    <div class="team_img">
                                                        <img src="images/teachers/'.$row['img'].'" alt="team1">
                                                        <ul class="list_none social_icons social_white">
                                                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="team_title radius_lbrb_10 text-center">
                                                        <h5><a href="#">'.$row['name'].'</a></h5>
                                                        <span>'.$row['subject'].'</span>
                                                    </div>
                                                </div>
                                            </div> 


                                   '; } 
                                 ?>


                              
         
        </div>
    </div>
</section>
<!-- END SECTION TEACHER -->



<!-- START FOOTER -->
<?php include "footer.php"; ?>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<?php include "allscript.php"; ?>
</body>

<!-- Mirrored from bestwebcreator.com/eduglobal/demo/teacher.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Aug 2020 12:11:52 GMT -->
</php>