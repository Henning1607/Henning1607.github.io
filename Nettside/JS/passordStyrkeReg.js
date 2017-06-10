$(document).ready(function(){
    $('#password').keyup(function(){
            $('#result').html(checkStrength($('#password').val()));
    })	

    function checkStrength(password){
        var strength = 0;

        if (password.length < 9) { 
                $('.status').css('width','10%');
                $('.status').css('background-color','#f00');
                $('.feilmld').css('color','#f00');
                $('#feilpassord').html('For svakt');

        } else {

            if (password.length > 9) strength += 1;
            
            if (password.length > 12) strength += 1;

            if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1;

            if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1; 

            if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1;

            if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;

            if (strength === 1 || strength === 0){
                    $('.status').css('width','30%');
                    $('.status').css('background-color','#FFB300');
                    $('.feilmld').css('color','#f00');
                    $('#feilpassord').html('For svakt');
                    //$('#feilpassord').html(strength);
            }
            
            if (strength == 2 || strength == 3){
                    $('.status').css('width','50%');
                    $('.status').css('background-color','#FFB300');
                    $('.feilmld').css('color','#4CC160');
                    $('#feilpassord').html('Svakt');
                    //$('#feilpassord').html(strength);
            }
            else if (strength == 4 ){
                    $('.status').css('width','75%');
                    $('.status').css('background-color','#4CC160');
                    $('.feilmld').css('color','#4CC160');
                    $('#feilpassord').html('Sterk');
                    //$('#feilpassord').html(strength);
            }
            else if (strength >4){
                    $('.status').css('width','100%');
                    $('.status').css('background-color','#0f0');
                    $('.feilmld').css('color','#4CC160');
                    $('#feilpassord').html('Supersikkert!');
                    //$('#feilpassord').html(strength);
            }
        }
    }
});