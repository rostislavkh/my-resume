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
    $.ajax({
      type: $(this).attr('method'),
      url: url,
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function success(result) {}
    });
  });
});
/******/ })()
;