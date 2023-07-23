// script.js
$(document).ready(function() {
    const texts = [
        "Texto 1. Digite seu texto aqui.",
        "Texto 2. Outro texto a ser digitado.",
        "Texto 3. Mais um texto para digitar."
    ]; // Textos a serem digitados em sequência
    const typingDelay = 100; // Atraso em milissegundos entre cada caractere
    const erasingDelay = 50; // Atraso em milissegundos entre cada apagamento de caractere
    const switchDelay = 3000; // Atraso em milissegundos para trocar para o próximo texto
    let textIndex = 0; // Índice do texto atual
    let charIndex = 0; // Índice do caractere atual
    let isErasing = false; // Indica se está apagando o texto

    const placeholder = $("#text-placeholder");

    function typeText() {
        const currentText = texts[textIndex];

        if (isErasing) {
            // Apagando o texto
            if (charIndex >= 0) {
                placeholder.text(currentText.slice(0, charIndex));
                charIndex--;
                setTimeout(typeText, erasingDelay);
            } else {
                // Quando terminar de apagar, aguarda e começa a digitar novamente
                isErasing = false;
                setTimeout(typeText, switchDelay);
            }
        } else {
            // Digitando o texto
            if (charIndex < currentText.length) {
                placeholder.text(currentText.slice(0, charIndex + 1));
                charIndex++;
                setTimeout(typeText, typingDelay);
            } else {
                // Quando terminar de digitar, inicia o apagamento
                isErasing = true;
                setTimeout(typeText, typingDelay);
            }
        }
    }

    typeText();
});
