var boje = ['rgba(10,131,200,.7)','rgba(244,148,28,.8)','rgba(175,46,136,.7)','rgba(22,180,192,.7)'];
var klasa = document.querySelector(".bg-change");
	var i = 0;
if(klasa){
setInterval(function() {

	if (i==4) {
   i=0;
  }
  klasa.style.backgroundColor = boje[i];
  i++;
}, 1500);
}
