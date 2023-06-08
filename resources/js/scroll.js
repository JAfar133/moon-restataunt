const body = document.querySelector('body');
const background = getComputedStyle(body).getPropertyValue('background-image');

window.addEventListener('scroll', () => {
    const maxScroll = 1000;
    const currentScroll = window.pageYOffset;
    if (currentScroll > maxScroll) {
        body.style.backgroundPositionY = `${maxScroll}px`;
    } else {
        body.style.backgroundPositionY = 'top';
    }
});
