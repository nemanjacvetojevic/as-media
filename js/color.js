var boje = ['#0A83C8','#F4941C','#AF2E88','#16B4C0'];
var klasa = document.querySelector(".bg-change");
	var i = 0;
setInterval(function() {

	if (i==4) {
   i=0;
  }
  klasa.style.backgroundColor = boje[i];
  i++;
}, 500);
