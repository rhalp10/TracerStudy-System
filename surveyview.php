<?php 
include('session.php');
include('db.php');

$survey_maxcount_qry = mysqli_query($con,"SELECT * FROM `survey_maxcount` WHERE survey_ownerID = '$login_id'");
$survey_maxattemp = mysqli_fetch_array($survey_maxcount_qry);

if ($survey_maxattemp['survey_ownerID'] == $login_id) {
    //getting latest date base on server PC
    $date_now = date("Y/m/d") ;
    $year_now = date( "Y", strtotime( "$date_now"));

    $survey_latest_form_sql = mysqli_query ($con,"SELECT form_id,year(max(form_taken)) as survey_year FROM `survey_forms` WHERE form_ownerID = '$login_id' ");
      $latest_survey_form = mysqli_fetch_array($survey_latest_form_sql);
      $latest_user_survey_formID = $latest_survey_form['form_id'];
      $latest_user_survey_year = $latest_survey_form['survey_year'];
      //checking if year now is greater tha your latest survey taken
      if ($year_now > $latest_user_survey_year)
      {
          // survey_maxcount reset to 2
          mysqli_query($con,"UPDATE `survey_maxcount` SET `survey_maxattemp` = '2' WHERE `survey_ownerID` = '$login_id' ");
      }


    
}
else {
    mysqli_query($con,"INSERT INTO `survey_maxcount` (`survey_ownerID`, `survey_maxattemp`) VALUES ('$login_id', '2')");
    $last_id = mysqli_insert_id($con);
    $survey_maxcount_qry = mysqli_query($con,"SELECT survey_maxattemp FROM `survey_maxcount` WHERE survey_id = '$last_id'");
    
}
//if user is teacher or admin disable survey form features
if ($login_level == '3' || $login_level == '2' ) {
    header('Location: dashboard.php'); 
}

if($survey_maxattemp['survey_maxattemp'] >= '2')
{
   header('Location: survey.php');
}
//getting latest date base on server PC
$date_now = date("Y/m/d") ;
$year_now = date( "Y", strtotime( "$date_now"));


$survey_latest_form_sql = mysqli_query ($con,"SELECT max(form_id) as form_id,max(form_taken) as survey_year FROM `survey_forms` WHERE form_ownerID = '$login_id' ");
$latest_survey_form = mysqli_fetch_array($survey_latest_form_sql);
$latest_user_survey_formID = $latest_survey_form['form_id'];
$latest_user_survey_year = $latest_survey_form['survey_year'];
//checking if year now is greater tha your latest survey taken
if ($year_now > $latest_user_survey_year)
{
    // survey_maxcount reset to 2
    mysqli_query($con,"UPDATE `survey_maxcount` SET `survey_maxattemp` = '2' WHERE `survey_ownerID` = '$login_id' ");
}
$page = 'survey';
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

                <title>Survey</title>
    </head>
<script type="text/javascript">
    $(document).ready(function(){
        $("#ilabasmo").hide()
    $("#washing").click(function(){
        $("#ilabasmo").toggle();
    });
});
</script>
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
                    if ($login_level == '2')
                    {
                        include('sidebar_teacher.php');
                    }
                    elseif ($login_level == '3')
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
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="survey.php">Survey Form</a></li>
                                    <li class="breadcrumb-item active"> Survey Question View</li>
                                </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">
                           
                            <div>
                                <?php 
                                if ($survey_maxattemp['survey_maxattemp'] == 0) {
                                    # code...
                                }
                                else
                                {
                                 ?>
                                <h3 class="pull-right"><a href="survey.php" class="btn btn-default">Retake Remaining (<?php echo $survey_maxattemp['survey_maxattemp'];?>)</a></h3>
                                 <?php
                                }
                                ?>
                                <form class="form-horizontal" >
                                    <?php
                                    $q1_data_qry = mysqli_query($con,"SELECT * FROM `survey_question1` WHERE survey_formID = '$latest_user_survey_formID'");
                                    while ($q1_data = mysqli_fetch_array($q1_data_qry)) {
                                         $q1_col[] = $q1_data['col1'];
                                         $q1_co2[] = $q1_data['col2'];
                                         
                                     }
                                    $q2_data_qry = mysqli_query($con,"SELECT * FROM `survey_question2` WHERE survey_formID = '$latest_user_survey_formID'");
                                    while ($q2_data = mysqli_fetch_array($q2_data_qry)) {
                                         $q2_col[] = $q2_data['survey_col1'];
                                         
                                     }
                                     $q3_data_qry = mysqli_query($con,"SELECT * FROM `survey_question3` WHERE survey_formID = '$latest_user_survey_formID'");
                                    while ($q3_data = mysqli_fetch_array($q3_data_qry)) {
                                         $q3_col[] = $q3_data['col1'];
                                         $q3_co2[] = $q3_data['col2'];
                                         
                                     }
                                    $q4_data_qry = mysqli_query($con,"SELECT * FROM `survey_question4` WHERE survey_formID = '$latest_user_survey_formID'");
                                    while ($q4_data = mysqli_fetch_array($q4_data_qry)) {
                                         $q4_col[] = $q4_data['col1'];
                                         
                                     }
                                    $q5_data_qry = mysqli_query($con,"SELECT * FROM `survey_question5` WHERE survey_formID = '$latest_user_survey_formID'");
                                    $q5_data = mysqli_fetch_array($q5_data_qry) ;
                                    $q6_data_qry = mysqli_query($con,"SELECT * FROM `survey_question6` WHERE survey_formID = '$latest_user_survey_formID'");
                                    $q6_data = mysqli_fetch_array($q6_data_qry) ;
                                    $q7_data_qry = mysqli_query($con,"SELECT * FROM `survey_question7` WHERE survey_formID = '$latest_user_survey_formID'");
                                    $q7_data = mysqli_fetch_array($q7_data_qry) ;
                                    $q8_data_qry = mysqli_query($con,"SELECT * FROM `survey_question8` WHERE survey_formID = '$latest_user_survey_formID'");
                                    while ($q8_data = mysqli_fetch_array($q8_data_qry)) {
                                         $q8_col[] = $q8_data['col1'];
                                         
                                     }
                                    
                                         
                                     

                                     ?>
                                    <h1>GRADUATE TRACER SURVEY VIEW </h1>
                                    <br>
                                    <div class="" style="display: inline-block; vertical-align: top; width: 100%;">
                                        <h5 class=""><span style="">1. Reason (s) for taking the course (s) or pursuing degree (s).  You may check (/) more than one answer.</span></h5>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th><span class="" style="">Undergraduate/AB/BS </span></th>
                                                    <th><span class="" style="">Graduate/MS/MA/Ph.D.</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span style="">High Grades in the course or subject area (s) related to the course</span></td>
                                                    <td>
                                                        <label class="">
                                                            <?php 
                                                            if ($q1_col[0]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="">
                                                           <?php 
                                                            if ($q1_co2[0]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                         </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="" style="">Good grades in high school</span></td>
                                                    <td>
                                                        <label class="">
                                                            <?php 
                                                            if ($q1_col[1]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="">
                                                           <?php 
                                                            if ($q1_co2[1]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                         </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span style="">Influence of parents or relatives</span></td>
                                                    <td>
                                                        <label class="">
                                                            <?php 
                                                            if ($q1_col[2]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="">
                                                           <?php 
                                                            if ($q1_co2[2]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                         </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="" style="">Peer Influence</span></td>
                                                    <td>
                                                        <label class="">
                                                            <?php 
                                                            if ($q1_col[3]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="">
                                                           <?php 
                                                            if ($q1_co2[3]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                         </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="" style="">Inspired by a role model</span></td>
                                                    <td>
                                                        <label class="">
                                                            <?php 
                                                            if ($q1_col[4]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="">
                                                           <?php 
                                                            if ($q1_co2[4]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                         </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span style="">Strong passion for the profession</span></td>
                                                    <td>
                                                        <label class="">
                                                            <?php 
                                                            if ($q1_col[5]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="">
                                                           <?php 
                                                            if ($q1_co2[5]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                         </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="" style="">Prospect for immediate employment</span></td>
                                                    <td>
                                                        <label class="">
                                                            <?php 
                                                            if ($q1_col[6]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="">
                                                           <?php 
                                                            if ($q1_co2[6]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                         </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="" style="">Status or prestige of the profession</span></td>
                                                    <td>
                                                        <label class="">
                                                            <?php 
                                                            if ($q1_col[7]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="">
                                                           <?php 
                                                            if ($q1_co2[7]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                         </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span style="">Availability  of course offering in chosen institution</span></td>
                                                    <td>
                                                        <label class="">
                                                            <?php 
                                                            if ($q1_col[8]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="">
                                                           <?php 
                                                            if ($q1_co2[8]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                         </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="" style="">Prospect of career advancement</span></td>
                                                    <td>
                                                        <label class="">
                                                            <?php 
                                                            if ($q1_col[9]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="">
                                                           <?php 
                                                            if ($q1_co2[9]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                         </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span style="">Affordable for the family</span></td>
                                                    <td>
                                                        <label class="">
                                                            <?php 
                                                            if ($q1_col[10]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="">
                                                           <?php 
                                                            if ($q1_co2[10]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                         </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span style="">Prospect of attractive compensation</span></td>
                                                    <td>
                                                        <label class="">
                                                            <?php 
                                                            if ($q1_col[11]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="">
                                                           <?php 
                                                            if ($q1_co2[11]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                         </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span style="">Opportunity for employment abroad</span></td>
                                                    <td>
                                                        <label class="">
                                                            <?php 
                                                            if ($q1_col[12]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="">
                                                           <?php 
                                                            if ($q1_co2[12]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                         </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span style="">No particular choice or no better idea</span></td>
                                                    <td>
                                                        <label class="">
                                                            <?php 
                                                            if ($q1_col[13]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="">
                                                           <?php 
                                                            if ($q1_co2[13]) {
                                                                  echo "✓";
                                                            }
                                                            else
                                                            {
                                                                 echo "x";
                                                            }
                                                            ?>
                                                         </label>
                                                    </td>
                                                </tr>
                                                    <tr>
                                                    <td><span style="">Others, please specify</span></td>
                                                    <td>
                                                        <label class="">
                                                        <input type="text" name="" disabled="" class="form-control" value="<?php 
                                                        if ($q1_co2[14]) {
                                                              echo $q1_co2[14];
                                                        }
                                                        else
                                                        {
                                                             echo "empty";
                                                        }
                                                        ?>">
                                                        </label>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="sq_106" class="" style="display: inline-block; vertical-align: top; width: 100%;">
                                        <h5 class=""><span style="">2. What were your reasons for accepting the job?  You may check (/) more than one answer.</span></h5>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th><span class="" style=""></span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span style="">Salaries and benefits</span></td>
                                                    <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q2_col[0] == "no") {
                                                              echo "x";
                                                        }
                                                        else
                                                        {
                                                             echo "✓";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span style="">Career challenge</span></td>
                                                    <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q2_col[1] == "no") {
                                                              echo "x";
                                                        }
                                                        else
                                                        {
                                                             echo "✓";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span style="">Related to special skills</span></td>
                                                    <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q2_col[2] == "no") {
                                                              echo "x";
                                                        }
                                                        else
                                                        {
                                                             echo "✓";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span style="">Proximity to residence</span></td>
                                                    <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q2_col[3] == "no") {
                                                              echo "x";
                                                        }
                                                        else
                                                        {
                                                             echo "✓";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span style="">Other reason (s), please specify</span></td>
                                                    <td>
                                                        <label class="">
                                                        <input type="text" name="" disabled="" class="form-control" value="<?php 
                                                        if ($q2_col[4]) {
                                                              echo $q2_col[4];
                                                        }
                                                        else
                                                        {
                                                             echo "Empty";
                                                        }
                                                        ?>">
                                                        </label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="sq_106" class="" style="display: inline-block; vertical-align: top; width: 100%;">
                                        <h5 class=""><span style="">3. Job Level Position.</span></h5>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th><span class="" style="">Job Level</span></th>
                                                    <th><span class="" style="">First Job </span></th>
                                                    <th><span class="" style="">Current or Present Job</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span style="">Rank or Clerical</span></td>
                                                    <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q3_col[0]) {
                                                              echo "✓";
                                                        }
                                                        else
                                                        {
                                                             echo "x";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                     <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q3_co2[0]) {
                                                              echo "✓";
                                                        }
                                                        else
                                                        {
                                                             echo "x";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span style="">Professional, Technical or Supervisory</span></td>
                                                    <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q3_col[1]) {
                                                              echo "✓";
                                                        }
                                                        else
                                                        {
                                                             echo "x";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                     <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q3_co2[1]) {
                                                              echo "✓";
                                                        }
                                                        else
                                                        {
                                                             echo "x";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span style="">Managerial or Executive</span></td>
                                                    <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q3_col[2]) {
                                                              echo "✓";
                                                        }
                                                        else
                                                        {
                                                             echo "x";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                     <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q3_co2[2]) {
                                                              echo "✓";
                                                        }
                                                        else
                                                        {
                                                             echo "x";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span style="">Self-employed</span></td>
                                                    <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q3_col[3]) {
                                                              echo "✓";
                                                        }
                                                        else
                                                        {
                                                             echo "x";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                     <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q3_co2[3]) {
                                                              echo "✓";
                                                        }
                                                        else
                                                        {
                                                             echo "x";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                      <div id="sq_106" class="" style="display: inline-block; vertical-align: top; width: 100%;">
                                        <h5 class=""><span style="">4. What is your  initial gross monthly earning  in your  first job after college?</span></h5>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th><span class="" style=""></span></th>
                                                    <th><span class="" style=""></span></th>
                                                    <th><span class="" style=""></span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q4_col[0]) {
                                                              echo "✓ Below P 5,000.00";
                                                        }
                                                        else
                                                        {
                                                             echo "x Below P 5,000.00";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                     <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q4_col[3]) {
                                                              echo "✓ P 15,000.00 to less than P 20,000.00";
                                                        }
                                                        else
                                                        {
                                                             echo "x P 15,000.00 to less than P 20,000.00";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q4_col[1]) {
                                                              echo "✓ P 5,000.00 to less than P 10,000.00";
                                                        }
                                                        else
                                                        {
                                                             echo "x P 5,000.00 to less than P 10,000.00";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                     <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q4_col[4]) {
                                                              echo "✓ P 20,000.00 to less than P 25,000.00";
                                                        }
                                                        else
                                                        {
                                                             echo "x P 20,000.00 to less than P 25,000.00";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q4_col[2]) {
                                                              echo "✓ P 10,000.00 to less than P 15,000.00 ";
                                                        }
                                                        else
                                                        {
                                                             echo "x P 10,000.00 to less than P 15,000.00 ";
                                                        }
                                                        ?>
                                                        </label>
                                                        
                                                    </td>
                                                     <td>
                                                        <label class="">
                                                        <?php 
                                                        if ($q4_col[5]) {
                                                              echo "✓ P 25,000.00  and above";
                                                        }
                                                        else
                                                        {
                                                             echo "x P 25,000.00  and above";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                     <div id="sq_106" class="" style="display: inline-block; vertical-align: top; width: 100%;">
                                        <h5 class=""><span style="">5. Are you presently employed?</span></h5>

                                        
                                        <input type="text" class="form-control" name="" value="<?php echo $q5_data['ans']?>" disabled=""  style="width: 300px;">
                                        <?php 
                                        if ($q5_data['ans'] == "yes") {
                                          
                                           ?>
                                           <div id="Yes" class="x" style="display: inline-block; vertical-align: top; width: 100%;">
                                            <h5 class=""><span style="">6. Present Employment Status</span></h5>
                                             <input type="text" class="form-control" name="" value="<?php 
                                            
                                             if($q6_data['ans'] == "rop"){
                                                echo "Regular or Permanent";
                                             }
                                             else if($q6_data['ans'] == "temp"){
                                                echo "Temporary";
                                             }
                                             else if($q6_data['ans']== "cas"){
                                                echo "Casual";
                                             }
                                             else if($q6_data['ans']== "con"){
                                                echo "Contractual";
                                             }
                                             else if($q6_data['ans'] == "self"){
                                                echo "Self- employed";
                                             }
                                             else
                                             {

                                             }
                                             ?>" disabled=""  style="width: 300px;">

                                            </div>
                                            <div id="Yes" class="x" style="display: inline-block; vertical-align: top; width: 100%;">
                                        <h5 class=""><span style="">7. Current Job</span></h5>
                                        <input type="text" name="job" class="form-control" disabled="" value="<?php echo $q6_data['job']?>">
                                    </div>
                                           <?php
                                           $num = 8;
                                        }
                                        else
                                        {
                                           
                                             $num = 7;
                                        }
                                        ?>


                                    </div>

                                    <div id="sq_106" class="" style="display: inline-block; vertical-align: top; width: 100%;">
                                        <h5 class=""><span style=""><?php echo $num?>. Was the curriculum you had in college relevant to your first job?</span></h5>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th><span class="" style=""></span></th>
                                                    <th><span class="" style=""></span></th>
                                                    <th><span class="" style=""></span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php 
                                                    if ($q7_data['survey_ans'] == '1') 
                                                    {
                                                        ?>
                                                        <td>
                                                        <button type="button" class="btn btn-primary" >Yes</button>
                                                        </td>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <td>
                                                        <button type="button" class="btn btn-primary" >No</button>
                                                        </td>
                                                        <?php
                                                    }
                                                    ?>
                                                    
                                                     
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="id2"></div>

                                    <?php
                                        if ($q7_data['survey_ans'] == '1') {
                                          
                                       
                                     ?>
                                <div id="id1"  >
                                    
                                     <h5 class=""><span style=""><?php echo $num+1 ?>. what competencies learned in college did you find very useful in your first job?  You may check (/) more than one answer.</span></h5>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th><span class="" style=""></span></th>
                                                    <th><span class="" style=""></span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label>
                                                        <?php 
                                                        if ($q8_col[0]) {
                                                              echo "✓ Communication skills";
                                                        }
                                                        else
                                                        {
                                                             echo "x Communication skills";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label>
                                                        <?php 
                                                        if ($q8_col[1]) {
                                                              echo "✓ Human Relations skills";
                                                        }
                                                        else
                                                        {
                                                             echo "x Human Relations skills";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label>
                                                        <?php 
                                                        if ($q8_col[2]) {
                                                              echo "✓ Entrepreneurial skills";
                                                        }
                                                        else
                                                        {
                                                             echo "x Entrepreneurial skills";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label>
                                                        <?php 
                                                        if ($q8_col[3]) {
                                                              echo "✓ Problem-solving skills";
                                                        }
                                                        else
                                                        {
                                                             echo "x Problem-solving skills";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>
                                                        <?php 
                                                        if ($q8_col[4]) {
                                                              echo "✓ Critical Thinking skills";
                                                        }
                                                        else
                                                        {
                                                             echo "x Critical Thinking skills";
                                                        }
                                                        ?>
                                                        </label>
                                                    </td>

                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <label class="">
                                                           <span class="circle"></span><span class="check">Other skills, please specify </span></label>
                                                    </td>

                                                    <td>
                                                        <input id="" type="textbox" name="Other_q6" value="<?php echo($q8_col[5]) ?>" class="form-control" disabled ="">
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>

                                </div>
                                <?php 
                                 }
                                ?>
                                
                                    
                                    <!-- <div class="form-group">
                                <label class="control-label col-lg-2">Change Picture</label>
                                <div class="col-lg-4">
                                    <input type="password" class="validate[required] form-control" name="new_repassword" id="req" value="">
                                </div>
                            </div> -->
                                </form>
                            </div>
                            </head>

                            <body>

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

    </html>