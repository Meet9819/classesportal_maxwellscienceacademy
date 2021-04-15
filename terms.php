
<?php include "allcss.php"; ?>
<?php include "header.php"; ?>

<section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="assets/images/about_bg.jpg">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-sm-6">
            	<div class="page-title">
            		<h1>Terms and Condition</h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-sm-end">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Terms and Condition </li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->

<!-- START SECTION FEATURE -->
<section class="bg_gray">
    <div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="animation" data-animation="fadeInUp" data-animation-delay="0.01s">





                                  <?php include('db.php');

                                     $result = mysqli_query($con,"SELECT * FROM terms where id = 1");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '  
                         
                         

'.$row['content'].'

'; } ?>




                </div>
            </div>
        </div>
       
    </div>
</section> 
<!-- END SECTION FEATURE -->




<!-- START FOOTER -->
<?php
include "footer.php"; ?>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<?php
include "allscript.php"; ?>
</body>

<!-- Mirrored from bestwebcreator.com/eduglobal/demo/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Aug 2020 12:10:54 GMT -->
</html>