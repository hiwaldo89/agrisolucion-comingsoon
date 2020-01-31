import $ from "jquery";
import "slick-carousel";
import axios from "axios";

$(".home-slider").slick({
  arrows: false,
  dots: true,
  fade: true,
  autoplay: true
});

const hamburger = document.querySelector(".hamburger");
const navBar = document.querySelector("nav");

hamburger.onclick = e => {
  e.preventDefault();
  hamburger.classList.toggle("is-active");
  navBar.classList.toggle("is-visible");
};

const contactForm = document.querySelector("form");
const loadingIcon = document.querySelector(".lds-ring");
const formMessage = document.querySelector(".form-message");
contactForm.onsubmit = e => {
  e.preventDefault();
  loadingIcon.classList.remove("loading");
  loadingIcon.classList.add("loading");
  formMessage.innerHTML = "";

  axios({
    method: "post",
    url: "/mailer.php",
    data: new FormData(contactForm)
  })
    .then(res => {
      if (res.data !== "error") {
        formMessage.innerHTML =
          "Hemos recibido tu mensaje, te contactaremos en breve.";
      } else {
        formMessage.innerHTML = "Ocurrió un error, intenta de nuevo.";
      }
    })
    .catch(e => {
      formMessage.innerHTML = "Ocurrió un error, intenta de nuevo.";
    })
    .finally(() => {
      loadingIcon.classList.remove("loading");
    });
};
