<?php
include('db.php');

 function getdb(){
	
	    return include('db.php');
}

	 
  if(isset($_POST["Export"])){
		 
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('student_IDNumber', 'student_fName', 'student_mName', 'student_lName', 'student_address','student_civilStat', 'student_gender','student_dob', 'student_contact', 'student_admission', 'student_year_grad', 'student_department'));  
      $query = "SELECT * from user_student_detail ORDER BY student_ID DESC";  
      $result = mysqli_query($con, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 } 

 function get_all_records(){
    include('db.php');
    $Sql = "SELECT * FROM user_student_detail";
    $result = mysqli_query($con, $Sql);  


    if (mysqli_num_rows($result) > 0) {
     echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
                          <th>student_IDNumber</th>
                          <th>student_fName</th>
                          <th>student_mName</th>
                          <th>student_lName</th>
                          <th>student_civilStat</th>
                          <th>student_department</th>
                        </tr></thead><tbody>";


     while($row = mysqli_fetch_assoc($result)) {

         echo "<tr><td>" . $row['student_IDNumber']."</td>
                   <td>" . $row['student_fName']."</td>
                   <td>" . $row['student_mName']."</td>
                   <td>" . $row['student_lName']."</td>
                   <td>" . $row['student_civilStat']."</td>
                   <td>" . $row['student_department']."</td></tr>";        
     }
    
     echo "</tbody></table></div>";
     
} else {
     echo "you have no records";
}
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

</head>

<body>
    <div id="wrap">
        <div class="container">
        	<div>
            <form class="form-horizontal" action="csv.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <input type="submit" name="Export" class="btn btn-success" value="export to excel"/>
                            </div>
                   </div>                    
            </form>           
 			</div>
        
            <?php
               get_all_records();
            ?>
        </div>
    </div>
</body>

</html>