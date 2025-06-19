const palavras = ["FALLOUT", "BOS", "COMMONWEALTH", "VAULT", "CAP", "POWERARMOR", "BOMB", "RADIATION", "STIMPACK", "RADWAY", "VAULTEC", "MUTANTS", "PIPBOY", "SPECIAL"];

let palavraEscolhida = "";
let letrasCertas = [];
let letrasErradas = [];
let ultimaLetra = "";
const maxTentativas = 6;

const palavraEl = document.querySelector(".word");
const letrasEl = document.querySelector(".letters");
const letrasErradasEl = document.querySelector(".wrong-letters");
const mensagemEl = document.querySelector(".message");

function iniciarjogo() {
    palavraEscolhida = palavras[Math.floor(Math.random() * palavras.length)];
    letrasCertas = [];
    letrasErradas = [];
    ultimaLetra = "";
    mensagemEl.textContent = "";
    letrasErradasEl.textContent = "";

    palavraEl.textContent = palavraEscolhida
        .split("")
        .map((letra) => (letrasCertas.includes(letra) ? letra : "_"))
        .join(" ");

    letrasEl.innerHTML = "";
    "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split("").forEach((letra) => {
        const button = document.createElement("div");
        button.textContent = letra;
        button.classList.add("letter");
        button.addEventListener("click", () => tentativa(letra));
        letrasEl.appendChild(button);
    });
}

function tentativa(letra) {
    if (letrasCertas.includes(letra) || letrasErradas.includes(letra)) {
        return;
    }

    if (palavraEscolhida.includes(letra)) {
        letrasCertas.push(letra);
    } else {
        letrasErradas.push(letra);
    }

    ultimaLetra = letra;
    atualizarJogo();
}

function atualizarJogo() {
    palavraEl.textContent = palavraEscolhida
        .split("")
        .map((letra) => (letrasCertas.includes(letra) ? letra : "_"))
        .join(" ");

    letrasErradasEl.textContent = `Letras erradas: ${letrasErradas.join(", ")}`;

    if (!palavraEl.textContent.includes("_")) {
        mensagemEl.textContent = "Você venceu! ☢️";
        salvarResultado(true);
        letrasEl.innerHTML = "";
    } else if (letrasErradas.length >= maxTentativas) {
        mensagemEl.textContent = `Você perdeu! A palavra era "${palavraEscolhida}".`;
        salvarResultado(false);
        letrasEl.innerHTML = "";
    }
}

function salvarResultado(venceu) {
    fetch('salvar_jogo1.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            palavra: palavraEscolhida,
            ultimaLetra: ultimaLetra,
            venceu: venceu
        })
    }).then(response => response.json())
        .then(data => {
            console.log(data.message);
        })
        .catch(error => console.error('Erro:', error));
}

iniciarjogo();
