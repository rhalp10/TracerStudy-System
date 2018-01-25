
<?php 
include('session.php');
include('db.php');
$page = 'alumni';
if ($login_level == '1')
{
  $result = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE student_userID = $login_id");
  $data = mysqli_fetch_array($result);
  $data_img = $data['student_img'];
}
else if ($login_level == '2')
{
  $result = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE teacher_userID = $login_id");
  $data = mysqli_fetch_array($result);
  $data_img = $data['teacher_img'];
}
else if ($login_level == '3')
{
  $result = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE admin_userID = $login_id");
  $data = mysqli_fetch_array($result);
  $data_img = $data['admin_img'];
}
else
{}

?>
<!DOCTYPE html>
<html>  
  <head>
    <?php include('meta.php');?>
    <?php include('style_css.php');?>
    <title></title>
  </head>
        <body class="menu-affix">
            <div class="bg-dark dk" id="wrap">
                <div id="top">
                    <?php include ('top_navbar.php');?>
                </div>
                <!-- /#top -->
                    <?php  
                    if ($login_level == '1')
                    {
                      include('sidebar_student.php');
                    }
                    if ($login_level == '2')
                    {
                      include('sidebar_teacher.php');
                    }
                    elseif($login_level == '3')
                    {
                      include('sidebar_admin.php');
                    }
                    else
                    {}
                    ?>                    
                      <!-- /#left -->
                <div id="content">
                    <div class="outer">
                        <header class="head">
                            <div class="main-bar">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                              <li class="breadcrumb-item active"> Alumni</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">
                           <div class="box">
                             <header> <?php 

                            $query = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_ID` = $login_id");
                            $res = mysqli_fetch_array($query);
                            $date = $res['student_year_grad'];
                            $query_yr =  mysqli_query($con,"SELECT YEAR('$date') as year;");
                            $yr_res = mysqli_fetch_array($query_yr);
                            $req_course = $res['student_department'];
                            $req_year = $yr_res['year'];
                           ?>
                           
                            <hr>
                             </header>
                             <div class="col-sm-12">
                             <br>
<div class="btn-group">
  <button type="button" class="btn btn-primary">Course</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu"> 
    <li><a id="xIT">BSIT</a></li>
    <li><a id="xCS">BSCS</a></li>
    <li><a id="xOA">BSOA</a></li>
  </ul>
</div>
<?php 
          if ($req_course == 'IT') {
                $zit = "show";
                $zcs = "hidden";
                $zoa = "hidden";
           }
          if ($req_course == 'COMSCI') {
                $zit = "hidden";
                $zcs = "show";
                $zoa = "hidden";
           }
          if ($req_course == 'OA') {
              $zit = "hidden";
              $zcs = "hidden";
              $zoa = "show";
           }
          ?>


<div id="IT_con" <?php echo $zit?>="">
  <center><h3>Information Technology Batch of <?php echo $req_year; ?> </h3></center>
  <table class="table table-bordered table-advance table-hover  ">
    <thead>
             <th>Names</th>
             <th>Student Number</th>
    </thead>
    <tbody>
      <?php 

       $query = mysqli_query($con,"SELECT * FROM `user_student_detail`  WHERE student_department LIKE 'IT' AND student_year_grad LIKE '$req_year%' ORDER BY `student_fName`  ASC");

        $no = 1;
      while ($data = mysqli_fetch_array($query)) {
        $data['student_fName']
      
       ?>
           <tr>
               <td><?php echo $no ?>. <?php echo   $data['student_fName']." ".$data['student_mName']." ".  $data['student_lName']?></td>
               <td><?php echo $data['student_IDNumber']?></td>
           </tr>
           <?php 
           $no = $no + 1;
           }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th></th>
        <th></th>
      </tr>
    </tfoot>
  </table>
</div>
<div id="CS_con" <?php echo $zcs?>="">
  <center><h3>Computer Science Batch of <?php echo $req_year; ?></h3></center>
  <table class="table table-bordered table-advance table-hover  ">
    <thead>
             <th>Names</th>
             <th>Student Number</th>
    </thead>
    <tbody>
       <?php 

       $query = mysqli_query($con,"SELECT * FROM `user_student_detail`  WHERE student_department LIKE 'COMSCI' AND student_year_grad LIKE '$req_year%' ORDER BY `student_fName`  ASC");

        $no = 1;
      while ($data = mysqli_fetch_array($query)) {
        $data['student_fName']
      
       ?>
           <tr>
               <td><?php echo $no ?>. <?php echo   $data['student_fName']." ".$data['student_mName']." ".  $data['student_lName']?></td>
               <td><?php echo $data['student_IDNumber']?></td>
           </tr>
           <?php 
           $no = $no + 1;
           }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th></th>
        <th></th>
      </tr>
    </tfoot>
  </table>
</div>
<div id="OA_con" <?php echo $zoa?>="">
  <center><h3>Office Administration Batch of <?php echo $req_year; ?></h3></center>
  <table class="table table-bordered table-advance table-hover  ">
    <thead>
             <th>Names</th>
             <th>Student Number</th>
    </thead>
    <tbody>
      <?php 

       $query = mysqli_query($con,"SELECT * FROM `user_student_detail`  WHERE student_department LIKE 'OA' AND student_year_grad LIKE '$req_year%' ORDER BY `student_fName`  ASC");

        $no = 1;
      while ($data = mysqli_fetch_array($query)) {
        $data['student_fName']
      
       ?>
           <tr>
               <td><?php echo $no ?>. <?php echo   $data['student_fName']." ".$data['student_mName']." ".  $data['student_lName']?></td>
               <td><?php echo $data['student_IDNumber']?></td>
           </tr>
           <?php 
           $no = $no + 1;
           }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th></th>
        <th></th>
      </tr>
    </tfoot>
  </table>
</div>
                              
                            </div>
                         
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->

            </div>

            <!-- /#wrap -->
            <?php include('footer.php');?>
            <!-- /#footer -->
            <?php include ('script.php');?>
        </body>
         
        <script type="text/javascript">

        $(document).ready(function(){
                                $("#xIT").click(function(){
                                    $("#IT_con").show();
                                    $("#CS_con").hide();
                                    $("#OA_con").hide();
                                });
                                $("#xCS").click(function(){
                                    $("#IT_con").hide();
                                    $("#CS_con").show();
                                    $("#OA_con").hide();
                                });
                                $("#xOA").click(function(){
                                     $("#IT_con").hide();
                                    $("#CS_con").hide();
                                    $("#OA_con").show();
                                });
                            });

        </script>

</html>
