
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
     function EncodeParsing($parse){
        $j_encode = json_encode($parse);
        return $j_encode;
      }
     function DataCount($count){

        $total_count = mysqli_num_rows($count);
        return $total_count;
      }
     function DataCountPercent($countVal, $totalCount){
      $dataCount_Percent = (($countVal / $totalCount) * 100);
    return $dataCount_Percent;
    }   

     function stackValue($val)
      {
          $this->value += $val;
      }
     
     function getSum()
      {
          return $this->value . "<br />";
      }
     function addtoString($str, $item) {
    $parts = explode(',', $str);
    $parts[] = $item;

    return implode(',', $parts);
    }
 

   
    }
$json = new json;
$saf = "SELECT * FROM";

$totalresult_ofStudent = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_status` = 'register'");
$totalresult_ofTeacher = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE `teacher_status` = 'register'");
$totalresult_ofAdmin = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE `admin_status` = 'register'");

$totalAcc_register_asStudent = $json->DataCount($totalresult_ofStudent);
$totalAcc_register_asTeacher = $json->DataCount($totalresult_ofTeacher);
$totalAcc_register_asAdmin = $json->DataCount($totalresult_ofAdmin);




// echo "<H1>4. )INITIAL GROSS MONTHLY EARNING IN YOUR FIRST JOB</H1>";
//general count of question 4
$table = "`survey_question4`";
$row = "`row1`";
$col = "`col1`";
$totalqa4 = mysqli_query($con,$saf." `survey_question4`");
$totalqa4_rc_1_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '1' AND ".$col." = '1'");
$totalqa4_rc_2_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '2' AND ".$col." = '1'");
$totalqa4_rc_3_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '3' AND ".$col." = '1'");
$totalqa4_rc_4_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '4' AND ".$col." = '1'");
$totalqa4_rc_5_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '5' AND ".$col." = '1'");
$totalqa4_rc_6_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '6' AND ".$col." = '1'");

$totalqa4_rc_1_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '1' AND ".$col." = ''");
$totalqa4_rc_2_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '2' AND ".$col." = ''");
$totalqa4_rc_3_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '3' AND ".$col." = ''");
$totalqa4_rc_4_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '4' AND ".$col." = ''");
$totalqa4_rc_5_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '5' AND ".$col." = ''");
$totalqa4_rc_6_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '6' AND ".$col." = ''");

$countqa4 = $json->DataCount($totalqa4);
$count_total_qa4_1_true = $json->DataCount($totalqa4_rc_1_true);
$count_total_qa4_2_true = $json->DataCount($totalqa4_rc_2_true);
$count_total_qa4_3_true = $json->DataCount($totalqa4_rc_3_true);
$count_total_qa4_4_true = $json->DataCount($totalqa4_rc_4_true);
$count_total_qa4_5_true = $json->DataCount($totalqa4_rc_5_true);
$count_total_qa4_6_true = $json->DataCount($totalqa4_rc_6_true);

$count_total_qa4_1_false = $json->DataCount($totalqa4_rc_1_false);
$count_total_qa4_2_false = $json->DataCount($totalqa4_rc_2_false);
$count_total_qa4_3_false = $json->DataCount($totalqa4_rc_3_false);
$count_total_qa4_4_false = $json->DataCount($totalqa4_rc_4_false);
$count_total_qa4_5_false = $json->DataCount($totalqa4_rc_5_false);
$count_total_qa4_6_false = $json->DataCount($totalqa4_rc_6_false);
// echo "all question number 4 checked answered <br>";
$total_qa4_1_true_percent = $json->DataCountPercent($count_total_qa4_1_true,$countqa4);
$total_qa4_2_true_percent = $json->DataCountPercent($count_total_qa4_2_true,$countqa4);
$total_qa4_3_true_percent = $json->DataCountPercent($count_total_qa4_3_true,$countqa4);
$total_qa4_4_true_percent = $json->DataCountPercent($count_total_qa4_4_true,$countqa4);
$total_qa4_5_true_percent = $json->DataCountPercent($count_total_qa4_5_true,$countqa4);
$total_qa4_6_true_percent = $json->DataCountPercent($count_total_qa4_6_true,$countqa4);


$total_qa4_1_false_percent = $json->DataCountPercent($count_total_qa4_1_false,$countqa4);
$total_qa4_2_false_percent = $json->DataCountPercent($count_total_qa4_2_false,$countqa4);
$total_qa4_3_false_percent = $json->DataCountPercent($count_total_qa4_3_false,$countqa4);
$total_qa4_4_false_percent = $json->DataCountPercent($count_total_qa4_4_false,$countqa4);
$total_qa4_5_false_percent = $json->DataCountPercent($count_total_qa4_5_false,$countqa4);
$total_qa4_6_false_percent = $json->DataCountPercent($count_total_qa4_6_false,$countqa4);
// echo "count: ".$count_total_qa4_1_true."/".$total_qa4_1_true_percent." %<br>";
// echo "count: ".$count_total_qa4_2_true."/".$total_qa4_2_true_percent." %<br>";
// echo "count: ".$count_total_qa4_3_true."/".$total_qa4_3_true_percent." %<br>";
// echo "count: ".$count_total_qa4_4_true."/".$total_qa4_4_true_percent." %<br>";
// echo "count: ".$count_total_qa4_5_true."/".$total_qa4_5_true_percent." %<br>";
// echo "count: ".$count_total_qa4_6_true."/".$total_qa4_6_true_percent." %<br>";

// echo "count: ".$count_total_qa4_1_false."/".$total_qa4_1_false_percent." %<br>";
// echo "count: ".$count_total_qa4_2_false."/".$total_qa4_2_false_percent." %<br>";
// echo "count: ".$count_total_qa4_3_false."/".$total_qa4_3_false_percent." %<br>";
// echo "count: ".$count_total_qa4_4_false."/".$total_qa4_4_false_percent." %<br>";
// echo "count: ".$count_total_qa4_5_false."/".$total_qa4_5_false_percent." %<br>";
// echo "count: ".$count_total_qa4_6_false."/".$total_qa4_6_false_percent." %<br>";




$js_out_total_qa4_1_true_percent = $json->EncodeParsing($total_qa4_1_true_percent);
$js_out_total_qa4_2_true_percent = $json->EncodeParsing($total_qa4_2_true_percent);
$js_out_total_qa4_3_true_percent = $json->EncodeParsing($total_qa4_3_true_percent);
$js_out_total_qa4_4_true_percent = $json->EncodeParsing($total_qa4_4_true_percent);
$js_out_total_qa4_5_true_percent = $json->EncodeParsing($total_qa4_5_true_percent);
$js_out_total_qa4_6_true_percent = $json->EncodeParsing($total_qa4_6_true_percent);

$js_out_total_qa4_1_false_percent = $json->EncodeParsing($total_qa4_1_false_percent);
$js_out_total_qa4_2_false_percent = $json->EncodeParsing($total_qa4_2_false_percent);
$js_out_total_qa4_3_false_percent = $json->EncodeParsing($total_qa4_3_false_percent);
$js_out_total_qa4_4_false_percent = $json->EncodeParsing($total_qa4_4_false_percent);
$js_out_total_qa4_5_false_percent = $json->EncodeParsing($total_qa4_5_false_percent);
$js_out_total_qa4_6_false_percent = $json->EncodeParsing($total_qa4_6_false_percent);


$totalpercent_a4 = ($total_qa4_1_true_percent +
$total_qa4_2_true_percent +
$total_qa4_3_true_percent +
$total_qa4_4_true_percent +
$total_qa4_5_true_percent +
$total_qa4_6_true_percent +
$total_qa4_1_false_percent +
$total_qa4_2_false_percent +
$total_qa4_3_false_percent +
$total_qa4_4_false_percent +
$total_qa4_5_false_percent +
$total_qa4_6_false_percent);
// echo "<br>TOTAL PERCENT : ".$totalpercent_a4."%<br>";
// echo "<br><hr><br>";

// require_once(empty($_REQUEST['date'])) {
//      header('Location: z4.php'); 
// }

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

                    <div class="outer" id="outer">
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

                            <center><h1>INITIAL GROSS MONTHLY EARNING IN YOUR FIRST JOB</h1></center>
                            <hr>
<form class="form-inline" id="print_form">
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
        <input class="form-control" id="month" type="month" name="date">
    </div>
    <div class="form-group">
        <input class="btn btn-primary pull-right" type="submit" value="submit" onclick="return chk()">
    </div>
    <style type="text/css">
@media print {
  *  { display: none; }   /* Hide everything ... */
p {page-break-inside: avoid;}
  #printDiv1 { display: block; visibility: visible;}     /* ... except the required div */
}
/* print media */

    </style>
    <script type="text/javascript">
        function printDiv(){
            window.print();
        }
//         function PrintContent() {
//       var DocumentContainer = document.getElementById('printDiv');
//     var WindowObject = window.open('', 'PrintWindow', 'width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes');
//     WindowObject.document.writeln(DocumentContainer.innerHTML);
//     WindowObject.document.close();
//     WindowObject.focus();
//     WindowObject.print();
//     WindowObject.close();
// }
    </script>
     <div class="form-group">
        <a class="btn btn-primary" onclick="javascript:printDiv()">Print</a>
    </div>
    </form>
                           <div  id="printDiv" >
                                <div id="canvas-holder">
                                    <canvas id="chart-area" />
                                </div>
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
            <script>
    // REGISTERED VALUE Declaration of variable 


    var js_out_total_qa4_1_true_percent = <?php echo $js_out_total_qa4_1_true_percent; ?>;
    var js_out_total_qa4_2_true_percent = <?php echo $js_out_total_qa4_2_true_percent; ?>;
    var js_out_total_qa4_3_true_percent = <?php echo $js_out_total_qa4_3_true_percent; ?>;
    var js_out_total_qa4_4_true_percent = <?php echo $js_out_total_qa4_4_true_percent; ?>;
    var js_out_total_qa4_5_true_percent = <?php echo $js_out_total_qa4_5_true_percent; ?>;
    var js_out_total_qa4_6_true_percent = <?php echo $js_out_total_qa4_6_true_percent; ?>;

    var js_out_total_qa4_1_false_percent = <?php echo $js_out_total_qa4_1_false_percent; ?>;
    var js_out_total_qa4_2_false_percent = <?php echo $js_out_total_qa4_2_false_percent; ?>;
    var js_out_total_qa4_3_false_percent = <?php echo $js_out_total_qa4_3_false_percent; ?>;
    var js_out_total_qa4_4_false_percent = <?php echo $js_out_total_qa4_4_false_percent; ?>;
    var js_out_total_qa4_5_false_percent = <?php echo $js_out_total_qa4_5_false_percent; ?>;
    var js_out_total_qa4_6_false_percent = <?php echo $js_out_total_qa4_6_false_percent; ?>;
    // REGISTERED VALUE Parsing of variable
    var js_out_total_qa4_1_true_parse = parseFloat(js_out_total_qa4_1_true_percent);
    var js_out_total_qa4_2_true_parse = parseFloat(js_out_total_qa4_2_true_percent);
    var js_out_total_qa4_3_true_parse = parseFloat(js_out_total_qa4_3_true_percent);
    var js_out_total_qa4_4_true_parse = parseFloat(js_out_total_qa4_4_true_percent);
    var js_out_total_qa4_5_true_parse = parseFloat(js_out_total_qa4_5_true_percent);
    var js_out_total_qa4_6_true_parse = parseFloat(js_out_total_qa4_6_true_percent);

    var js_out_total_qa4_1_false_parse = parseFloat(js_out_total_qa4_1_false_percent);
    var js_out_total_qa4_2_false_parse = parseFloat(js_out_total_qa4_2_false_percent);
    var js_out_total_qa4_3_false_parse = parseFloat(js_out_total_qa4_3_false_percent);
    var js_out_total_qa4_4_false_parse = parseFloat(js_out_total_qa4_4_false_percent);
    var js_out_total_qa4_5_false_parse = parseFloat(js_out_total_qa4_5_false_percent);
    var js_out_total_qa4_6_false_parse = parseFloat(js_out_total_qa4_6_false_percent);
    //REGISTERED VALUE Parsed Data passed on variable
    
    var a = js_out_total_qa4_1_true_parse;
    var b = js_out_total_qa4_2_true_parse;
    var c = js_out_total_qa4_3_true_parse;
    var d = js_out_total_qa4_4_true_parse;
    var e = js_out_total_qa4_5_true_parse;
    var f = js_out_total_qa4_6_true_parse;

    var aa = js_out_total_qa4_1_false_parse;
    var bb = js_out_total_qa4_2_false_parse;
    var cc = js_out_total_qa4_3_false_parse;
    var dd = js_out_total_qa4_4_false_parse;
    var ee = js_out_total_qa4_5_false_parse;
    var ff = js_out_total_qa4_6_false_parse;
   
    var total = a+b+c+d+e+f+aa+bb+cc+dd+ee+ff;
   


    var config = {
        type: 'pie',
        data: {
            labels: [
                "Below 5k Answered",
                "5k less than 10k Answered",
                "10k less than 15k Answered",
                "15k less than 20k Answered",
                "20k less than 25k Answered",
                "25k and above Answered",
                "5k less than 10k Unaswered",
                "5k less than 10k Unaswered",
                "10k less than 15k Unaswered",
                "15k less than 20k Unaswered",
                "20k less than 25k Unaswered",
                "25k and above Unaswered",

            ],
            datasets: [{
                data: [
                    parseInt(a),
                    parseInt(b),
                    parseInt(c),
                    parseInt(d),
                    parseInt(e),
                    parseInt(f),
                    parseInt(aa),
                    parseInt(bb),
                    parseInt(cc),
                    parseInt(dd),
                    parseInt(ee),
                    parseInt(ff)
                ],
                backgroundColor: [
                    'rgb(255, 0, 0)',
                    'rgb(255, 64, 0)',
                    'rgb(255, 128, 0)',
                    'rgb(255, 191, 0)',
                    'rgb(255, 170, 0)',
                    'rgb(191, 255, 0)',
                    'rgb(0, 255, 191)',
                    'rgb(0, 255, 255)',
                    'rgb(0, 191, 255)',
                    'rgb(0, 128, 255)',
                    'rgb(0, 64, 255)',
                    'rgb(128, 0, 255)',
                ],
                label: 'Dataset 1'
            }]
        },
        options: {

           title: {
             display: true,
             text: 'TOTAL PERCENTAGE: '+parseInt(total)+'%'
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
<div  id="printDiv1" >
                                <div id="canvas-holder">
                                    <canvas id="chart-area" />
                                </div>
                            </div>