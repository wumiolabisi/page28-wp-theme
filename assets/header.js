var toggleMenu = document.querySelector("li.p28-navbar-item svg#p28-menu-icon");
var sideNav = document.querySelector(".p28-navbar #p28-sidemenu");

toggleMenu.onclick = openCloseMenu;

function openCloseMenu() {

    sideNav.classList.toggle("p28-burger--is-opened");




}