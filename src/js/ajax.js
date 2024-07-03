(function ($) {

    $(document).ready(function () {

        $('#p28-load-more').click(function () {

            let totalPosts = Number(this.dataset.totalposts);

            const ajaxurl = $(this).data('ajaxurl');

            // Les données
            const data = {
                action: 'p28_load_more',
                query: this.dataset.posts,
                maxpages: this.dataset.maxpages,
                page: this.dataset.currentpage,
                foundposts: Number(this.dataset.foundposts)
            }

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
                        console.log('Erreur : ' + response);
                        return;
                    }
                    // Et en cas de réussite : 
                    if (response) {

                        $('div#p28-load-more').text('CHARGER ENCORE');
                        $('.p28-search-results2').append(response.content);
                        //localStorage.setItem("posts", response.data);
                        data.page++;
                        totalPosts += response.posts_count;

                        let params = new URLSearchParams(location.search);
                        //console.log("Pramas : " + params);
                        params.set('page', data.page);
                        $('div#p28-load-more').attr("data-currentpage", data.page);
                        $('div#p28-load-more').attr("data-totalposts", totalPosts);
                        $('div.p28-load-more-msg').html('<p class="p28-small-text">' + totalPosts + ' sur ' + data.foundposts + '</p>');


                        window.history.replaceState({}, "", decodeURIComponent(`${location.pathname}?${params}`));

                        if (response.posts_count == 0) {
                            $('div#p28-load-more').hide();

                        }

                    } else {
                        $('div#p28-load-more').hide();
                    }


                });
        });



        /* *
        * Appel Ajax pour la recherche d'oeuvre
        * */

        $('.p28-search-form').submit(function (e) {

            // Empêcher l'envoi classique du formulaire
            e.preventDefault();

            // L'URL qui réceptionne les requêtes Ajax dans l'attribut "action" de <form>
            const ajaxurl = $(this).attr('action');


            // Les données du formulaire

            const data = {

                format: $(this).find('input[name=format-oeuvre]:checked').val(),
                genre: $(this).find('select[name=genre]').val(),
                tag: $(this).find('select[name=tag]').val(),
                action: $(this).find('input[name=action]').val(),
                nonce: $(this).find('input[name=nonce]').val(),
                posttype: $(this).find('input[name=posttype]').val()
            }

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
                        console.log(response.data);
                        return;
                    }
                    // Et en cas de réussite : afficher le HTML
                    $('.p28-search-result').html(response.data);


                });
        });


    });

})(jQuery);