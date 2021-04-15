
<?php error_reporting(0);
define(SERVER_ROOT, __DIR__);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?> 
<?php include "allcss.php"; ?>

<?php include "header.php"; ?>

<!-- END HEADER --> 

<!-- START SECTION BANNER -->
<section class="banner_section p-0 full_screen">
    <div id="carouselExampleFade" class="banner_content_wrap carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            

             <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * FROM slider  limit 1 ");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo ' <div class="carousel-item active background_bg overlay_bg_40" data-img-src="images/slider/'.$row['img'].'">
                                             <div class="banner_slide_content">
                                                <div class="container"><!-- STRART CONTAINER -->
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-9 col-sm-12 text-center">
                                                            <div class="banner_content animation text_white" data-animation="fadeIn" data-animation-delay="0.8s">
                                                                <h2 class="font-weight-bold animation text-uppercase" data-animation="fadeInDown" data-animation-delay="1s">'.$row['title'].'</h2>
                                                                <p class="animation" data-animation="fadeInUp" data-animation-delay="1.5s">'.$row['shortdescription'].'</p>
                                                                <a class="btn btn-default animation" href="#" data-animation="fadeInUp" data-animation-delay="1.8s">Get Started</a>
                                                                <a class="btn btn-outline-white animation" href="#" data-animation="fadeInUp" data-animation-delay="1.8s">Learn More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- END CONTAINER-->
                                            </div>
                                        </div>
                         
                           
                             '; } 
                             ?>

                             <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * FROM slider order by id desc");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '   <div class="carousel-item background_bg overlay_bg_40" data-img-src="images/slider/'.$row['img'].'">
                                                <div class="banner_slide_content">
                                                    <div class="container"><!-- STRART CONTAINER -->
                                                        <div class="row justify-content-center">
                                                            <div class="col-lg-9 col-sm-12 text-center">
                                                                <div class="banner_content animation text_white" data-animation="fadeIn" data-animation-delay="0.8s">
                                                                    <h2 class="font-weight-bold animation text-uppercase" data-animation="fadeInDown" data-animation-delay="1s">'.$row['title'].'</h2>
                                                                    <p class="animation" data-animation="fadeInUp" data-animation-delay="1.5s">'.$row['shortdescription'].'</p>
                                                                    <a class="btn btn-default animation" href="#" data-animation="fadeInUp" data-animation-delay="1.8s">Get Started</a>
                                                                    <a class="btn btn-outline-white animation" href="#" data-animation="fadeInUp" data-animation-delay="1.8s">Learn More</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- END CONTAINER-->
                                                </div>
                                            </div>
                         
                          
                             '; } 
                             ?>



        </div>
        <div class="carousel-nav carousel_style1">
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <i class="ion-chevron-left"></i>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <i class="ion-chevron-right"></i>
            </a>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->

<!-- START SECTION FEATURE -->
<section class="bg_gray">
    <div class="container">
    	<div class="row justify-content-center">
        	<div class="col-xl-6 col-lg-8">
            	<div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center">
                        <h2>Conceptual Clarity</h2>
                    </div>
                    <p>Conceptual clarity is a vital key to help students understand content and make connections between what is taught and their own experiences.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                	<div class="box_icon bg_danger mb-3">
                		<img src="assets/images/book.png" alt="book" />
                    </div>
                    <div class="intro_desc">
                        <h5>Additional Support</h5>
                        <p>A student need not worry about missing lectures due to unavoidable circumstances anymore. Maxwell offers access to all lectures which allows to make up for lost curriculum.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
            	<div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                	<div class="box_icon bg_default mb-3">
                		<img src="assets/images/globe.png" alt="globe" />
                    </div>
                    <div class="intro_desc">
                        <h5>Doubt-Solving</h5>
                        <p>Maxwell enables a student to re-visit doubts time and again till complete understanding of the topic/solution is found.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
            	<div class="icon_box text-center bg-white icon_box_style2 box_shadow2 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                	<div class="box_icon bg_light_green mb-3">
                        <img src="assets/images/instructors.png" alt="instructors" />
                    </div>
                    <div class="intro_desc">
                        <h5>Expert Instructors</h5>
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
<!-- END SECTION FEATURE -->



<!-- START SECTION ABOUT -->
<section class="small_pt small_pb overflow-hidden">
	<div class="container-fluid p-0">
    	<div class="row no-gutters align-items-center">
        	<div class="col-md-6">
            	<div class="box_shadow1 bg-white overlap_section padding_eight_all">
                	<div class="animation" data-animation="fadeInLeft" data-animation-delay="0.02s">
                        <div class="heading_s1"> 
                          <h2>About Us</h2>
                        </div>
                        <p>Maxwell is an online education portal that provides interactive study material for students. We endeavour to make school easy for students and help them score more. Our products are carefully designed to ensure maximum learning through proven techniques such as conceptual videos, adaptive learning and collaborative learning methods.</p>
                        <p>Maxwell is India’s Largest Video Platform for Students helping them prepare better for exams such as JEE Main, JEE Advanced, CA CPT, CA IPCC, MBA, CAT, CMAT, CET (MHT-CET, KCET), Board Exams such as CBSE & ICSE (Class 9 and Class 10), SSC , HSC Commerce(Class 11 and Class 12), FYBCom Mumbai University and HSC Science(Class 11 and Class 12).</p>
                        <ul class="list_none list_item">
                        	<li>
                            	<div class="counter_content">
                                    <h3 class="h1 text_danger"><span class="counter">260</span></h3>
                                    <h6>Free Courses</h6>
                                </div>
                            </li>
                            <li>
                            	<div class="counter_content">
                                    <h3 class="h1 text_light_green"><span class="counter">152</span></h3>
                                    <h6>Paid Courses</h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        	<div class="col-md-6">
            	<div class="animation" data-animation="fadeInRight" data-animation-delay="0.03s">
                	<div class="overlay_bg_30 about_img z_index_minus1">	
                    	<img class="w-100" src="assets/images/about_img.jpg" alt="about_img"/>
                    </div>
                	<a href="https://www.youtube.com/watch?v=7e90gBu4pas" class="video_popup video_play">
                    	<span class="ripple"><i class="ion-play ml-1"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION ABOUT -->

<!-- START SECTION COURSES -->
<section class="small_pt">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-xl-6 col-lg-8">
            	<div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center">
                        <h2>Our Courses</h2>
                    </div>
                    <p>Improve your scores with the favourite study app of smart students.
Video lectures mapped to syllabus.
Hurry!! Offer available only for few days. </p>
                </div>
            </div>
        </div>
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
        <div class="row">
        	<div class="col-12">
            	<div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.07s">
                	<div class="medium_divider"></div>
                	<a href="courses.php" class="btn btn-default">View All Courses <i class="ion-ios-arrow-thin-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION COURSES -->

<!-- START SECTION COUNTER -->
<section class="parallax_bg overlay_bg_blue_70" data-parallax-bg-image="assets/images/counter_bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-6 ">
                <div class="box_counter counter_style1 text_white text-center animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                	<div class="counter_icon">
                    	<img src="assets/images/counter_icon1.png" alt="counter_icon1" />
                    </div>
                    <div class="counter_content">
                        <h3 class="counter_text"><span class="counter">1800</span>+</h3>
                        <p>Students</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6 ">
                <div class="box_counter counter_style1 text_white text-center animation" data-animation="fadeInUp" data-animation-delay="0.03s">
                    <div class="counter_icon">
                    	<img src="assets/images/counter_icon2.png" alt="counter_icon2" />
                    </div>
                    <div class="counter_content">
                        <h3 class="counter_text"><span class="counter">70</span></h3>
                        <p>Courses</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6 ">
                <div class="box_counter counter_style1 text_white text-center animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                    <div class="counter_icon">
                    	<img src="assets/images/counter_icon3.png" alt="counter_icon3" />
                    </div>
                    <div class="counter_content">
                        <h3 class="counter_text"><span class="counter">700</span>+</h3>
                        <p>Certified teachers</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6 ">
                <div class="box_counter counter_style1 text_white text-center animation" data-animation="fadeInUp" data-animation-delay="0.05s">
                	<div class="counter_icon">
                    	<img src="assets/images/counter_icon4.png" alt="counter_icon4" />
                    </div>
                    <div class="counter_content">
                        <h3 class="counter_text"><span class="counter">1200</span>+</h3>
                        <p>Award Winning</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION COUNTER -->
<!-- START SECTION CATEGORIES -->
<section class="small_pb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center">
                        <h2>Most Popular Categories</h2>
                    </div>
                    <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                    <div class="small_divider"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                <div class="course_categories carousel_slider owl-carousel owl-theme nav_style1" data-margin="15" data-loop="true" data-nav="true" data-dots="false" data-autoplay="true" data-responsive='{"0":{"items": "1"}, "380":{"items": "2"}, "576":{"items": "3"}, "1000":{"items": "5"}, "1199":{"items": "6"}}'>
                    <div class="item">
                        <div class="single_categories">
                            <a href="#" class="bg_danger">
                                <i class="fa fa-globe"></i>
                                Language
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single_categories">
                            <a href="#" class="bg_light_green">
                                <i class="fa fa-chart-line"></i>
                                Business
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single_categories">
                            <a href="#" class="bg_default">
                                <i class="fa fa-book"></i>
                                Academics
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single_categories">
                            <a href="#" class="bg_pink">
                                <i class="fa fa-camera"></i>
                                Photography
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single_categories">
                            <a href="#" class="bg_blue">
                                <i class="fa fa-heartbeat"></i>
                                Health Fitness
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single_categories">
                            <a href="#" class="bg_orange">
                                <i class="fa fa-code"></i>
                                Development
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION CATEGORIES -->


<!-- START SECTION REGISTER -->
<section class="pb-0 background_bg bg_blue_dark" data-img-src="assets/images/pattern_bg.png">
	<div class="container">
    	<div class="row align-items-end">
        	<div class="col-lg-6 col-md-7">
            	<div class="register_form radius_all_10 text_white padding_eight_all animation" data-animation="fadeInLeft" data-animation-delay="0.02s">
                    <div class="heading_s1 heading_light">
                        <h2>Get A Free <span class="text_default">Online Courses</span></h2>
                    </div>
                    <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything hidden in the middle of text</p>



                       <?php
                        include('db.php');
                        if(isset($_POST['save']))
                        { 
                                $name=$_POST['name'];
                                $mobile=$_POST['mobile'];
                                $email=$_POST['email'];
                                $message=$_POST['message'];  
                                $courses=$_POST['courses'];  
                                $save=mysqli_query($con,"INSERT INTO contactform (name,mobile,email,message, courses) VALUES ('$name','$mobile','$email','$message','$courses')");   
                                    ?>
                                    <script>
                                    alert('Thank You For Your Feedback ...');
                                    window.location.href='index.php';
                                    </script>
                                    <?php       
                        }

                    ?>

                    <form method="post" action=""  class="pt-md-2 form_transparent" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text">
                             </div>
                            <div class="form-group col-sm-6">
                                <input required="required" placeholder="Enter Email *" class="form-control" name="email" type="email">
                            </div>
                            <div class="form-group col-sm-6">
                                <input required="required" placeholder="Enter Phone No *" class="form-control" name="mobile" type="tel">
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="custom_select">
                                	<select class="form-control" name="courses">
                                    <option>Select Course</option>
                                          <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * FROM courses  ");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '  

                                    	<option value="'.$row['title'].'">'.$row['title'].'</option> 
                                        '; } ?>

                                      
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <textarea required="required" placeholder="Message *" class="form-control" name="message" rows="4"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" title="Submit Your Message!" class="btn btn-default" id="submit-message" name="save" value="Submit">Send Message</button> 


                            
                            
                            </div>
                            <div class="col-sm-12">
                                <div id="alert-msg" class="alert-msg text-center"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="large_divider"></div>
            </div>
            <div class="col-lg-6 col-md-5">
            	<div class="text-center animation" data-animation="fadeInRight" data-animation-delay="0.03s">
            		<img src="assets/images/girl_img.png" alt="girl_img" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION REGISTER -->



 

<!-- START SECTION BLOG -->
<section class="bg_gray">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="heading_s1 text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                	<h2>Our Blog</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
        	
                                    <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * FROM blogs  limit 3");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '  

                                    <div class="col-lg-4 col-md-6">
                                        <div class="blog_post box_shadow1 radius_all_10 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                                            <div class="blog_img radius_ltrt_10">
                                                <a href="blogsdetailpage.php?q='.$row['id'].'">
                                                    <img src="images/blogs/'.$row['img'].'" alt="blog_small_img1">
                                                    <div class="link_blog">
                                                        <span class="ripple"><i class="fa fa-link"></i></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="blog_content bg-white">
                                                <h6 class="blog_title"><a href="blogsdetailpage.php?q='.$row['id'].'">'.$row['title'].'</a></h6>
                                                 <p>'.substr($row['shortdescription'],0,100).'..  </p> 
                                                <a href="#" class="text-capitalize">Read More</a>
                                            </div>
                                            <div class="blog_footer bg-white radius_lbrb_10">
                                                <ul class="list_none blog_meta">
                                                    <li><a href="blogsdetailpage.php?q='.$row['id'].'"><i class="ion-calendar"></i>15 May, 2019</a></li>
                                                  
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                   '; } 
                                 ?>


         
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                	<div class="medium_divider"></div>
                	<a href="#" class="btn btn-default">View All Blog <i class="ion-ios-arrow-thin-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BLOG -->

<!-- START SECTION CLIENT LOGO -->
<section>
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-xl-6 col-lg-8">
            	<div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center">
                        <h2>Our Client</h2>
                    </div>
                    <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                    <div class="small_divider"></div>
                </div>
            </div>
        </div>
    	<div class="row">
        	<div class="col-md-12 animation" data-animation="fadeInUp" data-animation-delay="0.01s">
            	<div class="cl_logo_slider carousel_slider owl-carousel owl-theme" data-margin="15" data-loop="true" data-autoplay="true" data-dots="false" data-responsive='{"0":{"items": "2"}, "380":{"items": "3"}, "600":{"items": "4"}, "1000":{"items": "5"}, "1199":{"items": "6"}}'>
                	   <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * FROM client ");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '  

                                    <div class="item">
                        <a href="#"><img src="images/clients/'.$row['img'].'" alt="cl_logo1"/></a>
                    </div>

                    
                                   '; } 
                                 ?>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION CLIENT LOGO -->



<!-- START FOOTER -->
<?php
include "footer.php"; ?>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<?php
include "allscript.php"; ?>

</body>

<!-- Mirrored from bestwebcreator.com/eduglobal/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Aug 2020 12:07:50 GMT -->
</html>