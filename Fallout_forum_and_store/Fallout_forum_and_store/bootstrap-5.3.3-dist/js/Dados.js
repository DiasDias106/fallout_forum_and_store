class Jogo {
    constructor(jogador) {
        this.jogador = jogador;
    }

    ver() {
        console.log(`Jogador: ${this.jogador}`);
    }
}

class JogoDados extends Jogo {
    constructor(jogador) {
        super(jogador);
        this.dados = [1, 1];
    }

    jogar(aposta) {
        let iframe = document.getElementById('audioIframe');
        this.dados[0] = Math.floor(Math.random() * 6) + 1;
        this.dados[1] = Math.floor(Math.random() * 6) + 1;

        document.getElementById("img1").src = `imagens/dados/${this.dados[0]}.png`;
        document.getElementById("img2").src = `imagens/dados/${this.dados[1]}.png`;

        let resultado;
        let quantidade;


        if (this.dados[0] === this.dados[1]) {
            quantidade = this.dados[1] * 2 * aposta;
            iframe.src = iframe.src.replace('&autoplay=0', '&autoplay=1');
            iframe.src = iframe.src.replace('&mute=1', '&mute=0');
            resultado = `🦾 Parabéns ${this.jogador}! Você ganhou ${quantidade}!`;
        } else {

            quantidade = aposta;
            iframe.src = iframe.src.replace('&autoplay=0', '&autoplay=1');
            iframe.src = iframe.src.replace('&mute=1', '&mute=0');
            resultado = `☢️ Que pena, ${this.jogador}. Você perdeu ${quantidade}.`;
        }

        this.mostrarResultado(resultado);


        this.salvarResultado(quantidade, aposta);
    }

    mostrarResultado(mensagem) {
        const tv = document.getElementById("tv");
        tv.innerHTML = mensagem;
        tv.style.color = "black";
        tv.style.fontWeight = "bold";
        tv.style.textAlign = "center";
        tv.style.marginTop = "20px";
    }

    salvarResultado(quantidade, aposta) {
        const data = new URLSearchParams();
        data.append('nome_jogador', this.jogador);
        data.append('quantidade', quantidade);
        data.append('aposta', aposta);

        fetch('salvar_jogo2.php', {
            method: 'POST',
            body: data
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    console.log('Resultado salvo com sucesso');
                } else {
                    console.log('Erro ao salvar resultado');
                }
            })
            .catch(error => {
                console.error('Erro ao salvar:', error);
            });
    }
}


document.getElementById("btjogar").addEventListener("click", () => {
    const jogador = document.getElementById("txtjogador").value;

    if (!jogador) {
        alert("Por favor, preencha o nome do jogador.");
        return;
    }

    const aposta = 500;
    const jogo = new JogoDados(jogador);
    jogo.jogar(aposta);
});
