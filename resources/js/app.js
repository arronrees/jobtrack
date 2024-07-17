import "./bootstrap";

function mobileNav() {
    const close = document.querySelector("#close__nav");
    const nav = document.querySelector("#nav");
    const mobileNav = document.querySelector("#mobile__nav");

    close.addEventListener("click", (e) => {
        e.preventDefault();

        mobileNav.classList.toggle("nav--open");
        nav.classList.toggle("nav--open");
    });
}

document.addEventListener("DOMContentLoaded", () => {
    mobileNav();
});
