jQuery( document ).ready(function($) {
    $('html').removeClass('no-js');

    $('.menu-btn').on('click', function () {
        $(this).toggleClass('open');
        $('.header__menu').slideToggle('normal');
    });

    window.sr = ScrollReveal({ reset: false });

    sr.reveal('.reval', {
        duration: 600,
        opacity: 0,
        delay: 150,
        scale: 1
    });
});