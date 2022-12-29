/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/ajax-form.js ***!
  \***********************************/
$(document).ready(function () {
  $('.form-ajax').submit(function (event) {
    event.preventDefault();
    var url = $(this).attr('action');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    document.querySelector('.loader-form').classList.add('active');
    $.ajax({
      type: $(this).attr('method'),
      url: url,
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function success(result) {
        if (result) {
          var items = document.querySelectorAll('input');
          var itemsTa = document.querySelectorAll('textarea');
          items.forEach(function (item) {
            item.value = '';
          });
          itemsTa.forEach(function (item) {
            item.value = '';
            item.innerHTML = '';
          });
          document.querySelector('.loader-form').classList.remove('active');
          Swal.fire({
            title: title,
            text: message,
            icon: 'success',
            confirmButtonText: button_text
          }).then(function () {
            $('body,html').animate({
              scrollTop: 0
            }, 400);
          });
        }
      }
    });
  });
});
/******/ })()
;