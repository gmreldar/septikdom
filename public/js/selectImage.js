function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var type = input.files[0].type.split('/');
        if (type[1] === 'svg+xml') {
            alert('Недопустимое расширение файла.');
            $(input).prop('value', '');
            $(input).closest('.image-upload').find('.mailbox-attachments li').removeClass('loaded')
        } else {
            reader.onload = function (e) {
                $(input).closest('.image-upload').find('.mailbox-attachments li').addClass('loaded');
                $(input).closest('.image-upload').find('.image-load').attr('src', e.target.result);
                $(input).closest('.image-upload').find('.file-name').text(input.files[0].name);
            };
            var valid = $(input).data('valid');
            if (valid) {
                $('#uploadImageBtn').prop('disabled', false)
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
}
