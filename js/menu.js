/**
 * Script que controla o menu mobile
 */
let show = true;
const menuSection = document.querySelector('.menuSection');
const menuToggle = document.querySelector('.menu-toggle');

menuToggle.addEventListener("click", function () {
    document.body.style.overflow = show ? "hidden" : "initial";
    menuSection.classList.toggle("on", show);
    show = !show;
});

//Animação do menu com scroll
let windowTop = 90; //window.innerHeight / 6;
const header = document.querySelector('header');

window.addEventListener('scroll', function () {

    if (pageYOffset > windowTop) {
        header.classList.add("on");
    } else {
        header.classList.remove("on");
    }
});