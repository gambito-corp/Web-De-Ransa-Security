'use strict';
// Inicializa scroll
//
//function apareceScroll() {
//    var html = document.getElementsByTagName('html')[0];
//    var elementoAparece = document.getElementsByClassName('animated');
//    console.log("Hola mundo");
//    $(document).on("scroll", function() {
//        console.log("Hola");
//
//        var desplazamientoActual = $(document).scrollTop();
//        console.log("Estoy en ", desplazamientoActual);
//
//        for (var i = 0; i < elementoAparece.length; i++) {
//            var topelemAparece = elementoAparece[i].offsetTop;
//            if (desplazamientoActual > topelemAparece) {
//                console.log('helloohelloohe');
//                elementoAparece[i].classList.add('fadeIn');
//            }
//        }
//    });
//}
function apareceScrollfade() {
    var ventana_alto = $(window).height();
    var html = document.getElementsByTagName('html')[0];
    var elementoApareceFade = document.getElementsByClassName('fade');
    var ElementoApareceBounce = document.getElementsByClassName('bounce');
    console.log("Hola mundo");
    $("body").on("scroll", function() {
//        console.log("Hola");
        var desplazamientoActual = $("body").scrollTop();
//        console.log("Estoy en ", desplazamientoActual);
        for (var i = 0; i < elementoApareceFade.length; i++) {
            var topelemAparece = elementoApareceFade[i].offsetTop;
            if (desplazamientoActual > topelemAparece - ventana_alto - 500) {
                elementoApareceFade[i].classList.remove('lightSpeedOut');
                elementoApareceFade[i].classList.add('fadeInDownBig');
                if (desplazamientoActual > topelemAparece - 50) {
                    elementoApareceFade[i].classList.remove('fadeInDownBig');
                    elementoApareceFade[i].classList.add('lightSpeedOut');
                }
            } else {
                elementoApareceFade[i].classList.remove('fadeInDownBig');
                elementoApareceFade[i].classList.add('lightSpeedOut');
            }
        }
    });
}
function apareceScrollBounce() {
    var ventana_alto = $(window).height();
    var html = document.getElementsByTagName('html')[0];
    var ElementoApareceBounce = document.getElementsByClassName('bounce');
    console.log("Hola mundo");
    $("body").on("scroll", function() {
//        console.log("Hola");
        var desplazamientoActual = $("body").scrollTop();
//        console.log("Estoy en ", desplazamientoActual);
        for (var i = 0; i < ElementoApareceBounce.length; i++) {
            var topelemAparece = ElementoApareceBounce[i].offsetTop;
            if (desplazamientoActual > topelemAparece - ventana_alto) {
                console.log(ElementoApareceBounce);
                ElementoApareceBounce[i].classList.remove('flipOutX');
                ElementoApareceBounce[i].classList.add('flipInY');
                if (desplazamientoActual > topelemAparece) {
                    ElementoApareceBounce[i].classList.remove('flipInY');
                    ElementoApareceBounce[i].classList.add('flipOutX');
                }
            } else {
                ElementoApareceBounce[i].classList.remove('flipInY');
                ElementoApareceBounce[i].classList.add('flipOutX');
            }
        }
    });
}
apareceScrollfade();
apareceScrollBounce();