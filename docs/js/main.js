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

function preloader_init() {
    let preloader = document.querySelector('.noiceland_preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            preloader.classList.add('_active');
        })
    }
}

preloader_init();

function gallery_init() {
    let gallery = document.querySelector('.noiceland_photo-gallery');
    let images = document.querySelectorAll('.photo-gallery-class');

    if (gallery && images.length > 0) {
        let imageOutput = gallery.querySelector('.photo-gallery__image');

        for (let image of images) {
            image.addEventListener('click', () => {
                imageOutput.style.backgroundImage = `url(${image.querySelector('img').src})`;
                gallery.classList.add('_active');
            })
        }

        gallery.addEventListener('click', (e) => {
            if (gallery.classList.contains('_active') && !e.target.closest('.photo-gallery__image')) {
                gallery.classList.remove('_active');
            }
        })

        window.addEventListener('keydown', (e) => {
            if (gallery.classList.contains('_active') && e.key == 'Escape') {
                gallery.classList.remove('_active');
            }
        })
    }
}

gallery_init();

window.addEventListener('scroll', animation_init);

function animation_init() {
    let animLeft = document.querySelectorAll('.animLeft');
    let animRight = document.querySelectorAll('.animRight');

    let leftRightBlocks = [];
    leftRightBlocks.push(...animLeft, ...animRight);

    let heightForLeftRight = document.body.clientHeight / 1.2;

    for (let leftRightBlock of leftRightBlocks) {
        if (leftRightBlock.getBoundingClientRect().top <= heightForLeftRight) {
            leftRightBlock.classList.add('_active');
        }
    }

    let animBottom = document.querySelectorAll('.animBottom');

    let heightForBottom = document.body.clientHeight / 1.1;

    for (let bottomBlock of animBottom) {
        if (bottomBlock.getBoundingClientRect().top <= heightForBottom) {
            bottomBlock.classList.add('_active');
        }
    }
}

animation_init();

const sidebar = document.querySelector('.sidebar');
if (sidebar) {
    let stickySidebar = new StickySidebar(sidebar, {
        topGap: 80,
        bottomGap: 20,
        sidebarInner: '.sidebar__inner',
    })
}

document.addEventListener('click', (e) => { if (e.target.closest('a')) { const href = e.target.closest('a').getAttribute('href'); if (href.includes('#')) return; e.preventDefault(); window.location.href = '/wordpress-noiceland-theme' + href } })