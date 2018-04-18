<?php
function sauber($text,$laenge){
  $text= str_replace('"', '', $text);
  $text= str_replace("'", "", $text);  
  $text= strip_tags($text);
  $text = trim($text);
  $text = substr($text, 0, $laenge);
  return $text;
}

### Anforderungen an eine gültige Emailadresse
##  muss genau ein @ enthalten

## muss mindestens einen . enthalten, der muss rechts vom @ stehen

## Top-Level-Domain muss aus mindestens 2 Zeichen bestehen

## darf kein Leerzeichen enthalten

## mindestens 6 Zeichen lang, maximal 255 Zeichen

function is_mail($email){
    # verwende explode für die Suche nach dem @
    $at_teile = explode('@', $email);
    ## gibt es mehr als ein @ bzw. kein @: keine email
    if(count($at_teile) != 2){
        return false;
    }
    # verwende explode für die Suche nach einem Leerzeichen
    $leer_teile =  explode(' ', $email);
     if(count($leer_teile) > 1){
        return false;
    }
    # Suche nach dem . mit explode nach dem @
    $punkt_teile = explode('.', $at_teile[1]);
    if(count($punkt_teile) < 2){
        return false;
    }
    # minmale oder Maximale Anzahl von Zeichen mit strlen() prüfen
    if(strlen($email) < 6 || strlen($email) > 255 ){
        return false;
    }
    # Länge der Top-Level-Domain?
    ## letzen index des Arrays $punkt_teile ermitteln
    $letzter_index = count($punkt_teile) -1;
    ## ist die Top-Level-Domain kürzer als 2 Zeichen
    if(strlen($punkt_teile[$letzter_index]) < 2){
        return false;
    }
    return true;
}
function authentifiziere_user($email, $password, $link){
    if(empty($email) || empty($password)){
        return false;
    }
    ## 1. SQL-Statement formulieren
    $sql = "SELECT email, password FROM user WHERE email='".$email."'";
    ## 2. SQL-Statement abschicken / Ergebnis entgegennehmen
    $result = mysqli_query($link, $sql);
    # sollte die Abfrage keinen Erfolg haben, wird der User nicht engeloggt
    if(!$result){
        return false;
    } ## wenn es mehr als ein oder kein Ergebnis der Abfrage gibt: nicht einloggen
    if(mysqli_num_rows($result) != 1){
        return false;
    }
    else{## Datensatz zur email auslesen
        $datensatz = mysqli_fetch_array($result, MYSQLI_ASSOC);
        ## verschlüsseltes Passwort aus der Datenbank gegen eingegebenes Passwort checken
        $check = password_verify($password, $datensatz['password']);
        if($check){
            return true;
        }
    }
    return false;
}