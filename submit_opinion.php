<?php
  require_once 'medoo_load.php';

  if(isset($_POST['opinion'])) {
	  $opinion = $_POST['opinion'];
	  $opinion['comment'] = htmlentities($opinion['comment']);
	  
	  if($opinion['comment'] != '') {
	  	$database->insert('opinions', $opinion);
	  }
	  	  
	  header('Content-type: application/json');
	  echo json_encode(array('status' => 'ok'));
  }
?>
