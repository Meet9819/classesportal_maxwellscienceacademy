

<!-- SITE TITLE -->
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
            		<h1>Contact</h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-sm-end">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->

<!-- START SECTION CONTACT -->
<section class="small_pb">
	<div class="container">	
    	<div class="row justify-content-center">
        	<div class="col-xl-6 col-lg-8">
            	<div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center">
                        <h2>Get In Touch</h2>
                    </div>
                    <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                    <div class="small_divider"></div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="box_shadow1 radius_all_10">
                	<div class="row no-gutters">
                    	<div class="col-md-6 animation" data-animation="fadeInLeft" data-animation-delay="0.02s">
                        	<div class="padding_eight_all">
                                <div class="field_form">
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

                                    <form method="post" action=""   enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <input required="required" placeholder="Enter Name" class="form-control" name="name" type="text">
                                             </div>
                                            <div class="form-group col-12">
                                                <input required="required" placeholder="Enter Email" id="email" class="form-control" name="email" type="email">
                                            </div>
                                            <div class="form-group col-12">
                                                <input required="required" placeholder="Enter Phone No." id="mobile" class="form-control" name="mobile" type="tel">
                                            </div>
                                            <div class="form-group col-12">
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
                                            <div class="form-group col-lg-12">
                                                <textarea required="required" placeholder="Message" id="description" class="form-control" name="message" rows="3"></textarea>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit"  class="btn btn-default" id="submit-message" name="save" value="Submit">Submit</button>
                                            </div>
                                          
                                        </div>
                                    </form>		
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 animation" data-animation="fadeInRight" data-animation-delay="0.4s">
                            <div class="contact_map map_radius_rtrb overflow-hidden h-100">
                             <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=H%2FO%3A%20Imperial%20Tower%20(Ground%20Floor)%20Beside%20St.%20Francis%20De%20Sales%20School%2C%20Nalasopara%20(West)%20Thane-401%20203&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://putlocker-is.org">putlockers rogue one</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION CONTACT -->

<!-- START SECTION CONTACT -->
<section class="small_pt">
	<div class="container">	
    	<div class="row justify-content-center">
        	<div class="col-xl-6 col-lg-8">
            	<div class="text-center animation" data-animation="fadeInUp" data-animation-delay="0.01s">
                    <div class="heading_s1 text-center">
                        <h2>Contact Information</h2>
                    </div>
                    <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="overlay_bg_danger_90 icon_box text-center text_white radius_all_10 background_bg animation" data-img-src="assets/images/address_img.jpg" data-animation="fadeInUp" data-animation-delay="0.02s">
                	<div class="box_icon mb-3">
                		<img src="assets/images/map_icon.png" alt="map_icon">
                    </div>
                    <div class="intro_desc">
                        <h5>Address</h5>
                        <p>H/O: Imperial Tower (Ground Floor) Beside St. Francis De Sales School, Nalasopara (West) Thane-401 203</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            	<div class="overlay_bg_light_green_90 icon_box text-center text_white radius_all_10 background_bg animation" data-img-src="assets/images/call_img.jpg" data-animation="fadeInUp" data-animation-delay="0.03s">
                	<div class="box_icon mb-3">
                		<img src="assets/images/phone_icon.png" alt="phone_icon">
                    </div>
                    <div class="intro_desc">
                        <h5>Call Us</h5>
                        <p>+91 8149715733/+91 9960484502</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            	<div class="overlay_bg_default_90 icon_box text-center text_white radius_all_10 background_bg animation" data-img-src="assets/images/email_img.jpg" data-animation="fadeInUp" data-animation-delay="0.04s">
                	<div class="box_icon mb-3">
                        <img src="assets/images/email_icon.png" alt="email_icon">
                    </div>
                    <div class="intro_desc">
                        <h5>Email</h5>
                        <p>maxwellacademy304@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION CONTACT -->



<!-- START FOOTER -->
<?php
include "footer.php"; ?>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<?php
include "allscript.php"; ?>
</body>

<!-- Mirrored from bestwebcreator.com/eduglobal/demo/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Aug 2020 12:12:03 GMT -->
</html>