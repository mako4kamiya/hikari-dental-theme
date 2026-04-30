const Header = document.querySelector('header');
const MainVisual = document.querySelector('#main-visual');
const Copylight = document.querySelector('#copylight');

let isMVvisible = false;
let isCLvisible = false;

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.target.id === 'main-visual') {
            isMVvisible = entry.isIntersecting;
        } else if (entry.target.id === 'copylight') {
            isCLvisible = entry.isIntersecting;
        }
    });

    if (isMVvisible || isCLvisible) {
        Header.classList.remove('is-show');
    } else {
        Header.classList.add('is-show');
    }
});

if (MainVisual) observer.observe(MainVisual);
if (Copylight) observer.observe(Copylight);
