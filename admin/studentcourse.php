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
          <h4 class="box-title"> Alloted Courses to Student</h4>
          <!-- /.box-title -->
          <div class="card-content">
            
  <?php   
 $studentid = $_GET['edit_id'];         

                                      include('db.php');
                                    if(isset($_POST['save']))
                                    {       

                                                                            
                                            $courseid=$_POST['courseid'];

                                            $save=mysqli_query($con,"INSERT INTO tbl_userscourses (tbl_userid,courseid) VALUES ('$studentid','$courseid')");   
                                                ?>
                                                <script>
                                                alert('Thank You Courses are Alloted ...');
                                               // window.location.href='studentcourse.php';
                                                </script>
                                                <?php       
                                    }

                                ?>

               <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

            
  


                <div class="form-group">
                  <label for="inp-type-1" class="col-sm-3 control-label">Student ID</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" id="" name="tbl_userid" required="" value="<?php echo $studentid; ?>" readonly="">
                
                  </div>

                </div>


                <div class="form-group">
                  <label for="inp-type-1" class="col-sm-3 control-label"> Select Course</label>
                  <div class="col-sm-6">
                     <select class="form-control" name="courseid">
                                                <option>Select Course</option>
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
          <h4 class="box-title">View Alloted Courses to Student</h4>
        
          <!-- /.dropdown js__dropdown -->
          <table id="example" class="table table-striped table-bordered display" style="width:100%">
            <thead>
              <tr>
                <th>Id</th>
              
                <th>Student Id</th>
                  
                  <th>Courses</th>
                <th>Action</th>
              
              </tr>
            </thead>
          

              <?php
              /* code for data delete */
              if(isset($_GET['del']))
              {
                  $SQL = mysqli_query($con,"DELETE FROM tbl_userscourses WHERE id=".$_GET['del']);

               ?>
                              <script>
                              alert('Successfully Deleted ...');
                              window.location.href='student.php';
                              </script>
                              <?php

              }
              /* code for data delete */

              $result = mysqli_query($con,"SELECT t.userName, c.title, tc.id, tc.tbl_userid, tc.courseid FROM `tbl_userscourses` tc, `tbl_users` t , `courses` c where t.userID = tc.tbl_userid and c.id = tc.courseid and  tc.tbl_userid = $studentid"); 
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
                <td>'.$row['userName'].'</td>                
                <td>'.$row['title'].'</td>                   
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
