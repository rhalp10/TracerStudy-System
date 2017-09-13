<?php 
include('session.php');
include('db.php');
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

//REGISTER ACCOUNT QUERY AND PARSING
$totalresult = mysqli_query($con,"SELECT * FROM `user_account`");
$totalAcc_register = mysqli_num_rows($totalresult);

$totalresult_ofStudent = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_status` = 'register'");
$totalAcc_register_asStudent = mysqli_num_rows($totalresult_ofStudent);

$totalresult_ofTeacher = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE `teacher_status` = 'register'");
$totalAcc_register_asTeacher = mysqli_num_rows($totalresult_ofTeacher);

$totalresult_ofAdmin = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE `admin_status` = 'register'");
$totalAcc_register_asAdmin = mysqli_num_rows($totalresult_ofAdmin);

$StudentPercentage=($totalAcc_register_asStudent / $totalAcc_register) * 100; 
$TeacherPercentage=($totalAcc_register_asTeacher / $totalAcc_register) * 100; 
$AdminPercentage=($totalAcc_register_asAdmin / $totalAcc_register) * 100; 
//parsing student php to j_script value
$StudentPercentage_RegisterJS="$totalAcc_register_asStudent";
$js_outStudent_Register = json_encode($StudentPercentage_RegisterJS);
//parsing teacher php to j_script value
$TeacherPercentage_RegisterJS="$totalAcc_register_asTeacher";
$js_outTeacher_Register = json_encode($TeacherPercentage_RegisterJS);
//parsing admin php to j_script value
$AdminPercentage_RegisterJS="$totalAcc_register_asAdmin";
$js_outAdmin_Register = json_encode($AdminPercentage_RegisterJS);

//END OF REGISTER ACCOUNT QUERY AND PARSING



$totalresult_ofStudent_unregister = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_status` = 'unregister'");
$totalAcc_unregister_asStudent = mysqli_num_rows($totalresult_ofStudent_unregister);

$totalresult_ofTeacher_unregister = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE `teacher_status` = 'unregister'");
$totalAcc_unregister_asTeacher = mysqli_num_rows($totalresult_ofTeacher_unregister);

$totalresult_ofAdmin_unregister = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE `admin_status` = 'unregister'");
$totalAcc_unregister_asAdmin = mysqli_num_rows($totalresult_ofAdmin_unregister);

$totalAcc_unregister = ($totalAcc_unregister_asStudent + $totalAcc_unregister_asTeacher + $totalAcc_unregister_asAdmin);

$StudentPercentage_unregister = $totalAcc_unregister_asStudent; 
$TeacherPercentage_unregister = $totalAcc_unregister_asTeacher; 
$AdminPercentage_unregister = $totalAcc_unregister_asAdmin; 

$StudentPercentage_UnRegisterJS="$StudentPercentage_unregister";
$js_outStudent_UnRegister = json_encode($StudentPercentage_UnRegisterJS);

$TeacherPercentage_UnRegisterJS="$TeacherPercentage_unregister";
$js_outTeacher_UnRegister = json_encode($TeacherPercentage_UnRegisterJS);

$AdminPercentage_UnRegisterJS="$AdminPercentage_unregister";
$js_outAdmin_UnRegister = json_encode($AdminPercentage_UnRegisterJS);






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
                              <li class="breadcrumb-item active"> Forum</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">
                            <div class="col-sm-6" style="border:solid 1px;">
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
                            </div>
                            
                        </div>

                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->

                    <div id="right" class="onoffcanvas is-right is-fixed bg-light" aria-expanded=false>
                        <a class="onoffcanvas-toggler" href="#right" data-toggle=onoffcanvas aria-expanded=false></a>
                        <br>
                        <br>
                        <div class="well well-small dark">
                            <ul class="list-unstyled">
                                <li>Visitor <span class="inlinesparkline pull-right">1,4,4,7,5,9,10</span></li>
                                <li>Online Visitor <span class="dynamicsparkline pull-right">Loading..</span></li>
                                <li>Popularity <span class="dynamicbar pull-right">Loading..</span></li>
                                <li>New Users <span class="inlinebar pull-right">1,3,4,5,3,5</span></li>
                            </ul>
                        </div>
                        <!-- /.well well-small -->
                        <!-- .well well-small -->
                        <div class="well well-small dark">
                            <button class="btn btn-block">Default</button>
                            <button class="btn btn-primary btn-block">Primary</button>
                            <button class="btn btn-info btn-block">Info</button>
                            <button class="btn btn-success btn-block">Success</button>
                            <button class="btn btn-danger btn-block">Danger</button>
                            <button class="btn btn-warning btn-block">Warning</button>
                            <button class="btn btn-inverse btn-block">Inverse</button>
                            <button class="btn btn-metis-1 btn-block">btn-metis-1</button>
                            <button class="btn btn-metis-2 btn-block">btn-metis-2</button>
                            <button class="btn btn-metis-3 btn-block">btn-metis-3</button>
                            <button class="btn btn-metis-4 btn-block">btn-metis-4</button>
                            <button class="btn btn-metis-5 btn-block">btn-metis-5</button>
                            <button class="btn btn-metis-6 btn-block">btn-metis-6</button>
                        </div>
                        <!-- /.well well-small -->
                        <!-- .well well-small -->
                        <div class="well well-small dark">
                            <span>Default</span><span class="pull-right"><small>20%</small></span>
                        
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-info" style="width: 20%"></div>
                            </div>
                            <span>Success</span><span class="pull-right"><small>40%</small></span>
                        
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-success" style="width: 40%"></div>
                            </div>
                            <span>warning</span><span class="pull-right"><small>60%</small></span>
                        
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
                            </div>
                            <span>Danger</span><span class="pull-right"><small>80%</small></span>
                        
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /#right -->
            </div>

            <!-- /#wrap -->
            <?php include('footer.php');?>
            <!-- /#footer -->
            <?php include ('script.php');?>
            <script>
    // REGISTERED VALUE Declaration of variable 
    var student_Percent = <?php echo $js_outStudent_Register; ?>;
    var Teacher_Percent = <?php echo $js_outTeacher_Register; ?>;
    var Admin_Percent = <?php echo $js_outAdmin_Register; ?>;
    // REGISTERED VALUE Parsing of variable
    var student_Parse = parseInt(student_Percent);
    var teacher_Parse = parseInt(Teacher_Percent);
    var admin_Parse = parseInt(Admin_Percent);
    //REGISTERED VALUE Parsed Data passed on variable
    var a = student_Parse;
    var b = teacher_Parse;
    var c = admin_Parse;
    var total_register = a+b+c;
    //UNREGISTERD VALUE Declaration of variable
    var student_Percent_unregister = <?php echo $js_outStudent_UnRegister; ?>;
    var Teacher_Percent_unregister = <?php echo $js_outTeacher_UnRegister; ?>;
    var Admin_Percent_unregister = <?php echo $js_outAdmin_UnRegister; ?>;
    //UNREGISTERD VALUE Parsing of variable
    var student_Parse_unregister = parseInt(student_Percent_unregister);
    var teacher_Parse_unregister = parseInt(Teacher_Percent_unregister);
    var admin_Parse_unregistere = parseInt(Admin_Percent_unregister);
    //UNREGISTERD VALUE Parsed Data passed on variable
    var d = student_Parse_unregister;
    var e = teacher_Parse_unregister;
    var f = admin_Parse_unregistere;

    var total_unregister = d+e+f;



    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    a,
                    b,
                    c
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.blue,
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "Student ",
                "Teacher ",
                "Admin ",

            ]
        },
        options: {
           title: {
             display: true,
             text: 'Total Account Register: '+total_register
           }
         }
    };
    var config1 = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    d,
                    e,
                    f
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.blue,
                ],
                label: 'Dataset 2'
            }],
            labels: [
                "Student ",
                "Teacher ",
                "Admin "
            ]
        },
        options: {
           title: {
             display: true,
             text: 'Total Account Unregister: '+total_unregister
           }
         }
    };

        var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var config2 = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "Unregister",
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [
                        a,
                        b,
                        c
                    ],
                    fill: false,
                }, {
                    label: "Register",
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [
                        d,
                        e+1,
                        f,
                    ],
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Account Record Line Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                }
            }
        };
    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);

        var ctx1 = document.getElementById("chart-area1").getContext("2d");
        window.myPie = new Chart(ctx1, config1);

            var ctx2 = document.getElementById("chart-line").getContext("2d");
            window.myLine = new Chart(ctx2, config2);
    };

new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Student", "Teacher", "Admin"],
      datasets: [
        {
          label: "Population",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
          data: [a,b,c]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Population of Registered Account'
      }
    }
});
new Chart(document.getElementById("bar-chart1"), {
    type: 'bar',
    data: {
      labels: ["Student", "Teacher", "Admin"],
      datasets: [
        {
          label: "Population",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
          data: [d,e,f]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Population of Unregistered Account'
      }
    }
});







    </script>
        </body>

</html>
