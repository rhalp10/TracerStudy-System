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
					$student_IDNumber = $getData[0]	;			
					$student_fName = $getData[1];
					$student_mName = $getData[2];
					$student_lName = $getData[3];
					$student_address = $getData[4];
					$student_civilStat = ucwords($getData[5]);
					$student_dob = $getData[6];
					$student_gender = $getData[7];
					$student_contact = $getData[8];
					// $student_admission = strtotime($getData[9]);
					$student_admission = new DateTime($getData[9]);
					$student_admission = $student_admission->format('Y-m-d');
					// $student_admission = date('Y-m-d',$student_admission);
					// $student_year_grad = strtotime($getData[10]);
					// $student_year_grad = date('Y-m-d',$student_year_grad);

					$student_year_grad = new DateTime($getData[10]);
					$student_year_grad = $student_year_grad->format('Y-m-d');
					$student_department = ucwords($getData[11]);
					$sql = mysqli_query($con,"SELECT * FROM `marital_status` WHERE marital_Name like '%$student_civilStat%'");
					$mstat = mysqli_fetch_array($sql);
					$student_civilStat = $mstat['ID'];
					
					$sql = mysqli_query($con,"SELECT * FROM `cvsu_course` WHERE course_name like '%$student_department%' || course_acronym like '%$student_department%'");
					$dep = mysqli_fetch_array($sql);
					$student_department = $dep['course_ID'];
					if (strtoupper($student_gender) == 'MALE') {
						$student_gender = "M";
					}
					if (strtoupper($student_gender) == 'FEMALE') {
						$student_gender = "F";
					}
	 				$sql = "INSERT INTO `user_student_detail` 
(
`student_ID`, 
`student_userID`,
 `student_img`,
 `student_IDNumber`,
 `student_fName`,
 `student_mName`, 
`student_lName`,
 `student_address`,
 `student_civilStat`,
 `student_dob`,
 `student_gender`,
 `student_contact`,
 `student_admission`,
 `student_year_grad`,
 `student_department`,
 `student_status`,
 `student_secretquestion`,
 `student_secretanswer`) 
VALUES 
(
NULL,
 NULL,
 'temp.gif',
 '".$student_IDNumber."',
 '".$student_fName."',
 '".$student_mName."',
 '".$student_lName."',
 '".$student_address."',
 '".$student_civilStat."',
 '".$student_dob."',
 '".$student_gender."',
 '".$student_contact."',
 '".$student_admission."',
 '".$student_year_grad."',
 '".$student_department."',
 'unregister',
 NULL,
 NULL)";
	                   $result = mysqli_query($con, $sql);
					if(!isset($result))
					{
						echo "<script type=\"text/javascript\">
								alert(\"Invalid File:Please Upload CSV File.\");
								window.location = \"../recordstudent.php\"
							  </script>";		
					}
					else {
						  echo "<script type=\"text/javascript\">
							alert(\"CSV File has been successfully Imported.\");
							window.location = \"../recordstudent.php\"
						</script>";
					}
					// echo "<script>alert('successfully Imported!');
					// 									window.location='../recordstudent.php';
					// 								</script>";
 					
 				}
	         $count++;
	         }
			
	         fclose($file);	
		 }

	}	 
// if(isset($_POST["Import_teacher"])){

// 	"INSERT INTO `user_teacher_detail` 
// 	(`teacher_ID`,
// 	`teacher_userID`,
// 	`teacher_img`,
// 	`teacher_facultyID`,
// 	`teacher_fName`,
// 	`teacher_mName`,
// 	`teacher_lName`,
// 	`teacher_gender`,
// 	`teacher_dob`,
// 	`teacher_contact`,
// 	`teacher_address`,
// 	`teacher_civilStat`,
// 	`teacher_department`,
// 	`teacher_status`,
// 	`teacher_secretquestion`,
// 	`teacher_secretanswer`) 
// 	VALUES (
// 	NULL,
// 	NULL,
// 	'temp.gif',
// 	NULL,
// 	NULL,
// 	NULL,
// 	NULL,
// 	NULL,
// 	NULL,
// 	NULL,
// 	NULL,
// 	NULL,
// 	NULL,
// 	'unregister',
// 	NULL,
// 	NULL);"

// }
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