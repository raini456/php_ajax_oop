<?php

require_once './config.php';
require_once './classes/DbClass.php';

$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
if (is_string($email)) {  
  try {
    $db = new DbClass('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo $errorCodes($e->getCode()[$language]);
  }
  $db->setTable('user');
  
  $sql = "SELECT email FROM email WHERE email='$email'";
  $stmt = $db->query($sql);
  $result=$stmt->fetch(PDO::FETCH_ASSOC);
  
  echo $result['email'];
}
