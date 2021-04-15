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
					<h4 class="box-title">Add chapter</h4>
					<!-- /.box-title -->
					<div class="card-content">

						<?php

include "db.php";

$result = mysqli_query($con, "SELECT * FROM chapter ORDER BY id DESC LIMIT 1");

while ($row = mysqli_fetch_array($result)) {
    $idcount = $row['id'] + 1;
    
    //echo $idcount;
}
?>

						<form class="form-horizontal" action="chapterupload.php" method="post" enctype="multipart/form-data" >

 


							<input type="hidden" name="id" value="<?php echo $idcount;?>">

							
								<div class="form-group">
								<label for="one" class="col-sm-3 control-label">Select Course  </label>
								<div class="col-sm-3">
									
									<select name="courseid" class="form-control">
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
								<label for="one" class="col-sm-3 control-label">Select Subject   </label>
								<div class="col-sm-3">
									
									<select name="subjectid" class="form-control">
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
								<label for="one" class="col-sm-3 control-label">chapter Name</label>
								<div class="col-sm-3">
									<input type="text" name="chaptername" class="form-control" id="one" placeholder="Enter Product Name..." >
								</div>				
							</div>

							

							<div class="form-group">
								<label for="description" class="col-sm-3 control-label"> Description</label>
								<div class="col-sm-6">
									<textarea class="form-control" name="description" id="description" placeholder="Write your Product Description" ></textarea>  

									    <script>
									        CKEDITOR.replace('description');
									    </script>

								</div>
							</div>


							<div class="form-group margin-bottom-0">
									<label for="" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">  
										<input type="submit" name="submit" value="Submit" class="btn btn-dark btn-sm waves-effect waves-light">
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
