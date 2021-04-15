<?php

// Turn off all error reporting
error_reporting(0);

session_start();

require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()) {
    $reg_user->redirect('index.php');
}

$msg = "";

if(isset($_POST["register"]) && ($_POST["register"] == "Sign Up"))
{
    $uname = trim($_POST['txtuname']);
    $email = trim($_POST['txtemail']);
    $upass = trim($_POST['txtpass']);
    $mobile = trim($_POST['mobile']);
    $address = trim($_POST['address']);
    $code = md5(uniqid(rand()));
    
    $stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
    $stmt->execute(array(":email_id"=>$email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($stmt->rowCount() > 0) {
        $msg = "<div class='alert alert-danger'>
                    <button class='close' data-dismiss='alert'>&times;</button>
                    <strong>Sorry !</strong>  Email already exists , Please Try another one OR do you want to Login ?
                </div>";
    } else { 
        if($reg_user->register($uname,$email,$upass,$code,$mobile,$address)) {           
            $id = $reg_user->lasdID();      
            $key = base64_encode($id);
            $id = $key;
            $message = "<center>
                            <img style='width:300px' src='http://grocerpoint.in/assets/images/logo/logo.png'/>      <br>                
                            <p style='font-size:20px;color:black'><b>{$uname},</b><br /><br />
                                Welcome to Grocer Point<br>
                                To sign in to our website, use these credentials during checkout or on the <a style='color:blue' href='http://grocerpoint.in/profile.php' target='_blank'> My Account </a> page:<br />
                                <b>Email:</b> {$email}<br />
                                <b>Password:</b> Password you set when creating account <br/ >
                                If you have forgotten your account password then click <a style='color:blue' href='http://grocerpoint.in/fpass.php' target='_blank'>here </a> to reset it. <br />
                                When you sign in to your account, you will be able to: <br / > <br />
                                - Proceed through checkout faster <br>
                                - Check the status of your order <br>
                                - View order history <br /><br />
                                Thank You, Grocer Point <br>
                            </p>
                        </center>";
                        
            $subject = "Welcome to Grocer Point ";
                        
            $reg_user->send_mail($email,$message,$subject); 

            $msg = "<div class='alert alert-success'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> Thank you for registering with Grocer Point . Please Sign In using your login credentials.
                    </div>";
            header("Location: index.php");            
        } else {
            $msg = "<div class='alert alert-danger'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Failure!</strong> Some error occured while registering with Grocer Point. Please try again.
                    </div>";
        }       
    }
}
?>

<?php include "allcss.php"; ?>

    <body>
        <div id="wrapper" class="wrapper clearfix">
            <?php include "header.php"; ?>
            
        

            <div class="container">
                <div class="row">
                    <div class="col-xs-12  col-sm-12  col-md-12">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                   
                                    <div class="register-form">
                                        <?php 
                                            if(isset($msg)) {
                                                echo $msg;
                                            }  
                                        ?> 




                                <div class="tab-pane fade show active"  name="registration" id="create-account_form" role="tabpanel">
                                    <div class="heading_s1 mb-3">
                                        <h4>Students Registration Form </h4>
                                    </div>
                                  
                                   
                              



                                        <form class="mb-0" action="" method="post" name="registration" id="create-account_form">
                                            <div class="form-group">
                                                <input class="form-control"  placeholder="Enter your username"  name="txtuname" required="" type="text">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control"  placeholder="Type your email address" name="txtemail" required="" type="email">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="Type your password" value="" name="txtpass"  required="" type="password">
                                            </div>
                                            <div class="form-group" id="mobile-block">
                                                <input type="text" class="form-control" id="mobile" minlength="10" maxlength="10" placeholder="Enter your Mobile" name="mobile" required="" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="otp" class="form-control" minlength="6" maxlength="6" placeholder="Enter OTP to verify" name="otp" style="display: none;" />
                                            </div>
                                            <div class="form-group text-right">
                                                <span id="mobile-otp-message-block"></span>
                                            </div>
                                            <div class="form-group" >
                                                <input class="form-control" id="address" placeholder="Enter Your Address" value="" name="address" required="" type="text">
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" required="" />I Agree To <a href="terms.php" target="_blank" >The Terms Of Use ?</a>
                                                </label>
                                            </div>
                                            <br />
                                            <div class="form-group" >
                                                <input class="btn btn-default btn-block" type="submit" name="register" value="Sign Up" />
                                            </div>
                                        </form>
                                        <div class="form-links text-center">
                                            <a href="login.php">Have an account? Login Here</a>
                                        </div>
										
										  </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
                    </div>
                </div>
            </div>
        </div>   <script>
            $('#mobile').on('input', function(e)   {
                e.preventDefault();

                try {
                    let mobile = $(this).val();

                    $('#mobile-otp-message-block').css('color', 'red');
                    $('#mobile-otp-message-block').text('');

                    if (!mobile || isNaN(mobile))    {
                        $('#mobile-otp-message-block').text('Mobile No. invalid. Please check mobile no.');
                        return false;
                    } else if (mobile.length !== 10)    {
                        $('#mobile-otp-message-block').text('Mobile No. should be 10 digits long.');
                        return false;
                    } else {
                        $(this).prop('readonly', true);

                        let formData = new FormData();
                        formData.append('mobile', mobile);
                        
                        fetch('otp.php?action=send', {
                            method: 'post',
                            body: formData
                            })
                            .then(function(res) {
                                return res.json();
                            })
                            .then(function(res) {
                                if (res.status)  {
                                    $('#submitbtn').prop('disabled', true);
                                    $('#mobile-otp-message-block').css('color', 'green');
                                    $('#otp').show();
                                }

                                $('#mobile-otp-message-block').text(String(res.message).trim());
                            })
                            .catch(function(err) {
                                $('#mobile-otp-message-block').text('Some error occured while sending OTP try again');
                                return false;
                            });
                    }
                } catch (error) {
                    $('#mobile-otp-message-block').css('color', 'red');
                    $('#mobile-otp-message-block').text('Some error occured while sending OTP try again');
                    return false;
                }
            });

            $('#otp').on('input', function(e)   {
                e.preventDefault();

                try {
                    let otp = $(this).val();

                    if (otp.length !== 6)   {
                        return false;
                    }

                    $('#mobile-otp-message-block').css('color', 'red');
                    $('#mobile-otp-message-block').text('');

                    if (!otp || isNaN(otp)) {
                        $('#mobile-otp-message-block').text('Invalid OTP');
                        return false;
                    } else {
                        let formData = new FormData();
                        formData.append('otp', otp);

                        fetch('otp.php?action=verify', {
                            method: 'post',
                            body: formData
                        })
                        .then(function(res) {
                            return res.json();
                        })
                        .then(function(res) {
                            if (res.status)  {
                                $('#submitbtn').prop('disabled', false);
                                $('#mobile-otp-message-block').css('color', 'green');
                                $('#otp').prop('readonly', true);
                            }
                            
                            $('#mobile-otp-message-block').text(String(res.message).trim());
                        })
                        .catch(function(err) {
                            $('#mobile-otp-message-block').text('Some error occured while verifying OTP try again');
                            return false;
                        });
                    }
                } catch (error) {
                    $('#mobile-otp-message-block').css('color', 'red');
                    $('#mobile-otp-message-block').text('Some error occured while verifying OTP try again');
                    return false;
                }
            });
        </script>

        <?php include "footer.php"; ?></div>   
        <?php include "allscript.php"; ?>

       