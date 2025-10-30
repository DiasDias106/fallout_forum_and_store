document.getElementById("pesquisa").addEventListener("keyup", function() {
    const termo = this.value;
    const ssDiv = document.getElementById("ss");


    if (termo.length > 0) {
        fetch('pesquisar.php?termo=' + termo)
            .then(response => response.json())
            .then(data => {
                ssDiv.innerHTML = "";
                ssDiv.classList.add('show');


                if (data.length === 0) {
                    const noResult = document.createElement("div");
                    noResult.textContent = "Nenhuma sugestão encontrada";
                    noResult.className = "sug";
                    ssDiv.appendChild(noResult);
                }


                data.forEach(item => {
                    const div = document.createElement("div");
                    div.className = "sug";
                    div.textContent = item.titulo;
                    div.addEventListener("click", function() {
                        window.location.href = item.url;
                    });
                    ssDiv.appendChild(div);
                });
            })
            .catch(error => console.error("Erro ao buscar sugestões:", error));
    } else {
        ssDiv.classList.remove('show');
        ssDiv.innerHTML = "";
    }
});
