<?php
include("db.php");
    $survey_sql = mysqli_query($con,"SELECT s.survey_id, 
       s.survey_name, 
       s.survey_date, 
       sq.survey_qid, 
       sq.question, 
       sao.survey_aid, 
       sao.answer, 
       (SELECT IF(sao.answer = 'other(s)' 
                   OR sao.answer = 'others' 
                   OR sao.answer = 'other', 
               Coalesce((SELECT 
               Count(sa.survey_aid) 
                         FROM   `survey_answer_other` sa 
                         WHERE 
               sa.survey_aid = sao.survey_aid 
                         GROUP  BY sa.survey_aid), 0), 
                       Coalesce((SELECT Count(sa.survey_aid) 
                                 FROM   `survey_answer` sa 
                                 WHERE  sa.survey_aid = sao.survey_aid 
                                 GROUP  BY sa.survey_aid), 0))) count_answer, 
       Concat('y:', (SELECT IF(sao.answer = 'other(s)' 
                                OR sao.answer = 'others' 
                                OR sao.answer = 'other', Coalesce( 
                            (SELECT Count(sa.survey_aid) 
                             FROM   `survey_answer_other` sa 
                             WHERE 
                            sa.survey_aid = sao.survey_aid 
                                      GROUP  BY 
                            sa.survey_aid), 0), 
                                                 Coalesce( 
                            (SELECT Count(sa.survey_aid) 
                             FROM   `survey_answer` sa 
                             WHERE 
                                                 sa.survey_aid = sao.survey_aid 
                                                           GROUP  BY 
                            sa.survey_aid), 0))), ', label:', sao.answer) 
                                                                diag_data_label 
FROM   survey_anweroptions sao 
       LEFT JOIN survey_questionnaire sq 
              ON sq.survey_qid = sao.survey_qid 
       LEFT JOIN survey s 
              ON s.survey_id = sq.survey_id 
WHERE  s.visibility = 1 
ORDER  BY sq.survey_qid ");
    $z = array();
    $zcx = array();
    $data_label = array();
    $data_value = array();
    while ($survey = mysqli_fetch_array($survey_sql))
    {
            $z[] = $survey['diag_data_label'];
            $piece = explode(",", $survey['diag_data_label']);
            $part = $piece[0];
            
            $data = explode(":", $part);
            $data_label[] = $data[0];
            $data_value[] = $data[1];
          
    }
    // echo        $data_label =  json_encode($data_label);
    // echo        $data_value =  json_encode($data_value);
        
         foreach ($z as $key => $value) {
          $zcx[] =  "{".$value."}";
          
         }
         
   $jencode_title =  json_encode($zcx);
  $jencode_title = str_replace("\"","",$jencode_title);
   $jencode_title = str_replace("}","\"}",$jencode_title);
 echo   $jencode_title = str_replace("label:","label:\"",$jencode_title);
 ?>

