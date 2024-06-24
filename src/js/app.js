
// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
stickyNav = function () {
    let header = document.getElementById("p28_nav_sticky");
    let sticky = header.offsetTop;

    if (window.scrollY > sticky) {
        header.classList.add("p28-bg-light");
    } else {
        header.classList.remove("p28-bg-light");
    }

}