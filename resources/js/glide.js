import Glide from '@glidejs/glide'

document.addEventListener("DOMContentLoaded", function () {
    new Glide('.glide', {
        type: 'carousel',
        perView: 3,
        focusAt: 'center',
        gap: 20
    }).mount();
});
