'use strict';

// Image background
function imageBg() {
    let ibg = document.querySelectorAll('.ibg');
    for (let i = 0; i < ibg.length; i++) {
        if (ibg[i].querySelector('img')) {
            ibg[i].style.backgroundImage = 'url(' + ibg[i].querySelector('img').getAttribute('src') + ')';
        }
    }
}

imageBg();

// Burger
let burgerIcon = document.querySelector('.burger__icon');
let burgerNav = document.querySelector('.burger__nav');

if (burgerIcon && burgerNav) {
    // Burger icon
    let pageContent = document.querySelector('.page-content');

    burgerIcon.addEventListener('click', () => {
        // document.body.classList.toggle('_lock');
        burgerIcon.classList.toggle('_active');
        burgerNav.classList.toggle('_active');

        if (pageContent) {
            pageContent.classList.toggle('_active');
        }
    })
}

function stickyHeader() {
    let headerWrapper = document.querySelector('.header__wrapper');

    window.addEventListener('scroll', () => {
        if (scrollY > 60) {
            headerWrapper.classList.add('_active');
        } else if (headerWrapper.classList.contains('_active')) {
            headerWrapper.classList.remove('_active');
        }
    })
}

stickyHeader();