let slideIndices = {};

document.addEventListener("DOMContentLoaded", function() {
    initializeSlideshows();
});

function initializeSlideshows() {
    let slideshows = document.getElementsByClassName("slideshow-container");
    for (let i = 0; i < slideshows.length; i++) {
        let slideshowId = slideshows[i].id;
        slideIndices[slideshowId] = 1;
        showSlides(1, slideshowId);
    }
}

function plusSlides(n, slideshowId) {
    showSlides(slideIndices[slideshowId] += n, slideshowId);
}

function showSlides(n, slideshowId) {
    let i;
    let slides = document.querySelectorAll(`#${slideshowId} .slide`);
    if (n > slides.length) { slideIndices[slideshowId] = 1 }
    if (n < 1) { slideIndices[slideshowId] = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndices[slideshowId] - 1].style.display = "flex";
}
