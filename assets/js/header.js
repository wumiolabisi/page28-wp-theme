var toggleMenu = document.querySelector("li.p28-navbar-item svg#p28-menu-icon");
var sideNav = document.querySelector(".p28-navbar #p28-sidemenu");

toggleMenu.onclick = openCloseMenu;

function openCloseMenu() {

    sideNav.classList.toggle("p28-burger--is-opened");

}

var header = document.getElementById("p28_nav_sticky");
// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function stickyNav() {
    var p28navlink = document.getElementsByClassName('p28-navlink');
    var svgIconMenu = document.getElementById("p28-menu-icon");

    if (window.scrollY > sticky) {
        header.classList.add("p28-nav--color");
        svgIconMenu.classList.add("p28-fill-fceeca");
        for (var i = 0; i < p28navlink.length; i++) {
            p28navlink[i].classList.add("p28-navtext--color");
        }

    } else {
        header.classList.remove("p28-nav--color");
        svgIconMenu.classList.remove("p28-fill-fceeca");
        for (var i = 0; i < p28navlink.length; i++) {
            p28navlink[i].classList.remove("p28-navtext--color");
        }
    }
}

function overlay() {
    document.getElementById("overlay").classList.toggle("p28-overlay");
}