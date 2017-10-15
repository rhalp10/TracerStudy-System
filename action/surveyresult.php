<?php 
$json = $_REQUEST['result'];
$survey_result	 = json_decode($json);
// access name of $survey object
echo $survey_result->Name; // JavaScript: value
echo $survey_result->P_Address;
echo $survey_result->Email;
echo $survey_result->Telephone;
echo $survey_result->Mobile;
echo $survey_result->CivilStatus;
echo $survey_result->Gender;
echo $survey_result->Birthday;
echo $survey_result->Region_of_Origin;
echo $survey_result->Location_of_Residence;
echo $survey_result->Educ_Dec_only;

// columns{  Degree_Specialization
//   College_or_University
//   Year_Graduate
//   Honors_Awards_Received
// }


// foreach ($survey_result->Educ_Dec_only) {
//     echo $survey_result->Educ_Dec_only['Degree_Specialization'];
//     echo $survey_result->Educ_Dec_only['College_or_University'];
//     echo $survey_result->Educ_Dec_only['Year_Graduate'];
//     echo $survey_result->Educ_Dec_only['Honors_Awards_Received'];
// }

// $json = <<<JSON
// {
//     "title":"A Title Here",
//     "images":[
//         {
//             "coverType":"fanart",
//             "url":"some_random_file_here.jpg"
//         },
//         {
//             "coverType":"banner",
//             "url":"another_random_file_here.jpg"
//         },
//         {
//             "coverType":"poster",
//             "url":"yet_another_random_file_here.jpg"
//         }
//     ]
// }
// JSON;
// print_r($json);

foreach ($survey_result->Educ_Dec_only as $data)
{
	//each
        echo 'Degree_Specialization: ' .$data->Degree_Specialization .'<br/>';
        echo 'College_or_University: ' .$data->College_or_University .'<br/>';
        echo 'Honors_Awards_Received: ' .$data->Honors_Awards_Received .'<br/>';
    
}
?>