'use strict';
// Inicializa scroll
//
//function apareceScroll() {
//    var html = document.getElementsByTagName('html')[0];
//    var elementoAparece = document.getElementsByClassName('animated');

//    $(document).on("scroll", function() {

//
//        var desplazamientoActual = $(document).scrollTop();

//
//        for (var i = 0; i < elementoAparece.length; i++) {
//            var topelemAparece = elementoAparece[i].offsetTop;
//            if (desplazamientoActual > topelemAparece) {

//                elementoAparece[i].classList.add('fadeIn');
//            }
//        }
//    });
//}
function apareceScrollfaders() {
    var ventana_alto = $(window).height();
    var html = document.getElementsByTagName('html')[0];
    var elementoApareceFade = document.getElementsByClassName('faders');
//    var ElementoApareceBounce = document.getElementsByClassName('bounce');

    $("body").on("scroll", function() {

        var desplazamientoActual = $("body").scrollTop();

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
    var ElementoApareceBounce = document.getElementsByClassName('bouncers');

    $("body").on("scroll", function() {

        var desplazamientoActual = $("body").scrollTop();

        for (var i = 0; i < ElementoApareceBounce.length; i++) {
            var topelemAparece = ElementoApareceBounce[i].offsetTop;
            if (desplazamientoActual > topelemAparece - ventana_alto) {

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
function apareceScrollfade() {
    var ventana_alto = $(window).height();
    var html = document.getElementsByTagName('html')[0];
    var elementoApareceFade = document.getElementsByClassName('faders2');
//    var ElementoApareceBounce = document.getElementsByClassName('bounce');

    $("body").on("scroll", function() {

        var desplazamientoActual = $("body").scrollTop();

        for (var i = 0; i < elementoApareceFade.length; i++) {
            var topelemAparece = elementoApareceFade[i].offsetTop;
            if (desplazamientoActual > topelemAparece - ventana_alto - 500) {
                elementoApareceFade[i].classList.remove('bounceOut');
                elementoApareceFade[i].classList.add('fadeIn');
                if (desplazamientoActual > topelemAparece + 100) {
                    elementoApareceFade[i].classList.remove('fadeIn');
                    elementoApareceFade[i].classList.add('bounceOut');
                }
            } else {
                elementoApareceFade[i].classList.remove('fadeIn');
                elementoApareceFade[i].classList.add('bounceOut');
            }
        }
    });
}
function apareceScrollfadersServicio() {
    var ventana_alto = $(window).height();
    var html = document.getElementsByTagName('html')[0];
    var elementoApareceFade = document.getElementsByClassName('fadersServicio');
//    var ElementoApareceBounce = document.getElementsByClassName('bounce');

    $("body").on("scroll", function() {

        var desplazamientoActual = $("body").scrollTop();

        for (var i = 0; i < elementoApareceFade.length; i++) {
            var topelemAparece = elementoApareceFade[i].offsetTop;
            if (desplazamientoActual > topelemAparece - ventana_alto - 500) {
                elementoApareceFade[i].classList.remove('lightSpeedOut');
                elementoApareceFade[i].classList.add('lightSpeedIn');
                if (desplazamientoActual > topelemAparece - 50) {
                    elementoApareceFade[i].classList.remove('lightSpeedIn');
                    elementoApareceFade[i].classList.add('lightSpeedOut');
                }
            } else {
                elementoApareceFade[i].classList.remove('lightSpeedIn');
                elementoApareceFade[i].classList.add('lightSpeedOut');
            }
        }
    });
}
function apareceScrollBounce2() {
    var ventana_alto = $(window).height();
    var html = document.getElementsByTagName('html')[0];
    var ElementoApareceBounce = document.getElementsByClassName('bouncers2');

    $("body").on("scroll", function() {

        var desplazamientoActual = $("body").scrollTop();

        for (var i = 0; i < ElementoApareceBounce.length; i++) {
            var topelemAparece = ElementoApareceBounce[i].offsetTop;
            if (desplazamientoActual > topelemAparece - ventana_alto) {

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
function apareceScrollOpinion() {
    var ventana_alto = $(window).height();
    var html = document.getElementsByTagName('html')[0];
    var elementoApareceFade = document.getElementsByClassName('opinionFade');
//    var ElementoApareceBounce = document.getElementsByClassName('bounce');

    $("body").on("scroll", function() {

        var desplazamientoActual = $("body").scrollTop();

        for (var i = 0; i < elementoApareceFade.length; i++) {
            var topelemAparece = elementoApareceFade[i].offsetTop;
            if (desplazamientoActual > topelemAparece - ventana_alto - 500) {
                elementoApareceFade[i].classList.remove('zoomOut');
                elementoApareceFade[i].classList.add('fadeIn');
                elementoApareceFade[i].classList.add('slower');
                if (desplazamientoActual > topelemAparece + 100) {
                    elementoApareceFade[i].classList.remove('fadeIn');
                    elementoApareceFade[i].classList.add('zoomOut');
                    elementoApareceFade[i].classList.add('slower');
                }
            } else {
                elementoApareceFade[i].classList.remove('fadeIn');
                elementoApareceFade[i].classList.add('zoomOut');
                elementoApareceFade[i].classList.add('slower');
            }
        }
    });
}
apareceScrollfaders();
apareceScrollBounce();
apareceScrollfade();
apareceScrollfadersServicio();
apareceScrollBounce2();
apareceScrollOpinion();