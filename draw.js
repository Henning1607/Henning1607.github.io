/**
 * TODO:
 * 
 * Features:
 * Eraser
 * Upload a pic
 * Create shapes
 * Save settings
 * Pattern on just the stroke
 * 
 * Bugfixes:
 * All active elements should be highlighted from page load
 * Reset options does not change active highlights
 * Needs to be a line, nothing happens when the user clicks
 * Slider/slidervalue doesnt get updated after randomLineWidth is unchecked
 * 
 */

//Canvas elements
const canvas = document.querySelector('#draw');
const ctx = canvas.getContext('2d');

//Menu elements
const clear = document.querySelector('.clear-c');
const resetOpt = document.querySelector('.reset-opt');
const randomWidth = document.querySelector('#randomWidth');
const blendingBtn = document.querySelectorAll('.blendingBtn');
const colorBtn = document.querySelectorAll('.colorBtn');
const lineJoinBtn = document.querySelectorAll('.lineJoinBtn');
const lineCapBtn = document.querySelectorAll('.lineCapBtn');
const saveImage = document.querySelector('.saveImage');
const randomPattern = document.querySelector('.patternBtn');

//Sliders, colorpicker
const lineWidthSlider = document.querySelector('#lineWidthSlider');
const transparencySlider = document.querySelector('#transparencySlider');
const colorpickerslider = document.querySelector('#colorpickerslider');
const fillcolorslider = document.querySelector('#fillcolorslider');

canvas.width = window.innerWidth - 4; /*Fix later */
canvas.height = window.innerHeight -4; /*Fix later */

ctx.strokeStyle = '#BADA55';
ctx.lineJoin = 'miter';
ctx.lineCap = 'round';
ctx.lineWidth = 10;
ctx.globalCompositeOperation = ''; //Blending
ctx.globalAlpha = '1'; //Transparency

let isDrawing = false;
let lastX = 0;
let lastY = 0;
let hue = 0;
let direction = true;
let isRainbow = false;
let randomLineWidth = false;
let patternNum = 1;

function draw(e) {
    if (!isDrawing) return; // stop the function from running when they are not moused down
    ctx.beginPath();
    // start from
    ctx.moveTo(lastX, lastY);
    // go to
    ctx.lineTo(e.offsetX, e.offsetY);
    ctx.stroke();
    [lastX, lastY] = [e.offsetX, e.offsetY];

    //Rainbow color:
    if(isRainbow){
        ctx.strokeStyle = `hsl(${hue}, 100%, 50%)`;
        hue++;
        if (hue >= 360) {
            hue = 0;
        }
    }
    
    //Random width:
    if(randomLineWidth){
        if (ctx.lineWidth >= 100 || ctx.lineWidth <= 1) {
            direction = !direction;
        }
        if(direction) {
            ctx.lineWidth++;
        } else {
            ctx.lineWidth--;
        }
    }
    
}
//Resets the slider positions etc...
function updateReset (){
    lineWidthSlider.value=10;
    lineWidthSlider.disabled = false;
    randomWidth.checked = false;
    transparencySlider.value = 1;
}

//Removes/adds highlighted options on the menu
function GCOcolor(active) {
    console.log(active.classList.toString());
    var classArray = [];
    Array.prototype.forEach.call(active.classList, child => {
        classArray = [child];
    })
    var name = classArray.toString();
    eval(name).forEach(button => { //Error when coming from color function, still works though
        if(button.classList.contains('active')){
            button.classList.remove('active');
        }
    });
    active.classList += " active";
}

function changeColor(){
    //Bit messy, look into later
    switch(this.id){
        case "colorpicker":
            colorpickerslider.addEventListener("change",(value) => {
                ctx.strokeStyle = document.getElementById("colorpickerslider").value;
            });
            isRainbow = false;
            GCOcolor(this);
            break;
        case "rainbow":
            isRainbow = true;
            GCOcolor(this);
            break;
        case "fillscreen":
            fillcolorslider.addEventListener("change",(value) => {
                ctx.fillStyle = document.getElementById("fillcolorslider").value;
                ctx.fillRect(0, 0, canvas.width, canvas.height);
            });
    }
}

canvas.addEventListener('mousedown', (e) => {
    isDrawing = true;
    [lastX, lastY] = [e.offsetX, e.offsetY];
});
//Canvas elements
canvas.addEventListener('mousemove', draw);
canvas.addEventListener('mousedown', draw);
canvas.addEventListener('mouseup', () => isDrawing = false);
canvas.addEventListener('mouseout', () => isDrawing = false);

//Menu elements
clear.addEventListener('click', () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
});

randomWidth.addEventListener('change',() =>{
    randomLineWidth = !randomLineWidth; //Toggles random width
    if(randomLineWidth){
        lineWidthSlider.disabled = true;
    } else {
        lineWidthSlider.disabled = false;
    }
});

resetOpt.addEventListener('click', () =>{
    hue = 0;
    isRainbow = false;
    randomLineWidth = false;
    patternNum = 1;
    ctx.strokeStyle = '#BADA55';
    ctx.lineJoin = 'miter';
    ctx.lineCap = 'round';
    ctx.lineWidth = 10;
    ctx.globalCompositeOperation = 'source-over';
    ctx.globalAlpha = '1';
    updateReset();
    //Actives on menu elements
});

blendingBtn.forEach(button => button.addEventListener('click', function(){
    ctx.globalCompositeOperation = this.id;
    GCOcolor(this);
}));

colorBtn.forEach(button => button.addEventListener('click', changeColor));
lineJoinBtn.forEach(blendButton => blendButton.addEventListener('click', function(){
    ctx.lineJoin = this.id;
    GCOcolor(this);
}));

lineCapBtn.forEach(lineCapButton => lineCapButton.addEventListener('click', function() {
    ctx.lineCap = this.id;
    GCOcolor(this);
}));

//Opens a new window with the canvas as a PNG image
saveImage.addEventListener('click',() => {
    var canvas = document.getElementById("draw");
    var img    = canvas.toDataURL("image/png");
    document.write('<img src="'+img+'"/>');
})

//Creates a pattern, based on images that exists in the Patterns folder, on the canvas
randomPattern.addEventListener('click', () => {
    var img = new Image();
    img.src = 'Patterns/pattern' + patternNum + ".png";
    img.onload = function(){
        var ptrn = ctx.createPattern(img,'repeat');
        ctx.fillStyle = ptrn;
        ctx.fillRect(0, 0, canvas.width, canvas.height);
    }
    patternNum++;
    if(patternNum >= 5){patternNum = 1};
})

//Sliders, colorpicker
lineWidthSlider.addEventListener('change', function(){
    ctx.lineWidth = this.value;
});

transparencySlider.addEventListener('change', function(){
    ctx.globalAlpha = this.value;
});

window.onload = updateReset;