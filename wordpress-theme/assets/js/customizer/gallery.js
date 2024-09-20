'use strict';

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