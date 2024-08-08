document.addEventListener('DOMContentLoaded', () => {
    let slideIndex = 0;
    const slides = document.querySelectorAll('.carousel-img');
    const totalSlides = slides.length;

    function showSlide(index) {
        const carouselSlide = document.getElementById('carousel-slide');
        if (index >= totalSlides) {
            slideIndex = 0;
        } else if (index < 0) {
            slideIndex = totalSlides - 1;
        } else {
            slideIndex = index;
        }
        carouselSlide.style.transform = `translateX(${-slideIndex * 100}%)`;
    }

    function changeSlide(n) {
        showSlide(slideIndex + n);
    }

    function autoSlide() {
        showSlide(slideIndex + 1);
    }

    document.querySelector('.carousel-button.prev').addEventListener('click', () => changeSlide(-1));
    document.querySelector('.carousel-button.next').addEventListener('click', () => changeSlide(1));

    setInterval(autoSlide, 6000);

    // Initial display
    showSlide(slideIndex);
});
