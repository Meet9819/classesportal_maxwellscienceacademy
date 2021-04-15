
<?php
error_reporting(0);
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
    
    
    $user_login->redirect('index.php');
}

if(isset($_POST['btn-login']))
{
    $email = trim($_POST['txtemail']);
    $upass = trim($_POST['txtupass']);

    if($user_login->login($email,$upass))
    {
        $user_login->redirect('login.php');
    }
}
?>
    <!-- LOGIN --> 


    <?php include "allcss.php"; ?>

<body>

<div id="wrapper" class="wrapper clearfix">

	<?php include "header.php"; ?>

	


		<div class="container">
			<div class="row">
				<div class="col-xs-12  col-sm-12  col-md-12">
				
						<div style="width: 370px;margin: 40px auto;">
							<div class="modal-content">
								<div class="modal-body">
									
								

									   <?php 
								        if(isset($_GET['inactive']))
								        {
								            ?>
								             <div class='alert alert-danger'>
								                <button class='close' data-dismiss='alert'>&times;</button>
								                 <strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it.
								              </div>
								             <?php
								        }
								        ?>
										<?php
								        if(isset($_GET['error']))
								        {
								            ?>
								            <div class='alert alert-danger'>
								                <button class='close' data-dismiss='alert'>&times;</button>
								                  <strong>Wrong Details!</strong>
								            </div>
								        <?php
								        }
								        ?>   



        						<div class="tab-pane fade show active"  name="registration" id="create-account_form" role="tabpanel">
                                    <div class="heading_s1 mb-3">
                                        <h4>Students Login</h4>
                                    </div>
                                    <form method="post" action="" class="login">
                                        <div class="form-group">
                                            <input type="text" required="" class="form-control"  id="email" name="txtemail" placeholder="Enter your Email Id / Mobile No" >
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" required="" type="password" id="passwd" name="txtupass" placeholder="Enter your Password">
                                        </div>
                                        <div class="login_footer form-group">
                                            <a href="fpass.php">Lost your password?</a>
                                            <div class="chek-form mb-3">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                                    <label class="form-check-label" for="exampleCheckbox3">Remember me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default btn-block"  name="btn-login" >Log in</button>
                                        </div>
                                    </form>
                                  
                                   
                                </div>

				
										<div class="form-links text-center">
											<a href="register.php">Create New Account</a>
										</div>
									</div>
								
						</div>



					</div>
				</div>
				
			</div>
		
		</div>
<?php include "footer.php"; ?>
</div>
<?php include "allscript.php"; ?>