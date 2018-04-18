<?php
$hostname = "localhost"; /*IP des MySQL-Servers */
$username = "db_blog"; /* MySQL-Username */
$password = "fmfks5YtBw0i66Ah";/* MySQL-Passwort */
$dbname = "db_blog";


$link=mysqli_connect($hostname, $username, $password, $dbname) or die("Kann die Datenbank nicht erreichen");
//mysqli_select_db($link, $dbname) or die( "Kann die Datenbank nicht waehlen");
?>