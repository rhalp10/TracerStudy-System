<?php 
$query_sidebar = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_userID` = $login_id");
$res_sidebar = mysqli_fetch_assoc($query_sidebar);
$query_count_post = mysqli_query($con,"SELECT `post_owner_id` FROM `forum_topic` WHERE `post_owner_id` = $login_id");
$res_count_post = mysqli_num_rows($query_count_post);
$userType = "student";

?>

                    <div id="left">
                        <div class="media user-media bg-dark dker" >
                            <div class="user-media-toggleHover">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="user-wrapper bg-dark">
                                <a class="user-link" href="">
                                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/profile_img/<?php echo $data_img?>" style="width: 64px; height: 64px;">
                                </a>
                        
                                <div class="media-body">
                                    <h5 class="media-heading"><?php echo $res_sidebar['student_fName'];?></h5>
                                    <ul class="list-unstyled user-info">
                                        <li><?php echo $userType  ?></li>
                                        <li>
                                            <small><i class="fa fa-edit"></i>&nbsp;Posts: <a href="" style="color: white;"><?php echo $res_count_post?></a></small>
                                        </li>
                                        <li> &nbsp;<br>
                                            &nbsp;
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- #menu -->
                        <ul id="menu" class="bg-blue dker" style="background-color: #444444 !important;">
                                  <li class="nav-header">Menu</li>
                                  <li class="nav-divider"></li>
                                  <?php 
                                  if ($page == 'dashboard')
                                  {
                                    ?>
                                     <li class="active">
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                   <li class="">
                                  <?php
                                  }
                                   ?>
                                    <a href="dashboard.php">
                                      <span class="link-title">
                                    Dashboard
                                  </span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    
                                  </li>
                                  <?php 
                                  if ($page == 'batchmates' || $page == 'alumni' )
                                  {
                                    ?>
                                     <li class="active">
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                   <li class="">
                                  <?php
                                  }
                                   ?>
                                    <a href="batchmates.php">
                                      <span class="link-title">
                                    My Batchmates
                                  </span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    
                                  </li>
                                  <?php 
                                  if ($page == 'forum')
                                  {
                                    ?>
                                     <li class="active">
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                   <li class="">
                                  <?php
                                  }
                                   ?>
                                    <a href="">
                                      <span class="link-title">
                                    Forum
                                  </span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                      <li>
                                        <a href="forum.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; General Forum</a>
                                      </li>
                                      <li>
                                        <a href="profile_post.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Your Posts</a>
                                      </li>
                                    </ul>
                                  </li>
                                  <?php 
                                  if ($page == 'survey')
                                  {
                                    ?>
                                     <li class="active">
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                   <li class="">
                                  <?php
                                  }
                                   ?>
                                    <a href="<?php 
                                    if($survey_maxattemp['survey_maxattemp']  <= '1')
                                    {
                                      echo "surveyview.php";
                                    }
                                    else{
                                      echo "survey.php";
                                    }
                                    ?>">

                                      <span class="link-title">
                                    Survey
                                  </span>
                                  <span class="fa arrow"></span>
                                    </a>
                                    
                                  </li>
                                  <?php 
                                  if ($page == 'statistic')
                                  {
                                    ?>
                                     <li class="active">
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                   <li class="">
                                  <?php
                                  }
                                   ?>
                                    <a href="statistic.php?category=accountregister&date=">
                                      <span class="link-title">
                                    Statistic
                                  </span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    
                                  </li>
                                </ul>
                        <!-- /#menu -->
                      
                    </div>