(function ( $ ) {
jQuery(document).ready(function () {

    $("#game-container iframe").css("height", "270px");

    // registration
    var regForm = $("form#register");
    regForm.on("click", "button", function (e) {
        console.log('reg clicked!');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/user/registration',
            data: {
                'register': true,
                'login': regForm.find("input[name=login]").val(),
                'password1': regForm.find("input[name=password1]").val(),
                'password2': regForm.find("input[name=password2]").val()
            },
            beforeSend: function(data){
                //console.log(data);
            },
            success: function(data){
                console.log('ajax success');
                $("#result").remove();
                regForm.append("<div id='result'></div>");
                if($.isArray(data.errors)) {
                    $.each( data.errors, function( key, value ) {
                        $("#result").append('<p>'+value+'</p>');
                    });
                }
                if(data.success) {
                    $("#result").append('<p>You have been registered!</p>');
                } else {
                    $("#result").append('<p>This username already exists!</p>');
                }
            },
            error: function (data) {
                console.log('ajax error');
                console.log(data);
            }
        });
    });

    //authorization
    var loginForm = $("form#login");
    loginForm.on("click", "button", function (e) {
        console.log('login clicked!');

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/user/login',
            data: {
                'log_in': true,
                'login': loginForm.find("input[name=login]").val(),
                'password': loginForm.find("input[name=password]").val()
            },
            beforeSend: function(data){
                //console.log(data);
            },
            success: function(data){
                console.log('ajax success');
                console.log(data);
                $("#result").remove();
                loginForm.append("<div id='result'></div>");
                if($.isArray(data.errors)) {
                    $.each( data.errors, function( key, value ) {
                        $("#result").append('<p>'+value+'</p>');
                    });
                }
                if(data.success) {
                    $("#result").append('<p>You have been logged in!</p>');
                } else {
                    $("#result").append('<p>Wrong password or username!</p>');
                }
            },
            error: function (data) {
                console.log('ajax error');
                console.log(data);
            }
        });
    });

    // logout
    $(".auth").on("click", "a.logout", function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/user/logout',
            data: {
                'logout': true
            },
            success: function(data){
                console.log('ajax success');
                console.log(data);
            },
            error: function (data) {
                console.log('ajax error');
                console.log(data);
            }
        });
    });
});
})(jQuery);
