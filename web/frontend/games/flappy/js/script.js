const cvs = document.getElementById("canvas");
const ctx = cvs.getContext("2d");
document.addEventListener('click', moveUp);
document.getElementById('flappy-start').onclick = draw;

const bird = new Image(); // Создание объекта
const bg = new Image(); // Создание объекта
const fg = new Image(); // Создание объекта
const pipeUp = new Image(); // Создание объекта
const pipeBottom = new Image(); // Создание объекта

bird.src = "frontend/games/flappy/img/bird.png"; // Указание нужного изображения
bg.src = "frontend/games/flappy/img/bg.png"; // Аналогично
fg.src = "frontend/games/flappy/img/fg.png"; // Аналогично
pipeUp.src = "frontend/games/flappy/img/pipeUp.png"; // Аналогично
pipeBottom.src = "frontend/games/flappy/img/pipeBottom.png"; // Аналогично

// Звуковые файлы
var fly = new Audio(); // Создание аудио объекта
var score_audio = new Audio(); // Создание аудио объекта

fly.src = "frontend/games/flappy/audio/fly.mp3"; // Указание нужной записи
score_audio.src = "frontend/games/flappy/audio/score.mp3"; // Аналогично

// Позиция птицы
let xPos = 10;
let yPos = 150;

const gap = 150; // Высота окна между трубами

let step;

let score = 0; // Счёт
const grav = 2.3; // Гравитация 

// Прыжок
function moveUp() {
    yPos -= 37;
    fly.play();
}

// Трубы
let pipe = [];
pipe[0] = {
    x: cvs.width,
    y: 0
}

//Отрисовка игры
function draw() {

    ctx.drawImage(bg, 0, 0);
    ctx.drawImage(fg, 0, cvs.height - fg.height);
    ctx.drawImage(bird, xPos, yPos);

    for (let i = 0; i < pipe.length; i++) {
        ctx.drawImage(pipeUp, pipe[i].x, pipe[i].y);
        ctx.drawImage(pipeBottom, pipe[i].x, pipe[i].y + pipeUp.height + gap);

        pipe[i].x--;

        if (pipe[i].x == 125) {
            pipe.push({
                x: cvs.width,
                y: Math.floor(Math.random() * pipeUp.height) - pipeUp.height
            })
        }

        if (xPos + bird.width >= pipe[i].x &&
            xPos <= pipe[i].x + pipeUp.width &&
            (yPos <= pipe[i].y + pipeUp.height ||
                yPos + bird.height >= pipe[i].y + pipeUp.height + gap) || yPos + bird.height >= cvs.height - fg.height) {
            gameOver();
        }

        if (pipe[i].x == 5) {
            score++;
            score_audio.play();
        }
    }

    yPos += grav;
    ctx.fillStyle = "#000";
    ctx.font = "20px Verdana";
    ctx.fillText("Счёт: " + score, 10, cvs.height - 20);
    step = requestAnimationFrame(draw);

}
//конец игры
function gameOver() {
    cancelAnimationFrame(step);
    ctx.fillText('Для новой попытки', 10, 100);
    ctx.fillText('перезагрузите страницу', 10, 130);

    document.addEventListener('keydown', event => {
        if (event.keyCode === 192) {
            reset();
        }
        return;
    });
}

//перезагрузка игры
function reset() {
    ctx.clearRect(0, 0, 288, 512);
    xPos = 10;
    yPos = 150;
    score = 0;
    pipe = [];
    draw();
    step = requestAnimationFrame(draw);

    document.removeEventListener('keydown', event => {
        if (event.keyCode === 192) {
            return
        }
    });
}


//отключение скроллинга при нажатии на пробел
document.onkeydown = function (e) {
    let keycode = e.keyCode || e.charCode
    if (keycode === 32)
        e.preventDefault();

}