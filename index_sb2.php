<?php
session_start();
require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';
require_once './classes/FilterForm.php';
require_once './includes/data.php';
//require_once './javascript/ajax.js';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>PHP_kurs</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="./javascript/ajax.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="main">
            <div id="header">
                <div id="logo">
                    <div id="logo_text">
                        <!-- class="logo_colour", allows you to change the colour of the text -->
                        <h1><a href="index.php">php<span class="logo_colour">kurs_1</span></a></h1>
                        <h2>Beispieltemplate für eine dynamische Webanwendung</h2>
                    </div>
                </div>
                <div id="menubar">
                    <ul id="menu">
                        <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
                        <li><a href="index.php">Home</a></li>
                        <li class="selected"><a href="register.php">Registrieren</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="galerie.php">Galerie</a></li>
                        <li><a href="contact.php">Kontakt</a></li>
                    </ul>
                </div>
            </div>
            <div id="content_header"></div>
            <div id="site_content">
                <div id="sidebar_container">
                    <div class="sidebar">
                        <div class="sidebar_top"></div>
                        <div class="sidebar_item">
                            <!-- insert your sidebar items here -->
                            <h3>Latest News</h3>
                            <h4>New Website Launched</h4>
                            <h5>February 1st, 2014</h5>
                            <p>2014 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
                        </div>
                        <div class="sidebar_base"></div>
                    </div>
                    <div class="sidebar">
                        <div class="sidebar_top"></div>
                        <div class="sidebar_item">
                            <h3>Useful Links</h3>
                            <ul>
                                <?php
                                include 'includes/menue.php';
                                ?>
                                <li><a href="#">link 2</a></li>
                                <li><a href="#">link 3</a></li>
                                <li><a href="#">link 4</a></li>
                            </ul>
                        </div>
                        <div class="sidebar_base"></div>
                    </div>
                    <div class="sidebar">
                        <div class="sidebar_top"></div>
                        <div class="sidebar_item">
                            <!-- Login / Logout -->
                            <?php
                            include 'includes/login_out.php';
                            ?>
                        </div>
                        <div class="sidebar_base"></div>
                    </div>
                </div>
                <div id="content">
                    <!-- insert the page content here -->
                    <h1>Bitte registrieren Sie sich</h1>
                    <div id="output">......</div><br>
                    <?php
                    $message = "";
                    require_once './includes/funktionen.php';
                    if (isset($_POST['password']) == false || empty($meldung) == false) {
                      ?>
                      <div class="form_settings">
                          <form action="index_sb2.php" method="post">
                              <label for="vorname">Vorname</label><br>
                              <input type="text" id="vorname" name="vorname" value="" size="20" maxlength="20"  class="contact" >
                              <br>
                              <label for="nachname">Nachname</label><br>
                              <input type="text" id="nachname" name="nachname" value="" size="20" maxlength="20" class="contact" >
                              <br>		    
                              <label for="email">Username/E-mail</label><br />
                              <input type="text" id="email" name="email" value="" size="20" maxlength="20" class="contact" >
                              <br>
                              <label for="password">Passwort</label><br>
                              <input type="password" id="password" name="password" value="" size="20" maxlength="20" class="contact">
                              <br>
                              <br>
                              <input class="submit" type="submit" name="button" value="versenden">
                          </form>
                      </div>
                      <?php
                    }
                    ?>
                    <!-- ende content -->	
                </div>
            </div>
            <div id="content_footer"></div>
            <div id="footer">
                <p><a href="index.html">Home</a> | <a href="examples.html">Examples</a> | <a href="page.html">A Page</a> | <a href="another_page.html">Another Page</a> | <a href="contact.html">Contact Us</a></p>
                <p>Copyright &copy; simplestyle_horizon | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Simple web templates by HTML5</a></p>
            </div>
        </div>
        <script>
          (function () {
              var output = document.querySelector('#output');
              var emailField = document.querySelector('#email');
              field.addEventListener('change', function () {
                  ajax('post', './includes/mail.php', {email: emailField.value}, function (r) {
                      if (r.length > 0) {
                          text = r;                          
                          output.innerHTML = text;
                          emailField.style.backgroundColor = '#ff0000';
                      }
                  });
              });
          })();
        </script>
        //an check schicken, hier SELECT-Abfrage
    </body>
</html>
