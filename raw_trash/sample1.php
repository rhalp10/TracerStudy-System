<?php 
include('session.php');
include('db.php');

$survey_maxcount_qry = mysqli_query($con,"SELECT survey_maxattemp FROM `survey_maxcount` WHERE survey_ownerID = '$login_id'");
$survey_maxattemp = mysqli_fetch_array($survey_maxcount_qry);
$page = 'statistic';
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

?><!DOCTYPE html>
<html>  
  <head>
    <?php include('meta.php');?>
    <?php include('style_css.php');?>
    <title>Statistic</title>
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
                              <li class="breadcrumb-item active"> Statistic</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">
                  
<script type="text/javascript">
function chk(){
    var category = document.getElementByID('category').value;
    var graph = document.getElementByID('graph').value;
    var dataString = 'category='+ category+"&graph="+graph;
    $.ajax({
        type: "POST",
        // url: "z.php"
        data: dataString,
        cache: false,
        success: function(data){
            $('#zz').html(data);
        }

    });
    return false;
}
</script>

<h3>Statistic Report</h3>
<HR>
    <form class="form-inline ">
     <div class="form-group">
       <select class="form-control input-sm" id="category" name="category">
            <option value="accountregister" >ACCOUNT REGISTER</option>
            <option value="accountununregister" >ACCOUNT UNREGISTER</option>
            <option value="acceptingjobreason" >ACCEPTING JOB REASON</option>
            <option value="relevantjob" >COLLEGE CURRICULUM RELEVANT TO YOUR JOB</option>
            <option value="grossearning" >INITIAL GROSS MONTHLY EARNING IN YOUR FIRST JOB</option>
            <option value="joblevelpos" >JOB LEVEL POSITION</option>
            <option value="empystat" >PRESENT EMPLOYEE STATUS</option>
            <option value="purdegres" >PURSUING DEGREE REASON</option>
            <option value="unres" >UNEMPLOYED REASON</option>
            <option value="uclfyj" >USEFUL COMPETENCIES LEARNED FOR YOUR JOB</option>
        </select>
    </div>
    <div class="form-group">
        <select class="form-control input-sm" id="graph" name="graph" >
            <option value="pie" >PIE</option>
            <option value="bar" >BAR</option>
            <option value="line" >LINE</option>
        </select>
    </div>
    <div class="form-group">
        <input class="form-control" type="date" name="date" >
    </div>
    <div class="form-group">
        <input class="btn btn-primary pull-right" type="submit" value="submit" onclick="return chk()">
    </div>
     <div class="form-group">
        <a class="btn btn-primary">Print</a>
    </div>
    </form>
<?php 
ini_set('error_reporting', E_ERROR);
$category = $_GET['category'];
if ($category = 'accountregister') {
    include('json_encode_accountregister.php');
}
else if ($category = 'accountununregister') {
    include('json_encode_accountununregister.php');
}
else if ($category = 'acceptingjobreason') {
    include('json_encode_acceptingjobreason.php');
}
else if ($category = 'relevantjob') {
    include('json_encode_relevantjob.php');
}
else if ($category = 'grossearning') {
    include('json_encode_grossearning.php');
}
else if ($category = 'joblevelpos') {
    include('json_encode_joblevelpos.php');
}
else if ($category = 'empystat') {
    include('json_encode_empystat.php');
}
else if ($category = 'purdegres') {
    include('json_encode_purdegres.php');
}
else if ($category = 'unres') {
    include('json_encode_unres.php');
}
else if ($category = 'uclfyj') {
    include('json_encode_uclfyj.php');
}
else
{

}


$graph = $_GET['graph'];
?>
<HR>
                             <div class="col-sm-12" style="border:solid 1px;">
                                <div id="canvas-holder">
                                   
                                    <?php 
                                    if ($graph == "pie") {
                                        ?>
                                        <canvas id="chart-area" />
                                       <?php
                                    }
                                    if ($graph == "bar") {
                                       ?>
                                        <canvas id="bar-chart" />
                                       <?php
                                    }
                                    if ($graph == "line") {
                                       ?>
                                       <canvas id="chart-line" />
                                       <?php
                                    }
                                    ?>
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
            <?php
            if ($category = 'accountregister') {
                 include('jsript_graph_accountregister.php');
             }
             else if ($category = 'accountununregister') {
                 include('jsript_graph_accountununregister.php');
             }
             else if ($category = 'acceptingjobreason') {
                 include('jsript_graph_acceptingjobreason.php');
             }
             else if ($category = 'relevantjob') {
                 include('jsript_graph_relevantjob.php');
             }
             else if ($category = 'grossearning') {
                 include('jsript_graph_grossearning.php');
             }
             else if ($category = 'joblevelpos') {
                 include('jsript_graph_joblevelpos.php');
             }
             else if ($category = 'empystat') {
                 include('jsript_graph_empystat.php');
             }
             else if ($category = 'purdegres') {
                 include('jsript_graph_purdegres.php');
             }
             else if ($category = 'unres') {
                 include('jsript_graph_unres.php');
             }
             else if ($category = 'uclfyj') {
                 include('jsript_graph_uclfyj.php');
             }
             else
             {

             }
            ?>
            
        </body>

</html>
