function showSuccessCard() {
    const msgCard = document.getElementById('msg-card');
    msgCard.style.display = 'flex';
}

document.getElementById('finalizar-btn').addEventListener('click', function(event) {
    event.preventDefault();

    showSuccessCard();

    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'finalizar_compra.php';
    form.innerHTML = '<input type="hidden" name="finalizar_compra" value="true" />';
    document.body.appendChild(form);
    setTimeout(() => {
        form.submit();
    }, 5000);

});
