/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************!*\
  !*** ./src/js/app.js ***!
  \***********************/
// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
stickyNav = function stickyNav() {
  var header = document.getElementById("p28_nav_sticky");
  var sticky = header.offsetTop;
  if (window.scrollY > sticky) {
    header.classList.add("p28-bg-light");
    header.classList.add("p28-box-shadow");
  } else {
    header.classList.remove("p28-bg-light");
    header.classList.remove("p28-box-shadow");
  }
};
/******/ })()
;