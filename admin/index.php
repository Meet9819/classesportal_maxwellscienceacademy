<?php
session_start();
if(!isset($_SESSION["user"]["type"])){
header("Location: login.php");
exit(); }
?>


<?php include "allcss.php" ?>


<body>

<?php include "header.php" ?>




<!-- /#message-popup -->
<div id="wrapper">
	<div class="main-content"> 




		<div class="row small-spacing">


				<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content">
					<a href="productsview.php">	<h4 class="box-title">Admin</h4></a>
				
					<div class="content widget-stat">
						<div class="percent bg-success"><i class="fa fa-line-chart"></i>53%</div>
						<!-- /.percent -->
						<div class="right-content"> 


							                              <?php
							include"db.php";

							$result = mysqli_query($con,"select count(1) FROM adminlogin");
							$row = mysqli_fetch_array($result);

							$total = $row[0];

							       echo'  
								<h2 class="counter"> '. $total.'</h2>
							                            
							      '
							?>
	
						
							<!-- /.counter -->
							<a href=""><p class="text">No of Admin</p></a>
							<!-- /.text -->
						</div>
						<!-- /.right-content -->
						<div class="clear"></div>
						<!-- /.clear -->
						<div class="process-bar">
							<div class="bar-bg bg-success"></div>
							<div class="bar js__width bg-success" data-width="70%"></div>
							<!-- /.bar js__width bg-success -->
						</div>
						<!-- /.process-bar -->
					</div>
					<!-- /.content widget-stat -->
				</div>
				<!-- /.box-content -->
			</div>
	
	





				<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content">
					<a href="productsview.php">	<h4 class="box-title">Students</h4></a>
				
					<div class="content widget-stat">
						<div class="percent bg-warning"><i class="fa fa-line-chart"></i>53%</div>
						<!-- /.percent -->
						<div class="right-content"> 


							                              <?php
							include"db.php";

							$result = mysqli_query($con,"select count(1) FROM tbl_users");
							$row = mysqli_fetch_array($result);

							$total = $row[0];

							       echo'  
								<h2 class="counter"> '. $total.'</h2>
							                            
							      '
							?>
	
						
							<!-- /.counter -->
							<a href=""><p class="text">No of Students</p></a>
							<!-- /.text -->
						</div>
						<!-- /.right-content -->
						<div class="clear"></div>
						<!-- /.clear -->
						<div class="process-bar">
							<div class="bar-bg bg-warning"></div>
							<div class="bar js__width bg-warning" data-width="70%"></div>
							<!-- /.bar js__width bg-success -->
						</div>
						<!-- /.process-bar -->
					</div>
					<!-- /.content widget-stat -->
				</div>
				<!-- /.box-content -->
			</div>
	
	



		
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content">
					<a href="productsview.php">	<h4 class="box-title">Teachers</h4></a>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="productsview.php">View Teachers</a></li>
							<li><a href="productsadd.php">Add Teachers</a></li>
							
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<div class="content widget-stat">
						<div class="percent bg-info"><i class="fa fa-line-chart"></i>53%</div>
						<!-- /.percent -->
						<div class="right-content"> 


                              <?php
include"db.php";

$result = mysqli_query($con,"select count(1) FROM teachers");
$row = mysqli_fetch_array($result);

$total = $row[0];

       echo'  
	<h2 class="counter"> '. $total.'</h2>
                            
      '
?>
	
						
							<!-- /.counter -->
							<a href="productsview.php"><p class="text">No of Teachers</p></a>
							<!-- /.text -->
						</div>
						<!-- /.right-content -->
						<div class="clear"></div>
						<!-- /.clear -->
						<div class="process-bar">
							<div class="bar-bg bg-info"></div>
							<div class="bar js__width bg-info" data-width="70%"></div>
							<!-- /.bar js__width bg-success -->
						</div>
						<!-- /.process-bar -->
					</div>
					<!-- /.content widget-stat -->
				</div>
				<!-- /.box-content -->
			</div>
	
	

			
				<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content">
					<a href="productsview.php">	<h4 class="box-title">Courses</h4></a>
				
					<div class="content widget-stat">
						<div class="percent bg-primary"><i class="fa fa-line-chart"></i>53%</div>
						<!-- /.percent -->
						<div class="right-content"> 


							                              <?php
							include"db.php";

							$result = mysqli_query($con,"select count(1) FROM courses");
							$row = mysqli_fetch_array($result);

							$total = $row[0];

							       echo'  
								<h2 class="counter"> '. $total.'</h2>
							                            
							      '
							?>
	
						
							<!-- /.counter -->
							<a href=""><p class="text">No of Courses</p></a>
							<!-- /.text -->
						</div>
						<!-- /.right-content -->
						<div class="clear"></div>
						<!-- /.clear -->
						<div class="process-bar">
							<div class="bar-bg bg-primary"></div>
							<div class="bar js__width bg-primary" data-width="70%"></div>
							<!-- /.bar js__width bg-success -->
						</div>
						<!-- /.process-bar -->
					</div>
					<!-- /.content widget-stat -->
				</div>
				<!-- /.box-content -->
			</div>
	
	
 





			<!-- /.col-lg-6 col-xs-12 -->
		</div>
		
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->



<?php include "allscripts.php" ?>