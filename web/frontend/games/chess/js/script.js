const chess=[[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0],[0,0,0,0,0,0,0,0]];function draw(){let a="",b=0;for(let c,d=0;d<chess.length;d++){c=chess[d];for(let e=0;e<c.length;e++)a+=0==b%2?`<div class="chess-block" data-x="${e}" data-y="${d}"></div>`:`<div class="chess-block bg-black" data-x ="${e}" data-y="${d}"></div>`,b++;b++}document.querySelector("#field").innerHTML=a,document.querySelectorAll(".chess-block").forEach(function(a){a.onclick=horse})}draw();function horse(){document.querySelectorAll(".chess-block").forEach(function(a){a.classList.remove("green"),a.classList.remove("active")});let a=this.dataset.x,b=this.dataset.y;this.classList.add("green"),8>+a+2&&8>+b+1&&document.querySelector(`.chess-block[data-x="${+a+2}"][data-y="${+b+1}"]`).classList.add("active"),8>+a+2&&0<=+b-1&&document.querySelector(`.chess-block[data-x="${+a+2}"][data-y="${+b-1}"]`).classList.add("active"),0<=+a-2&&8>+b+1&&document.querySelector(`.chess-block[data-x="${+a-2}"][data-y="${+b+1}"]`).classList.add("active"),0<=+a-2&&0<=+b-1&&document.querySelector(`.chess-block[data-x="${+a-2}"][data-y="${+b-1}"]`).classList.add("active"),8>+a+1&&8>+b+2&&document.querySelector(`.chess-block[data-x="${+a+1}"][data-y="${+b+2}"]`).classList.add("active"),8>+a+1&&0<=+b-2&&document.querySelector(`.chess-block[data-x="${+a+1}"][data-y="${+b-2}"]`).classList.add("active"),0<=+a-1&&8>+b+2&&document.querySelector(`.chess-block[data-x="${+a-1}"][data-y="${+b+2}"]`).classList.add("active"),0<=+a-1&&0<=+b-2&&document.querySelector(`.chess-block[data-x="${+a-1}"][data-y="${+b-2}"]`).classList.add("active")}