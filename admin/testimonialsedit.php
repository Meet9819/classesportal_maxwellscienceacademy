<?php
session_start();
if(!isset($_SESSION["user"]["type"])){
header("Location: login.php");
exit(); }
?>

<?php include "allcss.php" ?>

<body>

<?php include "header.php" ?>


<div id="wrapper">
	<div class="main-content">
		
		<div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Edit Testimonials</h4>
					<!-- /.box-title -->
					<div class="card-content">






<?php

    error_reporting( ~E_NOTICE );
    
    require_once 'dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT img,post,message FROM testimonials WHERE id =:id');
        $stmt_edit->execute(array(':id'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: banner.php");
    }
    
    
    
    if(isset($_POST['btn_save_updates']))
    {
       
            $post = $_POST['post'];
                $message = $_POST['message'];

        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];
                    
        if($imgFile)
        {
            $upload_dir = '../images/testimonials/'; // upload directory 
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
$stmt = $DB_con->prepare('UPDATE testimonials SET img=:img, post =:post, message=:message
    WHERE id=:id');
           
            $stmt->bindParam(':img',$img);

              $stmt->bindParam(':post',$post);
                $stmt->bindParam(':message',$message);

 

            $stmt->bindParam(':id',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
                window.location.href='testimonials.php';
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

						

							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Image </label>
								<div class="col-sm-6">
								

								<img src="../images/testimonials/<?php echo $img; ?>" height="70" width="150" />

                                <input type="file" name="user_image" accept="image/*" />

								<p class="help-block">Image should be 1920 x 755 in pixels</p>
								</div>

								</div>


                                    <div class="form-group">
                                    <label for="inp-type-1" class="col-sm-3 control-label">post</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" id="" name="post" value="<?php echo $post; ?>" required="">
                                
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label for="inp-type-1" class="col-sm-3 control-label">message</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" id="" name="message" value="<?php echo $message; ?>" required="">
                                
                                    </div>

                                </div>





							<div class="form-group margin-bottom-0">
									<label for="inp-type-5" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">
										 <input class="btn btn-primary btn-sm waves-effect waves-light" type="submit" name="btn_save_updates" value="Update" />
   							
								</div>
							</div>


						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white -->
			</div>



	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
	     
<?php include "allscripts.php"; ?>
