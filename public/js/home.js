/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/pages/home.js ***!
  \************************************/
$(document).ready(function () {
  $('.last-projects__slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    dots: true,
    autoplay: true,
    variableWidth: true,
    autoplaySpeed: 4000,
    centerPadding: '0',
    pauseOnDotsHover: true
    // adaptiveHeight: true,
  });
});

$('.frame').hover(function (e) {
  var _this = this;
  var frame = $(this);
  var card = this.children[0];
  function mouseMove(e) {
    var _card$getBoundingClie = card.getBoundingClientRect(),
      x = _card$getBoundingClie.x,
      y = _card$getBoundingClie.y,
      width = _card$getBoundingClie.width,
      height = _card$getBoundingClie.height;
    var left = e.clientX - x;
    var top = e.clientY - y;
    var centerX = left - width / 2;
    var centerY = top - height / 2;
    var d = Math.sqrt(Math.pow(centerX, 2) + Math.pow(centerY, 2));
    this.style.boxShadow = "\n    ".concat(-centerX / 5, "px ").concat(-centerY / 10, "px 10px rgba(0, 0, 0, 0.2)\n  ");
    this.style.transform = "\n    rotate3d(".concat(-centerY / 100, ", ").concat(centerX / 100, ", 0, ").concat(d / 7, "deg)\n  ");
  }
  frame.mousemove(mouseMove);
  frame.mouseleave(function (e) {
    frame.off('mousemove', mouseMove);
    _this.style.boxShadow = '';
    _this.style.transform = '';
  });
});
$('.next-slide').click(function () {
  $('.slick-next').click();
});
$('.prev-slide').click(function () {
  $('.slick-prev').click();
});
/******/ })()
;