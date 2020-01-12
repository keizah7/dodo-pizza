document.querySelectorAll('.header__trigger').forEach(item => item.addEventListener('click', toggleMobileNav));

function toggleMobileNav() {
    document.querySelector('header').classList.toggle('header--is-opened');
    document.querySelector('.mobile-nav').classList.toggle('mobile-nav--is-opened');
}

var navbar = document.querySelector("nav");
var sticky = navbar.offsetTop;

function hideHeader() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("nav--sticky")
    } else {
        navbar.classList.remove("nav--sticky");
    }
}

window.onscroll = function () {
    this.hideHeader()
};