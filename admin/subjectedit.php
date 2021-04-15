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
					
					<h4 class="box-title">Edit subject</h4>
					<!-- /.box-title -->
					<div class="card-content">


<?php

    error_reporting( ~E_NOTICE );
    
    require_once 'dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT  courseid,subjectname FROM subject WHERE id =:id');
        $stmt_edit->execute(array(':id'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: productsview.php");
    }
    
    
    
    if(isset($_POST['btn_save_updates']))
    {
       
        $courseid=$_POST['courseid'];
        $subjectname=$_POST['subjectname'];
                    
                    
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        { 

$stmt = $DB_con->prepare('UPDATE subject SET  courseid=:courseid, subjectname=:subjectname
    WHERE id=:id');

 


    $stmt->bindParam(':courseid',$courseid);   
    $stmt->bindParam(':subjectname',$subjectname);  


    $stmt->bindParam(':id',$id);

            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
               window.location.href='subjectview.php';
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
								<label for="one" class="col-sm-3 control-label">subject Name</label>
								<div class="col-sm-3">
									<input type="text" name="subjectname" class="form-control" id="one" placeholder="Enter subject Name..." value="<?php echo $subjectname; ?>" required="">
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
