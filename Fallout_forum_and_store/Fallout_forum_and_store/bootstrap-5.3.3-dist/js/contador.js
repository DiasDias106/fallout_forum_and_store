const decrementar = document.getElementById("decrementa")
const resetar = document.getElementById("reseta")
const aumentar = document.getElementById("incrementa")
const contador = document.getElementById("contador")
let iframe = document.getElementById("audioIframe")
let count = 80
 decrementar.onclick = function decrementa(){
    count--
    contador.textContent= count
}
resetar.onclick= function reseta(){
    iframe.src = iframe.src.replace('&autoplay=0', '&autoplay=1')
    iframe.src = iframe.src.replace('&mute=1', '&mute=0')
    count =0
    contador.textContent = count;
}
aumentar.onclick = function aumenta(){
    count++
    contador.textContent = count;
}