
<?php
include "allcss.php"; ?>


<!-- START HEADER -->
<?php
include "header.php"; ?>
<!-- END HEADER --> 

<!-- START SECTION BREADCRUMB -->
<section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="assets/images/about_bg.jpg">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-sm-6">
            	<div class="page-title">
            		<h1>Our Courses</h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-sm-end">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Courses</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->

<!-- START SECTION COURSES -->
<section class="small_pt">
	<div class="container">
        <div class="row">


             <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * FROM courses  ");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '  


                                    <div class="col-lg-4 col-sm-6">
                                        <div class="content_box radius_all_10 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                                            <div class="content_img radius_ltrt_10">
                                                <a href="coursedetailpage.php?q='.$row['id'].'"><img src="images/courses/'.$row['img'].'" alt="course_img1"/></a>
                                            </div>
                                            <div class="content_desc">
                                                <h4 class="content_title"><a href="coursedetailpage.php?q='.$row['id'].'">'.$row['title'].'</a></h4>
                                                <p>'.substr($row['shortdescription'],0,100).'..  </p> 
                                               
                                            </div>
                                           
                                        </div>
                                    </div>


         
                         
                           
                             '; } 
                             ?>

        
        </div>
     
    </div>
</section>
<!-- END SECTION COURSES -->


<!-- START FOOTER -->
<?php
include "footer.php"; ?>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<?php
include "allscript.php"; ?>
</body>

<!-- Mirrored from bestwebcreator.com/eduglobal/demo/courses.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Aug 2020 12:11:41 GMT -->
</html>