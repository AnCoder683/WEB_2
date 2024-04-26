function join(){
    $username = $['text_username_login'].val;
    $password = $['text_password_login'].val;

    $.ajax({
        url: '../Genaral/xuly_login_signup.php' ,
        type: 'POST',

        data: {
            username: $username,
            password: $password
        }, success: function(result){
            $('#login-button .login-button').html('Start');
        }
    });
}

$('#login-button .login-button').click(function(){
    $(this).html('loading ... ');
    Join();
});

