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
            $.ajax({
                url: _form.attr('action') + '/' + email,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    render.init(form, response);
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