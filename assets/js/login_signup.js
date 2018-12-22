$(document).ready(function() {
    var inputEle = $('.validate-input');
    var inputEle1 = $('.validate-input1');

    $('a.login-window').click(function() {
        
                //Getting the variable's value from a link 
        var loginBox = $(this).attr('href');

        //Fade in the Popup
        $(loginBox).fadeIn(300);
        
        //Set the center alignment padding + border see css style
        var popMargTop = ($(loginBox).height() + 24) / 2; 
        var popMargLeft = ($(loginBox).width() + 24) / 2; 
        
        $(loginBox).css({ 
            'margin-top' : -popMargTop,
            'margin-left' : -popMargLeft
        });
        
        // Add the mask to body
        $('body').append('<div id="mask"></div>');
        $('#mask').fadeIn(300);
        
        return false;
    });

    // When clicking on the button close or the mask layer the popup closed
    $('a.close, #mask').live('click', function() { 
        $('#mask , .login-popup').fadeOut(300 , function() {
            $('#mask').remove();  
        }); 
        return false;
    });

    $("#signin_btn").live("click", function(evt){
        var check = true;
         for (var i = 0; i < inputEle.length; i++) {
            if ($(inputEle[i]).val() == "") {
                $(inputEle[i]).css("border-color", "red");
                //console.log($(inputEle[i]).val());
                check = false;
            }
        }
        if(check == true){
            $.ajax({
                url: 'SignController/checkuser',
                type: 'post',
                data: {
                    'type': 'signin',
                    'username': $("#username").val(),
                    'password': $("#password").val()
                },
                success: function(res) {
                    var result = JSON.parse(res);
                    console.log(result);
                    if(result.length != 0){
                        location.reload();
                    }
                    //location.href = "/index.php/MainController/index";
                    //location.reload();
                }, 
                failure: function(err) {
                    console.log(err);
                }
            })
        }
        //alert($("#username").val(),$("#password").val());
        //console.log($("#username").val(),$("#password").val());
        
    });

    $("#signup_btn").live("click", function(evt){
        var check = true;
         for (var i = 0; i < inputEle1.length; i++) {
            if (validate(inputEle1[i]) == false) {
                $(inputEle1[i]).css("border-color", "red");
                //console.log($(inputEle[i]).val());
                check = false;
            }
        }

        if(check == true){
            $.ajax({
                url: 'SignController/register',
                type: 'post',
                data: {
                    'type': 'signup',
                    'username': $("#up-username").val(),
                    'password': $("#up-password").val(),
                    'email': $("#up-email").val()
                },
                success: function(res) {
                    console.log(res);
                    if(res == 1){
                        location.reload();
                    }
                }, 
                failure: function(err) {
                    console.log(err);
                }
            });
        }
        
    });

    $("#logout_btn").live('click', function(evt) {
        console.log('dddd');
        $.ajax({
            url: 'MainController/reload',
            type: 'post',
            data: {
                'type': 'logout',
            },
            success: function(res) {
                console.log(res);
                location.reload();
            }
        });
    });

    $('.signin input').each(function () {
        $(this).focus(function () {
            $(this).removeAttr("style");
        });
    });
    $('.signup input').each(function () {
        $(this).focus(function () {;
            $(this).removeAttr("style");
        });
    });

    function validate(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else if ($(input).attr('name') == 'cellphone') {
            if ($(input).val().trim().match(/^\d{8,10}$/) == null) {
                return false;
            }
        }
        else if ($(input).attr('name') == 'password') {
            if ($(input).val().trim().match(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/) == null) {
                return false;
            }
        }
        else if ($(input).attr('name') == 'confirm') {
            if ($(input).val() != $(inputEle[inputEle.length - 2]).val() | $(input).val()=="") {
                return false;
            }
        }
        else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
        return true;
    }




    //routing Controll
    $('.footer-table').click(function(){
        console.log("click");
    });


});