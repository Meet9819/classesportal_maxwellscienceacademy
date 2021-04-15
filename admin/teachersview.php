<?php
session_start();
if(!isset($_SESSION["user"]["type"])){
header("Location: login.php");
exit(); }
?>


<?php include "allcss.php" ?> <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

 <link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css'>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">



 <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script language="JavaScript" type="text/javascript">
        $(document).ready(function() {
            $("a.delete").click(function(e) {
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
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">View teachers</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr> 	
								<th>Id</th>
								<th>Main Image</th>
								<th> Name</th>
								<th>Contactno </th> 
								<th>Email</th> 
								<th>Subject</th> 
										
								<th>Action</th> 
							
							</tr>
						</thead>
					
						<tbody>
									<?php 
									include('db.php');
									/* code for data delete */
									if(isset($_GET['del']))
									{
									   
									    $SQL = mysqli_query($con,"DELETE FROM teachers WHERE id=".$_GET['del']);

									 ?>
									                <script>
									                alert('Successfully Deleted ...');
									                window.location.href='teachersview.php';
									                </script>
									                <?php

									}
									/* code for data delete */

											$result = mysqli_query($con,"SELECT * from teachers order by id"); 

											 $tmpCount = 1;

											while($row = mysqli_fetch_array($result))
											{

											echo '

				
												<tr>
													  ';?>
                                                    <td>
                                                        <?php echo $tmpCount++ ?>
                                                    </td>
                                                    <?php echo '<td style="width:5%"><img style="width:50px" src="../images/teachers/'.$row['img'].'"> <br>'.$row['img'].'</td>
													<td style="width:15%">'.$row['name'].'</td> 
													<td style="width:15%">'.$row['email'].'</td> 
													<td style="width:15%">'.$row['contactno'].'</td> 
													<td style="width:15%">'.$row['subject'].'</td> 

												'; ?> 
												   <td>
												<?php echo '											   
												  
												  <a href="teachersedit.php?edit_id='.$row['id'].'">
												   <button style="background-color:#304ffe;color:white" type="button" class="btn btn-success waves-effect waves-light btn-xs"> <i class="fa fa-pencil"></i></button>
												  </a>  <a class="btn btn-danger btn-xs waves-effect waves-light" href="?del='.$row['id'].'"> <i class="fa fa-trash-o"></i></a>
												  </td>


												</tr>

						


							'; } ?>

						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
			</div>
		
			<!-- /.col-xs-12 -->
		</div>
		<!-- /.row small-spacing -->		
		<footer class="footer">
			<ul class="list-inline">
				<li>2019 © Megance motor.</li>
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Terms</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</footer>
	</div>
	<!-- /.main-content -->
</div>


<!-- ACTIVE AND INACTIVE KA CODE <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[25, 50, -1], [25, 50, "All"]]
    } );
} );
</script>-->

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).on('click','.status_checks',function(){
var status = ($(this).hasClass("btn-success")) ? '0' : '1';
var msg = (status=='0')? 'Deactivate' : 'Activate';
if(confirm("Are you sure to "+ msg)){
  var current_element = $(this);
  url = "blogsajax.php";
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
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
         "order": [[ 1, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>


    <script src="assets/scripts/modernizr.min.js"></script>
    <script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/plugin/nprogress/nprogress.js"></script>
    <script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
    <script src="assets/plugin/waves/waves.min.js"></script>
    <!-- Full Screen Plugin -->
    <script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

    <!-- Percent Circle -->
    <script src="assets/plugin/percircle/js/percircle.js"></script>

    <!-- Google Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Chartist Chart -->
    <script src="assets/plugin/chart/chartist/chartist.min.js"></script>
    <script src="assets/scripts/chart.chartist.init.min.js"></script>

    <!-- FullCalendar -->
    <script src="assets/plugin/moment/moment.js"></script>
    <script src="assets/plugin/fullcalendar/fullcalendar.min.js"></script>
    <script src="assets/scripts/fullcalendar.init.js"></script>

    <script src="assets/scripts/main.min.js"></script>

