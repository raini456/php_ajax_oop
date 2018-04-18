<?php
## Menüpunkte für eingeloggte User
if (isset($_SESSION['aut_user'])&& in_array('user', $_SESSION['rollenbeschreibung'])) {
    echo '<li><a href="posts.php">Post verfassen</a></li>';
    echo '<li><a href="postadmin.php">Posts administrieren</a></li>';
    echo '<li><a href="upload.php">Bilder hochladen</a></li>';
}
## Menüpunkte für eingeloggte Redakteure
if (isset($_SESSION['aut_user'])&& in_array('redakteur', $_SESSION['rollenbeschreibung'])) {
    echo '<li><a href="main_content.php">Startseiteninhalt Verfassen</a></li>';
    echo '<li><a href="mainadmin.php">Startseiteninhalt Verwalten</a></li>';
    echo '<li><a href="upload.php">Bilder hochladen</a></li>';
}
## Menüpunkte für eingeloggte Admins
if (isset($_SESSION['aut_user'])&& in_array('admin', $_SESSION['rollenbeschreibung'])) {
    echo '<li><a href="index_admin.php">Admin Übersicht</a></li>';
}
?>