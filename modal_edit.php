<?php 
include("db.php");
if (isset($_REQUEST['id']) ){
$id= $_REQUEST['id'];
?>
<div class="btn-group pull-right"">
<button type="button" class="btn btn-info btn-sm " data-toggle="modal" data-target="#add" id="add_q" data-id="<?php echo $id; ?>">Add Question</button>
<button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#editq">Edit Question</button>
<button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#edittitle">Edit Survey Title</button>

</div>
<br><br>
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
    <label for=""><?php echo  $i.".) ".$question ?> </label>
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


<div id="editq" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Question</h4>
      </div>
      <div class="modal-body">
        <form action="action/survey">
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Select Question</label>
            <div class="col-sm-10">
              <select class="form-control" id="mySelect" onchange="option()">
                <?php
                $sql = mysqli_query($con,"SELECT *,(SELECT GROUP_CONCAT(answer) AS `option`FROM `survey_anweroptions` WHERE survey_qID = sq.survey_qID) `option` FROM `survey_questionnaire`sq WHERE sq.survey_ID = $id"); 
                
                while ($q = mysqli_fetch_array($sql)) {
                 ?>
                  <option value="<?php echo $q[0]?>"><?php echo $q[2]?></option>
                 <?php
                }
                ?>
              </select>
            </div>
            
          </div>
          <div class="form-group">
            <label class="control-label " for=""></label>
          </div>
          <?php 
          $sql = mysqli_query($con,"SELECT *,(SELECT GROUP_CONCAT(answer) AS `option`FROM `survey_anweroptions` WHERE survey_qID = sq.survey_qID) `option` FROM `survey_questionnaire`sq WHERE sq.survey_ID = 1 AND survey_qID = 1");
          $d1= mysqli_fetch_array($sql);
          ?>
          <div class="form-group">
            <label class="control-label col-sm-2" for="">Question</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="" placeholder="" value="<?php echo $d1[2]?>">
            </div>
          </div>
          <?php 
          $variable = $d1[3];
          $z = 1;
          $piece = explode(",", $variable);
          foreach ($piece as $key => $value) {
          
            ?>

            <div class="form-group">
            <label class="control-label col-sm-2" for="">Option <?php echo $z?> </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="" placeholder="" value="<?php echo $value?>">
              </div>
            </div>
            <?php
            $z++;
          }
          ?>
          <div class="text-center">
          <button type="submit" class="btn btn-default" name="">Update</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>

<div id="edittitle" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Title</h4>
      </div>
      <div class="modal-body">
        <form  method="POST" action="action/survey">
        	<input type="hidden" name="ID" value="<?php echo $id?>"> 
          <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" class="form-control" id="tilte" name="surveyname" value="<?php echo $title['survey_name']?>">
          </div>
          <button type="submit" class="btn btn-default" name="update-surveyName">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>

