// (function($) {
//   $(document).ready(function() {
//     var app = {
//       init: function() {
//       },
//     };
//     app.init();
//   });
// })(jQuery);




const txtLeft = document.querySelector('.about-text-left');
const subTitleAbout = document.querySelector('.sub-title-about');
const txtRight = document.querySelector('.about-text-right');


gsap.to(txtLeft, {
  scrollTrigger : {
    trigger: '.title-about',
    markers: false,
    start: "top top",
    scrub: true,
  },
  x: 100,
})

gsap.to(txtRight, {
  scrollTrigger : {
    trigger: '.title-about',
    markers: false,
    start: "top middle",
    scrub: true,
  },
  x: -330,
})

gsap.fromTo("h3", {opacity: 0}, {opacity:1, duration: 2}) 

