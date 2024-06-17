let SlideNumber = 1;

function plusSlides(n) {
  showSlides(SlideNumber += n);
}

function currentSlide(n) {
  showSlides(SlideNumber = n);
}


function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) { SlideNumber = 1 }
  if (n < 1) { SlideNumber = slides.length }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[SlideNumber - 1].style.display = "block";
  dots[SlideNumber - 1].className += " active";
}

document.addEventListener("DOMContentLoaded", function () {
  showSlides(SlideNumber);
});