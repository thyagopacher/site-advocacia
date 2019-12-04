$(function() {
    $('#slideshow').cycle({
        fx: 'turnDown',
        delay: -4000,
        speed: 1000,
        timeout: 9000,
        pager: '#nav',
        pagerEvent: 'click',
        pauseOnPagerHover: true
    });
});

function trocaTexto(codtexto) {
    document.getElementById("saiba").value = document.getElementById("descricaoSlide" + codtexto).value;
}