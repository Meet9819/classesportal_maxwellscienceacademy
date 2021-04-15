<?php
session_start();
if(!isset($_SESSION["user"]["type"])){
header("Location: login.php");
exit(); }
?>

<?php include "allcss.php" ?>
 <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
 <script language="JavaScript" type="text/javascript">
            $(document).ready(function() {
                $("a.btn").click(function(e) {
                    if (!confirm('Are you sure?')) {
                        e.preventDefault();
                        return false;
                    }
                    return true;
                });
            });
        </script>
<body>

<?php include "header.php" ?>


<div id="wrapper">
	<div class="main-content">
		
		<div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Add Videos</h4>
					<!-- /.box-title -->
					<div class="card-content">
						
<?php
include('db.php'); 

if(isset($_POST['save']))

    {
 
			$topicid = $_POST['topicid'];
			$type = $_POST['type'];
			$title = $_POST['title'];
			$link = $_POST['link'];
			$whichformat = $_POST['whichformat'];

            $save=mysqli_query($con,"INSERT INTO videos ( title,link, topicid, type, whichformat) VALUES ('$title','$link','$topicid','$type','$whichformat')");
         
           ?>
                <script>
                alert('Successfully Inserted ...');
                window.location.href='videos.php';
                </script>
                <?php

                             
    }
?>
 							 <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

						
								<div class="form-group">
									<label for="inp-type-1" class="col-sm-3 control-label">Select Topic ID</label>
									<div class="col-sm-6">
										<select class="form-control" type="text" id="" name="topicid" required="">
											    <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * FROM topics   ");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo ' <option value="'.$row['id'].'">'.$row['topicname'].'</option> '; } ?>

										</select>
									</div>

								</div>


								<div class="form-group">
									<label for="inp-type-1" class="col-sm-3 control-label">Title</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" id="" name="title" required="">
								
									</div>

								</div> 


									<div class="form-group">
									<label for="inp-type-1" class="col-sm-3 control-label">Select Format</label>
									<div class="col-sm-6">
										<select class="form-control" type="text" id="" name="whichformat" required="">
											<option value="VIDEOS">VIDEOS</option>
											<option value="NOTES">NOTES</option>
										</select>
									</div>

								</div>



								<div class="form-group">
									<label for="inp-type-1" class="col-sm-3 control-label">Link</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" id="" name="link" required="">
								
									</div>

								</div>

								<div class="form-group">
									<label for="inp-type-1" class="col-sm-3 control-label">Select Type</label>
									<div class="col-sm-6">
										<select class="form-control" type="text" id="" name="type" required="">
											<option value="FREE">Free</option>
											<option value="PAID">Paid</option>
										</select>
									</div>

								</div>

							<div class="form-group margin-bottom-0">
									<label for="inp-type-5" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">
										 <input class="btn btn-dark btn-sm waves-effect waves-light" type="submit" name="save" value="Submit" />

								
								</div>
							</div>


						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white -->
			</div>





			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Videos</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
							
								<th>Title</th>
								<th>Which Format</th>
								<th>Link</th>								
									<th>Type</th>							
									
								<th>Action</th>
							
							</tr>
						</thead>
					

							<?php
							/* code for data delete */
							if(isset($_GET['del']))
							{
							    $SQL = mysqli_query($con,"DELETE FROM videos WHERE id=".$_GET['del']);

							 ?>
							                <script>
							                alert('Successfully Deleted ...');
							                window.location.href='videos.php';
							                </script>
							                <?php

							}
							/* code for data delete */

							$result = mysqli_query($con,"SELECT * FROM videos"); 
							 $tmpCount = 1;
							while($row = mysqli_fetch_array($result))
							{

							echo '

						<tbody>
							<tr>
								 ';?>
                                                    <td>
                                                        <?php echo $tmpCount++ ?>
                                                    </td>
                                                    <?php echo '
								<td>'.$row['title'].'</td>
								<td>'.$row['whichformat'].'</td>
								<td>'.$row['link'].'</td>
								<td>'.$row['type'].'</td>
								
							
																

									
									<td>

								 <a class="btn btn-danger btn-xs waves-effect waves-light" href="?del='.$row['id'].'"> <i class="fa fa-trash-o"></i></a></td>

							</tr>
						
						</tbody>

                                   

';
}
?>



					</table>
				</div>
				<!-- /.box-content -->
			</div>


	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
	
<?php include "allscripts.php"; ?>
