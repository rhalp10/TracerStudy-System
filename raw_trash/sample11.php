
    <script type="text/javascript">
        function KeyHandler() {
            var result = document.getElementById('result');  		result.innerHTML=document.getElementById('txtInput').value;

        }
    </script>

<body >
<div>Type something.........</div><br />
<select id="txtInput" onclick="KeyHandler()">
<option >2017</option>
<option >2018</option>
<option >2019</option>
</select>

<br/>
Result:<br>

<?php 
echo $val = "<div id='result'></div>";
echo $val;
?>
my name
<?php 
echo "darreen ";
?>
</body>
<hr>
<?php 

$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
$year_selected = mysqli_query($con,"SELECT * FROM `survey_forms` WHERE form_taken like '2017%'");

while ($data_yrselected = mysqli_fetch_array($year_selected))
{
	$survey_formID = $data_yrselected['form_id'];
	$arr = array();
	$arr[] = $survey_formID;
	for ($i=1; $i <15; $i++) { 
		$totalresult_col1 = mysqli_query($con,"SELECT * FROM `survey_question1` WHERE `row` = '$i' AND `col1` = 'U_AB_BS$i' AND `survey_formID` = '$survey_formID'");
		mysqli_query($con,"SELECT * FROM `survey_question1` WHERE `row` = '$i' AND `col2` = 'G_MS_MA_PHD$i' AND `survey_formID` = '$survey_formID'");
		mysqli_query($con,"SELECT * FROM `survey_question1` WHERE `row` = '$i' AND `col1` = 'U_AB_BS$i' AND  `col2` = 'G_MS_MA_PHD$i' AND `survey_formID` = '$survey_formID'");

		$aa[] = 1;
		// $json->stackValue(-$col_count);

	}



}
echo array_sum($aa);
$wa[]= 5;
$wa[]= 5;
$wa[]= 5;
echo array_sum($wa);
?>
