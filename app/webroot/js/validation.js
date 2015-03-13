$(document).ready(function() {
    $('.btn-invite').on('click', function() {
        $.post(
                '/cupcherry/groups/validate_inviteform',
                {field: $('#send_to').attr('id'), value: $('#send_to').val()},
                 handleInviteValidation
                );
    });

    function handleInviteValidation(error) {
        if (error.length > 0) {
            if ($('#address-notEmpty').length == 0) {
                $('#send_to').after('<div id="address-notEmpty" class="error-message">' + error + '</div>');
            }
            else {
                $('#address-notEmpty').remove();
            }
        }else{
          //  alert('no error found.');
        }
    }
});