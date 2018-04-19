<?php

require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';
require_once './classes/FilterForm.php';
$password= filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
if (isset($password)) {
  $f = new FilterForm();
  $f->setFilter('vorname', 513);
  $f->setFilter('nachname', 513);
  $f->setFilter('email', FILTER_VALIDATE_EMAIL);
  $f->setFilter('password', 513);
  $s = $f->getScheme();
  $formData = $f->filter(INPUT_POST);
  $password = sha1(SALT . $password);
  //datenbank
  try {
    $db = new DbClass('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    $e->getCode();
  }
  $db->setTable('user');  
  $sql = "SELECT id FROM user WHERE email='$email'";
  $stmt = $db->query($sql);
  $rows = $stmt->fetchAll();
  if ($rows === 0) {
    //Insert bei ankommenden Form Daten
    if (count($formData) === 4) {
      $db->insert($formData);
    }
  } else {
    $message="Deine Email gibt es schon!<br>Probiers einfach nochmal!";
    return $message;
  }
  
  
  
  $meldung="";
if(isset($email)){
  $email=$email;
}
if(!is_mail($email)){
  $meldung=$meldung."Das ist keine gültige Emailadresse<br>";
}
else{
  $sql="SELECT id FROM user WHERE email='".$email."'";
  if(!$stmt=$db->query($sql)){
    echo $sql."<br>";    
  }
  $rows=$stmt->fetchAll();
  if($rows!=0){
    $meldung=$meldung."Diese Mailadresse wurde bereits registriert";
  }
  echo $meldung;
}
}
