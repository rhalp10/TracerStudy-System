<?php 
include("db.php");
if (isset($_REQUEST['id']) ){
$id= $_REQUEST['id'];
?>
 <form  method="POST" action="action/survey">
        <input type="hidden" name="s_ID" value="<?php echo $id?>">
        <div class="form-group">
          <label for="">Question:</label>
          <input type="text" class="form-control" id="question" name="question">
        </div>
        <div class="form-group" id="option">
          <label for="">Option:</label>
          <div class="input-group control-group after-add-more">
          <input type="text" name="options[]" class="form-control" placeholder="Enter Options Here">
          <div class="input-group-btn"> 
            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
          </div>
        </div>

        </div>
         <!-- Copy Fields -->
        <div class="copy hide">
          <div class="control-group input-group" style="margin-top:10px">
            <input type="text" name="options[]" class="form-control" placeholder="Enter Options Here">
            <div class="input-group-btn"> 
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-default" name="add-question">Submit</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Survey</h4>
      </div>
      <div class="modal-body">
        <form action="action/survey" method="POST">
          <div class="form-group">
            <label for="surveyname">Survey Title</label>
            <input type="text" class="form-control" id="surveyname" name="surveyname">
          </div>
          <button type="submit" class="btn btn-default" name="add-survey">Submit</button>
        </form>

  <?php
}

?>
<script type="text/javascript">
   $(document).ready(function() {


      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });


      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });


    });
</script>