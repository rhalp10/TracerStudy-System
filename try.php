<?php 
include('db.php');
$jobCount = mysqli_query($con,"SELECT DISTINCT(sq6.job) as label,(SELECT COUNT( job) from  survey_question6 WHERE job=sq6.job) as y from  survey_question6 sq6  WHERE sq6.job is not null");

 // $row_count = mysqli_num_rows($jobCount);



while($row = mysqli_fetch_array($jobCount)){

					$data[] = $row[0];
       }  
$jobCount = mysqli_query($con,"SELECT DISTINCT(sq6.job) as label,(SELECT COUNT( job) from  survey_question6 WHERE job=sq6.job) as y from  survey_question6 sq6  WHERE sq6.job is not null");

 // $row_count = mysqli_num_rows($jobCount);



while($row1 = mysqli_fetch_array($jobCount)){

					$data1[] = $row1[1];
       } 
      echo  $jencode_title =  json_encode($data);
 echo  $jencode_jcount =  json_encode($data1);
       
// $datasets = [
//     [
//     	while ($d = mysqli_fetch_array($jobCount)) {
// 		  echo  "'title'=>".$d[0]."','count'=>".$d[1];
// 		}
// 		]
        // 'label'=>'',
        // 'fillColor'=> 'rgba(220,220,220,0.2)',
        // 'strokeColor'=> 'rgba(220,220,220,1)',
        // 'pointColor'=> 'rgba(220,220,220,1)',
        // 'pointStrokeColor'=> '#fff',
        // 'pointHighlightFill'=> '#fff',
        // 'pointHighlightStroke'=> 'rgba(220,220,220,1)',
        // 'data' => [1,2,3]
    
// while ($d = mysqli_fetch_array($jobCount)) {
//    $data[] = $d[0]."','".$d[1];
// }
// $a=1;
// $job = null;
// foreach ($data as $key => $value) {
// 	 $job .= "'".$value;

// 	if ($a != $row_count) {
		
// 		$job .= "',";
		
// 	}
// 	else{
// 		$job .= "'";
// 	}
// 	$a++;
// }
// $a=1;
// $jobc = null;

// foreach ($jencode_count as $key => $value) {
// 	$jobc .= $value;
// 	if ($a != $row_count) {
		

// 		$jobc .= ",";
		
// 	}
// 	$a++;
// }

  // $jencode_title = json_encode($job);
 // "<br>";
 //  echo $jencode_count = json_encode($jobc);
?>

<script type="text/javascript">
	
	// var array1 = ['a', 'b', 'c'];
// var title =  [<?php echo $job ?>]
// var jobc =  [<?php echo $jobc ?>]

// title = title.replace(' ', '');
// title.forEach(function(element) {
// 	console.log(title);
// });
// jobc.forEach(function(element) {
// 	console.log(jobc);
// });

 // var unit_array = <?php echo $job; ?>;
           

 // var option = "";
 // for (i = 0; i < title.length || i < title.jobc; i++) { 
 //     var slittitle = title[i].split(",");
 //     var slitjobc = jobc[i].split(",");
     
 //     var title_split = slittitle[i];
 //     var jobc_split = slitjobc[i];
 //     console.log({label: title_split,  y:jobc_split});
     
 // }
// var text ="g";
//  text = text.replace(new RegExp("cat","g")); 
// console.log(text);
// var myString = [<?php echo $jencode_title ?>];
// var splits = myString.split(' ');

// console.log(splits);
</script>