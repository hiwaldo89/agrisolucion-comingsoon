import $ from "jquery";
import "slick-carousel";

$(".home-slider").slick({
  arrows: false,
  dots: true,
  fade: true
});

const hamburger = document.querySelector(".hamburger");
const navBar = document.querySelector("nav");

hamburger.onclick = e => {
  e.preventDefault();
  hamburger.classList.toggle("is-active");
  navBar.classList.toggle("is-visible");
};
