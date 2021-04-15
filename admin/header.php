
<div class="main-menu">
    <header class="header">
        <a href="index.php" class="logo">Maxwell Science Academy</a>
        <button type="button" class="button-close fa fa-times js__menu_close"></button>
        <div class="user">
            <a href="user.php" class="avatar"><img src="images/user.png" alt=""><span class="status online"></span></a>
            <h5 class="name"><a href="user.php">   <?php echo $_SESSION['user']['username']; ?>!</a></h5>
            <h5 class="position">   <?php echo $type =  $_SESSION['user']['type']; ?></h5>
            <!-- /.name -->
            <div class="control-wrap js__drop_down">
                <i class="fa fa-caret-down js__drop_down_button"></i>
                <div class="control-list">

                    <?php if($type == 'Admin')
                        {
                          echo '<div class="control-item"><a href="user.php"><i class="fa fa-user"></i> Profile</a></div> ';
                        }else {
                            echo '
                            ';
                        }
                    ?>
                   
                    <div class="control-item"><a href="logout.php"><i class="fa fa-sign-out"></i> Log out</a></div>
                </div>
                <!-- /.control-list -->
            </div>
            <!-- /.control-wrap -->
        </div>
        <!-- /.user -->
    </header>
    <!-- /.header -->
    <div class="content">

        <div class="navigation">
            <h5 class="title">Navigation</h5>
            <!-- /.title -->
            <ul class="menu js__accordion">
                <li class="">
                    <a class="waves-effect" href="index.php"><i class="menu-icon fa fa-home"></i><span>Dashboard</span></a>
                </li>

<?php if($type == 'Admin')
{
  echo '   <li>
                    <a class="waves-effect" href="banner.php"><i class="menu-icon fa fa-sliders"></i><span>Banner</span></a>
                </li>


     <li>
                    <a class="waves-effect" href="student.php"><i class="menu-icon fa fa-sign-in"></i><span>Student</span></a>
                </li>
             
             <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-product-hunt "></i><span>Courses</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        <li><a href="coursesadd.php">Add Courses</a></li>
                        <li><a href="coursesview.php">View Courses</a></li>
                    </ul>
                </li>




                  <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-product-hunt "></i><span>Subject</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        <li><a href="subjectadd.php">Add Subject</a></li>
                        <li><a href="subjectview.php">View Subject</a></li>
                    </ul>
                </li>

  <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-product-hunt "></i><span>Chapter</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        <li><a href="chapteradd.php">Add Chapter</a></li>
                        <li><a href="chapterview.php">View Chapter</a></li>
                    </ul>
                </li>

  <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-product-hunt "></i><span>Topic</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        <li><a href="topicadd.php">Add Topic</a></li>
                        <li><a href="topicview.php">View Topic</a></li>
                    </ul>
                </li>


                  <li>
                    <a class="waves-effect" href="videos.php"><i class="menu-icon fa fa-sliders"></i><span>Videos</span></a>
                </li>



   <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-product-hunt "></i><span>Teachers</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        <li><a href="teachersadd.php">Add Teachers</a></li>
                        <li><a href="teachersview.php">View Teachers</a></li>
                    </ul>
                </li>




                  <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-product-hunt "></i><span>Blogs</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        <li><a href="blogsadd.php">Add Blogs</a></li>
                        <li><a href="blogsview.php">View Blogs</a></li>
                    </ul>
                </li>

             

                
            </ul>
            <!-- /.title -->
            <ul class="menu js__accordion">
                    <li>
                    <a class="waves-effect" href="client.php"><i class="menu-icon fa fa-user"></i><span>Clients</span></a>
                </li>              

              
                 <li>
                    <a class="waves-effect" href="testimonials.php"><i class="menu-icon fa fa-sliders"></i><span>Testimonials</span></a>
                </li> 
                <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-table"></i><span>Other Pages</span><span class="menu-arrow fa fa-angle-down"></span></a>
                        <ul class="sub-menu js__content">
                           <li><a href="aboutus.php">About Us</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                            <li><a href="terms.php">Terms & Condition</a></li> 
                            <li><a href="privacy.php">Privacy Policy </a></li>
                            <li><a href="protection.php">Data Protection Policy</a></li>
                            <li><a href="delivery.php">Delivery</a></li>
                            <li><a href="return.php">Returns</a></li>
                            <li><a href="faq.php">FAQs</a></li>
                            <li><a href="contactus.php">Feedback Form</a></li>
                        </ul>                  
                </li>


    ';
}else {
    echo '
    


    ';
}

               
           ?>
           


            </ul>
            <!-- /.menu js__accordion -->
        </div>
        <!-- /.navigation -->
    </div>
    <!-- /.content -->
</div>
<!-- /.main-menu -->




<div class="fixed-navbar">
    <div class="pull-left">
        <button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
        <h1 class="page-title"></h1>
        <!-- /.page-title -->
    </div>
    <!-- /.pull-left -->
    <div class="pull-right">
        
        <!-- /.ico-item -->
        <div class="ico-item fa fa-arrows-alt js__full_screen"></div>
      
        <a href="logout.php" class="ico-item fa fa-power-off"></a>
    </div>
    <!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->



