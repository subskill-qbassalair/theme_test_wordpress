const test = document.querySelector('.test');

gsap.to(test, {
  scrollTrigger : {
    trigger: 'nav',
    markers: true,
    start: "top top",
    scrub: true,
  },
  x: 100,
})

const logo = document.querySelector('.logo-test');
const loremTexts = document.querySelectorAll('.p')

gsap.to(logo, {
  scrollTrigger : {
    trigger: loremTexts,
    markers: true,
    start: "top top",
    scrub: true,
  },
  x: -600,
  y:-500,
  scale: 0.2,
})