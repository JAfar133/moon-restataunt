import { Carousel } from "@fancyapps/ui/dist/carousel/carousel.esm.js";
import "@fancyapps/ui/dist/carousel/carousel.css";

const container = document.getElementById("galleryCarousel");
const options = {
    infinite: false,
    slidesPerPage: 1,
};

let carousel = new Carousel(container, options);

container.addEventListener('wheel', (e) => {
    e.preventDefault();
    // e.deltaY > 0 ? fc.carousel.slidePrev() : fc.carousel.slideNext();

    // определяем направление прокрутки
    let direction = e.deltaY > 0 ? 1 : -1; // 1 - вниз, -1 - вверх
    // получаем текущий индекс элемента new Carousel
    let index = carousel.pages[carousel.page].index;

    // изменяем индекс в соответствии с направлением
    index += direction;

    // проверяем, что новый индекс не выходит за границы коллекции элементов new Carousel
    if (index < 0) {
        index = 0;
    } else if (index >= carousel.slides.length) {
        index = carousel.slides.length - 1;
    }

    // переходим на новый элемент
    carousel.slideTo(index);
});
