


     <?php

        include "db.php";

        if(isset($_POST['submit']))
        {
           
            $file=$_FILES['image']['tmp_name'];
            $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name= addslashes($_FILES['image']['name']);

            move_uploaded_file($_FILES["image"]["tmp_name"],"../images/courses/" . $_FILES["image"]["name"]);

            $img=$_FILES["image"]["name"];
            $id=$_POST['id'];
            $title=$_POST['title'];
            $shortdescription=$_POST['shortdescription']; 
            $longdescription=$_POST['longdescription'];  $fees=$_POST['fees'];
         



          

             $insert = "INSERT INTO courses (img,id,title,shortdescription,longdescription,fees) VALUES ('$img','$id','$title','$shortdescription','$longdescription','$fees')";

               $query =  mysqli_query($con,$insert) or die(mysqli_error($con));

               
            

        ?>
                <script>
                alert('Successfully Inserted...Your data has been Submitted');
                window.location.href='coursesview.php';
                </script>
                <?php

                   
    }
?>



