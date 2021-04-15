
<?php
include "allcss.php"; ?>


<!-- START HEADER -->
<?php
include "header.php"; ?>
<!-- END HEADER --> 

<!-- START SECTION BREADCRUMB -->
<section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="assets/images/about_bg.jpg">


    <?php include('db.php');
                                    $id = $_GET['q'];
                                    $result = mysqli_query($con,"SELECT * FROM `topics`, `chapter` where topics.chapterid = chapter.id and topics.id = $id");
                                    while($row = mysqli_fetch_array($result))

                                   
                                    {   $chaptername = $row['chaptername'];
                                      
                                        $topicname = $row['topicname'];

                                    } ?> 


	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-sm-12">
            	<div class="page-title">
            		<h1><?php echo $chaptername; ?></h1>
                </div>
            </div>
           
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->

<!-- START SECTION COURSES -->
<section class="small_pt">
	<div class="container">
        <div class="row">

                                  
                                  <h5 ><?php echo $topicname; ?></h5>
                                      
                                   

        <div class="course_tabs">
                      <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="freevideos-tab1" data-toggle="tab" href="#freevideos" role="tab" aria-controls="freevideos" aria-selected="true">Free Videos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="freenotes-tab1" data-toggle="tab" href="#freenotes" role="tab" aria-controls="freenotes" aria-selected="false">Free Notes</a>
                            </li>

                              <li class="nav-item">
                                <a class="nav-link " id="paidvideos-tab1" data-toggle="tab" href="#paidvideos" role="tab" aria-controls="paidvideos" aria-selected="true">Paid Videos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="paidnotes-tab1" data-toggle="tab" href="#paidnotes" role="tab" aria-controls="paidnotes" aria-selected="false">Paid Notes</a>
                            </li>

                         
                        </ul>
                        <div class="tab-content">
                            

                            <div class="tab-pane fade show active" id="freevideos" role="tabpanel" aria-labelledby="freevideos-tab1">
                               <div class="border radius_all_5 tab_box"> 

                                  <div class="container">
                                        <div class="row">

                                    <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * from videos where topicid = $id and type = 'FREE' and whichformat = 'VIDEOS'");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '  


                                    <div class="col-lg-6 col-sm-6">
                                        <div class="content_box radius_all_10 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                                            <div class="content_img radius_ltrt_10">
                                            '.$row['link'].'
                                            </div>
                                            <div class="content_desc">
                                                <h4 class="content_title">'.$row['title'].'</h4>
                                            </div>
                                           

                                        </div>
                                    </div>


         
                         
                           
                             '; } 
                             ?>
                                                           
                            </div>
                            </div>


                             </div>
                            </div>

                            <div class="tab-pane fade" id="freenotes" role="tabpanel" aria-labelledby="freenotes-tab1">
                                <div id="accordion" class="accordion">
                                   
                              

                              <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * from videos where topicid = $id and type = 'FREE'  and whichformat = 'NOTES'");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '  

                                     <div class="card">
                                      <div class="card-header" id="heading-1-One">
                                        <h6 class="mb-0"> <a data-toggle="collapse" href="#collapse-1-One" aria-expanded="true" aria-controls="collapse-1-One">'.$row['title'].'<span class="item_meta duration">Download Notes</span></a></h6>
                                      </div>
                                      <div id="collapse-1-One" class="collapse show" aria-labelledby="heading-1-One" data-parent="#accordion">
                                        <div class="card-body">
                                          <p>Lorem Ipsu. is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </div>
                                      </div>
                                    </div>



         
                         
                           
                             '; } 
                             ?>
                                   
                                
                                </div>
                            </div>


                            
                            <div class="tab-pane fade" id="paidvideos" role="tabpanel" aria-labelledby="paidvideos-tab1">
                                <div id="accordion" class="accordion">
                                  


                                <div class="container">
                                      <div class="row">

                                    <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * from videos where topicid = $id and type = 'PAID'  and whichformat = 'VIDEOS'");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '  


                                    <div class="col-lg-6 col-sm-6">
                                        <div class="content_box radius_all_10 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                                            <div class="content_img radius_ltrt_10">
                                            '.$row['link'].'"
                                            </div>
                                            <div class="content_desc">
                                                <h4 class="content_title">'.$row['coursesid'].'</h4>
                                               <p>'.$row['title'].'</p>
                                            </div>
                                           

                                        </div>
                                    </div>


         
                         
                           
                             '; } 
                             ?>
                               
                                </div>
                                </div>

                                    
                                   
                                </div>
                            </div>

                            <div class="tab-pane fade" id="paidnotes" role="tabpanel" aria-labelledby="paidnotes-tab1">
                                <div id="accordion" class="accordion">
                                  
                                    <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * from videos where topicid = $id and type = 'PAID'  and whichformat = 'NOTES'");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '  

                                     <div class="card">
                                      <div class="card-header" id="heading-1-One">
                                        <h6 class="mb-0"> <a data-toggle="collapse" href="#collapse-1-One" aria-expanded="true" aria-controls="collapse-1-One">'.$row['title'].'<span class="item_meta duration">Download Notes</span></a></h6>
                                      </div>
                                      <div id="collapse-1-One" class="collapse show" aria-labelledby="heading-1-One" data-parent="#accordion">
                                        <div class="card-body">
                                          <p>Lorem Ipsu. is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </div>
                                      </div>
                                    </div>

                               

         
                         
                           
                             '; } 
                             ?>
                                </div>
                            </div>


                           
                        </div>
                    </div>

        
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