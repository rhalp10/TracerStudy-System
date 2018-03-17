
<?php

 if(isset($_POST["Import"])){
		
		$filename=$_FILES["file"]["tmp_name"];		
 
 
		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
 
 
	           $sql = "INSERT into employeeinfo (emp_id,firstname,lastname,email,reg_date) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')";
                   $result = mysqli_query($con, $sql);
				if(!isset($result))
				{
					// echo "<script type=\"text/javascript\">
					// 		alert(\"Invalid File:Please Upload CSV File.\");
					// 		window.location = \"index.php\"
					// 	  </script>";		
				}
				else {
					//   echo "<script type=\"text/javascript\">
					// 	alert(\"CSV File has been successfully Imported.\");
					// 	window.location = \"index.php\"
					// </script>";
				}
	         }
			
	         fclose($file);	
		 }
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

 function getdb(){
$servername = "localhost";
$username = "root";
$password = "";
$db = "tracerdata";
 
try {
   
    $conn = mysqli_connect($servername, $username, $password, $db);
     //echo "Connected successfully"; 
    }
catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}