
<?php 
include('session.php'); 
include('db.php');
$page = 'dashboard';

if ($login_level == '1')
{
    $result = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE student_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['student_img']; 
}
else if ($login_level == '2')
{
    $result = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE teacher_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['teacher_img']; 
}
else if ($login_level == '3')
{
    $result = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE admin_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['admin_img']; 
}
else
{
}
?>



<!DOCTYPE html>
<html>  
  <head>
    <?php include('meta.php');?>
    <?php include('style_css.php');?>
    <title>Message</title>
  </head>
        <body class=" menu-affix">
            <div class="bg-dark dk" id="wrap">
                <div id="top">
                    <?php include ('top_navbar.php');?>
                </div>
                <!-- /#top -->
                    <?php  
                    if ($login_level == '1')
                    {
                        include('sidebar_student.php');
                    }
                    else if ($login_level == '2')
                    {
                        include('sidebar_teacher.php');
                    }
                    else if ($login_level == '3')
                    {
                        include('sidebar_admin.php');
                    }
                    else
                    {
                    }
                    ?>                    
                      <!-- /#left -->
                <div id="content">

                    <div class="outer">
                        <header class="head">
                            <div class="main-bar">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                              <li class="breadcrumb-item active"> Forum</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">
                           <?php 
                           $thread_participant  = "1 2 3 4 5 6";
                            $pieces = explode(" ", $thread_participant);
                            echo "<br>";
                            $query_participant = "SELECT * FROM user_student_detail WHERE ";

                            $numItems = count($pieces);
                            $i = 0;
                            foreach($pieces as $participant) {
                                $participant = trim($participant);
                                if(++$i === $numItems) {
                                  $query_participant.="student_ID=".$participant;
                                }
                                else
                                {
                                  $query_participant.="student_ID=".$participant." OR ";
                                }

                            }
                           // echo $query_participant;



                           ?>
                           <div class="col-sm-12">
                               <div class="col-sm-3" style="border:solid 1px;">
                                    <div style="margin:5px;">
                                        <button class="btn btn-danger">COMPOSE</button> 
                                    </div>
                                    <hr>
                                    <div  style="overflow-y: scroll; overflow-x: hidden; height:600px; overflow; margin-top: 10px;">
                                       
 <?php 
     //for selecting all thread that you participate
     $q1 = mysqli_query($con,"SELECT * FROM `message_thread_participant` WHERE participant_userID = '1' ");
     while ($participantData = mysqli_fetch_array($q1)) 
     {
      // echo "participant_ID:".$participantData['participant_ID'];
      // echo "<br>";
      // echo"P_thread:". $participantData['participant_threadID'];
      // echo "<br>";
      $chk_partipant = $participantData['participant_threadID'];

      $q = mysqli_query($con,"SELECT * FROM `message_thread`");
      // all thread check check wheres thread message you participate
      while ($threadData = mysqli_fetch_array($q)) 
      {
          // echo "thread: ".$threadData['thread_ID'];
          // echo "<br>";

          if ($threadData['thread_ID'] == $chk_partipant) {
              // if clicked the this divider the div of threadContent must be change showed content 
             ?> 
               <div style="background-color: #e5e9ec; margin: 1px;" class="col-sm-12">
                 <?php echo $threadData['thread_name']?>
              </div>
               <?php

          }
      }
     }
?>
                                   </div>
                               </div>
                               <div class="col-sm-9 " style="border:solid 1px;">
                                <div style=" height:660px; overflow; margin-top: 10px;" id="threadContent">
                                    <h3 class="panel-title">Thread Title</h3>
                                   <hr>
                                    <div style="height: 50px; ">
                                        
                                        <div style="overflow-y: scroll; overflow-x: hidden;   height:550px; overflow; margin-top: 10px;"> 
                                            <form id="form1" name="form1" class="form-group" style="margin-top: 10px;">
                                            <div class="input-group" style="">
                                                <input id="message" type="text" class="form-control" name="msg" placeholder="Type your message">
                                                <span href="" class="btn btn-primary input-group-addon " onclick="submitChat()" >SEND</span>
                                            </div>

                                            </form>
                                            <div id="chatlogs" style="overflow-y: scroll; overflow-x: hidden;   height:550px; overflow; margin-top: 10px;">
                                            LOADING CHATLOG...
                                            </div>
                                        </div>
                                        <!-- 
                                        <form class="form-group" style="margin-top: 10px;">
                                        <div class="input-group" style="">
                                            <input id="message" type="text" class="form-control" name="message" placeholder="Type your message">
                                            <span href=""  class="btn btn-primary input-group-addon " onclick="addMSGstacks(message.value)">SEND</span>
                                        </div>
                                        </form> -->
                                    </div>
                                </div>
                               </div>
                           </div>
                           
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->

                    <!-- /#right -->
            </div>

            <!-- /#wrap -->
            <?php include('footer.php');?>
            <!-- /#footer -->
            <?php include ('script.php');?>
        </body>

</html>
<style type="text/css">
    .msg_container{
        color: grey;
        border:solid 1px;
        margin: 1px;
    }
    .msg_owner{
        background-color: #0f5594;
        color: white;
    }
    .msg_detail{
        margin: 5px;
    }
</style>
<script type="text/javascript">
    function addMSGstacks(txt) {
    
    var div = document.createElement('div');
    div.className = '<?php if ($login_id ==1){ echo "msg_owner";}?> msg_container';
    div.innerHTML = "<div class='msg_detail'><div></>"+txt+"</div>";
     document.getElementById('msg_content').appendChild(div);


    document.getElementById("message").value="";
}

</script>





<?php 

$login_name = "darren"; 

$login_nameJS="$login_name";
$js_outlogin_nameJS = json_encode($login_nameJS);
?>
<script>

function submitChat() {
  var login_name = <?php echo $js_outlogin_nameJS; ?>;
  if(form1.msg.value == '') {
    alert("Your Message Is Empty");
    return;
  }
  var uname = login_name;
  var msg = form1.msg.value;
  var xmlhttp = new XMLHttpRequest();
  
  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
    }
  }
  
  xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
  xmlhttp.send();

    document.getElementById("message").value="";

}

$(document).ready(function(e){
  $.ajaxSetup({
    cache: false
  });
  setInterval( function(){ $('#chatlogs').load('logs.php'); }, 2000 );
});
// for enter command
document.getElementById("form1").onkeypress = function(e) {
  var key = e.charCode || e.keyCode || 0;     
  if (key == 13) {
     var login_name = <?php echo $js_outlogin_nameJS; ?>;
    if(form1.msg.value == '') {
      alert("Your Message Is Empty");
      return;
    }
     var uname = login_name;
     var msg = form1.msg.value;
       var xmlhttp = new XMLHttpRequest();
  
        xmlhttp.onreadystatechange = function() {
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
          }
        }
        
        xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
        xmlhttp.send();

      document.getElementById("message").value="";
    e.preventDefault();
  }
}
</script>