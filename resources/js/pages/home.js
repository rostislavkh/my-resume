$(document).ready(() => {
    $('.last-projects__slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        centerMode: true,
        dots: true,
        // autoplay: true,
        variableWidth: true,
        autoplaySpeed: 3000,
        centerPadding: '0',
        pauseOnDotsHover: true,
        // adaptiveHeight: true,
    });
});

$('.frame').hover(function (e) {
    const frame = $(this)
    const card = this.children[0];

    function mouseMove(e) {
        let { x, y, width, height } = card.getBoundingClientRect()

        const left = e.clientX - x
        const top = e.clientY - y
        const centerX = left - width / 2
        const centerY = top - height / 2
        const d = Math.sqrt(centerX ** 2 + centerY ** 2)

        this.style.boxShadow = `
    ${-centerX / 5}px ${-centerY / 10}px 10px rgba(0, 0, 0, 0.2)
  `

        this.style.transform = `
    rotate3d(${-centerY / 100}, ${centerX / 100}, 0, ${d / 7}deg)
  `
    }

    frame.mousemove(mouseMove)

    frame.mouseleave((e) => {
        frame.off('mousemove', mouseMove)
        this.style.boxShadow = ''
        this.style.transform = ''
    })
})

$('.next-slide').click(() => {
    $('.slick-next').click();
})
$('.prev-slide').click(() => {
    $('.slick-prev').click();
})