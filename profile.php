

<!-- SITE TITLE -->
<?php
include "allcss.php"; ?>

<!-- START HEADER -->
<?php
include "header.php"; ?>
<!-- END HEADER --> 
                                 

   <?php

   //DB details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'maxwell';


//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
} 


$query = $db->query("SELECT * FROM tbl_users WHERE userID = $studentid");

$custRow = $query->fetch_assoc();
?>
<!-- START SECTION BREADCRUMB -->
<section class="page-title-light breadcrumb_section parallax_bg overlay_bg_50" data-parallax-bg-image="assets/images/about_bg.jpg">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-sm-6">
            	<div class="page-title">
            		<h1>Profile</h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-sm-end">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                        <h2>Hello,<?php
                            if(isset($_SESSION['userSession']))
                            {
                             echo $username;
                                
                            }
                           

                         ?> <!--<li><a href="#" data-toggle="modal" data-target="#Login">Login</a></li> -->
                            
                        </h2>
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
  
   

<?php    error_reporting( ~E_NOTICE );  
    require_once 'admin/dbconfig.php';
    
    if(isset($_POST['btn_save_updates']))
    {        
        $stmt_edit = $DB_con->prepare('SELECT img FROM tbl_users WHERE userID =:userID');
        $stmt_edit->execute(array(':userID'=>$userID));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);

        $userID = $studentid;  
        $userName = $_POST['userName'];
        $userEmail = $_POST['userEmail'];
        $mobile = $_POST['mobile'];
      
        $address = $_POST['address'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];
        $dob = $_POST['dob'];
        $schoolname = $_POST['schoolname'];
        $percentobtain = $_POST['percentobtain'];
        $referencename = $_POST['referencename'];
        $branch = $_POST['branch'];
        $whichyear = $_POST['whichyear'];

        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];
                    
        if($imgFile)
        {
            $upload_dir = 'images/profile/'; // upload directory 
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $img = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {           
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$edit_row['img']);
                    move_uploaded_file($tmp_dir,$upload_dir.$img);
                }
                else
                {
                    $errMSG = "Sorry, your file is too large it should be less then 5MB";
                }
            }
            else
            {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
            }   
        }
        else
        {
            // if no image selected the old image remain as it is.
            $img = $edit_row['img']; // old image from database
        }   
                        
        

        // if no error occured, continue ....
        if(!isset($errMSG))
        {
        $stmt = $DB_con->prepare('UPDATE tbl_users SET img=:img, userName =:userName, userEmail=:userEmail, mobile=:mobile, address=:address, state=:state, pincode=:pincode,  dob=:dob, schoolname=:schoolname, percentobtain=:percentobtain, referencename=:referencename, branch=:branch, whichyear=:whichyear
        WHERE userID=:userID');
           
            $stmt->bindParam(':img',$img);
            $stmt->bindParam(':userName',$userName);
            $stmt->bindParam(':userEmail',$userEmail);


            $stmt->bindParam(':mobile',$mobile);
         
            $stmt->bindParam(':address',$address);
            $stmt->bindParam(':state',$state);
            $stmt->bindParam(':pincode',$pincode);
          
          
            $stmt->bindParam(':dob',$dob);
            $stmt->bindParam(':schoolname',$schoolname);
            $stmt->bindParam(':percentobtain',$percentobtain);
            $stmt->bindParam(':referencename',$referencename);

            $stmt->bindParam(':branch',$branch);
            $stmt->bindParam(':whichyear',$whichyear);

            $stmt->bindParam(':userID',$userID);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
                window.location.href='profile.php';
                </script>
                <?php
            }
            else{
                $errMSG = "Sorry Data Could Not Updated !";
            }
        
        }
        
                        
    }
    
?>





                                     <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                                        <div class="row"> 


                                                <div class="form-group ">
                                                <label for="inp-type-1" class="col-sm-12 control-label">Student Profile Picture </label>
                                                <div class="col-sm-12">
                                                

                                                <img src="images/profile/<?php echo $custRow['img']; ?>" height="100" width="100" />

                                                <input type="file" name="user_image" accept="image/*" />

                                                <p class="help-block">Image should be 500 x 500 in pixels</p>
                                                </div>

                                                </div>


                                           
                                              <label for="inp-type-1" class="col-sm-12 control-label">Student Name </label>
                                            <div class="form-group col-12"> 
                                                <input  placeholder="Enter Name" class="form-control" name="userName" type="text" value="<?php echo $custRow['userName']; ?>">
                                             </div>  <label for="inp-type-1" class="col-sm-12 control-label">Email Id </label>
                                            <div class="form-group col-12">
                                                <input  placeholder="Enter Email" id="email" class="form-control" name="userEmail" type="email" value="<?php echo $custRow['userEmail']; ?>">
                                            </div>  <label for="inp-type-1" class="col-sm-12 control-label">Mobile No </label>
                                            <div class="form-group col-12">
                                                <input  placeholder="Enter Mobile No." id="mobile" class="form-control" name="mobile" type="text" value="<?php echo $custRow['mobile']; ?>">
                                            </div>

                                              <label for="inp-type-1" class="col-sm-12 control-label">Select Branch </label>
                                             <div class="form-group col-12">
                                                <select class="form-control" name="branch">
                                                     <option  value="<?php echo $custRow['branch']; ?>"><?php echo $custRow['branch']; ?></option><option value="Vasai">Vasai</option>
                                                    <option value="Nalasopara">Nalasopara</option>
                                                    <option value="Virar">Virar</option>
                                                </select>

                                            </div> <label for="inp-type-1" class="col-sm-12 control-label">Select Which Year </label>
                                             <div class="form-group col-12">
                                                <select class="form-control" name="whichyear">
                                                    <option  value="<?php echo $custRow['whichyear']; ?>"><?php echo $custRow['whichyear']; ?></option>
                                                    <option value="11th">11th</option>
                                                    <option value="12th">12th</option>
                                                    <option value="13th">13th</option>
                                                </select>

                                                
                                            </div>

                                            



                                              
                                        
                                        </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 animation" data-animation="fadeInRight" data-animation-delay="0.4s">
                                       <div class="padding_eight_all">
                                <div class="field_form">
       
                                       

                                             <label for="inp-type-1" class="col-sm-12 control-label">Address </label>
                                               <div class="form-group col-12">
                                                <input  placeholder="Enter Address No." id="address" class="form-control" name="address" type="text" value="<?php echo $custRow['address']; ?>">
                                            </div> <label for="inp-type-1" class="col-sm-12 control-label">State </label>
                                             <div class="form-group col-12">
                                                <input  placeholder="Enter State No." id="state" class="form-control" name="state" type="text" value="<?php echo $custRow['state']; ?>">
                                            </div>

                                             <label for="inp-type-1" class="col-sm-12 control-label">Pincode </label>
                                              <div class="form-group col-12">
                                                <input  placeholder="Enter pincode No." id="pincode" class="form-control" name="pincode" type="text" value="<?php echo $custRow['pincode']; ?>">
                                            </div>
                                               
                                               <label for="inp-type-1" class="col-sm-12 control-label">Date of Birth </label>
                                            <div class="form-group col-12">
                                                <input  placeholder="Enter dob No." id="dob" class="form-control" name="dob" type="text" value="<?php echo $custRow['dob']; ?>">
                                            </div>   

                                            <label for="inp-type-1" class="col-sm-12 control-label">School Name </label>
                                              <div class="form-group col-12">
                                                <input  placeholder="Enter schoolname No." id="schoolname" class="form-control" name="schoolname" type="text" value="<?php echo $custRow['schoolname']; ?>">
                                            </div>  

                                             <label for="inp-type-1" class="col-sm-12 control-label">Percentage Obtain </label>
                                              <div class="form-group col-12">
                                                <input  placeholder="Enter percentobtain No." id="percentobtain" class="form-control" name="percentobtain" type="text" value="<?php echo $custRow['percentobtain']; ?>">
                                            </div>

                                             <label for="inp-type-1" class="col-sm-12 control-label">Reference Person </label>
                                             <div class="form-group col-12">
                                                <input  placeholder="Enter referencename No." id="referencename" class="form-control" name="referencename" type="text" value="<?php echo $custRow['referencename']; ?>">
                                            </div> 

                                           

                                          
                        </div>
                    </div>
                </div>


                  <div class="col-md-12 animation" data-animation="fadeInRight" data-animation-delay="0.4s">
                                       <div class="padding_eight_all">
                                <div class="field_form">

                                             <label for="inp-type-1" class="col-sm-12 control-label">Paid Fees </label>
                                              <div class="form-group col-12">
                                                <input    class="form-control"  type="text" readonly="" value="<?php echo $custRow['paidfees']; ?>">
                                            </div>

                                            <div class="col-lg-12">
                                                <button type="submit"  class="btn btn-default"  name="btn_save_updates" value="Update Profile">Update Profile</button>
                                            </div>

                                </div>
                            </div>
                        </div>


                         </form>        
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