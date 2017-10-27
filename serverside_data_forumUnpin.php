<?php
/* Database connection start */
include('session.php');
/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
   
   0 =>'post_title',
   1=> 'topic_ID',
   2=> 'post_owner_id'
);

// getting total number records without any search
$sql = "SELECT post_title,topic_ID,post_owner_id ";
$sql.="FROM forum_topic WHERE `post_status` = 'UNPIN'";
$query=mysqli_query($con, $sql) or die("serverside_data_forumUnpin.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


// $sql = "SELECT DISTINCT YEAR(student_year_grad) as year_grad ";
// $sql.=" FROM `user_student_detail` year_grad  WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
   $sql.=" AND ( post_title LIKE '".$requestData['search']['value']."%' )";
   // $sql.=" OR student_department LIKE '%".$requestData['search']['value']."%' )";
}
$query=mysqli_query($con, $sql) or die("serverside_data_forumUnpin.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.="ORDER BY `post_date` ASC";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */ 
$query=mysqli_query($con, $sql) or die("serverside_data_forumUnpin.php: get employees");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
   $nestedData=array(); 
   $post_title = $row["post_title"];
   // $row["topic_ID"]
   $hash_topic = password_hash($row["topic_ID"], PASSWORD_DEFAULT);
   $query2 = mysqli_query($con,"SELECT `view_count` FROM `view_counter` WHERE `view_topicID` = ".$row["topic_ID"]);
    $res2 = mysqli_fetch_assoc($query2);
$post_owner = $row['post_owner_id'];
if($post_owner == 1) {
   $query_postowner = mysqli_query($con,"SELECT student_fName,student_mName,student_lName FROM `user_student_detail` WHERE `student_userID` = '".$post_owner."'");
   $res_postowner = mysqli_fetch_assoc($query_postowner);
   $fname = $res_postowner['student_fName'];
   $mname = $res_postowner['student_mName'];
   $lname = $res_postowner['student_lName'];
}

if($post_owner == 2){
   $query_postowner = mysqli_query($con,"SELECT teacher_fName,teacher_mName,teacher_lName FROM `user_teacher_detail` WHERE `teacher_userID` = '".$post_owner."'");
   $res_postowner = mysqli_fetch_assoc($query_postowner);
   $fname = $res_postowner['teacher_fName'];
   $mname = $res_postowner['teacher_lName'];
   $lname = $res_postowner['teacher_mName'];
}
if($post_owner == 3) {
   $query_postowner = mysqli_query($con,"SELECT admin_fName,admin_mName,admin_lName FROM `user_admin_detail` WHERE `admin_userID` = '".$post_owner."'");
   $res_postowner = mysqli_fetch_assoc($query_postowner);
   $fname = $res_postowner['admin_fName'];
   $mname = $res_postowner['admin_mName'];
   $lname = $res_postowner['admin_lName'];
}

   $nestedData[]="<div class='forum-list-hover col-sm-1' >
                                  <i class='fa fa-comment'></i>
                                    </div>
                   <div class='col-sm-6 forum-list-content'>
               <strong><a href='forum_view.php?post_ID=".$hash_topic." '>".$post_title."</a></strong>
               <br>by <a href=''>".$fname." ".$mname." ".$lname."</a>
               </div>
                    <div class='col-sm-2 forum-list-content-stat'>
                     ".$res2['view_count']."<i class='fa fa-eye'></i>
                    <br>
                    2 <i class='fa fa-comment'></i>
                    </div>
                    <div class='col-sm-3' style='background-color: #444444;color: white;''>
                                   &nbsp;<br>&nbsp;
                                    </div>";
   

   $data[] = $nestedData;
}



$json_data = array(
         "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
         "recordsTotal"    => intval( $totalData ),  // total number of records
         "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
         "data"            => $data   // total data array
         );

echo json_encode($json_data);  // send data as json format

?>
