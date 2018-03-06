<?php
 $con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");

 if(isset($_POST["Import_student"])){
		
		$filename=$_FILES["file"]["tmp_name"];		
 
 	
		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
		  		$count = 0;
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
 
 				if ($count == 0) {
 					
 				}
 				else{
	 				$sql = "INSERT into user_student_detail (
	 				student_IDNumber
	 				,student_fName
,student_mName
,student_lName
,student_address
,student_civilStat
,student_dob
,student_gender
,student_contact
,student_admission
,student_year_grad
,student_department

) 
	                   values (
	                   '".$getData[0]."',
	                   '".$getData[1]."',
	                   '".$getData[2]."',
	                   '".$getData[3]."',
	                   '".$getData[4]."',
	                   '".$getData[5]."',
	                   '".$getData[6]."',
	                   '".$getData[7]."',
	                   '".$getData[8]."',
	                   '".$getData[9]."',
	                   '".$getData[10]."',
	                   '".$getData[11]."',

	               )
	                   ";
	                   $result = mysqli_query($con, $sql);
					if(!isset($result))
					{
						echo "<script type=\"text/javascript\">
								alert(\"Invalid File:Please Upload CSV File.\");
								window.location = \"index.php\"
							  </script>";		
					}
					else {
						  echo "<script type=\"text/javascript\">
							alert(\"CSV File has been successfully Imported.\");
							window.location = \"index.php\"
						</script>";
					}
 					
 				}
	         $count++;
	         }
			
	         fclose($file);	
		 }
	}	 
if(isset($_POST["Import_teacher"])){

}
  if(isset($_POST["Export"])){
		 
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'First Name', 'Last Name', 'Email', 'Joining Date'));  
      $query = "SELECT * from employeeinfo ORDER BY emp_id DESC";  
      $result = mysqli_query($con, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 } 
 
 ?>