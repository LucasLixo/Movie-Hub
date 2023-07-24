$(document).ready(function () {
    // Array com os textos que serão digitados
    var texts = [
        "Texto 1",
        "Texto 2",
        "Texto 3",
        "Texto 4"
    ];

    var currentTextIndex = 0;
    var typingDelay = 100; // Velocidade da digitação (em milissegundos)
    var erasingDelay = 50; // Velocidade da exclusão (em milissegundos)
    var pauseDelay = 3000; // Tempo de pausa após a digitação completa (em milissegundos)

    var typingContainer = $('#text-placeholder');

    function typeText(text, index, callback) {
        if (index < text.length) {
            typingContainer.append(text.charAt(index));
            setTimeout(function () {
                typeText(text, index + 1, callback);
            }, typingDelay);
        } else {
            setTimeout(callback, pauseDelay);
        }
    }

    function eraseText(callback) {
        var text = typingContainer.text();
        if (text.length > 0) {
            typingContainer.text(text.slice(0, -1));
            setTimeout(function () {
                eraseText(callback);
            }, erasingDelay);
        } else {
            setTimeout(callback, typingDelay);
        }
    }

    function cycleText() {
        var text = texts[currentTextIndex];
        typeText(text, 0, function () {
            eraseText(function () {
                currentTextIndex = (currentTextIndex + 1) % texts.length;
                cycleText();
            });
        });
    }

    cycleText();
    // ============================================================
    $('#search::before').on('click', function () {
        $('#myForm').submit();
    });

    // ============================================================
    $('#Home .content iframe').on('load', function () {
        $(this).contents().find('a').click(function (event) {
            event.preventDefault(); // Impede o comportamento padrão do link

            var LinkHref = $(this).attr('href'); // Obtém o atributo href do link clicado
            $('#Home .content iframe').attr('src', LinkHref); // Define a nova URL do iframe
        });
    });
});