<?php
 if(!isset($_SESSION['aut_user'])){
 ?>
 <h3>Login</h3>
 <form method="post" action="auth.php" id="login_form">
   <p>
     <label for="lnemail">Login</label><br>
     <input class="search" type="text" name="email" id="lnemail"><br>
     <label for="lnpassword">Passwort</label>
     <input  class="search" type="password" name="password" id="lnpassword"><br>
     <input class="submit" type="submit" name="button" value="login">
   </p>
 </form>
 <?php
 }
 else{
     echo "Hallo ".$_SESSION['aut_user']."! <br> <a href='logout.php'>abmelden</a>";
 }
 ?>