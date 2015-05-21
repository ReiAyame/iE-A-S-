$(document).ready(function(){
    $('#logout').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = '../includes/logout.php',
        data =  {'logout': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
        });
    });

});