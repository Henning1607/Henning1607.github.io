//Canvas elements
const canvas = document.querySelector('#draw');
const ctx = canvas.getContext('2d');

//Menu elements
const clear = document.querySelector('.clear-c');
const blendingBtn = document.querySelectorAll('.blendingBtn');
const colorBtn = document.querySelectorAll('.colorBtn');
const lineJoinBtn = document.querySelectorAll('.lineJoinBtn');
const lineCapBtn = document.querySelectorAll('.lineCapBtn');

//Sliders, colorpicker
const lineWidthSlider = document.querySelector('#lineWidthSlider');
const colorpickerslider = document.querySelector('#colorpickerslider');

canvas.width = window.innerWidth - 10; /*Fix later */
canvas.height = window.innerHeight -10; /*Fix later */

ctx.strokeStyle = '#BADA55';
ctx.lineJoin = 'miter';
ctx.lineCap = 'round';
ctx.lineWidth = 10;
ctx.globalCompositeOperation = '';

let isDrawing = false;
let lastX = 0;
let lastY = 0;
let hue = 0;
let direction = true;
let isRainbow = false;
let randomWidth = false; //TODO

function draw(e) {
    if (!isDrawing) return; // stop the fn from running when they are not moused down
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
    /*
    if (ctx.lineWidth >= 100 || ctx.lineWidth <= 1) {
        direction = !direction;
    }
    if(direction) {
        ctx.lineWidth++;
    } else {
        ctx.lineWidth--;
    }
    */
}

//Changes the globalCompositeOperation value
function changeGCO() {
    console.log(this.id);    
    ctx.globalCompositeOperation = this.id;
    GCOcolor(this);
}

//Removes/adds highlighted options on the menu
function GCOcolor(active) {
    var classArray = [];
    Array.prototype.forEach.call(active.classList, child => {
        classArray = [child];
        
    })

    var name = classArray.toString();
    eval(name).forEach(button => {
        if(button.classList.contains('active')){
            button.classList.remove('active');
        }
    });
    active.classList += " active";
}

function changeLineJoin() {
    console.log(this.id);
    ctx.lineJoin = this.id;
    GCOcolor(this);
}

function changeLineCap(){
    ctx.lineCap = this.id;
    GCOcolor(this);
}

function changeLineWidth(){
    ctx.lineWidth = this.value;
    console.log(this.value);
}

function changeColor(){
    switch(this.id){
        case "colorpicker":
        //Bit messy, look into later
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
    }
}

//Clears all the drawing off the canvas
function clearCanvas(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
}

canvas.addEventListener('mousedown', (e) => {
    isDrawing = true;
    [lastX, lastY] = [e.offsetX, e.offsetY];
});
//Canvas elements
canvas.addEventListener('mousemove', draw);
canvas.addEventListener('mouseup', () => isDrawing = false);
canvas.addEventListener('mouseout', () => isDrawing = false);

//Menu elements
clear.addEventListener('click', clearCanvas);
blendingBtn.forEach(button => button.addEventListener('click', changeGCO));
colorBtn.forEach(button => button.addEventListener('click', changeColor));
lineJoinBtn.forEach(blendButton => blendButton.addEventListener('click', changeLineJoin));
lineCapBtn.forEach(lineCapButton => lineCapButton.addEventListener('click', changeLineCap));

//Sliders, colorpicker
lineWidthSlider.addEventListener('change', changeLineWidth);
