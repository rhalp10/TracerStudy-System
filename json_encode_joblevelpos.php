<?php 
//QUERY AND COUNTING OF DATA JOB LEVEL POSITIONPARSING
//Rank or Clerical
$RoC_sql = mysqli_query($con,"SELECT * FROM `survey_question3` where row='1' ");
$Roc_both_pick = 0;
$total_col1_pick = 0;
$total_col2_pick = 0;
while ($Roc_data = mysqli_fetch_array($RoC_sql))
{	
	$Roc_col1 = $Roc_data['col1'];
	$Roc_col2 = $Roc_data['col2'];
	if($Roc_col1=='1' && $Roc_col2 =='1')
	{
		$Roc_both_pick += 1;
	}
	else
	{
		$total_col1_pick += $Roc_col1;
		$total_col2_pick += $Roc_col2;
	}
}
$total_ROC_chkdata = ($total_col1_pick+$total_col2_pick+$Roc_both_pick);

$First_Job_Percentage_ROC=($total_col1_pick / $total_ROC_chkdata); 
$Curret_Present_Job_Percentage_ROC=($total_col2_pick / $total_ROC_chkdata); 
$Both_Pick_Percentage_ROC=($Roc_both_pick / $total_ROC_chkdata); 

//parsing First_Job_PercentageJS_ROC php to j_script value
$First_Job_PercentageJS_ROC="$First_Job_Percentage_ROC";
$js_outFirst_Job_Percentage_ROC = json_encode($First_Job_PercentageJS_ROC);
//parsing Curret_Present_Job_PercentageJS_ROC php to j_script value
$Curret_Present_Job_PercentageJS_ROC="$Curret_Present_Job_Percentage_ROC";
$js_outCurret_Present_Job_Percentage_ROC = json_encode($Curret_Present_Job_PercentageJS_ROC);
//parsing Both_Pick_PercentageJS_ROC php to j_script value
$Both_Pick_PercentageJS_ROC="$Both_Pick_Percentage_ROC";
$js_outBoth_Pick_Percentage_ROC = json_encode($Both_Pick_PercentageJS_ROC);

//End of Rank or Clerical parsing

//Professional, Technical or Supervisory
$PToS_both_pick = 0;
$PToS_total_col1_pick = 0;
$PToS_total_col2_pick = 0;
$PToS_sql = mysqli_query($con,"SELECT * FROM `survey_question3` where row='2' ");
while ($PToS_data = mysqli_fetch_array($PToS_sql))
{
	$PToS_col1 = $PToS_data['col1'];
	$PToS_col2 = $PToS_data['col2'];
	if($PToS_col1=='1' && $PToS_col2 =='1')
	{
		$PToS_both_pick += 1;
	}
	else
	{
		$PToS_total_col1_pick += $PToS_col1;
		$PToS_total_col2_pick += $PToS_col2;
	}
}
$total_PToS_chkdata = ($PToS_total_col1_pick+$PToS_total_col2_pick+$PToS_both_pick);

$First_Job_Percentage_PToS =($PToS_total_col1_pick / $total_PToS_chkdata); 
$Curret_Present_Job_Percentage_PToS=($PToS_total_col2_pick / $total_PToS_chkdata); 
$Both_Pick_Percentage_PToS=($PToS_both_pick / $total_PToS_chkdata); 

//parsing First_Job_PercentageJS_PToS php to j_script value
$First_Job_PercentageJS_PToS="$First_Job_Percentage_PToS";
$js_outFirst_Job_Percentage_PToS = json_encode($First_Job_PercentageJS_PToS);
//parsing Curret_Present_Job_PercentageJS_PToS php to j_script value
$Curret_Present_Job_PercentageJS_PToS="$Curret_Present_Job_Percentage_PToS";
$js_outCurret_Present_Job_Percentage_PToS = json_encode($Curret_Present_Job_PercentageJS_PToS);
//parsing Both_Pick_PercentageJS_PToS php to j_script value
$Both_Pick_PercentageJS_PToS="$Both_Pick_Percentage_PToS";
$js_outBoth_Pick_Percentage_PToS = json_encode($Both_Pick_PercentageJS_PToS);
//End of Professional, Technical or Supervisory parsing
//Managerial or Executive
$MoE_both_pick = 0;
$MoE_total_col1_pick = 0;
$MoE_total_col2_pick = 0;
$MoE_sql = mysqli_query($con,"SELECT * FROM `survey_question3` where row='3' ");
while($MoE_data = mysqli_fetch_array($MoE_sql))
{
	$MoE_col1 = $MoE_data['col1'];
	$MoE_col2 = $MoE_data['col2'];
	if($MoE_col1=='1' && $MoE_col2 =='1')
	{
		$MoE_both_pick += 1;
	}
	else
	{
		$MoE_total_col1_pick += $MoE_col1;
		$MoE_total_col2_pick += $MoE_col2;
	}
}
$total_MoE_chkdata = ($MoE_total_col1_pick+$MoE_total_col2_pick+$MoE_both_pick);

$First_Job_Percentage_MoE=($MoE_total_col1_pick / $total_MoE_chkdata); 
$Curret_Present_Job_Percentage_MoE=($MoE_total_col2_pick / $total_MoE_chkdata); 
$Both_Pick_Percentage_MoE=($MoE_both_pick / $total_MoE_chkdata); 

//parsing First_Job_PercentageJS_MoE php to j_script value
$First_Job_PercentageJS_MoE="$First_Job_Percentage_MoE";
$js_outFirst_Job_Percentage_MoE = json_encode($First_Job_PercentageJS_MoE);
//parsing Curret_Present_Job_PercentageJS_MoE php to j_script value
$Curret_Present_Job_PercentageJS_MoE="$Curret_Present_Job_Percentage_MoE";
$js_outCurret_Present_Job_Percentage_MoE = json_encode($Curret_Present_Job_PercentageJS_MoE);
//parsing Both_Pick_PercentageJS_MoE php to j_script value
$Both_Pick_PercentageJS_MoE="$Both_Pick_Percentage_MoE";
$js_outBoth_Pick_Percentage_MoE = json_encode($Both_Pick_PercentageJS_MoE);
//End of Managerial or Executive parsing
//Self-employed
$Se_both_pick = 0;
$Se_total_col1_pick = 0;
$Se_total_col2_pick = 0;
$Se_sql = mysqli_query($con,"SELECT * FROM `survey_question3` where row='4' ");
while($Se_data = mysqli_fetch_array($Se_sql))
{
	$Se_col1 = $Se_data['col1'];
	$Se_col2 = $Se_data['col2'];
	if($Se_col1=='1' && $Se_col2 =='1')
	{
		$Se_both_pick += 1;
	}
	else
	{
		$Se_total_col1_pick += $Se_col1;
		$Se_total_col2_pick += $Se_col2;
	}
}

$total_Se_chkdata = ($Se_total_col1_pick+$Se_total_col2_pick+$Se_both_pick);

$First_Job_Percentage_Se=($Se_total_col1_pick / $total_Se_chkdata); 
$Curret_Present_Job_Percentage_Se=($Se_total_col2_pick / $total_Se_chkdata); 
$Both_Pick_Percentage_Se=($Se_both_pick / $total_Se_chkdata); 

//parsing First_Job_PercentageJS_Se php to j_script value
$First_Job_PercentageJS_Se="$First_Job_Percentage_Se";
$js_outFirst_Job_Percentage_Se = json_encode($First_Job_PercentageJS_Se);
//parsing Curret_Present_Job_PercentageJS_Se php to j_script value
$Curret_Present_Job_PercentageJS_Se="$Curret_Present_Job_Percentage_Se";
$js_outCurret_Present_Job_Percentage_Se = json_encode($Curret_Present_Job_PercentageJS_Se);
//parsing Both_Pick_PercentageJS_Se php to j_script value
$Both_Pick_PercentageJS_Se="$Both_Pick_Percentage_Se";
$js_outBoth_Pick_Percentage_Se = json_encode($Both_Pick_PercentageJS_Se);
//End of Self-employed parsing
?>




