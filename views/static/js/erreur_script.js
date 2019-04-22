erreurs = document.querySelector('.erreurs');
opacite = 1.0;
function disparait(){
    if(opacite>=0.0){
        opacite -= 0.07;
        erreurs.style.opacity = opacite;
    } 
    else erreurs.style.display = 'none';
}
setTimeout(function(){
    setInterval(disparait, 100);
}, 3000);