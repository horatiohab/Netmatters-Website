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
  scrollContainer.classList.toggle("menu-active");
  // document.querySelector(".side-nav").style.maxWidth = "100%";
});

greyedOut.addEventListener("click", function() { // Resets menu and hamburger when clicking greyed out area
  hamburger.classList.toggle("is-active");
  greyedOut.classList.toggle("grey-active");
  scrollContainer.classList.toggle("menu-active");
  // document.querySelector(".side-nav").style.maxWidth = "0%";
});

// Keeps content below sticky header
window.onresize = contentPlacement;
window.onload = contentPlacement;

function contentPlacement() {
  $(".slides").css("margin-top", $(".sticky-header").height());
}

// Sticky header
let prevScrollpos = window.pageYOffset;
let stickyHeader = document.querySelector(".sticky-header");

window.onscroll = function () {
  const scrollPos = $(window).scrollTop();
  let currentScrollPos = window.pageYOffset;

  if (scrollPos < 1) {
    stickyHeader.style.transition = "0ms";
    stickyHeader.style.transitionDelay = "0ms";
    stickyHeader.classList.remove("sticky-header-scroll");
    stickyHeader.classList.remove("sticky-header-fixed");
  }
  if (scrollPos > 500 && prevScrollpos < currentScrollPos) {
    stickyHeader.classList.add("sticky-header-scroll");
    stickyHeader.classList.remove("sticky-header-fixed");
  }
  if (scrollPos > 500 && prevScrollpos > currentScrollPos) {
    stickyHeader.style.transition = "200ms";
    stickyHeader.style.transitionDelay = "500ms";
    stickyHeader.classList.add("sticky-header-fixed");
    stickyHeader.classList.remove("sticky-header-scroll");
  }
  prevScrollpos = currentScrollPos;
};