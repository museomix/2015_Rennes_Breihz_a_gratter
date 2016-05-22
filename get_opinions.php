<?php

// modifs nico en cours  
  require_once 'medoo_load.php';

  if(isset($_POST['qid']) && isset($_POST['choix']) && in_array($_POST['choix'], array('OK', 'NOK')) && is_numeric($_POST['qid'])) {
  	$opinions = array();  		
	$opinions = $database->select('opinions', '*', [ "AND" => ["qid" => $_POST['qid'] , "choix[!]" => $_POST['choix']], "ORDER"=>"RAND()" ,"LIMIT" => [0,4]] ) ;
	
	 header('Content-type: application/json');
    echo json_encode(array('status' => 'ok', 'opinions' => $opinions));
  } else {
  	header('Content-type: application/json');
    echo json_encode(array('status' => 'nok'));
  }

?>
