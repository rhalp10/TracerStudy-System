
<?php 
include('db.php');
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
$description = array();
$bgcolor = array();
$totalqa4_rc = array();
$count_total_qa4 = array();
$total_qa4_percent = array();

$totalqa4_rc =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '1' AND ".$col." = '1'");
$totalqa4_rc =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '2' AND ".$col." = '1'");
$totalqa4_rc =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '3' AND ".$col." = '1'");
$totalqa4_rc =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '4' AND ".$col." = '1'");
$totalqa4_rc =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '5' AND ".$col." = '1'");
$totalqa4_rc =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '6' AND ".$col." = '1'");

$totalqa4_rc =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '1' AND ".$col." = ''");
$totalqa4_rc =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '2' AND ".$col." = ''");
$totalqa4_rc =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '3' AND ".$col." = ''");
$totalqa4_rc =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '4' AND ".$col." = ''");
$totalqa4_rc =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '5' AND ".$col." = ''");
$totalqa4_rc =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '6' AND ".$col." = ''");


$bgcolor[] = "rgb(255, 0, 0)";
$bgcolor[] = "rgb(255, 64, 0)";
$bgcolor[] = "rgb(255, 128, 0)";
$bgcolor[] = "rgb(255, 191, 0)";
$bgcolor[] = "rgb(255, 170, 0)";
$bgcolor[] = "rgb(191, 255, 0)";
$bgcolor[] = "rgb(0, 255, 191)";
$bgcolor[] = "rgb(0, 255, 255)";
$bgcolor[] = "rgb(0, 191, 255)";
$bgcolor[] = "rgb(0, 128, 255)";
$bgcolor[] = "rgb(0, 64, 255)";
$bgcolor[] = "rgb(128, 0, 255)";
$description[] = "Below 5k Answered";
$description[] = "5k less than 10k Answered";
$description[] = "10k less than 15k Answered";
$description[] = "15k less than 20k Answered";
$description[] = "20k less than 25k Answered";
$description[] = "25k and above Answered";
$description[] = "Below 5k Unanswered";
$description[] = "5k less than 10k Unanswered";
$description[] = "10k less than 15k Unanswered";
$description[] = "15k less than 20k Unanswered";
$description[] = "20k less than 25k Unanswered";
$description[] = "25k and above Unanswered";

$countqa4 = $json->DataCount($totalqa4);
foreach ($totalqa4_rc as $query) {
    $count_total_qa4[] = $json->DataCount($query);
}
$totalpercent_a4  = 0;
foreach ($count_total_qa4 as $count) {
   $total_qa4_percent = $json->DataCountPercent($count,$countqa4);
   $totalpercent_a4[] += $json->DataCountPercent($count,$countqa4);
}

foreach ($total_qa4_percent as $percent) {
   $js_out_parsing = $json->EncodeParsing($percent);

}

// echo "<br>TOTAL PERCENT : ".$totalpercent_a4."%<br>";
// echo "<br><hr><br>";
?>



<script src="assets/lib/chart-master/dist/Chart.bundle.js"></script>
<script src="assets/lib/chart-master/samples/utils.js"></script>
<!--jQuery -->
<script src="assets/lib/jquery/jquery.js"></script>
<title>Print</title>
<style type="text/css">
table {
         font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    table td, table th {
        border: 1px solid #ddd;
        padding: 8px;
    }
    /*table tr:nth-child(even){background-color: #f2f2f2;}*/

    table tr:hover {background-color: #ddd;}

    table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
    #xx{
        background-color: red;
        color: white;
    }
</style>

<link rel="stylesheet" type="text/css" href="z.css">
<body>
    <center><button id="print-btn" class="btn btn-primary">PRINT</button></center>
   <div id="divForPrinting">
        <div id="canvas-holder">
            <canvas id="chart-area"/>
        </div>
                <table >
                    <thead style="border: solid 1px; ">
                        <tr>
                            <th class="col-sm-1">Color</th>
                            <th>Description</th>
                            <th>Count</th>
                            <th>Percent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
for ($i = 0; $i < count($bgcolor); ++$i) {
    ?>
     <tr>
        <td style="background-color: <?php echo $bgcolor[$i];?>;"></td>
        <td><?php echo $description[$i];?></td>
        <td><?php echo $count_total_qa4[$i];?></td>
        <td><?php echo $total_qa4_percent[$i];?></td>
     </tr>
    <?php
}
        ?>
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
    </div>

</body>




<script type="text/javascript">

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
            legend: {
            display: false
         },
           title: {
             display: true,
             bezierCurve : false,
             text: 'TOTAL PERCENTAGE: '+parseInt(total)+'%'
           }
         }
    };

    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);



    };


    </script>

<script type="text/javascript">
    $('#print-btn').click(function(){
        document.title = 'PrintableChart';
        window.print();
    });
</script>
</html>