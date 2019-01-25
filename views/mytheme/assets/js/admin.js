(function ( $ ) {
jQuery(document).ready(function () {

    // options
    var optionsForm = $("form#options");
    optionsForm.on("click", "button", function (e) {
        console.log('options clicked!');

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/ajax/options',
            data: {
                'options': true,
                'login': loginForm.find("input[name=login]").val(),
                'password': loginForm.find("input[name=password]").val()
            },
            beforeSend: function(data){
                //console.log(data);
            },
            success: function(data){
                console.log('ajax success');
            },
            error: function (data) {
                console.log('ajax error');
            }
        });

    });

});
})(jQuery);