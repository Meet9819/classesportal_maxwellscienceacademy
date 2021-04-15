


     <?php

        include "db.php";

        if(isset($_POST['submit']))
        {
        
            $id=$_POST['id'];
            $courseid=$_POST['courseid'];
            $subjectid=$_POST['subjectid']; 
            $chaptername=$_POST['chaptername'];  
            $description=$_POST['description'];
                  
            $insert = "INSERT INTO chapter (id,courseid,subjectid,chaptername,description) VALUES ('$id','$courseid','$subjectid','$chaptername','$description')";

            $query =  mysqli_query($con,$insert) or die(mysqli_error($con));              
        
        ?>
                <script>
                alert('Successfully Inserted...Your data has been Submitted');
                window.location.href='chapterview.php';
                </script>
                <?php
    }
?>



