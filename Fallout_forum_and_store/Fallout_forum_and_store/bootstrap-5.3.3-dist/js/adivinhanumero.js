function salvarDados(nomeJogador, numeroEscolhido, numeroCorreto, tentativas) {
    const formData = new FormData();
    formData.append('nome_jogador', nomeJogador);
    formData.append('numero_escolhido', numeroEscolhido);
    formData.append('numero_correto', numeroCorreto);
    formData.append('tentativas', tentativas);

    fetch('salvar_jogo.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Erro ao salvar dados:', error);
        });
}
let count = 0;
let numeroescolhido = Math.floor(Math.random() * 50) + 1;
function jogar() {
    let nome = document.getElementById("txtjogador").value;
    let num = parseInt(document.getElementById("txtnum").value);
    console.log(numeroescolhido)
    let tv = document.getElementById("tv");
    let numeromostra = document.getElementById("numeromostra")
    let numeromostra1 = document.getElementById("numeromostra1")
    let iframe = document.getElementById("iframeVideo");
    let iframe1 = document.getElementById("iframeVideo1");
    if (!nome || isNaN(num)) {
        tv.innerHTML = "Por favor, preencha todos os campos corretamente!";
        return;
    }

    while (count < 5) {
        if (num === numeroescolhido) {
            tv.innerHTML = `Parabéns ${nome}, você acertou o número!`;
            iframe1.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
            setTimeout(() => {
                iframe1.contentWindow.postMessage('{"event":"command","func":"unMute","args":""}', '*');
            }, 1000);
            break;
        } else if(num<numeroescolhido) {
            tv.innerHTML = "Errou o número, tente novamente! ,o numero é maior";
            count++;
            numeromostra.textContent = num
            numeromostra1.textContent = num;
            iframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
            setTimeout(() => {
                iframe.contentWindow.postMessage('{"event":"command","func":"unMute","args":""}', '*');
            }, 1000);
            setTimeout(() => {
                tv.innerHTML = "";
            }, 3000);
            break;
        } else{
            tv.innerHTML = "Errou o número, tente novamente! ,o numero é menor";
            count++;
            numeromostra.textContent = num
            numeromostra1.textContent = num;
            iframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
            setTimeout(() => {
                iframe.contentWindow.postMessage('{"event":"command","func":"unMute","args":""}', '*');
            }, 1000);
            setTimeout(() => {
                tv.innerHTML = "";
            }, 3000);
            break;
        }
    }

    if (count === 5 && num !== numeroescolhido) {
        tv.innerHTML = `Você perdeu! O número escolhido era: ${numeroescolhido}.`;
        salvarDados(nome, numeroescolhido, num, count);
    }
}