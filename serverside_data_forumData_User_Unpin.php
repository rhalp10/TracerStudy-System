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
  2=> 'post_owner_id',
  3=> 'post_date'
);

// getting total number records without any search
$sql = "SELECT * ";
$sql.=" FROM `forum_topic` WHERE   `post_owner_id` = '".$login_id."' AND `post_status` = 'UNPIN'";
$query=mysqli_query($con, $sql) or die("server_data_forumUnpin.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

// $sql = "SELECT * ";
// $sql.=" FROM `forum_topic`  WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
  $sql.=" AND ( post_title LIKE '".$requestData['search']['value']."%' ";
  $sql.=" OR post_date LIKE '%".$requestData['search']['value']."%' )";
}
$query=mysqli_query($con, $sql) or die("server_data_forumUnpin.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */  
$query=mysqli_query($con, $sql) or die("server_data_forumUnpin.php: get employees");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
  $nestedData=array(); 
  $post_title = $row["post_title"];
  // $row["topic_ID"]
  $hash_topic = password_hash($row["topic_ID"], PASSWORD_DEFAULT);
  $query2 = mysqli_query($con,"SELECT `view_count` FROM `view_counter` WHERE `view_topicID` = ".$row["topic_ID"]);
    $res2 = mysqli_fetch_assoc($query2);
$post_owner = $row['post_owner_id'];

$qry_level = mysqli_query($con,"SELECT user_level FROM `user_account` WHERE user_ID = '".$post_owner."'");
$res_level  = mysqli_fetch_assoc($qry_level);
if ($res_level['user_level'] == '1') {
  $user_type = 'student';
}
else if ($res_level['user_level']  == '2'){
  $user_type = 'teacher';
}
else if ($res_level['user_level']  == '3'){
  $user_type = 'admin';
}
else
{
  $user_type = '';
}
$qry_comment = mysqli_query($con,"SELECT COUNT(comment_ID) as comment_val FROM `forum_comment` WHERE comment_topicID = '".$row["topic_ID"]."'");
$sql_comment = mysqli_fetch_assoc($qry_comment); 
$comment_val = $sql_comment['comment_val'];
  $query_postowner = mysqli_query($con,"SELECT ".$user_type."_fName,".$user_type."_mName,".$user_type."_lName FROM `user_".$user_type."_detail` WHERE `".$user_type."_userID` = '".$post_owner."'");
   $res_postowner = mysqli_fetch_assoc($query_postowner);
   $fname = $res_postowner[$user_type.'_fName'];
   $mname = $res_postowner[$user_type.'_mName'];
   $lname = $res_postowner[$user_type.'_lName'];


  $nestedData[]="<div class='forum-list-hover col-sm-1' >
                                  <i class='fa fa-comment'></i>
                                    </div>
                   <div class='col-sm-6 forum-list-content'>
           <strong><a href='forum_view.php?post_ID=".$hash_topic." '>".$post_title."</a></strong>
           <br>by <a href=''>".$fname." ".$mname." ".$lname."</a>
           </div><div class='col-sm-2 forum-list-content-stat'>
                     ".$res2['view_count']."<i class='fa fa-eye'></i>
                    <br>
                    ".$comment_val." <i class='fa fa-comment'></i>
                    </div><div class='col-sm-3' style='background-color: #444444;color: white;'>
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
