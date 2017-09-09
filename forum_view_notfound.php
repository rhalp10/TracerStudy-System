
                      <div class="outer">
                        <header class="head">
                            <div class="main-bar">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                              <li class="breadcrumb-item active"><a href="forum.php"> Forum</a></li>
                              <li class="breadcrumb-item active"> NOT FOUND</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">
                           
                          <div class="col-lg-12"><!-- CONTENT START HERE-->
                            <h1 class="text-center" style="height: 500px;">TOPIC NOT FOUND</h1>
                            <?php 
                             $hash = password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
                          if (password_verify('rasmuslerdorf', $hash)) {
                                echo 'Password is valid!';
                                echo "asdasd";
                            } else {
                                echo 'Invalid password.';
                            }
                            ?>
                          </div>
                        </div>
                        <!-- /.inner -->
                    </div>