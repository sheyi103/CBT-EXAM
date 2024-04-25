<?php 
 include("../../../conn.php");

 extract($_POST);

 $selCourse = $conn->query("SELECT * FROM exam_category_question_tbl WHERE title='$title'  and exam_id='$examSelected'");


  if($selCourse->rowCount() > 0)
 {
	$res = array("res" => "exist", "CategoryTitle" => $title);
 }
 else
 {
    
	$insExam = $conn->query("INSERT INTO exam_category_question_tbl(description,course_id,title,exam_id) VALUES('$description','$courseSelected','$title','$examSelected') ");
	
	if($insExam)
	{
		$res = array("res" => "success", "CategoryTitle" => $title);
	}
	else
	{
		$res = array("res" => "failed", "CategoryTitle" => $title);
	}


 }




 echo json_encode($res);
 ?>