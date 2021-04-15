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
		
	


			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">View Students</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
							 

									<th>Student Name</th>
									<th>Email Id</th>
									<th>DOB</th>
									<th>School Name</th>
									<th>Mobile</th>
									<th>Address</th>		<th>Status</th>								
									<th>Allot Courses</th>								
									<TH>Delete</TH>
							
							</tr>
						</thead>
					
    					 <tbody>

							  <?php include('db.php');
							/* code for data delete */
							if(isset($_GET['del']))
							{
							    $SQL = mysqli_query($con,"DELETE FROM tbl_users WHERE userID=".$_GET['del']);

							 ?>
							                                        <script>
							                                            alert('Successfully Deleted ...');
							                                            window.location.href = 'registeruser.php';
							                                        </script>
							                                        <?php

							}
							/* code for data delete */


							?> 
						    <?php


							$result = mysqli_query($con,"SELECT * FROM tbl_users order by userID desc"); 
							$tmpCount = 1;
							while($row = mysqli_fetch_array($result))
							{
							echo '<tr>
							 ';?>
                                            <td>
                                                <?php echo $tmpCount++ ?>
                                            </td>
                                            <?php echo '

	            							<td>'.$row['userName'].'</td>
	 										<td>'.$row['userEmail'].'</td>
							              	<td>'.$row['dob'].'</td>
							                <td>'.$row['schoolname'].'</td>
							                <td>'.$row['mobile'].'</td>
							                <td>'.$row['address'].'</td> 


							                '; ?> <td><i data="<?php echo $row['userID'];?>" class="status_checks btn-sm <?php echo ($row['status'])? 'btn-success' : 'btn-danger'?>"><?php echo ($row['status'])? 'Active' : 'Inactive'?></i></td> <?php echo '
                       			
							                <td>  <a href="studentcourse.php?edit_id='.$row['userID'].'" style="background-color:#304ffe;color:white" type="button" class="btn btn-success waves-effect waves-light btn-xs"> Allot Courses</a> </td>	
			    							  <td>   <a href="studentedit.php?edit_id='.$row['userID'].'">
												   <button style="background-color:#304ffe;color:white" type="button" class="btn btn-success waves-effect waves-light btn-xs"> <i class="fa fa-pencil"></i></button>
												  </a> 
											 <a class="btn btn-danger btn-xs waves-effect waves-light" href="?del='.$row['userID'].'"> <i class="fa fa-trash-o"></i></a></td>			     

										</tr>


';
}
?> 


      



					</table>
				</div>
				<!-- /.box-content -->
			</div>

<!-- ACTIVE AND INACTIVE KA CODE -->

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).on('click','.status_checks',function(){
var status = ($(this).hasClass("btn-success")) ? '0' : '1';
var msg = (status=='0')? 'Deactivate' : 'Activate';
if(confirm("Are you sure to "+ msg)){
	var current_element = $(this);
	url = "studentajax.php";
	$.ajax({
	type:"POST",
	url: url,
	data: {id:$(current_element).attr('data'),status:status},
	success: function(data)
		{   
			location.reload();
		}
	});
	}      
});
</script>

	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	

<?php include "allscripts.php"; ?>
