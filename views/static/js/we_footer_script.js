hauteurBody = document.querySelector('body').clientHeight;
hauteurFenetre = window.innerHeight;
if(hauteurFenetre<hauteurBody) document.querySelector("footer").style.position = "static";