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
					
					<h4 class="box-title">Edit blogs</h4>
					<!-- /.box-title -->
					<div class="card-content">


<?php

    error_reporting( ~E_NOTICE );
    
    require_once 'dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT  title, postedby,shortdescription,longdescription, img FROM blogs WHERE id =:id');
        $stmt_edit->execute(array(':id'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: blogsview.php");
    }
    
    
    
    if(isset($_POST['btn_save_updates']))
    {
        $title = $_POST['title']; 
        $postedby=$_POST['postedby'];
        $shortdescription=$_POST['shortdescription'];
        $longdescription=$_POST['longdescription'];  


        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];
                    
        if($imgFile)
        { 
        
            
            $upload_dir = '../images/blogs/'; // upload directory 
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

$stmt = $DB_con->prepare('UPDATE blogs SET  title=:title,  img=:img,  postedby=:postedby, shortdescription=:shortdescription, longdescription=:longdescription, postedby=:postedby
    WHERE id=:id');

 
    $stmt->bindParam(':title',$title);    
    $stmt->bindParam(':img',$img);
    $stmt->bindParam(':postedby',$postedby);   
    $stmt->bindParam(':shortdescription',$shortdescription);   
    $stmt->bindParam(':longdescription',$longdescription);   


    $stmt->bindParam(':id',$id);

            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
               window.location.href='blogsview.php';
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
								<label for="one" class="col-sm-3 control-label">Blogs Name</label>
								<div class="col-sm-3">
									<input type="text" name="title" class="form-control" id="one" placeholder="Enter Blogs Name..." value="<?php echo $title; ?>" required="">
								</div>


								


							</div>


						








							<div class="form-group">
								<label for="four" class="col-sm-3 control-label"> Main Image</label>
								<div class="col-sm-3">   <img src="../images/courses/<?php echo $img; ?>" height="70" width="150" />

								<input type="file" id="four" name="user_image"> 
								<p class="help-block">Image should be 1000 x 1000 in pixels</p>
								</div>

								

								</div>






							
							

							<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Description</label>
								<div class="col-sm-6">
								<textarea class="form-control" name="shortdescription" id="shortdescription" placeholder="Write your  Description" required=""><?php echo $shortdescription; ?></textarea>  

    							<script>
      							  CKEDITOR.replace('shortdescription');
    							</script>

								</div>
							</div>


                            <div class="form-group">
                                <label for="longdescription" class="col-sm-3 control-label">Long Description</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="longdescription" id="longdescription" placeholder="Write your Long Description"><?php echo $descr; ?> </textarea>  

                                    <script>
                                        CKEDITOR.replace('longdescription');
                                    </script>

                                </div>
                            </div>
 
                            <div class="form-group">
                                  <label for="eleven" class="col-sm-3 control-label"> postedby</label>
                                <div class="col-sm-3">
                                    <input type="text" name="postedby" class="form-control" id="eleven" placeholder="Enter   postedby ..." value="<?php echo $postedby; ?>" required="">
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
