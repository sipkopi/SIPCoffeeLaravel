<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style type="text/css">
   @import url('https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap');
      html,
    
  body {
    font-family: 'Tilt Neon', cursive;
    height: 100%;
    width: 100%;
    margin: 0;
    padding: 0;
    cursor: pointer;
  }
  canvas {
    border: 1px soild #e100ff;
    height: 100%;
    width: 100%;
  }
  
  h1 {
    display: inline-block;
    position: absolute;
    top: 50%;
    left: 50%;
    font-size: 250px;
    user-select: none;
    transform: translate(-50%, -120%);
    color: #fff;
  }
  marquee{
    display: inline-block;
    position: absolute;
    top: 50%;
    left: 50%;
    user-select: none;
    font-size: 30px;
    font-weight: 700;
    transform: translate(-50%, 115px);
    background-color: none;
    color: #fff;
  }
  
  @media screen and (max-width: 600px) {
    /* styles for screens smaller than 600px wide */
    h1 {
      font-size: 30px;
      transform: translate(-45%, 10%);
    }
  
    marquee {
      font-size: 22px;
      font-weight: 600;
      transform: translate(-45%, 80px);
    }
  
  }
  
  @media screen and (max-width: 599px) {
    /* styles for screens smaller than 600px wide */
  
  
    h1 {
      font-size: 50px;
      transform: translate(-45%, -90px);
    }
  
    marquee {
      font-size:25px;
      font-weight: 600;
      transform: translate(-45%, 10px);
    }
  
  }
  
  </style>
  
  <canvas id="canvas"></canvas>
  
  
  <h1>404</h1>
  <marquee behavior="scroll" direction="left">Oops! Sepertinya kami kehilangan halaman yang Anda cari.</marquee>
  
  
  <script type="text/javascript">
  
      // Little Canvas things
  var canvas = document.querySelector("#canvas"),
  ctx = canvas.getContext("2d");
  
  // Set Canvas to be window size
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
  
  // Configuration, Play with these
  var config = {
    particleNumber: 800,
    maxParticleSize: 10,
    maxSpeed: 40,
    colorVariation: 50 };
  
  
  // Colors
  var colorPalette = {
    bg: { r: 255, g: 0, b: 112 },
    matter: [
    '#DFFF00', // darkPRPL
    '#DE3163', // rockDust
    '#FFBF00', // solorFlare
    '#FF7F50', // totesASun
    '#CCCCFF',
    '#6495ED',
    '#000000'
    ]
  };
  
  function getRandomColor() {
    const randomColor = Math.floor(Math.random() * colorPalette.matter.length);
    const { r, g, b } = colorPalette.matter[randomColor];
    return `rgb(${r}, ${g}, ${b})`;
  }
  
  setInterval(function() {
    document.body.style.backgroundColor = getRandomColor();
  }, 100);
  
  
    var colorpartikel = {
      matter: [
      { r: 222, g: 49, b: 99 }, // darkPRPL
      { r: 0, g: 0,  b:  0 }, // rockDust
      { r: 108, g: 249, b: 8 }, // solorFlare
      { r: 255, g: 255, b: 255 },
      {r: 8, g:249, b: 229} // totesASun 
      ] }; 
  
  // Some Variables hanging out
  var particles = [],
  centerX = canvas.width / 2,
  centerY = canvas.height / 2,
  drawBg,
  // Draws the background for the canvas, because space
  drawBg = function (ctx, color) {
    ctx.fillStyle = "rgb(" + color.r + "," + color.g + "," + color.b + ")";
    ctx.fillRect(0, 0, canvas.width, canvas.height);
  };
  
  // Particle Constructor
  var Particle = function (x, y) {
    // X Coordinate
    this.x = x || Math.round(Math.random() * canvas.width);
    // Y Coordinate
    this.y = y || Math.round(Math.random() * canvas.height);
    // Radius of the space dust
    this.r = Math.ceil(Math.random() * config.maxParticleSize);
    // Color of the rock, given some randomness
    this.c = colorVariation(
      colorpartikel.matter[Math.floor(Math.random() * colorpartikel.matter.length)],
    true);
  
    // Speed of which the rock travels
    this.s = Math.pow(Math.ceil(Math.random() * config.maxSpeed), 0.7);
    // Direction the Rock flies
    this.d = Math.round(Math.random() * 360);
  };
  
  // Provides some nice color variation
  // Accepts an rgba object
  // returns a modified rgba object or a rgba string if true is passed in for argument 2
  var colorVariation = function (color, returnString) {
    var r, g, b, a, variation;
    r = Math.round(
    Math.random() * config.colorVariation - config.colorVariation / 2 + color.r);
  
    g = Math.round(
    Math.random() * config.colorVariation - config.colorVariation / 2 + color.g);
  
    b = Math.round(
    Math.random() * config.colorVariation - config.colorVariation / 2 + color.b);
  
    a = Math.random() + 0.5;
    if (returnString) {
      return "rgba(" + r + "," + g + "," + b + "," + a + ")";
    } else {
      return { r, g, b, a };
    }
  };
  
  // Used to find the rocks next point in space, accounting for speed and direction
   var updateParticleModel = function (p) {
    var a = 180 - (p.d + 90); // find the 3rd angle
    p.d > 0 && p.d < 180 ?
    p.x += p.s * Math.sin(p.d) / Math.sin(p.s) :
    p.x -= p.s * Math.sin(p.d) / Math.sin(p.s);
    p.d > 90 && p.d < 270 ?
    p.y += p.s * Math.sin(a) / Math.sin(p.s) :
    p.y -= p.s * Math.sin(a) / Math.sin(p.s);
    return p;
  };
  
  // Just the function that physically draws the particles
  // Physically? sure why not, physically.
  var drawParticle = function (x, y, r, c) {
    ctx.beginPath();
    ctx.fillStyle = c;
    ctx.arc(x, y, r, 0, 2 * Math.PI, false);
    ctx.fill();
    ctx.closePath();
  };
  
  // Remove particles that aren't on the canvas
  var cleanUpArray = function () {
    particles = particles.filter(p => {
      return p.x > -100 && p.y > -100;
    });
  };
  
  var initParticles = function (numParticles, x, y) {
    for (let i = 0; i < numParticles; i++) {
      particles.push(new Particle(x, y));
    }
    particles.forEach(p => {
      drawParticle(p.x, p.y, p.r, p.c);
    });
  };
  
  // That thing
  window.requestAnimFrame = function () {
    return (
      window.requestAnimationFrame ||
      window.webkitRequestAnimationFrame ||
      window.mozRequestAnimationFrame ||
      function (callback) {
        window.setTimeout(callback, 1000 / 60);
      });
  
  }();
  
  // Our Frame function
  var frame = function () {
    // Draw background first
    drawBg(ctx, getRandomColor);
    // Update Particle models to new position
    particles.map(p => {
      return updateParticleModel(p);
    });
    // Draw em'
    particles.forEach(p => {
      drawParticle(p.x, p.y, p.r, p.c);
    });
    // Play the same song? Ok!
    window.requestAnimFrame(frame);
  };
  
  // Click listener
  document.body.addEventListener("click", function (event) {
    var x = event.clientX,
    y = event.clientY;
    cleanUpArray();
    initParticles(config.particleNumber, x, y);
  });
  
  // First Frame
  frame();
  
  // First particle explosion
  initParticles(config.particleNumber);
  
  </script>
  
  
  
  