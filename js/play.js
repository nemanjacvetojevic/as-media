window.playPauseAudio = function(button, audioId) {
	var audio = document.getElementById(audioId);
  button.classList.toggle('pause');
  if(button.classList.contains('pause')) {
  	audio.play();
  } else {
  	audio.pause();
  }
};
window.RetunToPlay = function(buttonId) {
  var button = document.getElementById(buttonId);
  button.classList.toggle('pause');
}
