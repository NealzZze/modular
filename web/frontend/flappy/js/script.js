const cvs = document.getElementById("canvas");
const ctx = cvs.getContext("2d");
document.addEventListener('keydown', moveUp);

const bird = new Image(); // Создание объекта
const bg = new Image(); // Создание объекта
const fg = new Image(); // Создание объекта
const pipeUp = new Image(); // Создание объекта
const pipeBottom = new Image(); // Создание объекта

bird.src = "frontend/flappy/img/bird.png"; // Указание нужного изображения
bg.src = "frontend/flappy/img/bg.png"; // Аналогично
fg.src = "frontend/flappy/img/fg.png"; // Аналогично
pipeUp.src = "frontend/flappy/img/pipeUp.png"; // Аналогично
pipeBottom.src = "frontend/flappy/img/pipeBottom.png"; // Аналогично

// Звуковые файлы
var fly = new Audio(); // Создание аудио объекта
var score_audio = new Audio(); // Создание аудио объекта

fly.src = "frontend/flappy/audio/fly.mp3"; // Указание нужной записи
score_audio.src = "frontend/flappy/audio/score.mp3"; // Аналогично

// Позиция птицы
let xPos = 10;
let yPos = 150;

const gap = 90; // Высота окна между трубами

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
    requestAnimationFrame(draw);
}
pipeBottom.onload = draw();

function gameOver() {
    ctx.fillText('Для новой попытки', 10, 100);
    ctx.fillText('перезагрузите страницу', 10, 130);

    cancelAnimatfionFrame(draw_anime);
    requestAnimationFrame(gameOver);
    document.addEventListener('keydown', event => {
        if (event.keyCode === 192) {
            reset();
        }
    });
}

function reset() {
    document.removeEventListener('keydown', event => {
        if (event.keyCode === 192) {
            reset();
        }
    });
    score = 0;
}