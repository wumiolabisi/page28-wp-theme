/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************!*\
  !*** ./src/js/ajax.js ***!
  \************************/
(function ($) {
  $(document).ready(function () {
    /* *
    * Appel Ajax pour la recherche d'oeuvre
    * */

    $('.p28-search-form').submit(function (e) {
      // Empêcher l'envoi classique du formulaire
      e.preventDefault();

      // L'URL qui réceptionne les requêtes Ajax dans l'attribut "action" de <form>
      var ajaxurl = $(this).attr('action');

      // Les données du formulaire

      var data = {
        format: $(this).find('input[name=format-oeuvre]:checked').val(),
        genre: $(this).find('select[name=genre]').val(),
        tag: $(this).find('select[name=tag]').val(),
        action: $(this).find('input[name=action]').val(),
        nonce: $(this).find('input[name=nonce]').val(),
        posttype: $(this).find('input[name=posttype]').val()
      };

      // Requête Ajax en JS natif via Fetch

      fetch(ajaxurl, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
          'Cache-Control': 'no-cache'
        },
        body: new URLSearchParams(data)
      }).then(function (response) {
        return response.json();
      }).then(function (response) {
        // En cas d'erreur
        if (!response.success) {
          console.log(response.data);
          return;
        }
        // Et en cas de réussite : afficher le HTML
        $('.p28-search-result').html(response.data);
      });
    });
  });
})(jQuery);
/******/ })()
;