$(document).ready(function () {
    var currentSlide = 0;
    var slides = $('.slide');
    var slideInterval = setInterval(nextSlide, 3000); // Auto sliding interval

    // Show the initial slide
    showSlide(currentSlide);
    updateDots(currentSlide);

    // Previous button click event
    $('.prev-btn').click(function () {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
        updateDots(currentSlide);
        resetInterval();
    });

    // Next button click event
    $('.next-btn').click(function () {
        nextSlide();
        resetInterval();
    });

    // Dot click event
    $('.dot').click(function () {
        var dotIndex = $(this).index();
        currentSlide = dotIndex;
        showSlide(currentSlide);
        updateDots(currentSlide);
        resetInterval();
    });

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
        updateDots(currentSlide);
    }

    function showSlide(slideIndex) {
        $('.slider').css('transform', 'translateX(' + (-slideIndex * 100) + '%)');
    }

    function updateDots(activeIndex) {
        $('.dot').removeClass('active');
        $('.dot:eq(' + activeIndex + ')').addClass('active');
    }

    function resetInterval() {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 3000);
    }
});
