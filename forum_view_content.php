
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
                           
                          <div class="col-lg-12"><!-- CONTENT START HERE-->
                            <h1><?php echo $post_title ?></h1>
                              <!-- Author -->
                              <p class="lead">
                                  by <a href="profile.php?id"><?php  
                                if ($login_level == '1')
                                {
                                    echo  $res_sidebar['student_fName']." ".$res_sidebar['student_mName']." ".$res_sidebar['student_lName'];
                                }
                                if ($login_level == '2')
                                {
                                    echo  $res_sidebar['teacher_fName']." ".$res_sidebar['teacher_mName']." ".$res_sidebar['teacher_lName'];
                                }
                                elseif ($login_level == '3')
                                {
                                    echo  $res_sidebar['admin_fName']." ".$res_sidebar['admin_mName']." ".$res_sidebar['admin_lName'];
                                }
                                else
                                {
                                }
                                ?></a></p>

                              <hr>

                              <!-- Date/Time -->
                              <p><strong> Posted on</strong> <?php echo date("M jS, Y", strtotime("$post_date")). "<strong> at </strong>".date('h:i A', strtotime("$post_date")); ?> <strong>View<?php if ($result_viewcount['view_count'] != 0 ){ echo "s";}else {}?>: </strong><?php echo $result_viewcount['view_count'] ?></p>

                              <hr>
                              <hr>

                              <!-- Post Content -->
                              <?php echo $post_content; ?>
                              <hr>
                              <!-- Comments Form -->
                          <div class="panel panel-default" >
                          <div class="panel-heading">Write your comment</div>
                          <div class="panel-body">
                              <form>
                                  <textarea id="wysihtml5" class="form-control" rows="6"></textarea>
                                  <br>
                                      <input type="submit" value="Comment" class="btn btn-primary">
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
                                      <div class="comment-main-level">
                                        <!-- Avatar -->
                                        <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                                        <!-- Contenedor del Comentario -->
                                        <div class="comment-box">
                                          <div class="comment-head">
                                            <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
                                            <span>hace 20 minutos</span>
                                             <i class="fa fa-reply"> Reply</i>
                                            <i class="fa fa-heart"></i>
                                          </div>
                                          <div class="comment-content">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Respuestas de los comentarios -->
                                      <ul class="comments-list reply-list">
                                        <li>
                                          <!-- Avatar -->
                                          <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                                          <!-- Contenedor del Comentario -->
                                          <div class="comment-box">
                                            <div class="comment-head">
                                              <h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
                                              <span>hace 10 minutos</span>
                                               <i class="fa fa-reply"> Reply</i>
                                              <i class="fa fa-heart"></i>
                                            </div>
                                            <div class="comment-content">
                                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                            </div>
                                          </div>
                                        </li>

                                        <li>
                                          <!-- Avatar -->
                                          <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                                          <!-- Contenedor del Comentario -->
                                          <div class="comment-box">
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
                                      </ul>
                                    </li>

                                    <li>
                                      <div class="comment-main-level">
                                        <!-- Avatar -->
                                        <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                                        <!-- Contenedor del Comentario -->
                                        <div class="comment-box">
                                          <div class="comment-head">
                                            <h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
                                            <span>hace 10 minutos</span>
                                             <i class="fa fa-reply"> Reply</i>
                                            <i class="fa fa-heart"></i>
                                          </div>
                                          <div class="comment-content">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                          </div>
                                        </div>
                                      </div>
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