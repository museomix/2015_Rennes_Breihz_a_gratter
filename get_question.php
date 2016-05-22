<?php
  require_once 'medoo_load.php';

  if(!empty($_POST['qid']) && is_numeric($_POST['qid'])) {
  	$questions = $database->select('questions', '*', ['id[!]' => $_POST['qid']]);  	
  } else {
  	$questions = $database->select('questions', '*');
  }

  if(!empty($questions)) {
    $question_count = count($questions);
    $rand_question_index = rand(0, $question_count - 1);
	  
    header('Content-type: application/json');
    echo json_encode(array('status' => 'ok', 'qid' => $questions[$rand_question_index]['id'], 'question' => $questions[$rand_question_index]['content']));
  } else {
  	header('Content-type: application/json');
    echo json_encode(array('status' => 'nok'));
  }
?>
