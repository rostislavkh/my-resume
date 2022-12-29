$(document).ready(function (){
    $('.form-ajax').submit(function (event){

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
            success: function (result) {
                if (result) {
                    let items = document.querySelectorAll('input');
                    let itemsTa = document.querySelectorAll('textarea');
                    
                    items.forEach(item => {
                        item.value = '';
                    });

                    itemsTa.forEach(item => {
                        item.value = '';
                        item.innerHTML = '';
                    })

                    document.querySelector('.loader-form').classList.remove('active');

                    Swal.fire({
                        title: title,
                        text: message,
                        icon: 'success',
                        confirmButtonText: button_text
                    }).then(() => {
                        $('body,html').animate({ scrollTop: 0 }, 400);
                    })
                }
            }
        });
    });
});