var toggleMenu = document.querySelector("ol.p28-menu-icon svg");
var sideNav = document.querySelector(".p28-navbar li:first-child");
var svgMenuIcon = document.querySelector(".p28-menu-icon svg path");

toggleMenu.onclick = openCloseMenu;

function openCloseMenu() {

    sideNav.classList.toggle("p28-burger--is-opened");
    svgMenuIcon.classList.toggle("p28-menu-icon-close");




}