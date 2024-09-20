'use strict';

function preloader_init() {
    let preloader = document.querySelector('.noiceland_preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            preloader.classList.add('_active');
        })
    }
}

preloader_init();