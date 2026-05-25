const SpMenu = document.querySelector('.sp-menu');
const headerNav = document.querySelector('nav#header-nav');
const HeaderIcon = document.querySelector('.header-icon');

SpMenu.addEventListener('click', () => {
    HeaderIcon.classList.toggle('is-active');
    headerNav.classList.toggle('is-active');
});