<?php
## Zugriff für User erlaubt
$rolle_erlaubt = 'redakteur';
## Wohin möchte ich Weiterleiten, wenn nicht eingeloggt
$loginscript = 'index.php';
##gibt es keinen authentifizierten User in der Session?
if(!isset($_SESSION['aut_user'])){
    $_SESSION['login_message'] = '<b>Für den Zugriff auf diese Seite müssen Sie sich zuerst einloggen</b>';
    ## Weiterleitung
    header("Location: ".$loginscript);
    #PHP-verarbeitung beenden
    exit;
}   // wenn eingeloggt, aber keine Rechte:
elseif(!in_array($rolle_erlaubt, $_SESSION['rollenbeschreibung'])){
    $_SESSION['login_message'] = "Sie sind nicht autorisiert für den Zugriff auf: URL". $_SERVER['REQUEST_URI'];
    header("Location: ".$loginscript);
    exit;
		
}	
