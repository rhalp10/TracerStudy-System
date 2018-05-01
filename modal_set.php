<?php 
include("db.php");
if (isset($_REQUEST['id']) ){
$id= $_REQUEST['id'];

?>
<form method="POST" action="action/survey">
	<div class="text-center">
  <input type="hidden" name="id" value="<?php echo $id?>">
<div class="btn-group ">
  <button type="submit" class="btn btn-success" name="set-survey">Submit</button>
  <button type="submit" class="btn btn-danger">Cancel</button>
</div>
</div>
</form>
<?php
}
?>