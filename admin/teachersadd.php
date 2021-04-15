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
					<h4 class="box-title">Add teachers</h4>
					<!-- /.box-title -->
					<div class="card-content">

						<?php

include "db.php";

$result = mysqli_query($con, "SELECT * FROM teachers ORDER BY id DESC LIMIT 1");

while ($row = mysqli_fetch_array($result)) {
    $idcount = $row['id'] + 1;
    
    //echo $idcount;
}
?>

						<form class="form-horizontal" action="teachersupload.php" method="post" enctype="multipart/form-data" >

 


							<input type="hidden" name="id" value="<?php echo $idcount;?>">

							<input type="hidden" name="status" value="1">

							<div class="form-group">
								<label for="one" class="col-sm-3 control-label">Teachers Name</label>
								<div class="col-sm-3">
									<input type="text" name="name" class="form-control" id="one" placeholder="Enter Teachers Name..." >
								</div>

							</div>



						<div class="form-group">
								<label for="four" class="col-sm-3 control-label"> Main Image</label>
								<div class="col-sm-3">
									<input type="file" id="four" name="image" >
									<p class="help-block">Image should be 1000 x 1000 in pixels</p>
								</div>

									
									


								</div>

							
							



  							<div class="form-group">
								
								<label for="eleven" class="col-sm-3 control-label">Contact</label>
								<div class="col-sm-3">
									<input type="text" name="contactno" class="form-control" id="eleven" placeholder="Enter contact ..." >
								</div>
 



							</div><div class="form-group">
								
								<label for="eleven" class="col-sm-3 control-label">Email</label>
								<div class="col-sm-3">
									<input type="text" name="email" class="form-control" id="eleven" placeholder="Enter Email ..." >
								</div>
 



							</div><div class="form-group">
								
								<label for="eleven" class="col-sm-3 control-label">Subject</label>
								<div class="col-sm-3">
									<input type="text" name="subject" class="form-control" id="eleven" placeholder="Enter Subject ..." >
								</div>
 



							</div>
 

							<div class="form-group">
								<label for="experience" class="col-sm-3 control-label">Experience </label>
								<div class="col-sm-6">
									<textarea class="form-control" name="experience" id="experience" placeholder="Write your Experience"></textarea>  

									    <script>
									        CKEDITOR.replace('experience');
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
