console.log("hello world");

const mobileNav = document.querySelector(
  ".mobile-header__navbar__top__hamburger-icon"
);
const toggleNav = document.querySelector(".mobile-header__navbar__bottom");

mobileNav?.addEventListener("click", () => {
  console.log("clicked");

  toggleNav.classList.toggle("active");
});

