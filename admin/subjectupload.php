


     <?php

        include "db.php";

        if(isset($_POST['submit']))
        {
           
         

            $id=$_POST['id'];
            $courseid=$_POST['courseid'];
            $subjectname=$_POST['subjectname']; 


          

             $insert = "INSERT INTO subject (id,courseid,subjectname) VALUES ('$id','$courseid','$subjectname')";

               $query =  mysqli_query($con,$insert) or die(mysqli_error($con));

               
            

        ?>
                <script>
                alert('Successfully Inserted...Your data has been Submitted');
                window.location.href='subjectview.php';
                </script>
                <?php

                   
    }
?>



