
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
            		<h1>Blog Detail</h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog Detail</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->

<!-- START SECTION BLOG -->
<section>
                                  <?php include('db.php');

                                  $id = $_GET['q'];
                                     $result = mysqli_query($con,"SELECT * FROM blogs where id = $id");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '  
                         
                         
	<div class="container">
    	<div class="row">
        	<div class="col-lg-9">
            	<div class="single_post">
                    <div class="blog_img">
                        <a href="#">
                            <img style="width:100%" src="images/blogs/'.$row['img'].'" alt="blog_img1">
                        </a>
                    </div>
                    <div class="single_post_content">
                        <div class="blog_text">
                            <h3>'.$row['title'].'</h3>
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ion-calendar"></i>15 May, 2019</a></li>
                                <li><a href="#"><i class="ion-chatbubbles"></i>2 Comment</a></li>
                            </ul>
                            <p>'.$row['shortdescription'].'</p>
                            <blockquote>
                            	<p>Integer id metus sit amet turpis facilisis ullamcorper. Sed tellus tellus, elementum ac mauris in, venenatis consectetur est. Praesent condimentum ut erat sit amet bibendum. Morbi sit amet commodo est. Donec arcu nulla, pellentesque at mi in, fringilla tincidunt risus. </p>
                            </blockquote>
                            <p>'.$row['longdescription'].'</p>
                        	<div class="border-top border-bottom py-2 py-md-4 blog_post_footer">
                                <div class="row">
                                    <div class="col-md-12">
                                    	<div class="share">
                                            <h5>Share :</h5>
                                            <ul class="list_none social_icons radius_social">
                                                <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                                                <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                                                <li><a href="#" class="sc_gplus"><i class="ion-social-googleplus"></i></a></li>
                                                <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                                                <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                 
                         '; } 
                             ?>
                     <div class="row">
                        <div class="col-12">
                            <div class="medium_divider"></div>
                            <div class="comment-title">
                                <h5>Related Courses</h5>
                            </div>
                        </div>
                    </div> <div class="row">
                          <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * FROM courses limit 3 ");
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
            </div>
           
         <?php include "leftside.php"; ?>
         

        </div>
    </div>
</section>
<!-- END SECTION BLOG -->

<!-- END SECTION CALL TO ACTION -->
<section class="bg_default small_pt small_pb">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-md-8">
            	<div class="text_white cta_section">
                	<div class="medium_divider d-block d-md-none"></div>
                    <div class="heading_s1 heading_light">
                        <h2>Get The Coaching Training Today!</h2>
                    </div>
                    <p>If you are going to use a passage of embarrassing hidden in the middle of text</p>
                </div>
            </div>
            <div class="col-md-4">
            	<div class="text-md-right">
                    <a href="#" class="btn btn-outline-white">Get Started</a>
                </div>
                <div class="medium_divider d-block d-md-none"></div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION CALL TO ACTION -->

<!-- START FOOTER -->
<?php
include "footer.php"; ?>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<?php
include "allscript.php"; ?>

</body>

<!-- Mirrored from bestwebcreator.com/eduglobal/demo/blog-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Aug 2020 12:11:59 GMT -->
</html>