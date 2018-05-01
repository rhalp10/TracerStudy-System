
<?php 
include('session.php'); 
include('db.php');
$survey_maxcount_qry = mysqli_query($con,"SELECT survey_maxattemp FROM `survey_maxcount` WHERE survey_ownerID = '$login_id'");
$survey_maxattemp = mysqli_fetch_array($survey_maxcount_qry);
$page = 'dashboard';
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
{
}
class json
    {
    public $value = 0;
    public function EncodeParsing($parse){
        $j_encode = json_encode($parse);
        return $j_encode;
      }
    public function DataCount($count){
        $total_count = mysqli_num_rows($count);
        return $total_count;
      }
       
    public function stackValue($val)
      {
          $this->value += $val;
      }
     
    public function getSum()
      {
          return $this->value . "<br />";
      }
    public function addtoString($str, $item) {
    $parts = explode(',', $str);
    $parts[] = $item;
    return implode(',', $parts);
    }
 
   
    }
$json = new json;
$totalresult_ofStudent = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_status` = 'register'");
$totalresult_ofTeacher = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE `teacher_status` = 'register'");
$totalresult_ofAdmin = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE `admin_status` = 'register'");
$totalAcc_register_asStudent = $json->DataCount($totalresult_ofStudent);
$totalAcc_register_asTeacher = $json->DataCount($totalresult_ofTeacher);
$totalAcc_register_asAdmin = $json->DataCount($totalresult_ofAdmin);


$jobCount = mysqli_query($con,"SELECT DISTINCT(sq6.job) as label,(SELECT COUNT( job) from  survey_question6 WHERE job=sq6.job) as y from  survey_question6 sq6  WHERE sq6.job is not null");

 // $row_count = mysqli_num_rows($jobCount);



while($jcc = mysqli_fetch_array($jobCount)){

                    $datajcc[] = $jcc[0];
       }  
$jobCount = mysqli_query($con,"SELECT DISTINCT(sq6.job) as label,(SELECT COUNT( job) from  survey_question6 WHERE job=sq6.job) as y from  survey_question6 sq6  WHERE sq6.job is not null LIMIT 10");

 // $row_count = mysqli_num_rows($jobCount);



while($rowCount = mysqli_fetch_array($jobCount)){

                    $dataCount[] = $rowCount[1];
       } 
 $jencode_title =  json_encode($datajcc);
   $jencode_jcount =  json_encode($dataCount);
?>



<!DOCTYPE html>
<html>  
  <head>
    <?php include('meta.php');?>
    <?php include('style_css.php');?>
    <title>Dashboard</title>
  </head>
        <body class=" menu-affix">
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
                    else if ($login_level == '2')
                    {
                        include('sidebar_teacher.php');
                    }
                    else if ($login_level == '3')
                    {
                        include('sidebar_admin.php');
                    }
                    else
                    {
                    }
                    ?>                    
                      <!-- /#left -->
                <div id="content">

                    <div class="outer">
                        <header class="head">
                            <div class="main-bar">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item active"> Dashboard</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>

                        <div class="inner bg-light lter">
                            <center><h1>Welcome</h1></center>
                            <hr>
                            <?php 
                              if ($userType == "teacher" || $userType == "admin" ) {
                               
                              }
                              else{
                                ?>
                            <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModal">Suggested Job</button>
                                <?php
                              }
                            ?>
                            <div id="canvas-holder">
                                    <canvas id="chart-area" />
                                </div>
                            <!-- <div <?PHP 
                            if ($userType == "teacher" OR $userType == "admin" ) {
                                    echo "class='col-sm-12'";
                                }
                                else{
                                     echo "class='col-sm-6'";
                                }
                            ?>>
                                
                            </div>
                            
                            <div class="col-sm-6">
                                <?php 
                                if ($userType == "teacher" OR $userType == "admin" ) {
                                }
                                else{
                                
                                   ?>
                                   <table class="table table-bordered table-advance table-hover">
                                    <thead>
                                        <tr>
                                            <thead><b>SUGGESTED COMPATIBLE JOB FOR YOU</b></thead>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php 
                                $sj = mysqli_query($con,"SELECT sj.job_Title FROM `user_student_detail` usd
INNER JOIN cvsu_department cd ON usd.student_department = cd.department_ID
inner join suggested_job sj ON cd.department_ID = sj.job_ID
 WHERE usd.student_ID = '$login_id' ORDER by rand()");
                                while ($sj1 = mysqli_fetch_array($sj)){
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $sj1['job_Title']?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                    </tbody>
                                </table>
                                   <?php
                                }
                                ?> -->
                                
                                
                            </div>
                        </div>

                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->

                    <!-- /#right -->
            </div>

            <!-- /#wrap -->
            <?php include('footer.php');?>
            <!-- /#footer -->
            <?php include ('script.php');?>    

            <script type="text/javascript">
 
   
    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: <?php echo 
 $jencode_jcount 
                ?>,
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.blue,
                ]
 // backgroundColor: palette('tol', myData.length).map(function(hex) {
 //        return '#' + hex;
 //      })
  // backgroundColor: fillPattern
                ,
                label: 'Dataset 1'
            }],
            labels: 
                <?php echo 
 $jencode_title 
                ?>
            
        },
        options: {
           title: {
             display: true,
             text: 'Job Chart'
           }
         }
    };
    window.onload = function() {

        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);
    };
    </script>
    
        </body>

</html>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Suggested Job</h4>
      </div>
      <div class="modal-body">
        <script type="text/javascript">
            $(document).ready(function() {
                var dataTable = $('#zzz').DataTable();
                } );
        </script>
        <table  id="zzz" class="table table-bordered table-advance table-hover">
                                    <thead>
                                            <b>SUGGESTED COMPATIBLE JOB FOR YOU</b>
                                        
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>
                                            </th>
                                            <th>
                                            </th>
                                            <th>
                                            </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                <?php 
                                $sj = mysqli_query($con,"SELECT sj.job_Title FROM `suggested_job` sj,user_student_detail usd
WHERE usd.student_userID = '$login_id' AND job_Course = usd.student_department
ORDER by rand() LIMIT 25");
                                
                                while ($sj1 = mysqli_fetch_array($sj)){
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $sj1['job_Title']?></td>
                                        <td><?php echo $sj1['job_Title']?></td>
                                        <td><?php echo $sj1['job_Title']?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                    </tbody>
                                </table>
                                <table></table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

