hauteurBody = document.querySelector('body').clientHeight;
hauteurFenetre = window.innerHeight;
hauteurInputComment = document.querySelector(".partie_comment").clientHeight;
if(hauteurFenetre<hauteurBody+hauteurInputComment) document.querySelector(".all_comments").style.paddingBottom = hauteurInputComment+"px";