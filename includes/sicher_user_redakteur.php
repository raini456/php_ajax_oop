<?php
## Wenn man in einem solchen System einen rollenbasierten Zugriff auf einzelne
## Seiten implementiert, werden schnell Seiten auftauchen, die von mehr als
## einer Rolle aufgerufen werden müssen. Entweder die Rollen werden dann ge-
## staffelt, so dass jede 'höhere' Rolle alle niedrigeren Rollen beinhaltet,
## oder die Zugriffsberechtigungen werden pro Seite im System hinterlegt.
## Das macht einen komplett anderen Aufbau der Website notwendig.
## Deshalb hier der halbherzige Zwischenschritt mit dem 2 Rollen auf eine
## Seite zugreifen können: 
## Zugriff für User / Redakteur erlaubt
$rolle1_erlaubt = 'user';
$rolle2_erlaubt = 'redakteur';
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
elseif(!in_array($rolle1_erlaubt, $_SESSION['rollenbeschreibung']) && !in_array($rolle2_erlaubt, $_SESSION['rollenbeschreibung']) ){
    $_SESSION['login_message'] = "Sie sind nicht autorisiert für den Zugriff auf: URL". $_SERVER['REQUEST_URI'];
    header("Location: ".$loginscript);
    exit;
		
}	
