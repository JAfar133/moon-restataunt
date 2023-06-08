let burgerBtn = document.getElementById('burgerBtn');
let mobile = document.getElementById('mobile');
let demo1 = document.getElementById('demo1');

burgerBtn.addEventListener('click', function() {
    mobile.classList.toggle('navigation');
    let content = document.getElementsByClassName("for-blur");
    Array.from(content).forEach(function(item) {
        if (item.classList.contains("blur")) {
            item.classList.remove("blur");
        } else {
            item.classList.add("blur");
        }
    });
}, false);






