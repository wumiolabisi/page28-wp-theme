/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/load-more.js":
/*!*****************************!*\
  !*** ./src/js/load-more.js ***!
  \*****************************/
/***/ (() => {

(function ($) {
  $(document).ready(function () {
    var ajaxurl = p28_query_params.ajaxurl;
    $('#p28-load-more').click(function () {
      var data = {
        action: 'p28_load_more',
        current_page: p28_query_params.current_page,
        query: p28_query_params.query
      };
      fetch(ajaxurl, {
        method: 'POST',
        headers: {
          'Content-Type': 'x-www-form-urlencoded',
          'Cache-Control': 'no-cache'
        },
        body: new URLSearchParams(data)
      }).then(function (response) {
        return response.json();
      }).then(function (response) {
        if (!response.success) {
          console.log('Erreur dans la réponse : ' + response);
          return;
        }
        if (response) {
          console.log("ici");
          $('div#p28-load-more').text('CHARGER ENCORE');

          //$('div#p28-load-more-results').append(posts);
          document.querySelector('div#p28-load-more-results').innerHTML += response;
          p28_query_params.current_page++;
          $('div.p28-load-more-msg').html('<p class="p28-small-text">' + p28_query_params.posts_count + ' sur ' + p28_query_params.found_posts + '</p>');
          if (p28_query_params.current_page == p28_query_params.max_pages) {
            $('div#p28-load-more').hide();
          }
        } else {
          $('div#p28-load-more').hide();
        }
      })["catch"](function (err) {
        console.warn('Erreur lors de l&apos;envoi : ', err);
      });
    });

    /* *
    * Appel Ajax pour la recherche d'oeuvre
    * */

    $('.p28-search-form').submit(function (e) {
      // Empêcher l'envoi classique du formulaire
      e.preventDefault();
      var data = {
        format: $(this).find('input[name=format-oeuvre]:checked').val(),
        genre: $(this).find('select[name=genre]').val(),
        tag: $(this).find('select[name=tag]').val(),
        action: $(this).find('input[name=action]').val(),
        nonce: $(this).find('input[name=nonce]').val(),
        posttype: $(this).find('input[name=posttype]').val()
      };
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
        if (!response.success) {
          console.log('Il y a une erreur dans le filtrage : ' + response.data);
          return;
        }
        p28_query_params.current_page = 1;
        p28_query_params.posts = response.rp_posts;
        p28_query_params.found_posts = response.rp_found_posts;
        p28_query_params.posts_count = response.rp_posts_count;
        p28_query_params.max_pages = response.rp_max_pages;
        var params = new URLSearchParams(location.search);
        params.set('format', data.format);
        window.history.replaceState({}, "", decodeURIComponent("".concat(location.pathname, "?").concat(params)));
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

/***/ }),

/***/ "./src/scss/style.scss":
/*!*****************************!*\
  !*** ./src/scss/style.scss ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/dist/js/load-more": 0,
/******/ 			"dist/css/style": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkpage28"] = self["webpackChunkpage28"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["dist/css/style"], () => (__webpack_require__("./src/js/load-more.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["dist/css/style"], () => (__webpack_require__("./src/scss/style.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;