let show = true;
let menuShow = true;

const menuToggle = document.querySelector('.menu-toggle');

function menu(element) {
    document.querySelector(element).classList.toggle('on', show);
}

menuToggle.addEventListener('click', () => {
    menu('.asside');
    menu('header');
    menu('.content');
    menu('.menu-section');
    show = !show;
})