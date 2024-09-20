'use strict';

window.addEventListener('scroll', animation_init);

function animation_init() {
    let animLeft = document.querySelectorAll('.animLeft');
    let animRight = document.querySelectorAll('.animRight');

    let leftRightBlocks = [];
    leftRightBlocks.push(...animLeft, ...animRight);

    let heightForLeftRight = document.body.clientHeight / 1.6;

    for (let leftRightBlock of leftRightBlocks) {
        if (leftRightBlock.getBoundingClientRect().top <= heightForLeftRight) {
            leftRightBlock.classList.add('_active');
        }
    }

    let animBottom = document.querySelectorAll('.animBottom');

    let heightForBottom = document.body.clientHeight / 1.3;

    for (let bottomBlock of animBottom) {
        if (bottomBlock.getBoundingClientRect().top <= heightForBottom) {
            bottomBlock.classList.add('_active');
        }
    }
}

animation_init();
