  
                      <div class="outer">
                        <header class="head">
                            <div class="main-bar">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                              <li class="breadcrumb-item active"><a href="forum.php"> Forum</a></li>
                              <li class="breadcrumb-item active"> <?php echo $post_title ?></li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">
                           
                          <div class="col-lg-12" style="word-wrap: break-word;"><!-- CONTENT START HERE-->
                            <h1><?php echo $post_title ?></h1>
                              <!-- Author -->
                              <p class="lead">
                                  by <a href="profile.php?id"><?php  
                                  if($query_postowner = mysqli_query($con,"SELECT student_fName,student_mName,student_lName FROM `user_student_detail` WHERE `student_userID` = '$post_owner'")) {
                                     $res_postowner = mysqli_fetch_assoc($query_postowner);
                                     echo $res_postowner['student_fName'].
                                     " ".$res_postowner['student_mName'].
                                     " ".$res_postowner['student_lName'];
                                  }
                                  if($query_postowner = mysqli_query($con,"SELECT teacher_fName,teacher_mName,teacher_lName FROM `user_teacher_detail` WHERE `teacher_userID` = '$post_owner'")) {
                                     $res_postowner = mysqli_fetch_assoc($query_postowner);
                                     echo $res_postowner['teacher_fName'].
                                     " ".$res_postowner['teacher_mName'].
                                     " ".$res_postowner['teacher_lName'];
                                  }
                                  if($query_postowner = mysqli_query($con,"SELECT admin_fName,admin_mName,admin_lName FROM `user_admin_detail` WHERE `admin_userID` = '$post_owner'")) {
                                     $res_postowner = mysqli_fetch_assoc($query_postowner);
                                     echo $res_postowner['admin_fName'].
                                     " ".$res_postowner['admin_mName'].
                                     " ".$res_postowner['admin_lName'];
                                  }?></a></p>

                              <hr>

                              <!-- Date/Time -->
                              <p><strong> Posted on</strong> <?php echo date( "M jS, Y", strtotime( "$post_date")). "<strong> at </strong>".date( 'h:i A', strtotime( "$post_date")); ?> <strong>View<?php if ($result_viewcount['view_count'] != 0 ){ echo "s";}else {}?>: </strong>
                                <?php echo $result_viewcount[ 'view_count'] ?></p>
                              <br>
                              <?php 
                              if ($post_owner == $login_id ) {
                                ?>  
                                <div class="btn-group pull-right"  style="margin-top: -50px;">
                                  <?php 
                                  if ($login_level == "2" || $login_level == "3") {
                                   
                                    if ($post_status == "UNPIN") {
                                      $pin_stat = "PIN";
                                      ?>
                                      <a class="btn btn-info" data-toggle="modal" data-target="#<?php echo $pin_stat?>">PIN</a>
                                      <?php
                                    }
                                    else
                                    {
                                       $pin_stat = "UNPIN";
                                      ?>
                                      <a class="btn btn-info" data-toggle="modal" data-target="#<?php echo $pin_stat?>">UNPIN</a>
                                      <?php
                                    }
                                   
                                  }
                                  ?>
                                  <a class="btn btn-primary" data-toggle="modal" data-target="#Edit">EDIT</a>
                                   <a class="btn btn-metis-1"  data-toggle="modal" data-target="#Delete">DELETE</a>
                                </div>
                                <!-- Modal for edit-->
                                <div id="<?php echo $pin_stat?>" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title"><?php echo $pin_stat?> Post</h4>
                                    </div>
                                    <div class="modal-body">
                                    <center>
                                    <h1>Are you sure ?</h1>
                                      <a class="btn btn-success" href=""><?php echo $pin_stat?></a>
                                      <a class="btn btn-danger"  data-dismiss="modal">CANCEL</a>
                                      </center>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>

                                  </div>
                                </div>
                                <!-- Modal for edit-->
                                <div id="Edit" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Edit Post</h4>
                                    </div>
                                    <div class="modal-body">
                                    <center>
                                    <h1>Are you sure ?</h1>
                                      <a class="btn btn-success" href="forum_topic_update.php?req_encypted_postID=<?php echo $req_encypted_postID ;?>">Edit</a>
                                      <a class="btn btn-danger"  data-dismiss="modal">CANCEL</a>
                                      </center>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>

                                  </div>
                                </div>
                                <!-- Modal for delete-->
                                <div id="Delete" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                               
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Delete Post</h4>
                                    </div>
                                    <div class="modal-body">
                                    <center>
                                    <h1>Are you sure ?</h1>
                                      <a class="btn btn-success" href="action/delete_post.php?req_encypted_postID=<?php echo $req_encypted_postID ?>">DELETE</a>
                                      <a class="btn btn-danger"  data-dismiss="modal">CANCEL</a>
                                      </center>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>

                                  </div>
                                </div>

                                 

                                <?php
                              }
                              ?>
                              

                              <hr>
                              <hr>

                              <!-- Post Content -->
                              <?php echo $post_content; ?>
                              <hr>
                              <!-- Comments Form -->
                          <div class="panel panel-default" >
                          <div class="panel-heading">Write your comment</div>
                          <div class="panel-body">
                              <form action="action/comment_add_action.php?userID_comment=<?php echo $login_id;?>&comment_topicID=<?php echo $req_encypted_postID;?>" method="POST">
                                  <textarea id="wysihtml5" class="form-control" rows="6" name="comment"></textarea>
                                  <br>
                                      <input type="submit" name="submit-comment" value="Comment" class="btn btn-primary">
                              </form>
                          </div>
                        </div>
                        <hr>

                          <div class="container" style="margin-right: 0px;padding-left: 0px;width: 995px;margin-left: 0px;">
                                <div class="row">
                                <!-- Contenedor Principal -->
                                  <div class="comments-container">
                                  <h1>Comment</h1>

                                  <ul id="comments-list" class="comments-list">
                                    <li>
                                      <?php 
                                      $req_encypted_postID;
                                      $query_verify_id = mysqli_query($con,"SELECT * FROM `forum_comment`");
                                        //while fetching all data
                                        while ($res_ver_id = mysqli_fetch_array($query_verify_id)) 
                                        {
                                          //each topic id mush be save in temp variable of check_id
                                          $check_id = $res_ver_id['comment_topicID'];
                                            //the requested hash checked original value if match then stored the verified value in verified_id
                                            if (password_verify($check_id, $req_encypted_postID)) 
                                              {
                                               $verified_id = $check_id;//temporary value save to verified_id
                                              }  
                                              
                                        }
                                        $comment_q = mysqli_query($con,"SELECT * FROM forum_comment WHERE comment_topicID = '$verified_id' ");
                                        while ($comment_data = mysqli_fetch_array($comment_q)) {
                                          
                                          ?>
                                        <div class="comment-main-level">
                                        <!-- Avatar -->
                                        <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                                        <!-- Contenedor del Comentario -->
                                        <div class="comment-box">
                                          <div class="comment-head">
                                            <h6 class="comment-name <?php if ($login_id == $comment_data['comment_userID']){
                                              echo "by-author";} ?>"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
                                            <span><?php echo $comment_data['comment_date']; ?></span>
                                             <i class="fa fa-reply"> Reply</i>
                                            <i class="fa fa-heart"></i>
                                          </div>
                                          <div class="comment-content">
                                            <?php echo $comment_data['comment_content']; ?>
                                          </div>
                                        </div>
                                        </div>
                                        <br>
                                          <?php
                                          }
                                      ?>
                                      
                                      <!-- Respuestas de los comentarios -->
                                     <!--  <ul class="comments-list reply-list">
                                       
                                        <li> -->
                                          <!-- Avatar --><!-- 
                                          <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div> -->
                                          <!-- Contenedor del Comentario -->
                                       <!--    <div class="comment-box">
                                            <div class="comment-head">
                                              <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
                                              <span>hace 10 minutos</span>
                                              <i class="fa fa-reply"> Reply</i>
                                              <i class="fa fa-heart"></i>
                                            </div>
                                            <div class="comment-content">
                                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                            </div>
                                          </div>
                                        </li>
                                      </ul> -->
                                    </li>

                                    <li>
                                     
                                    </li>
                                  </ul>
                                </div>
                                </div>
                              </div>

                          </div>
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->

