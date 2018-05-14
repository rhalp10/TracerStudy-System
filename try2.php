 <!DOCTYPE html>
<html>
<head>
    <title></title>

    <?php include('meta.php');?>
    <?php include('style_css.php');?>
</head>
<body>

<?php  
include("db.php");
    $survey_sql = mysqli_query($con,"SELECT s.survey_id, 
       s.survey_name, 
       s.survey_date, 
       sq.survey_qid, 
       sq.question, 
       sao.survey_aid, 
       sao.answer, 
       (SELECT IF(sao.answer = 'other(s)' 
                   OR sao.answer = 'others' 
                   OR sao.answer = 'other', 
               Coalesce((SELECT 
               Count(sa.survey_aid) 
                         FROM   `survey_answer_other` sa 
                         WHERE 
               sa.survey_aid = sao.survey_aid 
                         GROUP  BY sa.survey_aid), 0), 
                       Coalesce((SELECT Count(sa.survey_aid) 
                                 FROM   `survey_answer` sa 
                                 WHERE  sa.survey_aid = sao.survey_aid 
                                 GROUP  BY sa.survey_aid), 0))) count_answer, 
       Concat('y:', (SELECT IF(sao.answer = 'other(s)' 
                                OR sao.answer = 'others' 
                                OR sao.answer = 'other', Coalesce( 
                            (SELECT Count(sa.survey_aid) 
                             FROM   `survey_answer_other` sa 
                             WHERE 
                            sa.survey_aid = sao.survey_aid 
                                      GROUP  BY 
                            sa.survey_aid), 0), 
                                                 Coalesce( 
                            (SELECT Count(sa.survey_aid) 
                             FROM   `survey_answer` sa 
                             WHERE 
                                                 sa.survey_aid = sao.survey_aid 
                                                           GROUP  BY 
                            sa.survey_aid), 0))), ', label:', sao.answer) 
                                                                diag_data_label 
FROM   survey_anweroptions sao 
       LEFT JOIN survey_questionnaire sq 
              ON sq.survey_qid = sao.survey_qid 
       LEFT JOIN survey s 
              ON s.survey_id = sq.survey_id 
WHERE  s.visibility = 1 
ORDER  BY sq.survey_qid ");
    $z = array();
    $zcx = array();
    $data_label = array();
    $data_value = array();
    while ($survey = mysqli_fetch_array($survey_sql))
    {
            $z[] = $survey['diag_data_label'];
            $piece = explode(",", $survey['diag_data_label']);
            $part = $piece[0];
            
            $data = explode(":", $part);
            $data_label[] = $data[0];
            $data_value[] = $data[1];
          
    }
    // echo        $data_label =  json_encode($data_label);
    // echo        $data_value =  json_encode($data_value);
        
         foreach ($z as $key => $value) {
          $zcx[] =  "{".$value."}";
          
         }
         
   $jencode_title =  json_encode($zcx);
  $jencode_title = str_replace("\"","",$jencode_title);
   $jencode_title = str_replace("}","\"}",$jencode_title);
   $jencode_title = str_replace("label:","label:\"",$jencode_title);

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
    $json = new json();
?>
 <center>
<h1>Statistics</h1>

</center>
<hr>
<form class="form-inline" method='get'  target="_blank" action="assets/lib/FPDF/print" >
  <div class="form-group">
       
        <select name="category" id="category" onchange="showCategory(this.value)">
        <option value="accountregister" >ACCOUNT REGISTER</option>
        <option value="accountununregister" >ACCOUNT UNREGISTER</option>
        <?php 
        $sql = "SELECT * FROM `survey_questionnaire` sq 
INNER JOIN survey s ON s.survey_ID = sq.survey_ID
where s.visibility = 1";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       ?>
       <option value="<?php echo $row['survey_qID']?>" ><?php echo $row['question']?></option>
       <?php
    }
} else {
    echo "0 results";
}
        ?>
        
        </select>
    </div>
    <div class="form-group">
        <input class="form-control" id="date" type="month" name="date" onchange="filter_datex(this.value)">
    </div>

  <select class="form-control input-sm" id="chartType" name="Chart Type">
    <option value="line">Line</option>
    <option value="column">Column</option>
    <option value="bar">Bar</option>
    <option value="pie">Pie</option>
    <option value="doughnut">Doughnut</option>
  </select>  
    <div class="form-group">
      <input type="submit" name="print" class="btn btn-primary pull-right" value="PRINT">
        
    </div>
    
</form>

<?php 

  $totalresult_ofStudent = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_status` = 'register'");
$totalresult_ofTeacher = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE `teacher_status` = 'register'");
$totalresult_ofAdmin = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE `admin_status` = 'register'");

$totalAcc_register_asStudent = $json->DataCount($totalresult_ofStudent);
$totalAcc_register_asTeacher = $json->DataCount($totalresult_ofTeacher);
$totalAcc_register_asAdmin = $json->DataCount($totalresult_ofAdmin);


  $totalresult_ofStudent = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_status` = 'unregister'");
$totalresult_ofTeacher = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE `teacher_status` = 'unregister'");
$totalresult_ofAdmin = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE `admin_status` = 'unregister'");

$totalAcc_unregister_asStudent = $json->DataCount($totalresult_ofStudent);
$totalAcc_unregister_asTeacher = $json->DataCount($totalresult_ofTeacher);
$totalAcc_unregister_asAdmin = $json->DataCount($totalresult_ofAdmin);

// $totalAcc_unregister_asStudent = $json->EncodeParsing($totalAcc_unregister_asStudent);
// $totalAcc_unregister_asTeacher = $json->EncodeParsing($totalAcc_unregister_asTeacher);
// $totalAcc_unregister_asAdmin = $json->EncodeParsing($totalAcc_unregister_asAdmin);

?>

  <div  id="printDiv" >
    <div id="displayChart">
    <script>
     
    window.onload = function() {
     
 $('#date').hide();
      var chart = new CanvasJS.Chart("chartContainer", {
      animationEnabled: true,
      title: {
        text: "Account Register"
      },
      data: [{
        type: "pie",
        startAngle: 240,
        yValueFormatString: "##0.00'%'",
        indexLabel: "{label} {y}",
        dataPoints:  [
      { label: "Student",  y:<?php echo $totalAcc_register_asStudent ?> },
      { label: "Teacher", y: <?php echo $totalAcc_register_asTeacher ?> },
      { label: "Admin", y: <?php echo $totalAcc_register_asAdmin ?> }
    ]
      
      }]
    });
    chart.render();
    var chartType = document.getElementById('chartType');
    chartType.addEventListener( "change",  function(){
      chart.options.data[0].type = chartType.options[chartType.selectedIndex].value;
      chart.render();
    });

    }
    </script>

  </div>
</div>

<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="assets/lib/canvas/canvasjs.min.js"></script>
<div id="thediv"></div>
<script type="text/javascript">
  function getDate(){
    var date =document.getElementById('date').value;
  
  }
  function getCategory(){
    var category =document.getElementById('category').value;

  }
  function printDoc(){
    var a = getCategory();
    alert(a);
    // window.location='assets/lib/FPDF/print?category='+getCategory+'&date='+getDate;
    // alert('assets/lib/FPDF/print?category='+getCategory+'&date='+getDate);
  }
  $('#date').hide();
  function showCategory(str) {
  var xhttp; 
  if (str == "") {
    document.getElementById("displayChart").innerHTML = "";
    return;
  }
  if (str == "accountununregister" || str == "accountregister" || str == "default") {
    $('#date').hide();

  }
  else{
    $('#date').show();
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var json_datax = this.responseText;
                    var date =document.getElementById('date').value;
                    var category =document.getElementById('category').value;
                    console.log(this.responseText)
                    var chart=new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true, title: {
                            text: ''+category+" "+date+''
                        }
                        , data: [ {
                            type: "pie", startAngle: 240, yValueFormatString: "##0.00'%'", indexLabel: "{label} {y}", dataPoints: 
                            [
      { label: "Student",  y:<?php echo $totalAcc_register_asStudent ?> },
      { label: "Teacher", y: <?php echo $totalAcc_register_asTeacher ?> },
      { label: "Admin", y: <?php echo $totalAcc_register_asAdmin ?> }
    ]
                        }
                        ]
                    }
                    );
                    chart.render();
                    var chartType=document.getElementById('chartType');

                    chartType.addEventListener( "change", function() {
                        chart.options.data[0].type=chartType.options[chartType.selectedIndex].value;
                        chart.render();
                    }
                    );
                }
            };
  xhttp.open("GET", "chart_ajax.php?category="+date+"&date="+str, true);
  xhttp.send();
}

  function filter_datex(str) {
  var xhttp; 
  if (str == "") {
    document.getElementById("displayChart").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var json_datax = this.responseText;
                    var date =document.getElementById('date').value;
                    var category =document.getElementById('category').value;
                    console.log(this.responseText)
                    var chart=new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true, title: {
                            text: ''+category+" "+date+''
                        }
                        , data: [ {
                            type: "pie", startAngle: 240, yValueFormatString: "##0.00'%'", indexLabel: "{label} {y}", dataPoints: 
                            [ {
                                y: 79.45, label: 3123
                            }
                            , {
                                y: 7.31, label: "x"
                            }
                            , {
                                y: 7.06, label: "Baidu"
                            }
                            , {
                                y: 4.91, label: "Yahoo"
                            }
                            , {
                                y: 11.26, label: "Others"
                            }
                            ]
                        }
                        ]
                    }
                    );
                    chart.render();
                    var chartType=document.getElementById('chartType');

                    chartType.addEventListener( "change", function() {
                        chart.options.data[0].type=chartType.options[chartType.selectedIndex].value;
                        chart.render();
                    }
                    );
                }
            };
  xhttp.open("GET", "chart_ajax.php?category="+date+"&date="+str, true);
  xhttp.send();
  }
 
</script>

            <?php include ('script.php');?>
            <script type="text/javascript">
              // function updateContent(){

              // $("#thediv").load('try2.php'); 
              // }
              // setInterval(function() {updateContent()}, 500);
              
            </script>
            