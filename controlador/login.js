validateConexion();
$('.log-in').on('click', validateAccess);
$('.sign-up').on('click', createUser);
$('.sign-up-ref').on('click', showSignup);
$('.log-in-ref').on('click', hideSignup);

function validateAccess(){
    let data = {
        username: $('.txtUsername').val(),
        password: $('.txtPassword').val()
    };
    fetch('modelo/login.php?op=validateAccess', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: JSON.stringify(data)
        })
        .then(response => {
            return response.json();
        })
        .then(data => {
            if(data.result){
                window.location.href = "welcome.html";
            }else{
                $.toast({
                    heading: 'Mensaje del sistema',
                    text: data.detail,
                    icon: 'warning',
                    showHideTransition: 'fade',
                    bgColor: '#c13f3f',
                    loaderBg: '#FFFFFF',
                    allowToastClose: true,
                    position: 'top-right',
                    stack: false
                });
            }
        })
        .catch(function (error) {
            $.toast({
                heading: 'Mensaje del sistema',
                text: error,
                icon: 'warning',
                showHideTransition: 'fade',
                bgColor: '#c13f3f',
                loaderBg: '#FFFFFF',
                allowToastClose: true,
                position: 'top-right',
                stack: false
            });
        });
}

function createUser(){
    let data = {
        username: $('.txtNewUsername').val(),
        password: $('.txtNewPassword').val()
    };
    fetch('modelo/login.php?op=createUser', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: JSON.stringify(data)
        })
        .then(response => {
            return response.json();
        })
        .then(data => {
            let bg_alert = data.result ? '#24c59f' : '#c13f3f';
            data.result ? hideSignup() : showSignup();
            $.toast({
                heading: 'Mensaje del sistema',
                text: data.detail,
                icon: 'warning',
                showHideTransition: 'fade',
                bgColor: bg_alert,
                loaderBg: '#FFFFFF',
                allowToastClose: true,
                position: 'top-right',
                stack: false
            });
        })
        .catch(function (error) {
            $.toast({
                heading: 'Mensaje del sistema',
                text: error,
                icon: 'warning',
                showHideTransition: 'fade',
                bgColor: '#c13f3f',
                loaderBg: '#FFFFFF',
                allowToastClose: true,
                position: 'top-right',
                stack: false
            });
        });
}

function showSignup(){
    $('.form-log-in').hide();
    $('.form-sign-up').show();
    $('#form-log-in')[0].reset();
    $('#form-sign-up')[0].reset();
}

function hideSignup(){
    $('.form-log-in').show();
    $('.form-sign-up').hide();
    $('#form-log-in')[0].reset();
    $('#form-sign-up')[0].reset();
}

function validateConexion(){
    console.log('get');
    fetch('modelo/login.php?ind=1', {
        method: 'GET'
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
    
}
