let dinheiro = document.getElementById("dinheiro");
let selectMoeda = document.getElementById("txtcambio");
let resultado = document.getElementById("convertido");


function adicionar (valor) {
    dinheiro.value += valor;
}

function converter() {
    let valor = parseFloat(dinheiro.value);
    if (isNaN(valor) || valor <= 0) {
        alert("Por favor, insira um valor válido.");
        return;
    }

    let moedaOrigem = selectMoeda.value;
    let taxaCambio;

    const taxas = {
        "EUR": 1,
        "PTE": 200.482,
        "USD": 1.09,
        "GBP": 0.86,
        "JPY": 150.24,
        "RUB": 90.12,
        "AON": 530.20,
        "CAP": 20
    };

    taxaCambio = taxas[moedaOrigem];
    let convertidoValor = valor * taxaCambio;

    resultado.value = convertidoValor.toFixed(2);
}
