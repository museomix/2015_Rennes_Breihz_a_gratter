<?php
  require_once 'medoo/medoo.php';

  $database = new medoo([
    'database_type' => 'mysql',
    'database_name' => 'myDBname',
    'server' => 'myDBserver',
    'username' => 'myUserDBname',
    'password' => 'myDBpassword',
    'charset' => 'utf8',
  ]);
?>
