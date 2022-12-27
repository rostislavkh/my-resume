$(document).ready(() => {
    $('.slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        dots: false,
        // autoplay: true,
        variableWidth: false,
        autoplaySpeed: 4000,
        centerPadding: '0',
        pauseOnDotsHover: true,
        // adaptiveHeight: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider',
        dots: true,
        centerMode: true,
        focusOnSelect: true,
    });
});