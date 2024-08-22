let slideIndices = {};

document.addEventListener("DOMContentLoaded", function() {
    initializeSlideshows();
});

function initializeSlideshows() {
    let slideshows = document.getElementsByClassName("slideshow-container");
    for (let i = 0; i < slideshows.length; i++) {
        let slideshowId = slideshows[i].id;
        slideIndices[slideshowId] = 1;
        showSlides(slideshowId, slideIndices[slideshowId]);
    }
}

function plusSlides(n, slideshowId) {
    let slides = document.querySelectorAll(`#${slideshowId} .slide`);
    let currentSlideIndex = slideIndices[slideshowId];
    let nextSlideIndex = currentSlideIndex + n;

    if (nextSlideIndex > slides.length) {
        nextSlideIndex = 1;
    } else if (nextSlideIndex < 1) {
        nextSlideIndex = slides.length;
    }

    slideIndices[slideshowId] = nextSlideIndex;
    transitionSlides(currentSlideIndex, nextSlideIndex, slideshowId);
}

function transitionSlides(currentSlideIndex, nextSlideIndex, slideshowId) {
    let slides = document.querySelectorAll(`#${slideshowId} .slide`);

    slides.forEach(slide => {
        slide.classList.remove('active', 'from-right', 'from-left', 'fade-out');
    });

    let direction = (nextSlideIndex > currentSlideIndex || (currentSlideIndex === slides.length && nextSlideIndex === 1)) ? 'from-left' : 'from-right';

    slides[nextSlideIndex - 1].style.display = 'flex'; 
    slides[nextSlideIndex - 1].classList.add('active', direction);
    
    void slides[nextSlideIndex - 1].offsetWidth;
    
    slides[currentSlideIndex - 1].classList.add('fade-out');
    setTimeout(() => {
        slides[currentSlideIndex - 1].style.display = 'none';
        slides[nextSlideIndex - 1].classList.remove(direction);
    }, 300);
}

function showSlides(slideshowId, slideIndex) {
    let slides = document.querySelectorAll(`#${slideshowId} .slide`);

    slides.forEach(slide => {
        slide.style.display = 'none';
        slide.classList.remove('active', 'from-right', 'from-left');
    });

    slides[slideIndex - 1].style.display = 'flex';
    slides[slideIndex - 1].classList.add('active');
}
