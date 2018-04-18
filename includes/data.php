<?php
require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';
require_once './classes/FilterForm.php';
require_once './includes/data.php';
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$sql = "SELECT id FROM user WHERE email='$email'";
$stmt = $db->query($sql);
$rows = $stmt->fetchAll();
if ($rows === 0) {
  //Insert bei ankommenden Form Daten
  if (count($formData) === 4) {
    $db->insert($formData);
  }
} else {
  echo "Pech jehabt, Alta!<br>Deine Email oda Dein <br>Passwort jibt es schon!<br>Probiers einfach nochma!";
}
