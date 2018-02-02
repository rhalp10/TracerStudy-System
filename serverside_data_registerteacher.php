<?php
/* Database connection start */
include('session.php');
/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	
	0 =>'teacher_lName', 
	1 => 'teacher_fName',
	2 => 'teacher_department',
);

// getting total number records without any search
$sql = "SELECT teacher_ID, teacher_fName, teacher_mName, teacher_lName, teacher_department  ";
$sql.=" FROM user_teacher_detail";
$query=mysqli_query($con, $sql) or die("serverside_data_registerstud.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT teacher_ID, teacher_fName, teacher_mName, teacher_lName, teacher_department  ";
$sql.=" FROM user_teacher_detail WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( teacher_fName LIKE '%".$requestData['search']['value']."%' ";    
	$sql.=" OR teacher_mName LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR teacher_lName LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR teacher_department LIKE '%".$requestData['search']['value']."%' )";
	// $sql.=" OR teacher_department LIKE '%".$requestData['search']['value']."%' )";
}
$query=mysqli_query($con, $sql) or die("serverside_data_registerstud.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($con, $sql) or die("serverside_data_registerstud.php: get employees");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	$teacher_ID = $row["teacher_ID"];
	$nestedData[] = $row["teacher_lName"].', '.$row["teacher_fName"].' '.$row["teacher_mName"].'.';
	$teacher_department = $row["teacher_department"];
	$x = mysqli_query($con,"SELECT `department_name` FROM `cvsu_department` WHERE department_ID = '$teacher_department'");
	$a = mysqli_fetch_array($x);

	$nestedData[] = $a["department_name"];
	$nestedData[] = "<div class='btn-group'>  
	 <a type='button' class='btn btn-primary' href='recordteacher_view.php?teacherID=$teacher_ID'><i class='fa fa-eye'></i></a>                                 
	<a  class='btn btn-metis-5' href='recordteacher_edit.php?teacherID=$teacher_ID'><i class='fa fa-edit'></i></a>
	<a  class='btn btn-metis-1' href='recordteacher_delete.php?teacherID=$teacher_ID' ><i class='fa fa-close'></i></a>
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
