<?php

require_once '../classes/DbClass.php';
require_once '../classes/DbClassExt.php';
require_once '../classes/FilterForm.php';
require_once 'funktionen.php';
require_once '../config.php';
$meldung = "";
$emailNL = "";
$emailNewsletter = filter_input(INPUT_POST, 'emailNewsletter', FILTER_VALIDATE_EMAIL);
$emailNewsletterStr = filter_input(INPUT_POST, 'emailNewsletter', FILTER_SANITIZE_STRING );
//var_dump($emailNewsletterStr);
if (isset($emailNewsletter) && $emailNewsletter !== "" && !empty($emailNewsletter)) {
  $emailNL = $emailNewsletter;
}
if (!is_mail($emailNL)) {
  $meldung = $meldung . "Das ist keine gültige Emailadresse<br>";
} else {
  try {
    $db = new DbClass('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    $e->getCode();
  }
  //$db->setTable('mail');
  $sql1 = "SELECT id FROM mail WHERE email='".$emailNewsletterStr."'";
  $stmt1 = $db->query($sql1);
  $rows = $stmt1->fetchAll(); 
  //var_dump($rows);
  if (!$rows > 0) {
    $meldung=$meldung."Herzlichen Glückwunsch!<br>";
    //Insert bei ankommenden Form Daten
    $sql2 = "INSERT INTO mail(email) VALUES('$emailNL')";
    $stmt2 = $db->query($sql2);
    //var_dump($stmt2);
    if (!$stmt2) {
      $meldung = $meldung = $sql2 . ":<br>Abbruch der Query";
    } else{
      $meldung = $meldung . "<br>Sie haben sich registriert";
    }
  }
  else{
    $meldung=$meldung."Name schon benutzt";   
  }    
  } 
  echo $meldung;




