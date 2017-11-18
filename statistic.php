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
                       <!--      <div class="col-sm-6" style="border:solid 1px;">
                                <div id="canvas-holder">
                                    <canvas id="chart-area" />
                                </div>
                            </div>
                            <div class="col-sm-6" style="border:solid 1px;">
                              <div id="canvas-holder">
                                    <canvas id="chart-area1" />
                                </div>
                            </div>
                            <div class="col-sm-6" style="border:solid 1px;">
                                <div id="canvas-holder">
                                    <canvas id="bar-chart" />
                                </div>
                            </div>
                            <div class="col-sm-6" style="border:solid 1px;">
                              <div id="canvas-holder">
                                    <canvas id="bar-chart1" />
                                </div>
                            </div>
                            <div class="col-sm-6" style="border:solid 1px;">
                              <div id="canvas-holder">
                                    <canvas id="chart-line" />
                                </div>
                            </div> -->
                            <table id=""  class="table table-bordered table-advance table-hover  dataTable">
                                  <thead>
                                    <tr>
                                      <th><h3>Statistic Report</h3></th>
                                      <th class="col-sm-2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ACCOUNT REGISTER</td>
                                        <td>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary">Graphs</button>
                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">
                                             <li><a href="statistic_piegraph.php?category=accountregister" target="_blank">PIE CHART</a></li>
                                            <li><a href="statistic_bargraph.php?category=accountregister"  target="_blank">BAR GRAPH</a></li>
                                            <li><a href="statistic_linegraph.php?category=accountregister"  target="_blank">LINE GRAPH</a></li>
                                          </ul>
                                        </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ACCOUNT UNREGISTER</td>
                                        <td>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary">Graphs</button>
                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">
                                             <li><a href="statistic_piegraph.php?category=accountunregister" target="_blank">PIE CHART</a></li>
                                            <li><a href="statistic_bargraph.php?category=accountunregister"  target="_blank">BAR GRAPH</a></li>
                                            <li><a href="statistic_linegraph.php?category=accountunregister"  target="_blank">LINE GRAPH</a></li>
                                          </ul>
                                        </div>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>ACCEPTING JOB REASON</td>
                                        <td>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary">Graphs</button>
                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">
                                             <li><a href="statistic_piegraph.php?category=acceptingjobreason" target="_blank">PIE CHART</a></li>
                                            <li><a href="statistic_bargraph.php?category=acceptingjobreason"  target="_blank">BAR GRAPH</a></li>
                                            <li><a href="statistic_linegraph.php?category=acceptingjobreason"  target="_blank">LINE GRAPH</a></li>
                                          </ul>
                                        </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>COLLEGE CURRICULUM  RELEVANT TO YOUR JOB</td>
                                        <td>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary">Graphs</button>
                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">
                                             <li><a href="statistic_piegraph.php?category=relevantjob" target="_blank">PIE CHART</a></li>
                                            <li><a href="statistic_bargraph.php?category=relevantjob"  target="_blank">BAR GRAPH</a></li>
                                            <li><a href="statistic_linegraph.php?category=relevantjob"  target="_blank">LINE GRAPH</a></li>
                                          </ul>
                                        </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>INITIAL GROSS MONTHLY EARNING IN YOUR FIRST JOB</td>
                                        <td>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary">Graphs</button>
                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">
                                             <li><a href="statistic_piegraph.php?category=grossearning" target="_blank">PIE CHART</a></li>
                                            <li><a href="statistic_bargraph.php?category=grossearning"  target="_blank">BAR GRAPH</a></li>
                                            <li><a href="statistic_linegraph.php?category=grossearning"  target="_blank">LINE GRAPH</a></li>
                                          </ul>
                                        </div>
                                        </td>
                                    </tr>
                                   
                                    <tr>
                                        <td>JOB LEVEL POSITION</td>
                                        <td>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary">Graphs</button>
                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">
                                             <li><a href="statistic_piegraph.php?category=joblevelpos" target="_blank">PIE CHART</a></li>
                                            <li><a href="statistic_bargraph.php?category=joblevelpos"  target="_blank">BAR GRAPH</a></li>
                                            <li><a href="statistic_linegraph.php?category=joblevelpos"  target="_blank">LINE GRAPH</a></li>
                                          </ul>
                                        </div>
                                        </td>
                                    </tr>
                                      <tr>
                                        <td>PRESENT EMPLOYEE STATUS</td>
                                        <td>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary">Graphs</button>
                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">
                                             <li><a href="statistic_piegraph.php?category=empystat" target="_blank">PIE CHART</a></li>
                                            <li><a href="statistic_bargraph.php?category=empystat"  target="_blank">BAR GRAPH</a></li>
                                            <li><a href="statistic_linegraph.php?category=empystat"  target="_blank">LINE GRAPH</a></li>
                                          </ul>
                                        </div>
                                        </td>
                                    </tr>
                                       <tr>
                                        <td>PURSUING DEGREE REASON</td>
                                        <td>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary">Graphs</button>
                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">
                                            <li><a href="statistic_piegraph.php?category=purdegres" target="_blank">PIE CHART</a></li>
                                            <li><a href="statistic_bargraph.php?category=purdegres"  target="_blank">BAR GRAPH</a></li>
                                            <li><a href="statistic_linegraph.php?category=purdegres"  target="_blank">LINE GRAPH</a></li>
                                          </ul>
                                        </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>UNEMPLOYED REASON</td>
                                        <td>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary">Graphs</button>
                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">
                                             <li><a href="statistic_piegraph.php?category=unres" target="_blank">PIE CHART</a></li>
                                            <li><a href="statistic_bargraph.php?category=unres"  target="_blank">BAR GRAPH</a></li>
                                            <li><a href="statistic_linegraph.php?category=unres"  target="_blank">LINE GRAPH</a></li>
                                          </ul>
                                        </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>USEFUL COMPETENCIES LEARNED FOR YOUR JOB</td>
                                        <td>
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary">Graphs</button>
                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">
                                             <li><a href="statistic_piegraph.php?category=uclfyj" target="_blank">PIE CHART</a></li>
                                            <li><a href="statistic_bargraph.php?category=uclfyj"  target="_blank">BAR GRAPH</a></li>
                                            <li><a href="statistic_linegraph.php?category=uclfyj"  target="_blank">LINE GRAPH</a></li>
                                          </ul>
                                        </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                            
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

</html>
