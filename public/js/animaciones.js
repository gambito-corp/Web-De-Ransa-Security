'use strict';
// Inicializa scroll

function apareceScroll() {
    var html = document.getElementsByTagName('html')[0];
    var elementoAparece = document.getElementsByClassName('aparece');
    console.log("Hola mundo");
    $(document).on("scroll", function() {
        console.log("Hola");

        var desplazamientoActual = $(document).scrollTop();
        console.log("Estoy en ", desplazamientoActual);

        for (var i = 0; i < elementoAparece.length; i++) {
            var topelemAparece = elementoAparece[i].offsetTop;
            if (desplazamientoActual > topelemAparece) {
                console.log('helloohelloohe');
                elementoAparece[i].classList.add('hola');
            }
        }
    });
}
apareceScroll();