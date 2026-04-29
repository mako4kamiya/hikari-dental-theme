const Header = document.querySelector('header');
const MainVisual = document.querySelector('#MainVisual');
const Footer = document.querySelector('footer');

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (!entry.isIntersecting) {
            Header.classList.add('is-show');
        } else {
            Header.classList.remove('is-show');
        }
    });
});

observer.observe(MainVisual);
observer.observe(Footer);