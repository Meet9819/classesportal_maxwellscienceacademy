

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
            		<h1>Topic of the Day</h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-sm-end">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Topic of the Day</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->

<!-- START SECTION BLOG -->
<section class="small_pt">
	<div class="container">
        <div class="row justify-content-center">
        



                                    <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * FROM blogs ");
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
                                                <p>'.$row['shortdescription'].'</p>
                                                <a href="blogsdetailpage.php?q='.$row['id'].'" class="text-capitalize">Read More</a>
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
      
    </div>
</section>
<!-- END SECTION BLOG -->



<!-- START FOOTER -->
<?php
include "footer.php"; ?>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<?php
include "allscript.php"; ?>
</body>

<!-- Mirrored from bestwebcreator.com/eduglobal/demo/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Aug 2020 12:11:58 GMT -->
</html>