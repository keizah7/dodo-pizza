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

/* Carousel */
let slideIndex = 1;
showSlides(slideIndex);

function changeSlides(count) {
    showSlides(slideIndex += count);
}

function switchToSlide(number) {
    showSlides(slideIndex = number);
}

function showSlides(n) {
    let slides = document.getElementsByClassName('carousel__slide');
    let dots = document.getElementsByClassName('carousel__dot');

    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }
    for (let i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace('active', '');
    }
    slides[slideIndex - 1].style.display = 'block';
    dots[slideIndex - 1].className += ' active';
}
