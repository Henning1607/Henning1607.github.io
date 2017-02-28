//Canvas elements
const canvas = document.querySelector('#draw');
const ctx = canvas.getContext('2d');

//Menu elements
const clear = document.querySelector('.clear-c');
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
ctx.globalCompositeOperation = '';
ctx.globalAlpha = '1';


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

//Removes/adds highlighted options on the menu
function GCOcolor(active) {
    var classArray = [];
    Array.prototype.forEach.call(active.classList, child => {
        classArray = [child];
        
    })
    var name = classArray.toString();
    console.log(name);
    eval(name).forEach(button => { //Error when coming from color function, still works though
        if(button.classList.contains('active')){
            button.classList.remove('active');
        }
    });
    active.classList += " active";
}

//Changes the globalCompositeOperation value
function changeGCO() {  
    ctx.globalCompositeOperation = this.id;
    GCOcolor(this);
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

function changeTransparency(){
    ctx.globalAlpha = this.value;
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
        case "fillscreen":
            fillcolorslider.addEventListener("change",(value) => {
                ctx.fillStyle = document.getElementById("fillcolorslider").value;
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                GCOcolor(this);
            });
            console.log(document.getElementById("colorpickerslider").value);
            
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
randomWidth.addEventListener('change',() =>{
    randomLineWidth = !randomLineWidth;
    if(randomLineWidth){
        document.getElementById("lineWidthSlider").disabled = true;
    } else {
        document.getElementById("lineWidthSlider").disabled = false;
    }
    console.log(randomLineWidth);
});
blendingBtn.forEach(button => button.addEventListener('click', changeGCO));
colorBtn.forEach(button => button.addEventListener('click', changeColor));
lineJoinBtn.forEach(blendButton => blendButton.addEventListener('click', changeLineJoin));
lineCapBtn.forEach(lineCapButton => lineCapButton.addEventListener('click', changeLineCap));
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
    console.log(img.src);
    img.onload = function(){
        var ptrn = ctx.createPattern(img,'repeat');
        ctx.fillStyle = ptrn;
        ctx.fillRect(0, 0, canvas.width, canvas.height);
    }
    patternNum++;
    if(patternNum >= 5){patternNum = 1};
    
})

//Sliders, colorpicker
lineWidthSlider.addEventListener('change', changeLineWidth);
transparencySlider.addEventListener('change', changeTransparency);
