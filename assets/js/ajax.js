(function ($) {
    $(document).ready(function () {

        /* *
        * 
        * Appel Ajax pour la recherche d'oeuvre
        *
        * */
        $('.p28-searchform').submit(function (e) {

            // Empêcher l'envoi classique du formulaire
            e.preventDefault();

            // L'URL qui réceptionne les requêtes Ajax dans l'attribut "action" de <form>
            const ajaxurl = $(this).attr('action');

            // Les données du formulaire

            const data = {
                format: $(this).find('input[name=format-oeuvre]:checked').val(),
                genre: $(this).find('select[name=genre]').val(),
                action: $(this).find('input[name=action]').val(),
                nonce: $(this).find('input[name=nonce]').val(),
                posttype: $(this).find('input[name=posttype]').val(),
            }
            console.log(data)

            // Requête Ajax en JS natif via Fetch
            fetch(ajaxurl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Cache-Control': 'no-cache',
                },
                body: new URLSearchParams(data),
            })
                .then(response => response.json())
                .then(response => {

                    // En cas d'erreur
                    if (!response.success) {
                        alert(response.data);
                        return;
                    }

                    // Et en cas de réussite : afficher le HTML
                    $('.p28-catalogue').html(response.data);
                });
        });

    });
})(jQuery);