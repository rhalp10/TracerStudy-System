<?php

	include('db.php');

	if (isset($_REQUEST['id'])) {
			
		$c_id = $_REQUEST['id'];
		$query = "SELECT * FROM `forum_comment` WHERE `comment_ID`='$c_id'";
		$sqr =  mysqli_query($con,$query);
		$row = mysqli_fetch_array($sqr);

		?>
		<center>
        <div class="btn-group ">
          <a href="action/comment_edit_action.php?cid=<?php echo $c_id?>" class="btn btn-primary" >EDIT</a>
          <a href="action/comment_delete_action.php?cid=<?php echo $c_id?>" class="btn btn-danger" >DELETE</a>
        </div>
        </center>
	
			
		<?php				
	}

	?>