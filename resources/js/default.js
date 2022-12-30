$('.mobile-header__burger').click(() => {
    $('.mobile-header__burger').toggleClass('active');
    $('.mobile-header__list').toggleClass('open');
});

$('.next-slide').click(() => {
    $('.slick-next').click();
})
$('.prev-slide').click(() => {
    $('.slick-prev').click();
})

$(document).ready(() => {
    $('body,html').animate({ scrollTop: 0 }, 400);
});