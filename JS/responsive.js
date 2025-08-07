const logo_load = () => {
    location.assign("index.html");
};

const burger = document.querySelector('.burger');
const navbar = document.querySelector('.navbar');
const navlist = document.querySelector('.nav-list');
const rightnav = document.querySelector('.rightnav');

burger.addEventListener('click', () => {
    navlist.classList.toggle('visible-resp');
    rightnav.classList.toggle('visible-resp');
    navbar.classList.toggle('h-nav-resp');
});