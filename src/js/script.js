console.log("hello world");

const header = document.querySelector(".desktop-header");

const mobileNav = document.querySelector(
  ".mobile-header__navbar__top__hamburger-icon"
);
const toggleNav = document.querySelector(".mobile-header__navbar__bottom");

mobileNav?.addEventListener("click", () => {
  console.log("clicked");

  toggleNav.classList.toggle("active");
});


window.addEventListener("scroll", () => {
  header.classList.toggle("fixed", window.scrollY > 100);
  if (window.scrollY > 100) {
    header.classList.remove('relative');
  } else {
    header.classList.add('relative');
  }
});


const sections = document.querySelectorAll('section')

window.onscroll = ()=>{
  sections.forEach(section=>{
    let top = window.scrollY;
    let offset = section.offsetTop -900;
    let height = section.offsetHeight;

    if(top >= offset && top < height + offset){
     section.classList.add('animate');
    }
  })
}
