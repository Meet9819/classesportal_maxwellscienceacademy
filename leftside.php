   <div class="col-lg-3 mt-lg-0 mt-4 pt-3 pt-lg-0">
            	<div class="sidebar">
                   
                	<div class="widget widget_recent_course">
                    	<h5 class="widget_title">All Course</h5>
                        <ul class="recent_post border_bottom_dash list_none">
                           
                              <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * FROM courses limit 3 ");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '  

                                     <li>
                                <div class="post_footer">
                                    <div class="post_img">
                                        <a href="#"><img src="images/courses/'.$row['img'].'" alt="letest_course1"></a>
                                    </div>
                                    <div class="post_content">
                                        <h6><a href="#">'.$row['title'].'</a></h6>
                                        <span class="text-success small">'.substr($row['shortdescription'],0,50).'..   </span>
                                    </div>
                                </div>
                            </li> 
                            '; } ?>

                         
                    	</ul>
                    </div>
                    <div class="widget widget_categories">
                    	<h5 class="widget_title">Course Categories</h5>
                        <ul>
                           
                                  <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * FROM courses order by id desc");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '  <li><a href="#"><span class="categories_name">'.$row['title'].'</span></a></li>


                         
                          
                             '; } 
                             ?>


                          
                    	</ul>
                    </div>
                    <div class="widget widget_recent_post">
                    	<h5 class="widget_title">Topic of the Day</h5>
                        <ul class="recent_post border_bottom_dash list_none">
                            <?php include('db.php');
                                     $result = mysqli_query($con,"SELECT * FROM blogs  limit 3");
                                     while($row = mysqli_fetch_array($result))
                                     {
                                    echo '  

                                   <li>
                                <div class="post_footer">
                                    <div class="post_img">
                                        <a href="#"><img src="images/blogs/'.$row['img'].'" alt="letest_post1"></a>
                                    </div>
                                    <div class="post_content">
                                        <h6><a href="#">'.$row['title'].'</a></h6>
                                        <span class="post_date">April 14, 2018</span>
                                    </div>
                                </div>
                            </li>
                                   

                                   '; } 
                                 ?>



                          
                        </ul>
                    </div>
                  


                </div>
            </div>

