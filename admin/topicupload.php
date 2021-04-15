


     <?php

        include "db.php";

        if(isset($_POST['submit']))
        {
        
            $id=$_POST['id'];
            $chapterid=$_POST['chapterid'];
            $topicname=$_POST['topicname']; 
                  
            $insert = "INSERT INTO topics (id,chapterid,topicname) VALUES ('$id','$chapterid','$topicname')";

            $query =  mysqli_query($con,$insert) or die(mysqli_error($con));              
        
        ?>
                <script>
                alert('Successfully Inserted...Your data has been Submitted');
                window.location.href='topicview.php';
                </script>
                <?php
    }
?>



