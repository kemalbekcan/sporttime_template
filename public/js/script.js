console.log("hello world");const header=document.querySelector(".desktop-header"),mobileNav=document.querySelector(".mobile-header__navbar__top__hamburger-icon"),toggleNav=document.querySelector(".mobile-header__navbar__bottom");mobileNav?.addEventListener("click",(()=>{console.log("clicked"),toggleNav.classList.toggle("active")})),window.addEventListener("scroll",(()=>{header.classList.toggle("fixed",window.scrollY>100),window.scrollY>100?header.classList.remove("relative"):header.classList.add("relative")}));const sections=document.querySelectorAll("section");window.onscroll=()=>{sections.forEach((e=>{let o=window.scrollY,l=e.offsetTop-900,t=e.offsetHeight;o>=l&&o<t+l&&e.classList.add("animate")}))};