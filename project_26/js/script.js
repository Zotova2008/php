'use strict';
var pharase = document.querySelectorAll('.pharase__item');
var random = Math.round(Math.random() * (pharase.length - 1));

if (pharase) {
  pharase[random].classList.add('pharase__item--active');
}