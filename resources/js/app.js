import './bootstrap';

$(document).ready(function(){
    //nyelvválasztó
    $('#language_select').on('change', function() {
        window.location.href = '/set_language/' + $('#language_select').val();
    });

    $(function () {
        bsCustomFileInput.init();
    });
});
