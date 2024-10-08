(function ($) {
    $(document).ready(function () {
        let ajaxurl = p28_query_params.ajaxurl;

        /* *
        * Appel Ajax pour la recherche d'oeuvre
        * */

        $('.p28-search-form').submit(function (e) {

            // Empêcher l'envoi classique du formulaire
            e.preventDefault();


            const data = {

                paged: 1,
                format: $(this).find('input[name=format-oeuvre]:checked').val(),
                genre: $(this).find('select[name=genre]').val(),
                etiquette: $(this).find('select[name=etiquette]').val(),
                action: $(this).find('input[name=action]').val(),
                nonce: $(this).find('input[name=nonce]').val(),
                posttype: $(this).find('input[name=posttype]').val()
            }

            fetch(
                ajaxurl,
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Cache-Control': 'no-cache',
                    },

                    body: new URLSearchParams(data),
                })

                .then(response => response.json())
                .then(response => {

                    if (!response.success) {
                        console.log('Il y a une erreur dans le filtrage : ' + response.data);
                        return;
                    }

                    p28_query_params.current_page = response.rp_current_page;
                    p28_query_params.posts = response.rp_posts;
                    p28_query_params.found_posts = response.rp_found_posts;
                    p28_query_params.posts_count = response.rp_posts_count;
                    p28_query_params.max_pages = response.rp_max_pages;


                    if (response.rp_found_posts == 1) {
                        $('div.p28-filter-msg').html('<p class="p28-small-text">' + response.rp_found_posts + ' &oelig;uvre correspond à votre recherche :</p>');
                    } else if (response.rp_found_posts > 1) {
                        $('div.p28-filter-msg').html('<p class="p28-small-text">' + response.rp_found_posts + ' &oelig;uvres correspondent à votre recherche :</p>');
                    } else if (response.rp_found_posts == 0) {
                        $('div.p28-filter-msg').html('<p class="p28-small-text">Pas de correspondance</p>');
                    }
                    $('.p28-search-result').html(response.rp_content);
                    $('div.p28-load-more-msg').html('<p class="p28-small-text">' + response.rp_posts_count + ' sur ' + response.rp_found_posts + '</p>');



                });
        });


    });

})(jQuery);