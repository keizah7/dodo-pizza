document.querySelectorAll('.header__trigger').forEach(item => item.addEventListener('click', toggleMobileNav));

function toggleMobileNav() {
    document.querySelector('header').classList.toggle('header--is-opened');
    document.querySelector('.mobile-nav').classList.toggle('mobile-nav--is-opened');
}

// function hideHeader() {
//     var navbar = document.querySelector("nav");
//     var sticky = navbar.offsetTop;

//     if (window.pageYOffset >= sticky) {
//         navbar.classList.add("sticky")
//     } else {
//         navbar.classList.remove("sticky");
//     }
// }

// window.addEventListener('scroll', hideHeader);