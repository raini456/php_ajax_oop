<?php
require_once '../classes/DbClass.php';
require_once 'funktionen.php';
require_once '../config.php';
$meldung="";
$emailNL="";
$emailNewsletter=filter_input(INPUT_POST, 'emailNewsletter', FILTER_VALIDATE_EMAIL);
var_dump($_POST);
if(isset($emailNewsletter) && $emailNewsletter!=="" && !empty($emailNewsletter)){
  $emailNL=$emailNewsletter;
}

if(!is_mail($emailNL)){
  $meldung=$meldung."Das ist keine gültige Emailadresse<br>";
}
else{  
  try {
    $db = new DbClass('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    $e->getCode();
  } 
  $db->setTable('mail'); 
  $sql="INSERT INTO mail(email) VALUES('$emailNL')";
  $stmt=$db->query($sql);  
  if($stmt){
    $meldung=$meldung= $sql.":<br>Abbruch der Query";    
  }
  else{
    $meldung=$meldung."Sie haben sich registriert";
  }  
  echo $meldung;
}



