<section class="carousel from-sm">
    <div class="carousel__slide"><img src="/img/carousel/1.jpeg"></div>
    <div class="carousel__slide"><img src="/img/carousel/2.jpeg"></div>
    <div class="carousel__slide"><img src="/img/carousel/3.jpeg"></div>
    <div class="carousel__slide"><img src="/img/carousel/4.jpeg"></div>

    <a class="carousel__prev" onclick="changeSlides(-1)">&#10094;</a>
    <a class="carousel__next" onclick="changeSlides(1)">&#10095;</a>

    <div class="carousel__dots" style="text-align:center">
        <span class="carousel__dot" onclick="switchToSlide(1)"></span>
        <span class="carousel__dot" onclick="switchToSlide(2)"></span>
        <span class="carousel__dot" onclick="switchToSlide(3)"></span>
        <span class="carousel__dot" onclick="switchToSlide(4)"></span>
    </div>
</section>
<script>
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
</script>
