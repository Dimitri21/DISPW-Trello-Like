//HUMBURGER ACTIVATION
const nav_humburger = document.querySelector('.nav-humburger-js');
const main_humburger = document.querySelector('.main-humburger');
let body = document.querySelector('body');

nav_humburger.addEventListener('click', e => {
    if (e.currentTarget) {
        if (e.currentTarget.classList.contains('open')) {
            e.currentTarget.classList.remove('open');
            body.classList.remove('overflow');
            main_humburger.classList.remove('show-js');
        } else {
            e.currentTarget.classList.add('open');
            e.currentTarget.style.zIndex = "2";
            main_humburger.classList.add('show-js');
            if (body) {
                body.classList.add('overflow');
            }
        }
    }
});