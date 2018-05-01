<?php 
include("db.php");
if (isset($_REQUEST['id']) ){
$id= $_REQUEST['id'];
?>
<?php 
$sql = mysqli_query($con,"SELECT * FROM `survey_questionnaire` WHERE survey_ID = $id");
$sql1 = mysqli_query($con,"SELECT * FROM `survey` WHERE survey_ID = $id");
$i = 1;

$title = mysqli_fetch_array($sql1);
?>
<h1 class="text-center"><?php echo $title['survey_name']?></h1>
<form action="">
  <?php 
  while ($data = mysqli_fetch_array($sql)){
   $i; 
  $q_ID = $data[0];
  $sql1 = mysqli_query($con,"SELECT GROUP_CONCAT(answer) AS `option`
FROM `survey_anweroptions` WHERE survey_qID = $q_ID");
  $data1 = mysqli_fetch_array($sql1);
  $question =  $data['question'];
  $option = $data1['option'];
  $option = explode(",",$option);
  ?>

  <div class="form-group">
    <label for=""><?php echo  $i.".) ".$question ?></label>
    <select class="form-control">
      <?php 
       foreach ($option as $key => $value) {
       ?>
        <option><?php echo$value ?></option>
       <?php
      }
      ?>
    </select>
  </div>
  <?php
  $i++;
}
  ?>
</form>
<?php
}
?>