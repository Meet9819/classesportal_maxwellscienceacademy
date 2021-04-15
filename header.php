
<?php

error_reporting(0);
session_start();
require_once 'class.user.php';
$user_home = new USER();
if(!$user_home->is_logged_in())
{
}
$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC); 

$con = mysqli_connect("localhost","root","","maxwell") or die ('Unable to connect');
?>
                           





<header class="header_wrap dark_skin">
	<div class="top-header light_skin bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <ul class="contact_detail list_none text-center text-md-left">
                        <li><a href="#"><i class="ti-mobile"></i>+91 8149715733 </a></li>
                        <li><a target="_blank" href="https://classroom.google.com/h"><i class="ti-download"></i>Upload Notes</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                	<div class="d-flex flex-wrap align-items-center justify-content-md-end justify-content-center mt-2 mt-md-0">
                    	<ul class="list_none social_icons social_white text-center text-md-right">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                        <ul class="list_none header_list border_list ml-1">

                             <?php
                            if(isset($_SESSION['userSession']))
                            {
                             $username = $row['userName'];   
                             $studentid = $row['userID'];   

                             echo '   
                             <li><a href="#" ><b>Hi, '.substr($row['userName'],0,5).'  </b> </a></li> 
                             <li><a class="btn btn-default  btn-sm" href="profile.php">Profile</a></li>
                             <li><a class="btn btn-default btn-sm" href="logout.php">Logout</a></li>
                             ';
                            }
                            else {
                                echo '  
                                <li><a href="login.php">Login</a></li>
                                <li><a href="register.php" class="btn btn-default btn-sm">Register</a></li>';
                            }

                         ?> <!--<li><a href="#" data-toggle="modal" data-target="#Login">Login</a></li> -->
                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="
    padding: 15px;
">
        <nav class="navbar navbar-expand-lg"> 
            <a class="navbar-brand" href="index.php">
                <img class="logo_light" src="assets/images/logo.png" alt="logo" />
                <img width="250px" class="logo_dark" src="assets/images/logo.png" alt="logo" />
                <img class="logo_default" src="assets/images/logo.png" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="ion-android-menu"></span> </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
				<ul class="navbar-nav">
                    <li class="">
                        <a class="toggle nav-link " href="index.php" >Home</a>
                       
                    </li>
                    <li class="dropdown">
                        <a class="-toggle nav-link" href="about.php">About Us</a>
                      
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle nav-link" href="courses.php" data-toggle="dropdown">Course</a>
                        <div class="dropdown-menu">
                            <ul> 


                                  <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * FROM courses order by id desc");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '   <li class="dropdown">
                                    <a class="dropdown-item menu-link " href="coursedetailpage.php?q='.$row['id'].'">'.$row['title'].'</a>
                               
                                </li>
                         
                          
                             '; } 
                             ?>

                                
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--<li class="">
                        <a class=" nav-link" href="teacher.php" >Teacher</a>
                     
                    </li> -->  <li class="">
                        <a class=" nav-link" href="videos.php" >Free Videos & Notes</a>
                     
                    </li>
                    <li class="">
                        <a class=" nav-link" href="blog.php" >Topic of the Day</a>
                     
                    </li> 

                  
                    <li>
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                </ul>
            </div>
          
        </nav>
    </div>
</header>


<div class="modal fade lr_popup" id="Login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <div class="row no-gutters">
                    <div class="col-lg-5">
                        <div class="h-100 background_bg radius_ltlb_5" data-img-src="assets/images/login_img.JPG"></div>
                    </div>
                    <div class="col-lg-7">  
                        <div class="padding_eight_all">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="login-tab1" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="signup-tab1" data-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="false">Sign Up</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="login" role="tabpanel">
                                    <div class="heading_s1 mb-3">
                                        <h4>Login</h4>
                                    </div>
                                    <form method="post" class="login">
                                        <div class="form-group">
                                            <input type="text" required="" class="form-control" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" required="" type="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="login_footer form-group">
                                            <a href="#">Lost your password?</a>
                                            <div class="chek-form mb-3">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                                    <label class="form-check-label" for="exampleCheckbox3">Remember me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default btn-block" name="login">Log in</button>
                                        </div>
                                    </form>
                                    <div class="different_login">
                                        <span> or</span>
                                    </div>
                                    <ul class="btn-login list_none text-center">
                                        <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                        <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="signup" role="tabpanel">
                                    <div class="heading_s1 mb-3">
                                        <h4>Sign Up</h4>
                                    </div>
                                    <form method="post" class="login">
                                        <div class="form-group">
                                            <input type="text" required="" class="form-control" name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" required="" class="form-control" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" required="" type="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" required="" type="password" name="cpassword" placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default btn-block" name="login">Sign Up</button>
                                        </div>
                                    </form>
                                    <div class="different_login">
                                        <span> or</span>
                                    </div>
                                    <ul class="btn-login list_none text-center">
                                        <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                        <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
