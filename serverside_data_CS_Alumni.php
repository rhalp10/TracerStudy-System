<?php
/* Database connection start */
include('session.php');
/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	
	0 =>'year_grad'
);

// getting total number records without any search
$sql = "SELECT DISTINCT YEAR(student_year_grad) as year_grad ";
$sql.=" FROM `user_student_detail` year_grad  WHERE student_department = 'COMSCI'";
$query=mysqli_query($con, $sql) or die("serverside_data_CS_Alumni.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


// $sql = "SELECT DISTINCT YEAR(student_year_grad) as year_grad ";
// $sql.=" FROM `user_student_detail` year_grad  WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( YEAR(student_year_grad) LIKE '".$requestData['search']['value']."%' )";
	// $sql.=" OR student_department LIKE '%".$requestData['search']['value']."%' )";
}
$query=mysqli_query($con, $sql) or die("serverside_data_CS_Alumni.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY student_year_grad Asc";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($con, $sql) or die("serverside_data_CS_Alumni.php: get employees");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	$course = "COMSCI";
	$year_grad = $row["year_grad"];
	$nestedData[]= "<div class='forum-list-hover col-sm-1' style='height: 20px;'>
                    <br>
                      </div>
                      <div class='col-sm-6 forum-list-content' data-id='".$year_grad."'>
                      <a href='alumni_view.php?course=".$course."&year=".$year_grad." ' >".$year_grad."</a>
                     <br>
                      </div>
                      <div class='col-sm-2 forum-list-content-stat'>
                      <br>
                      </div>
                      <div class='col-sm-3' style='background-color: #444444;color: white;' >
                      <a href='alumni_view.php?course=".$course."&year=".$year_grad." ' style='background-color: #444444;color: white;'> VIEW</a>
                      </div>
                      ";
	
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
