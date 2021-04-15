<?php
session_start();
if(!isset($_SESSION["user"]["type"])){
header("Location: login.php");
exit(); }
?>

<?php include "allcss.php" ?>
<script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
<body>

<?php include "header.php" ?>


<div id="wrapper"> 
	<div class="main-content">
		
		<div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<a href="productsview.php" type="button"  class="btn btn-danger">Back</a> 
					
					<h4 class="box-title">Edit student</h4>
					<!-- /.box-title -->
					<div class="card-content">


<?php

    error_reporting( ~E_NOTICE );
    
    require_once 'dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $userID = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT  * FROM tbl_users WHERE userID =:userID');
        $stmt_edit->execute(array(':userID'=>$userID));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: student.php");
    }
    
    
    
    if(isset($_POST['btn_save_updates']))
    {
            $userName=$_POST['userName'];
            $mobile=$_POST['mobile'];
                  $branch=$_POST['branch'];
                  $whichyear=$_POST['whichyear'];


        $fees=$_POST['fees'];
        $paidfees=$_POST['paidfees'];
        $userEmail=$_POST['userEmail'];  


        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];
                    
        if($imgFile)
        { 
        
            
            $upload_dir = '../images/student/'; // upload directory 
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

$stmt = $DB_con->prepare('UPDATE tbl_users SET  userName=:userName, mobile=:mobile, branch=:branch, whichyear=:whichyear,  img=:img,  fees=:fees, paidfees=:paidfees, userEmail=:userEmail
    WHERE userID=:userID');


    $stmt->bindParam(':userName',$userName);   
    $stmt->bindParam(':mobile',$mobile);   
    $stmt->bindParam(':img',$img);
    $stmt->bindParam(':fees',$fees);   
    $stmt->bindParam(':paidfees',$paidfees);   
    $stmt->bindParam(':userEmail',$userEmail);   
    $stmt->bindParam(':branch',$branch);   
    $stmt->bindParam(':whichyear',$whichyear);   


    $stmt->bindParam(':userID',$userID);

            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
               window.location.href='student.php';
                </script>
                <?php
            }
            else{
                $errMSG = "Sorry Data Could Not Updated !";
            }
        
        }
        
                        
    }
    
?>




					<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >

                                  

                            <div class="form-group">
                                <label for="four" class="col-sm-3 control-label">Product Main Image</label>
                                <div class="col-sm-3">   <img src="../images/student/<?php echo $img; ?>" height="70" width="150" />

                                <input type="file" id="four" name="user_image"> 
                                <p class="help-block">Image should be 1000 x 1000 in pixels</p>
                                </div>
                             </div>

                                <div class="form-group">
                                <label for="one" class="col-sm-3 control-label">Student Branch</label>
                                <div class="col-sm-3">
                                     <select class="form-control" name="branch">
                                         <option  value="<?php echo $branch; ?>"><?php echo $branch; ?></option><option value="Vasai">Vasai</option>
                                        <option value="Nalasopara">Nalasopara</option>
                                        <option value="Virar">Virar</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="one" class="col-sm-3 control-label">Which Year</label>
                                <div class="col-sm-3">
                                     <select class="form-control" name="whichyear">
                                         <option  value="<?php echo $whichyear; ?>"><?php echo $whichyear; ?></option>
                                         <option value="11th">11th</option>
                                         <option value="12th">12th</option>
                                         <option value="13th">13th</option>
                                     </select>
                                </div>
                            </div>

						
							<div class="form-group">
								<label for="one" class="col-sm-3 control-label">Student Name</label>
								<div class="col-sm-3">
									<input type="text" name="userName" class="form-control" id="one"  value="<?php echo $userName; ?>" required="">
								</div>
							</div>

                            <div class="form-group">
                                <label for="one" class="col-sm-3 control-label">Student Email</label>
                                <div class="col-sm-3">
                                    <input type="text" name="userEmail" class="form-control" id="one"  value="<?php echo $userEmail; ?>" required="">
                                </div>
                            </div>

						    <div class="form-group">
                                <label for="one" class="col-sm-3 control-label">Student Mobile</label>
                                <div class="col-sm-3">
                                    <input type="text" name="mobile" class="form-control" id="one"  value="<?php echo $mobile; ?>" required="">
                                </div>
                            </div>

                           
                            <div class="form-group">
                                <label for="one" class="col-sm-3 control-label">Total Fees </label>
                                <div class="col-sm-3">
                                    <input type="text" name="fees" class="form-control" id="one"  value="<?php echo $fees; ?>" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="one" class="col-sm-3 control-label">Paid Fees </label>
                                <div class="col-sm-3">
                                    <input type="text" name="paidfees" class="form-control" id="one"  value="<?php echo $paidfees; ?>" required="">
                                </div>
                            </div>


							<div class="form-group margin-bottom-0">
									<label for="" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">  
                                    <input type="submit" name="btn_save_updates" value="Update" class="btn btn-dark btn-sm waves-effect waves-light">
   



										</div>
							</div>


						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white --> 







	


</div>

 

  </div>
</div>

	
<?php include "allscripts.php"; ?>
