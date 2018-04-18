(function (wert) {
 ajax('get', 'mailcheck.php', {email: wert}, function (r) {
  console.log(r);
 });
})();