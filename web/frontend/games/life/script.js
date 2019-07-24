const canvas = document.getElementById('c1');
const ctx = canvas.getContext('2d');

let mas = [];
let count;
let timer;
let stopCount;

canvas.onclick = function (event) {
    let x = event.offsetX;
    let y = event.offsetY;
    x = Math.floor(x / 10);
    y = Math.floor(y / 10);
    mas[y][x] = 1;
    drawField();
}

function goLife() {
    let n = 40,
        m = 40;
    for (let i = 0; i < m; i++) {
        mas[i] = [];
        for (let j = 0; j < n; j++) {
            mas[i][j] = 0;
        }
    }
}
goLife();

function drawField() {
    ctx.clearRect(0, 0, 400, 400);
    for (let i = 0; i < 40; i++) {
        for (let j = 0; j < 40; j++) {
            if (mas[i][j] == 1) {
                ctx.lineCap = 'round';
                ctx.fillStyle = "green";
                ctx.fillRect(j * 10, i * 10, 10, 10);
            }
        }
    }
}

function startLife() {
    let mas2 = []
    for (let i = 0; i < 40; i++) {
        mas2[i] = [];
        for (let j = 0; j < 40; j++) {
            let neighbors = 0;
            switch (mas[i][j]) {
                case 1: //если клетка живая
                    if (mas[fpm(i) - 1][j] == 1) neighbors++; //up
                    if (mas[i][fpp(j) + 1] == 1) neighbors++; //right
                    if (mas[fpp(i) + 1][j] == 1) neighbors++; //bottom
                    if (mas[i][fpm(j) - 1] == 1) neighbors++; //left

                    if (mas[fpm(i) - 1][fpp(j) + 1] == 1) neighbors++; //up+right
                    if (mas[fpp(i) + 1][fpp(j) + 1] == 1) neighbors++; //bottom+right
                    if (mas[fpp(i) + 1][fpm(j) - 1] == 1) neighbors++; //bottom+left
                    if (mas[fpm(i) - 1][fpm(j) - 1] == 1) neighbors++; //up+left
                    (neighbors == 2 || neighbors == 3) ? mas2[i][j] = 1: mas2[i][j] = 0;
                    break;

                case 0: //если клетка мертвая
                    if (mas[fpm(i) - 1][j] == 1) neighbors++; //up
                    if (mas[i][fpp(j) + 1] == 1) neighbors++; //right
                    if (mas[fpp(i) + 1][j] == 1) neighbors++; //bottom
                    if (mas[i][fpm(j) - 1] == 1) neighbors++; //left

                    if (mas[fpm(i) - 1][fpp(j) + 1] == 1) neighbors++; //up+right
                    if (mas[fpp(i) + 1][fpp(j) + 1] == 1) neighbors++; //bottom+right
                    if (mas[fpp(i) + 1][fpm(j) - 1] == 1) neighbors++; //bottom+left
                    if (mas[fpm(i) - 1][fpm(j) - 1] == 1) neighbors++; //up+left
                    (neighbors == 3) ? mas2[i][j] = 1: mas2[i][j] = 0;
                    break;
            }
        }
    }
    mas = mas2;
    drawField();
    count++;
    document.getElementById('count').innerHTML = count;
    timer = setTimeout(startLife, 300);

    stopCount = 0;
    mas.forEach(function (element) {
        if (!element.includes(1)) {
            stopCount++;
        }
    })
    if (stopCount == 40) {
        stop();
    }

}

function fpm(i) {
    if (i == 0) return 40;
    else return i;
}

function fpp(i) {
    if (i == 39) return -1;
    else return i;
}

function stop() {
    clearTimeout(timer);
    timer = 0;
}

document.getElementById('start').onclick = function () {
    count = 0;
    startLife();
}