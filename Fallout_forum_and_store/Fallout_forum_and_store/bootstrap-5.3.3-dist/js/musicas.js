

window.addEventListener('load', () => {
    const iframe = document.getElementById('audioIframe');

    setTimeout(() => {
        iframe.src = iframe.src.replace('&mute=1', '&mute=0');
    }, 300);
});

