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
                    <label for="emailNewsletter" id="labelEmailNL">Bitte Email eingeben</label><br>
                    <input type="email" name="emailNewsletter" id="emailNewsletter">                    
                </div>                
            </div>
            <script>

              (function () {
                  var requestNL_all = {};
//                  requestNL_all[0] = emailNewsletter.value;
                  var output = document.querySelector('#output');
                  var emailNewsletter = document.querySelector('#emailNewsletter');
                  var labelEmailNL= document.querySelector('#labelEmailNL');
                  var requestNL = "";

                  emailNewsletter.addEventListener('change',
                          function () {
                              requestNL = emailNewsletter.value;
                              ajax('post', 'includes/newsletter.php', {emailNewsletter: requestNL}, function (r) {
                                  if (r.length > 0) {
                                      text = r;
                                      output.innerHTML = "<h1>" + text + "</h1>";
                                      output.style.textAlign='center';
                                      emailNewsletter.style.backgroundColor = '#ff0000';
                                  }
                                  if(r.length>20){
                                    emailNewsletter.style.display='none';
                                    labelEmailNL.style.display='none';
                                    
                                  }
                              });
                              requestNL_changed = emailNewsletter.value;
                              //alert(requestNL_all[0] + ", " + requestNL_all[1]);
//                              if (requestNL_all[0].length !== requestNL_all[0].length) {
//                                  emailNewsletter.style.backgroundColor = '';
//                                  requestNL_all=[];
//                              }
                          });
              })();
            </script>        
    </body>
</html>
