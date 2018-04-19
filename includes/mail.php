<?php
require_once './classes/DbClass.php';
$meldung="";
if(isset($_POST['email'])){
  $email=$_POST['email'];
}
if(is_mail($email)){
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



