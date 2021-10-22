const navBar = document.querySelector("nav");
const navLinks = document.querySelectorAll("nav a");

window.addEventListener("scroll", () => {
  const { scrollTop } = document.documentElement;
  if (scrollTop > 355) {
    // navLinks.forEach(classList.toggle("is-white"));
    navLinks.forEach((link) => link.classList.add("is-white"));
    // } else if (clientHeight + scrollTop <= scrollHeight - clientHeight + 20) {
    //   navLinks.classList.add("is-black");
    //   navLinks.classList.remove("is-white");
  } else {
    navLinks.forEach((link) => link.classList.remove("is-white"));
  }
});

  window.addEventListener("scroll", () => {
    const { scrollTop } = document.documentElement;
    if (scrollTop > 355) {
      navLinks.forEach((link) => link.classList.add("is-white"));
    } else {
      navLinks.forEach((link) => link.classList.remove("is-white"));
    }
  });
