const SpMenu = document.querySelector('.sp-menu');
const HeaderIcon = document.querySelector('.header-icon');

SpMenu.addEventListener('click', () => {
    HeaderIcon.classList.toggle('is-active');
});