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
        <title>Newsletter</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="./javascript/ajax.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-0 col-lg-1 col-md-1 col-sm-0 col-xl-1 bg-success pt-5 sidebar"></div>
                <div class="col-12 col-lg-10 col-md-10 col-sm-10 col-xl-10 bg-warning pt-5">
                    <h2>Abonniere unseren Newsletter</h2>
                    <hr>
                    <div id="output">....</div>
                    <hr>                    
                    <label for="inputEmail">Bitte Email eingeben</label><br>
                    <input type="email" name="emailNewsletter" id="emailNewsletter">                    
                </div>                
        </div>
        <script>
          (function () {              
              var output = document.querySelector('#output');
              var emailNewsletter = document.querySelector('#emailNewsletter');
              var requestNL="";
              emailNewsletter.addEventListener('change', 
              function () {
                  requestNL=emailNewsletter.value;  
                  //alert(requestNL);
                  ajax('post', 'includes/newsletter.php', {emailNewsletter: requestNL}, function (r) {
                      if (r.length > 0) {
                          text = r;                          
                          output.innerHTML = text;
                          emailNewsletter.style.backgroundColor = '#ff0000';
                      }
                  });
              });
          })();
        </script>
        
    </body>
</html>
