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
					
					<h4 class="box-title">Edit teachers</h4>
					<!-- /.box-title -->
					<div class="card-content">


<?php

    error_reporting( ~E_NOTICE );
    
    require_once 'dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT  name, contactno,email,subject,experience, img FROM teachers WHERE id =:id');
        $stmt_edit->execute(array(':id'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: teachersview.php");
    }
    
    
    
    if(isset($_POST['btn_save_updates']))
    {
        $name = $_POST['name']; 
        $email = $_POST['email']; 
        $contactno=$_POST['contactno'];
        $subject=$_POST['subject'];
        $experience=$_POST['experience'];  


        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];
                    
        if($imgFile)
        { 
        
            
            $upload_dir = '../images/teachers/'; // upload directory 
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

$stmt = $DB_con->prepare('UPDATE teachers SET  name=:name,email=:email,  img=:img,  contactno=:contactno, subject=:subject, experience=:experience, contactno=:contactno
    WHERE id=:id');

 
    $stmt->bindParam(':name',$name);    
    $stmt->bindParam(':email',$email);    
    $stmt->bindParam(':img',$img);
    $stmt->bindParam(':contactno',$contactno);   
    $stmt->bindParam(':subject',$subject);   
    $stmt->bindParam(':experience',$experience);   


    $stmt->bindParam(':id',$id);

            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
               window.location.href='teachersview.php';
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
								<label for="one" class="col-sm-3 control-label">Teachers Name</label>
								<div class="col-sm-3">
									<input type="text" name="name" class="form-control" id="one" placeholder="Enter teachers Name..." value="<?php echo $name; ?>" required="">
								</div>					
							</div>



							<div class="form-group">
								<label for="four" class="col-sm-3 control-label"> Main Image</label>
								<div class="col-sm-3">   <img src="../images/teachers/<?php echo $img; ?>" height="70" width="150" />

								<input type="file" id="four" name="user_image"> 
								<p class="help-block">Image should be 1000 x 1000 in pixels</p>
								</div>								

								</div>

                            <div class="form-group">
                                
                                <label for="eleven" class="col-sm-3 control-label">Contact</label>
                                <div class="col-sm-3">
                                    <input type="text" name="contactno" class="form-control" id="eleven" placeholder="Enter contact ..." value="<?php echo $contactno; ?>">
                                </div>
 



                            </div><div class="form-group">
                                
                                <label for="eleven" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-3">
                                    <input type="text" name="email" class="form-control" id="eleven" placeholder="Enter Email ..." value="<?php echo $email; ?>">
                                </div>
 



                            </div><div class="form-group">
                                
                                <label for="eleven" class="col-sm-3 control-label">Subject</label>
                                <div class="col-sm-3">
                                    <input type="text" name="subject" class="form-control" id="eleven" placeholder="Enter Subject ..." value="<?php echo $subject; ?>">
                                </div>
 



                            </div>


						


                            <div class="form-group">
                                <label for="experience" class="col-sm-3 control-label">Long Description</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="experience" id="experience" placeholder="Write your Long Description"><?php echo $experience; ?> </textarea>  

                                    <script>
                                        CKEDITOR.replace('experience');
                                    </script>

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
