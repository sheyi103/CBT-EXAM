<?php 
 include("../../../conn.php");

extract($_POST);

$selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$examId' AND exam_question='$question' ");
if ($selQuest === false) {
    // Query failed, handle the error
   $errorInfo = $conn->errorInfo();
    echo "Error: " . $errorInfo[2]; // The error message is at index 2
} elseif ($selQuest->rowCount() > 0) {
	$res = array("res" => "exist", "msg" => $question);
    // Query executed successfully, check the number of rows
    
}
else
{
	$insQuest = $conn->query("INSERT INTO exam_question_tbl(exam_id,exam_question,exam_ch1,exam_ch2,exam_ch3,exam_ch4,exam_answer,exam_question_category_tbl) VALUES('$examId','$question','$choice_A','$choice_B','$choice_C','$choice_D','$correctAnswer','$questionCategory') ");

	if($insQuest)
	{
       $res = array("res" => "success", "msg" => $question);
	}
	else
	{
       $res = array("res" => "failed");
	}
}



echo json_encode($res);
 ?>