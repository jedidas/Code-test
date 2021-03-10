$(function () {
    var render = new AppRender();
    var form = $('.js-form');
    form.submit(function (event) {
        event.preventDefault();
    });
    form.validate({
        rules: {
            email: {
                required: true,
                email: true
            },
        },
        messages: {
            email: "Hi!, please enter a valid email address",
        },
        submitHandler: function (form) {
            var _form = $(form);
            var email = _form.find('[name="email"]').val();
            $('.js-spinner').addClass('d-block');
            $('.js-body').addClass('d-none');

            var isChecked = $('#switch').prop('checked');
            var url = _form.attr('action') + '/' + email;
            if (isChecked) {
                url = 'https://jsonplaceholder.typicode.com/users';
            }

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    if (isChecked) {
                        var result = render.filter(email, response);
                        render.init(form, result);
                    } else {
                        render.init(form, response);
                    }
                },
                error: function (xhr, status) {
                    console.log('Error');
                },
                complete: function () {
                    $('.js-spinner').removeClass('d-block');
                }
            });
        }
    });


});