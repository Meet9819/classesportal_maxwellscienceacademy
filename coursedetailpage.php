

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
            		<h1>Course Detail</h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Course Detail</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->

<!-- START SECTION COURSE DETAIL -->
<section>



                                  <?php include('db.php');

                                  $id = $_GET['q'];
                                     $result = mysqli_query($con,"SELECT * FROM courses where id = $id");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '  
                         
                         


	<div class="container">
        <div class="row">
        	<div class="col-lg-9">
            	<div class="single_course">
                    <div class="course_img">
                        <a href="#">
                            <img style="width:100%" src="images/courses/'.$row['img'].'" alt="course_img_big">
                        </a>
                      
                        <div class="enroll_btn">
                        	<a href="#" class="btn btn-default btn-sm">Get Enroll</a>
                        </div>
                    </div>
                    <div class="course_detail alert-warning">
                        <div class="course_title">
                            <h2>'.$row['title'].'</h2>
                        </div> 
                     
                    </div>
                    <div class="course_tabs">
                    	<ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="overview-tab1" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="curriculum-tab1" data-toggle="tab" href="#curriculum" role="tab" aria-controls="curriculum" aria-selected="false">Subject</a>
                            </li>
                          
                        </ul>


                        <div class="tab-content">


                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab1">
                               <div class="border radius_all_5 tab_box"> <p>'.$row['shortdescription'].'</p> <p>'.$row['longdescription'].'</p></div>
                            </div>

                                '; } 
                             ?>
                         
                            




                             <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab1">
                               <?php include('db.php');
                                    $id = $_GET['q'];
                                    $result = mysqli_query($con,"SELECT * FROM subject where courseid = $id");
                                    while($row = mysqli_fetch_array($result))

                                   
                                    {   $subjectid = $row['id']; ?>

                                   
                                
                                <div class="border radius_all_5 tab_box">                                    
                                    <div class="heading_s1">
                                        <h5><?php echo $row['subjectname']; ?></h5>
                                    </div>
                                    <ul class="list_none comment_list">


                                                                                         <?php 
                                                                                           include('db.php');
                                                                                            $subjectresult = mysqli_query($con,"SELECT * FROM chapter where subjectid = $subjectid ");
                                                                                            while($srow = mysqli_fetch_array($subjectresult))
                                                                                            {  $chapterid = $srow['id']; ?>

                                                                                                <li class="comment_info">
                                                                                                    <div class="d-flex">
                                                                                                       
                                                                                                        <div class="comment_content">
                                                                                                            <div class="d-sm-flex align-items-center">
                                                                                                                <div class="meta_data">
                                                                                                                    <h6><a href="#"><?php echo $srow['chaptername']; ?></a></h6>
                                                                                                                 
                                                                                                                </div>
                                                                                                                <div class="ml-auto mb-2">
                                                                                                                    <div class="rating_stars">
                                                                                                                        <i class="ion-android-star"></i>
                                                                                                                        <i class="ion-android-star"></i>
                                                                                                                        <i class="ion-android-star"></i>
                                                                                                                        <i class="ion-android-star"></i>
                                                                                                                        <i class="ion-android-star-half"></i> 
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <p><?php echo $srow['description']; ?></p>




                                                                                                              <?php 
                                                                                                               include('db.php'); 
                                                                                                            
                                                                                                                $topicresult = mysqli_query($con,"SELECT * FROM topics where chapterid = $chapterid ");
                                                                                                                while($trow = mysqli_fetch_array($topicresult))
                                                                                                                { ?>

                                                                                                                  <?php echo '<a href="coursetopics.php?q='.$trow['id'].'" ><b>'.$trow['topicname'].'</b></a><br>'; ?>  

                                                                                                                <?php } ?> 



                                                                                                        </div>
                                                                                                    </div>
                                                                                                </li>

                                                                                            <?php } ?>
                                                                                   

                                    </ul>
                                    <hr>                                   
                                </div>            
                           


                                  <?php  } 
                                ?>
                                 </div>




                     
                         

                        </div>
                    </div>
                  
                  








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
<!-- END SECTION COURSE DETAIL -->



<!-- START FOOTER -->
<?php
include "footer.php"; ?>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<?php
include "allscript.php"; ?>

</body>

<!-- Mirrored from bestwebcreator.com/eduglobal/demo/course-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Aug 2020 12:11:47 GMT -->
</html>