// Keeps content below sticky header
window.onresize = contentPlacement;
window.onload = contentPlacement;

function contentPlacement() {
  $(".slider-image").css("margin-top", $(".sticky-header").height());
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
