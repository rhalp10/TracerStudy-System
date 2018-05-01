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
    $survey_sql = mysqli_query($con,"SELECT 
s.survey_ID,
s.survey_name,
s.survey_date,
sq.survey_qID,
sq.question,
sao.survey_aID,
sao.answer,
COALESCE((
    SELECT count(sa.survey_aID) 
    FROM `survey_answer` sa  
    WHERE sa.survey_aID = sao.survey_aID 
    GROUP BY sa.survey_aID),0) count_answer
,
CONCAT(sao.answer,':',
      COALESCE((
    SELECT count(sa.survey_aID) 
    FROM `survey_answer` sa  
    WHERE sa.survey_aID = sao.survey_aID 
    GROUP BY sa.survey_aID),0) 
      ) diag_data_label
FROM survey_anweroptions sao
LEFT JOIN survey_questionnaire sq ON sq.survey_qID = sao.survey_qID
LEFT JOIN survey s ON s.survey_ID = sq.survey_ID WHERE s.visibility = 1 order by sq.survey_qID");
    $z = array();
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
    echo        $data_label =  json_encode($data_label);
    echo        $data_value =  json_encode($data_value);
         
         
    echo        $jencode_title =  json_encode($z);
   
?>

<button type="button" class="btn btn-info btn-sm pull-right"  data-toggle="modal" data-target="#add">Add Survey</button>
<br><br>
<table class="table table-bordered table-advance table-hover" id="example1">
  <thead>
  <th>ID</th>
  <th>Title</th>
  <th>Date</th>
  <th>Visible</th>
  <th>View</th>
  </thead>
  <tbody>
    <?php 
$sql = mysqli_query($con,"SELECT * FROM `survey`");
while ($survey = mysqli_fetch_array($sql)) {
  if ($survey[3] == 0) {
    $trc = "class='bg-danger'";
  }
  else{
    $trc = "";
  }
  ?>
  <tr  <?php echo $trc?>>
      <td><?php echo $survey[0]?></td>
      <td><?php echo $survey[1]?></td>
      <td><?php echo $survey[2]?></td>
      <td><?php echo $survey[3]?></td>
      <td class="text-center">
        <div class="btn-group ">
          <button type="button" class="btn btn-primary "><span class="fa fa-gear"></span></button>
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
           
            <li><a data-toggle="modal" data-target="#view" data-id="<?php echo $survey[0]; ?>"  id="view_survey">View</a></li>
            <li><a data-toggle="modal" data-target="#edit" data-id="<?php echo $survey[0]; ?>"  id="edit_survey">Edit</a></li>
            <li><a data-toggle="modal" data-target="#delete" data-id="<?php echo $survey[0]; ?>"  id="delete_survey">Delete</a></li>
             <?php 
            if ($survey[3] == 0) {
             ?>
              <li><a data-toggle="modal" data-target="#set" data-id="<?php echo $survey[0]; ?>"  id="set_survey">Set</a></li>
             <?php  
            }
            ?>
          </ul>
        </div>
      </td>
    </tr>
  <?php
}
    ?>
   
  </tbody>
</table>



            <!-- /#wrap -->
            <?php include('footer.php');?>
            <!-- /#footer -->
            <?php include ('script.php');?>

<script type="text/javascript">


   
 $(document).ready(function(){
      $(document).on('click', '#view_survey', function(e){
      
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#view-content').html(''); // leave it blank before ajax call
      $('#view-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'modal_view.php',
        type: 'POST',
        data: 'id='+uid,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#view-content').html('');    
        $('#view-content').html(data); // load response 
        $('#view-loader').hide();      // hide ajax loader 
      })
      .fail(function(){
        $('#view-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#view-loader').hide();
      });
      
    });
      $(document).on('click', '#edit_survey', function(e){
      
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#edit-content').html(''); // leave it blank before ajax call
      $('#edit-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'modal_edit.php',
        type: 'POST',
        data: 'id='+uid,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#edit-content').html('');    
        $('#edit-content').html(data); // load response 
        $('#edit-loader').hide();      // hide ajax loader 
      })
      .fail(function(){
        $('#edit-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#edit-loader').hide();
      });
      
    });
     $(document).on('click', '#delete_survey', function(e){
      
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#delete-content').html(''); // leave it blank before ajax call
      $('#delete-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'modal_delete.php',
        type: 'POST',
        data: 'id='+uid,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#delete-content').html('');    
        $('#delete-content').html(data); // load response 
        $('#delete-loader').hide();      // hide ajax loader 
      })
      .fail(function(){
        $('#delete-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#delete-loader').hide();
      });
      
    });
  $(document).on('click', '#set_survey', function(e){
        
        e.preventDefault();
        
        var uid = $(this).data('id');   // it will get id of clicked row
        
        $('#set-content').html(''); // leave it blank before ajax call
        $('#set-loader').show();      // load ajax loader
        
        $.ajax({
          url: 'modal_set.php',
          type: 'POST',
          data: 'id='+uid,
          dataType: 'html'
        })
        .done(function(data){
          console.log(data);  
          $('#set-content').html('');    
          $('#set-content').html(data); // load response 
          $('#set-loader').hide();      // hide ajax loader 
        })
        .fail(function(){
          $('#set-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
          $('#set-loader').hide();
        });
        
      });
     $(document).on('click', '#add_q', function(e){
        
        e.preventDefault();
        
        var uid = $(this).data('id');   // it will get id of clicked row
        
        $('#add-content').html(''); // leave it blank before ajax call
        $('#add-loader').show();      // load ajax loader
        
        $.ajax({
          url: 'modal_add.php',
          type: 'POST',
          data: 'id='+uid,
          dataType: 'html'
        })
        .done(function(data){
          console.log(data);  
          $('#add-content').html('');    
          $('#add-content').html(data); // load response 
          $('#add-loader').hide();      // hide ajax loader 
        })
        .fail(function(){
          $('#add-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
          $('#add-loader').hide();
        });
        
      });
  }); 

function option(){
    var x = document.getElementById("mySelect").value; 
    document.getElementById("demo").innerHTML = "You selected: " + x;
}
</script>


</body>
</html>

<div id="view" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Survey</h4>
      </div>
      <div class="modal-body">
        <div id="view-loader" style="display: none; text-align: center;">
            <img src="assets/img/ajax-loader.gif">
        </div>
        <!-- content will be load here -->                          
        <div id="view-content"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>

<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Survey</h4>
      </div>
      <div class="modal-body">
        <div id="edit-loader" style="display: none; text-align: center;">
            <img src="assets/img/ajax-loader.gif">
        </div>
        <!-- content will be load here -->                          
        <div id="edit-content"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>

<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Survey</h4>
      </div>
      <div class="modal-body">
        <div id="delete-loader" style="display: none; text-align: center;">
            <img src="assets/img/ajax-loader.gif">
        </div>
        <!-- content will be load here -->                          
        <div id="delete-content"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>

<div id="set" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Survey</h4>
      </div>
      <div class="modal-body">
        <div id="set-loader" style="display: none; text-align: center;">
            <img src="assets/img/ajax-loader.gif">
        </div>
        <!-- content will be load here -->                          
        <div id="set-content"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Question</h4>
      </div>
      <div class="modal-body">
        <div id="add-loader" style="display: none; text-align: center;">
            <img src="assets/img/ajax-loader.gif">
        </div>
        <!-- content will be load here -->                          
        <div id="add-content"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>



      <?php 
$sql1 = mysqli_query($con,"SELECT * FROM `survey` WHERE visibility = 1");
$title = mysqli_fetch_array($sql1);
$sid = $title[0];
$sql = mysqli_query($con,"SELECT * FROM `survey_questionnaire` WHERE survey_ID = $sid");

$i = 1;

  ?>
  <form class="" style="padding:15px;" method="POST" action="action/survey" id="form">
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
                                        <select class="form-control" name="answer[]" id="answer-option">
                                           <option value="blank"></option>
                                          <?php 
                                           foreach ($option as $key => $value) {

                                          if ($value == "other(s)")
                                          {

                                          }
                                          else
                                          {
                                            ?>
                                           <option value="<?php echo $value ?>"><?php echo $value ?></option>
                                            <?php
                                          }
                                          
                                          }
                                          ?>
                                        </select>
                                       
                                      </div>
                                       <?php 
                                        foreach ($option as $key => $value1) {
                                          if ($value1 == "other(s)") {
                                             ?>
                                          <div class="form-group">
                                                   <label for="">Other</label>
                                                   <input type="text" name="option[]" class="form-control">
                                               </div>
                                          <?php
                                          }
                                        }
                                        ?>
                                     
                                      <?php
                                      $i++;
                                    }
                                      ?>
                                      <button type="submit" class="" name="submit-survey">Submit</button>
                               </form>
