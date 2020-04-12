let windowTop = window.innerHeight / 2;
const header = document.querySelector('header');

window.addEventListener('scroll', function () {
    if (pageYOffset > windowTop) {
        header.classList.add("on");
    } else {
        header.classList.remove("on");
    }
});