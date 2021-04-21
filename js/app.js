// Cookies popup
const acceptCookies = document.querySelector(".accept-btn");
const popUp = document.querySelector(".cookies-inactive");
const accepted = localStorage.getItem(popUp);
const body = document.querySelector("body");

if (accepted) {
  localStorage.setItem(popUp, popUp.style.display = "none");
}

if (!accepted) {
  body.style.position = "fixed";
  body.style.width = "100vw";
};

acceptCookies.addEventListener("click", function() {
  localStorage.setItem(popUp, popUp.style.display = "none");
  body.style.position = "";
  body.style.width = "";
});


// Slider
$(document).ready(function(){
  $('.slides').slick({ 
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3000,
    dots: true
  });
});

// Burger button
const hamburger = document.querySelector(".hamburger");
const scrollContainer = document.querySelector(".scroll-container");
const greyedOut = document.querySelector(".greyed-out");

hamburger.addEventListener("click", function() {
  hamburger.classList.toggle("is-active");
  greyedOut.classList.toggle("grey-active");
  scrollContainer.classList.toggle("scroll-containerClick");
  document.querySelector(".side-nav").style.right = "0";
});

greyedOut.addEventListener("click", function() { // Resets menu and hamburger when clicking greyed out area
  hamburger.classList.toggle("is-active");
  greyedOut.classList.toggle("grey-active");
  scrollContainer.classList.toggle("scroll-containerClick");
  document.querySelector(".side-nav").style.right = "-350px";
});

// Keeps content below sticky header
window.onresize = contentPlacement;
window.onload = contentPlacement;

function contentPlacement() {
  $(".slides").css("margin-top", $(".sticky-header").height());
}

// Sticky header
let prevScrollpos = window.pageYOffset;

window.onscroll = function () {
  const scrollPos = $(window).scrollTop();
  let currentScrollPos = window.pageYOffset;

  if (scrollPos < 1) {
    document.querySelector(".sticky-header").style.transition = "0ms";
    document.querySelector(".sticky-header").style.transitionDelay = "0ms";
    document.querySelector(".sticky-header").style.position = "absolute";
    document.querySelector(".sticky-header").style.top = "0";
  }
  if (scrollPos > 500) {
    document.querySelector(".sticky-header").style.transition = "200ms";
    document.querySelector(".sticky-header").style.transitionDelay = "500ms";
    if (prevScrollpos < currentScrollPos) {
      document.querySelector(".sticky-header").style.top = "-204px";
    } else {
      document.querySelector(".sticky-header").style.position = "fixed";
      document.querySelector(".sticky-header").style.top = "0";
    }
  }
  prevScrollpos = currentScrollPos;
};