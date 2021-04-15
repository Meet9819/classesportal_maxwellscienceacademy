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
					
					<h4 class="box-title">Edit chapter</h4>
					<!-- /.box-title -->
					<div class="card-content">


<?php

    error_reporting( ~E_NOTICE );
    
    require_once 'dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT  subjectid, chaptername,description,courseid FROM chapter WHERE id =:id');
        $stmt_edit->execute(array(':id'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: chapterview.php");
    }
    
    
    
    if(isset($_POST['btn_save_updates']))
    {
           $courseid=$_POST['courseid'];  
           $subjectid = $_POST['subjectid']; 
        $chaptername=$_POST['chaptername'];
        $description=$_POST['description'];
     


                 
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        { 

$stmt = $DB_con->prepare('UPDATE chapter SET    chaptername=:chaptername, description=:description, courseid=:courseid, subjectid=:subjectid
    WHERE id=:id');

    $stmt->bindParam(':courseid',$courseid);  
    $stmt->bindParam(':subjectid',$subjectid);    
    $stmt->bindParam(':chaptername',$chaptername);   
    $stmt->bindParam(':description',$description);   
  


    $stmt->bindParam(':id',$id);

            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
               window.location.href='chapterview.php';
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
                                  <label for="eleven" class="col-sm-3 control-label"> courseid</label>
                                <div class="col-sm-3">
                                    <select name="courseid" class="form-control">
                                        <option value="<?php echo $courseid; ?>"><?php echo $courseid; ?></option>
                                    <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * FROM courses  ");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '

                                    <option value="'.$row['id'].'">'.$row['title'].'</option>

                                    '; } ?>

                                    </select>


                                  
                                </div>

                    
                            </div>

                              <div class="form-group">
                                  <label for="eleven" class="col-sm-3 control-label"> subjectid</label>
                                <div class="col-sm-3">
                                    <select name="subjectid" class="form-control">
                                        <option value="<?php echo $subjectid; ?>"><?php echo $subjectid; ?></option>
                                    <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * FROM subject  ");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '

                                    <option value="'.$row['id'].'">'.$row['subjectname'].'</option>

                                    '; } ?>

                                    </select>


                                  
                                </div>

                    
                            </div>      
						
						  <div class="form-group">
                                  <label for="eleven" class="col-sm-3 control-label"> chaptername</label>
                                <div class="col-sm-3">
                                    <input type="number" name="chaptername" class="form-control" id="eleven" placeholder="Enter   chaptername ..." value="<?php echo $chaptername; ?>" required="">
                                </div>

                    
                            </div>
			

							<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Description</label>
								<div class="col-sm-6">
								<textarea class="form-control" name="description" id="description" placeholder="Write your Product Description" required=""><?php echo $description; ?></textarea>  

    							<script>
      							  CKEDITOR.replace('description');
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
