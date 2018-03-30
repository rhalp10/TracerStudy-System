<?php 
require_once('db.php');
if (isset($_REQUEST['id']) ){
 $id = $_REQUEST['id'];
$sql = mysqli_query($con,"SELECT * FROM cvsu_course where course_ID = $id");
$d = mysqli_fetch_array($sql);
?>

 <form class="form-horizontal" action="action/submitcourse.php?id=<?php echo $d[0]?>" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="Title">Course:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Course" placeholder="Title" name="Course" value="<?php echo $d[2]?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="Acronym">Acronym:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Title" placeholder="Title" name="Acronym" value="<?php echo $d[3]?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="Department">Department:</label>
    <div class="col-sm-10"> 
      
      <?php 
 $sql = mysqli_query($con,"SELECT * FROM `cvsu_department");
      
      ?>
      <select class="form-control" name="Department">
          <?php 
          while ($o = mysqli_fetch_array($sql)){
            ?>

          <option value="<?php echo $o[0]?>"><?php echo $o[2] ?></option>
            <?php
          }
          ?>
      </select>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="edit-course" >Submit</button>
    </div>
  </div>
</form>
<?php
}
?>
