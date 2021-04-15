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
					<h4 class="box-title">Add blogs</h4>
					<!-- /.box-title -->
					<div class="card-content">

						<?php

include "db.php";

$result = mysqli_query($con, "SELECT * FROM blogs ORDER BY id DESC LIMIT 1");

while ($row = mysqli_fetch_array($result)) {
    $idcount = $row['id'] + 1;
    
    //echo $idcount;
}
?>

						<form class="form-horizontal" action="blogsupload.php" method="post" enctype="multipart/form-data" >

 


							<input type="hidden" name="id" value="<?php echo $idcount;?>">

							<input type="hidden" name="status" value="1">

							<div class="form-group">
								<label for="one" class="col-sm-3 control-label">blogs Name</label>
								<div class="col-sm-3">
									<input type="text" name="title" class="form-control" id="one" placeholder="Enter Product Name..." >
								</div>


							


							</div>






						





						<div class="form-group">
								<label for="four" class="col-sm-3 control-label">Product Main Image</label>
								<div class="col-sm-3">
									<input type="file" id="four" name="image" >
									<p class="help-block">Image should be 1000 x 1000 in pixels</p>
								</div>

									
									


								</div>

							

						


							
							
							
							
							

							<div class="form-group">
								<label for="shortdescription" class="col-sm-3 control-label">Short Description</label>
								<div class="col-sm-6">
									<textarea class="form-control" name="shortdescription" id="shortdescription" placeholder="Write your Product Description" ></textarea>  

									    <script>
									        CKEDITOR.replace('shortdescription');
									    </script>

								</div>
							</div>


							<div class="form-group">
								<label for="longdescription" class="col-sm-3 control-label">Long Description</label>
								<div class="col-sm-6">
									<textarea class="form-control" name="longdescription" id="longdescription" placeholder="Write your Product Description"></textarea>  

									    <script>
									        CKEDITOR.replace('longdescription');
									    </script>

								</div>
							</div>


  							<div class="form-group">
								
								<label for="eleven" class="col-sm-3 control-label">Posted By</label>
								<div class="col-sm-3">
									<input type="text" name="postedby" class="form-control" id="eleven" placeholder="Enter Product Price ..." >
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
