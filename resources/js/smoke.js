let availableScreenWidth = window.screen.availWidth;
(function () {
    let requestAnimationFrame = window.requestAnimationFrame
        || window.mozRequestAnimationFrame
        || window.webkitRequestAnimationFrame
        || window.msRequestAnimationFrame;
    window.requestAnimationFrame = requestAnimationFrame;
})();

window.addEventListener('resize', function(event) {
    //resize canvas
    availableScreenWidth = window.screen.availWidth;
    canvas.height = window.innerHeight;
    canvas.width = window.innerWidth;
    emitterY = canvas.height - 10;
});

let canvas = document.getElementById("canvas"),
    ctx = canvas.getContext("2d");

canvas.height = window.innerHeight;
canvas.width = window.innerWidth;
if(availableScreenWidth<800){
    canvas.width = 300;
}
// else {
//     canvas.height+=100;
// }
let parts = [],
    minSpawnTime = 40,
    lastTime = performance.now(),
    maxLifeTime = 5000,
    // emitterX = canvas.width / 2,
    emitterY = canvas.height - 10,
    smokeImage = new Image(),
    isAnimating = true, // Флаг для определения продолжается анимация или нет
    pausedTime = 0, // Время, когда пауза была нажата
    pauseLife = 0; // Сколько пауза длилась


// Время жизни для разных устройств p.s. по умолчанию 5000
if(availableScreenWidth>1600){
    maxLifeTime = 9000;
}
else if(availableScreenWidth>1000 && availableScreenWidth<1600){
    maxLifeTime = 7000;
}


function spawn(startTime) {
    if (performance.now() > lastTime + minSpawnTime) {
        if(availableScreenWidth<450){
            parts.push(new smoke(0, emitterY+100,-1, startTime));
        }
        else{
            parts.push(new smoke(document.body.offsetWidth-300, emitterY+200,1, startTime));
            parts.push(new smoke(200, emitterY+200,-1, startTime));
            parts.push(new smoke(document.body.offsetWidth/2, emitterY+350,-1, startTime));
        }
    }
}

function render() {

    let len = parts.length;
    ctx.clearRect(0, 0, Math.min(canvas.width, window.innerWidth), Math.min(canvas.height, window.innerHeight));

    while (len--) {
        if (parts[len].y < 0 || parts[len].lifeTime > maxLifeTime) {
            parts.splice(len, 1);
        } else {
            parts[len].update();
            ctx.save();
            let offsetX = -parts[len].size/2,
                offsetY = -parts[len].size/2;

            ctx.translate(parts[len].x-offsetX, parts[len].y-offsetY);
            ctx.rotate(parts[len].angle / 180 * Math.PI);
            ctx.globalAlpha  = parts[len].alpha;
            ctx.drawImage(smokeImage, offsetX, offsetY, parts[len].size, parts[len].size);
            ctx.restore();
        }
    }
    // проверяем на паузе дым или нет с помощью флага
    if(isAnimating){
        pauseLife = 0; // Обнуляем время паузы
        spawn(performance.now()); // Продолжаем спавн
        requestAnimationFrame(render); // Какая-то фича вроде как для оптимизации https://habr.com/ru/post/127014/#11 возможно из-за нее нестабильность
    }
}

function smoke(x, y, index, startTime) {
    this.x = x;
    this.y = y;

    this.size = 1;
    this.startSize = 20;
    this.endSize = 60;

    this.angle = Math.random() * 359;

    this.startLife = startTime;
    this.lifeTime = 0;

    this.velY = -1 - (Math.random()*0.5);
    this.velX = Math.floor(Math.random() * (-6) + 3)*0.3;
}

smoke.prototype.update = function update() {
    this.startLife += pauseLife; // Увеличиваем время начала жизни дыма на количество времени в паузе
    this.lifeTime = performance.now() - this.startLife;

    this.angle += 0.2;

    let lifePerc = ((this.lifeTime / maxLifeTime) * 100);

    this.size = this.startSize + ((this.endSize - this.startSize) * lifePerc * .1);

    this.alpha = 1 - (lifePerc * .01);
    this.alpha = Math.max(this.alpha,0);

    this.x += this.velX;
    this.y += this.velY;
}
smokeImage.src = "/images/smoke1.webp";
render();

window.onresize = resizeMe;
window.onload = resizeMe;
function resizeMe() {
    canvas.height = document.body.offsetHeight;
}

// Функция для остановки анимации
function stopAnimation() {
    isAnimating = false;
    pausedTime = performance.now(); // Устанавливаем время паузы
    cancelAnimationFrame(render); // Отменяем рендер
}
// Функция для старта анимации
function startAnimation() {
    isAnimating = true;
    pauseLife = performance.now() - pausedTime; // Определеям сколько длилась пауза
    pausedTime = 0; // Обнуляем паузу

    render(); // запускаем рендер
}

// Добавляем обработчик события на кнопку бургер
const menuButton = document.getElementById("burgerBtn");
menuButton.addEventListener("click", () => {
    if (isAnimating) {
        stopAnimation();
    } else {
        startAnimation();
    }
});


if(availableScreenWidth<991){
    setTimeout(function() {
        let block = document.getElementById('main-btn');
        let red = 0;
        let green = 0;
        let blue = 0;
        let full_red = 242, full_green=237, full_blue=197;
        let interval = setInterval(changeColor, 25);
        function changeColor() {
            if (red === full_red && green === full_green && blue === full_blue) {
                clearInterval(interval);
            } else {
                if(red!=full_red) red++;
                if(green!=full_green) green++;
                if(blue!=full_blue) blue++;
                block.style.borderColor = 'rgb(' + red + ',' + green + ',' + blue + ')';
                block.style.color = 'rgb(' + red + ',' + green + ',' + blue + ')';
                block.style.boxShadow = '0 0 10px rgb(' + red + ',' + green + ',' + blue + ')';
            }
        }
    },3000);
}
