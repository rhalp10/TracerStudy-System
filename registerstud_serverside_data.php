<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tracerdata";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	
	0 =>'student_ID', 
	1 =>'student_fName', 
	2 => 'student_mName',
	3 => 'student_lName',
	4 => 'student_department',
	5 => 'student_admission',
	6 => 'student_year_grad'
);

// getting total number records without any search
$sql = "SELECT student_ID, student_fName, student_mName, student_lName, student_department, student_admission, student_year_grad ";
$sql.=" FROM user_student_detail";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT student_ID, student_fName, student_mName, student_lName, student_department,student_admission, student_year_grad  ";
$sql.=" FROM user_student_detail WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( student_fName LIKE '%".$requestData['search']['value']."%' ";    
	$sql.=" OR student_mName LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR student_department LIKE '%".$requestData['search']['value']."%' )";
	// $sql.=" OR student_department LIKE '%".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY student_lName Asc";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	$student_ID = $row["student_ID"];
	$nestedData[] = $row["student_lName"].', '.$row["student_fName"].' '.$row["student_mName"].'.';
	$nestedData[] = $row["student_department"];
	$nestedData[] = $row["student_admission"];
	$nestedData[] = $row["student_year_grad"];
	$nestedData[] = "<div class='btn-group'>

                                          <button type='button' class='btn btn-metis-5' onclick='editFunction(".$student_ID.")'><i class='fa fa-edit'></i></button>
                                          <button type='button' class='btn btn-metis-1' onclick='deleteFunction(".$student_ID.")'><i class='fa fa-close'></i></button>
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