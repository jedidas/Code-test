class AppRender {

    form;
    input;
    data;

    init(formNode, data) {
        this.data = data;
        this.form = $(formNode);
        this.input = this.form.find('[name="email"]');
        this.validateResponse();
    }

    showMessage(cssClass, message) {
        this.input.addClass(cssClass);
        this.form.find('.js-error').html(message);
    }

    validateResponse() {
        $('.js-body').addClass('d-none');
        switch (this.data['status']) {
            case 'no-valid':
                this.showMessage('error', this.data['error']);
                break;
            case 'not-found':
                this.showMessage('error', this.data['error']);
                break;
            case 'ok':
                this.showMessage('', this.data['error']);
                this.renderContent();
                break;
            default:
                this.showMessage('error', 'Unexpected error');
        }
    }

    renderContent() {
        var body = $('.js-body');
        var data = this.data['data'][0];
        body.find('.name').html(data.name);
        body.find('.nickname').html('@' + data.username);
        body.find('.email').html(data.email);
        body.find('.email').attr('href', 'mailto:' + data.email);
        body.find('.phone').html(data.phone);
        body.find('.website').html(data.website);
        body.find('.website').attr('href', '//' + data.website);
        body.find('.company-name').html(data.company.name);
        body.find('.catchPhrase').html(data.company.catchPhrase);
        body.find('.bs').html(data.company.bs);
        body.find('.street').html(data.address.street);
        body.find('.suite').html(data.address.suite);
        body.find('.city').html(data.address.city);
        body.find('.zipcode').html(data.address.zipcode);
        body.removeClass('animate__bounceInUp');
        body.removeClass('d-none');
        body.addClass('animate__bounceInUp');
    }

    filter(email, data) {
        var message = {
            "error": "Email does not exist",
            "status": "not-found",
            "data": []
        };
        data = data.filter(function (item) {
            return item.email.toLowerCase() === email.toLowerCase();
        });
        if (data.length > 0) {
            message.status = 'ok'
            message.data = data;
            message.error = '';
        }
        return message;
    }


}