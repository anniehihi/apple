'use strict';

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides((slideIndex += n));
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName('mySlides');
  var dots = document.getElementsByClassName('dot');
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = 'none';
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(' active', '');
  }
  slides[slideIndex - 1].style.display = 'block';
  dots[slideIndex - 1].className += ' active';
}

const changeMini = document.querySelector('.mini');
const changeDefault = document.querySelector('.default');
const img = document.querySelector('.image');
const colorPurple = document.querySelector('.color-purple');
const colorMidnight = document.querySelector('.color-midnight');
const colorPink = document.querySelector('.color-pink');
const colorRed = document.querySelector('.color-red');
const colorWhite = document.querySelector('.color-white');

changeMini.addEventListener('click', function () {
  img.src = './img/iphone-13-mini-select-2021.jpg';
});

changeDefault.addEventListener('click', function () {
  img.src = './img/iphone-13-select-2021.jpg';
});

colorPurple.addEventListener('click', function () {
  img.src = './img/iphone-13-blue-select-2021.png';
});

colorMidnight.addEventListener('click', function () {
  img.src = './img/iphone-13-midnight-select-2021.png';
});

colorRed.addEventListener('click', function () {
  img.src = './img/iphone-13-product-red-select-2021.png';
});

colorWhite.addEventListener('click', function () {
  img.src = './img/iphone-13-starlight-select-2021.png';
});

colorPink.addEventListener('click', function () {
  img.src = './img/iphone-13-pink-select-2021.png';
});