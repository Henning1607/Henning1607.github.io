var bilde = null;
var bilde2 = null;
var bilde3 = null;
var flytt;

function visBilde(){									
	bilde = document.getElementById('alien');
	bilde2 = document.getElementById('alien2');
	bilde3 = document.getElementById('venus');
	bilde.style.position= 'absolute'; 
	bilde2.style.position= 'absolute';
	bilde3.style.position= 'absolute';
	bilde.style.right = '-90px'; 
	bilde2.style.left = '-200px'; 
	bilde3.style.left = '20px'; 
	bilde.style.bottom = '0px'; 
	bilde2.style.top = '0px'; 
	bilde3.style.top = '250px'; 
	flyttBilde();
}

function flyttBilde(){										
	bilde.style.display = 'inline';
	bilde2.style.display = 'inline';
	bilde3.style.display = 'inline';
	bilde.style.right = parseInt(bilde.style.right) + 3 + 'px';
	bilde2.style.left = parseInt(bilde2.style.left) + 4 + 'px';
	if (parseInt(bilde.style.right) > window.innerWidth)				
	{
   		clearTimeout(flytt);
   		bilde.style.display = 'none';
   		bilde2.style.display = 'none';
   		bilde3.style.display = 'none';
	}
	else
	{
   		flytt = setTimeout(flyttBilde,10);					
	}
}

$(document).ready(function(){							
 $("#logo").mouseleave(function(event){
  if (event.ctrlKey)
  {
  	visBilde();
  }
 });
});