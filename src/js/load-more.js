(function ($) {
    $(document).ready(function () {
        let ajaxurl = p28_query_params.ajaxurl;

        $('#p28-load-more').click(function () {

            const data = {
                action: 'p28_load_more',
                current_page: p28_query_params.current_page,
                query: p28_query_params.query
            };

            fetch(ajaxurl,
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'x-www-form-urlencoded',
                        'Cache-Control': 'no-cache'
                    },
                    body: new URLSearchParams(data),
                }).then(response => response.json())
                .then(response => {
                    console.log("Done")

                    /* if (!response.success) {
  
                          console.log('Erreur dans la réponse : ' + response);
                          return;
                      }
                      if (response) {
                          $('div#p28-load-more').text('CHARGER ENCORE');
  
                          $('div#p28-load-more-results').append(response);
  
                          p28_query_params.current_page++;
  
                          $('div.p28-load-more-msg').html('<p class="p28-small-text">' + p28_query_params.posts_count + ' sur ' + p28_query_params.found_posts + '</p>');
  
                          if (p28_query_params.current_page == p28_query_params.max_pages) {
                              $('div#p28-load-more').hide();
                          }
                      } else {
                          $('div#p28-load-more').hide();
                      }*/
                }).catch(function (err) {
                    console.warn('Erreur lors de l&apos;envoi : ', err);
                });
        });



        /* *
        * Appel Ajax pour la recherche d'oeuvre
        * */

        $('.p28-search-form').submit(function (e) {

            // Empêcher l'envoi classique du formulaire
            e.preventDefault();


            const data = {

                format: $(this).find('input[name=format-oeuvre]:checked').val(),
                genre: $(this).find('select[name=genre]').val(),
                tag: $(this).find('select[name=tag]').val(),
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

                    p28_query_params.current_page = 1;
                    p28_query_params.posts = response.rp_posts;
                    p28_query_params.found_posts = response.rp_found_posts;
                    p28_query_params.posts_count = response.rp_posts_count;
                    p28_query_params.max_pages = response.rp_max_pages;



                    let params = new URLSearchParams(location.search);
                    params.set('format', data.format);

                    window.history.replaceState({}, "", decodeURIComponent(`${location.pathname}?${params}`));
                    if (response.rp_found_posts == 1) {
                        $('div.p28-filter-msg').html('<p class="p28-small-text">' + response.rp_found_posts + ' &oelig;uvre correspond à votre recherche :</p>');
                    } else if (response.rp_found_posts > 1) {
                        $('div.p28-filter-msg').html('<p class="p28-small-text">' + response.rp_found_posts + ' &oelig;uvres correspondent à votre recherche :</p>');
                    }
                    $('.p28-search-result').html(response.rp_content);
                    $('div.p28-load-more-msg').html('<p class="p28-small-text">' + response.rp_posts_count + ' sur ' + response.rp_found_posts + '</p>');




                    if (Number(response.rp_posts_count) == 0 || Number(response.rp_found_posts) <= 8) {
                        $('div#p28-load-more').hide();

                    } else {
                        $('div#p28-load-more').show();

                    }


                });
        });


    });

})(jQuery);