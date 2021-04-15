


     <?php

        include "db.php";

        if(isset($_POST['submit']))
        {
           
            $file=$_FILES['image']['tmp_name'];
            $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name= addslashes($_FILES['image']['name']);

            move_uploaded_file($_FILES["image"]["tmp_name"],"../images/teachers/" . $_FILES["image"]["name"]);

            $img=$_FILES["image"]["name"];
            $id=$_POST['id'];
            $name=$_POST['name'];
            $subject=$_POST['subject']; 
            $experience=$_POST['experience'];  
            $contactno=$_POST['contactno'];
            $email=$_POST['email'];
         

             $insert = "INSERT INTO teachers (img,id,name,subject,experience,contactno, email) VALUES ('$img','$id','$name','$subject','$experience','$contactno', '$email')";

               $query =  mysqli_query($con,$insert) or die(mysqli_error($con));

               
            

        ?>
                <script>
                alert('Successfully Inserted...Your data has been Submitted');
                window.location.href='teachersview.php';
                </script>
                <?php

                   
    }
?>



