import './bootstrap';

import '../sass/app.scss';


if (location.pathname.startsWith('/menu/')) {
    import('./menu.js');
    import('./cart.js');
}


if (location.pathname === '/') {
    import('./smoke.js');
    import ('./gallery/index.js');
    import ('./carousel/index.js');
    import ('./header.js');
}


const links = document.querySelectorAll('a[href^="/menu/"]');
links.forEach(function(link) {
    link.addEventListener('click', function() {
        if(this.getAttribute('href')!=="/menu/basket"){
            sessionStorage.setItem('prevPage', this.getAttribute('href'));
        }
    });
});



