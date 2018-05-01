<?php 
include('session.php');
include('db.php');


$survey_maxcount_qry = mysqli_query($con,"SELECT * FROM `survey_maxcount` WHERE survey_ownerID = '$login_id'");
$survey_maxattemp = mysqli_fetch_array($survey_maxcount_qry);

if ($survey_maxattemp['survey_ownerID'] == $login_id) {
    //getting latest date base on server PC
    $date_now = date("Y/m/d") ;
    $year_now = date( "Y", strtotime( "$date_now"));
     $date_now;
     $survey_maxattemp['survey_maxattemp'];
    if($survey_maxattemp['survey_maxattemp'] <= 0)
    {
       header('Location: surveyview.php');
    }
}
else {
    mysqli_query($con,"INSERT INTO `survey_maxcount` (`survey_ownerID`, `survey_maxattemp`) VALUES ('$login_id', '2')");
    $last_id = mysqli_insert_id($con);
    $survey_maxcount_qry = mysqli_query($con,"SELECT survey_maxattemp FROM `survey_maxcount` WHERE survey_id = '$last_id'");
    
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
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active"> Survey Questionaire</li>
                                </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="box" >
                                      <header style="padding:5px;">
                                     <?php 
$sql1 = mysqli_query($con,"SELECT * FROM `survey` WHERE visibility = 1");
$title = mysqli_fetch_array($sql1);
$sid = $title[0];
$sql = mysqli_query($con,"SELECT * FROM `survey_questionnaire` WHERE survey_ID = $sid");

$i = 1;


                                ?>
                                   <h1><?php echo $title['1']?></h1>
                                      </header>

                               <form class="" style="padding:15px;" method="POST" action="action/survey" id="form">
                                     <?php 
                                      while ($data = mysqli_fetch_array($sql)){
                                       $i; 
                                      $q_ID = $data[0];
                                      $sql1 = mysqli_query($con,"SELECT * FROM `survey_anweroptions` WHERE survey_qID =  $q_ID");
                                     
                                      $question =  $data['question'];
                                      $id = "";
                                      ?>

                                      <div class="form-group">
                                            <label><?php echo $i.".) ".$question?></label>
                                            <select class="form-control billions" name="answer[]" id="q<?php echo $i?>">
                                            <?php 
                                            while( $data1 = mysqli_fetch_array($sql1)){
                                            if ($data1[2] == "other(s)") {
                                               $x="other";
                                                $id= $data1[0];
                                            }
                                            else{
                                                 $x="$data1[0]";
                                            }
                                            ?>

                                             <option value="<?php echo $x?>"><?php echo $data1[2]?></option>
                                            <?php
                                            }
                                           ?>
                                            
                                            </select>
                                      </div>
                                      <div class="form-group" id="q<?php echo $i?>i" style="display:none;">
                                            <label for="">Other</label>
                                            <input type="text" class="form-control" name="optionz[]">

                                      <input type="hidden" class="form-control" name="opID[]" value="<?php echo $id?>">
                                      </div>
                                        
                                      <?php
                                      $i++;
                                    }
                                      ?>
                                      <button type="submit" class="" name="submit-survey">Submit</button>
                               </form>
                                  </div>
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
            <script>
                $('.billions').each(function() {
                    $(this).change(function(){
                    if($(this).val() == 'other'){
                        $('#'+$(this).attr('id')+'i').css("display","block");
                    }else{
                        $('#'+$(this).attr('id')+'i').css("display","none");
                    }
                    });
                });
            </script>
                </body>

    </html>

 