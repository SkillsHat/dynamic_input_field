<?php
//insert.php
$connect = new mysqli("localhost", "root", "", "dynamic");
if(isset($_POST["quiz_question"]))
{
 $quiz_question = $_POST["quiz_question"];
 $quiz_opt1 = $_POST["quiz_opt1"];
 $quiz_opt2 = $_POST["quiz_opt2"];
 $quiz_opt3 = $_POST["quiz_opt3"];
 $quiz_opt4 = $_POST["quiz_opt4"];
 $quiz_c_ans = $_POST["quiz_c_ans"];
 $quiz_explan = $_POST["quiz_explan"];
 $query = '';
 for($count = 0; $count<count($quiz_question); $count++)
 {
  $quiz_question_clean = $connect->real_escape_string($quiz_question[$count]);
  $quiz_opt1_clean = $connect->real_escape_string($quiz_opt1[$count]);
  $quiz_opt2_clean = $connect->real_escape_string($quiz_opt2[$count]);
  $quiz_opt3_clean = $connect->real_escape_string($quiz_opt3[$count]);
  $quiz_opt4_clean = $connect->real_escape_string($quiz_opt4[$count]);
  $quiz_c_ans_clean = $connect->real_escape_string($quiz_c_ans[$count]);
  $quiz_explan_clean = $connect->real_escape_string($quiz_explan[$count]);
  if($quiz_question_clean != '' && $quiz_opt1_clean != '' && $quiz_opt2_clean != '' && $quiz_opt3_clean != '' && $quiz_opt4_clean != '' && $quiz_c_ans_clean != '' && $quiz_explan_clean != '')
  {
   $query .= '
   INSERT INTO quiz(question, option1, option2, option3, option4, correct_answer, explains) 
   VALUES("'.$quiz_question_clean.'", 
          "'.$quiz_opt1_clean.'", 
          "'.$quiz_opt2_clean.'",
          "'.$quiz_opt3_clean.'",
          "'.$quiz_opt4_clean.'",
          "'.$quiz_c_ans_clean.'",
          "'.$quiz_explan_clean.'"); 
   ';
  }
 }
 if($query != '')
 {
  if($connect->multi_query($query))
  {
   echo 'Item Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>