/**
 * Created by mostafa on 03/06/16.
 */
$(document).ready(function () {

    $("input[name='birthdate']").datepicker({
        dateFormat: "yy/mm/dd",
        minDate:"-3500w",
        maxDate:"-1d"
    });
    $(":input[name='username']").on("blur", function () {
        if ($(":input[name='username']").val().trim() != "") {
            $.ajax({
                url: '/users/checkdata/?action=username',
                type: "post",
                data: {'username': $(":input[name='username']").val(), '_token': $('input[name=_token]').val()},

                success: function (data) {
                    if (data == "no") {
                        $(":input[name='username']").next().text("username used").hide();
                    } else {
                        $(":input[name='username']").next().text("username used").show();
                        $(":input[name='username']").focus();
                    }

                }
            });
        } else {
            $(":input[name='username']").next().text("Enter Valid Username").show();
        }

    });
    $(":input[name='email']").on("blur", function () {
        if ($(":input[name='email']").val().trim() != "") {
            $.ajax({
                url: '/users/checkdata/?action=email',
                type: "post",
                data: {'email': $(":input[name='email']").val(), '_token': $('input[name=_token]').val()},

                success: function (data) {
                    if (data == "no") {
                        $(":input[name='email']").next().text("email used").hide();
                    } else {
                        $(":input[name='email']").next().text("email used").show();
                        $(":input[name='email']").focus();
                    }
                }
            });
        } else {
            $(":input[name='email']").next().text("Enter Valid E-mail").show();
        }
    });
    $("input[name='birthdate']").on("change", function () {
            $("input[name='birthdate']").datepicker({
                dateFormat: "yy/mm/dd",
                startDate: "-100d",
                maxDate:"NOW.Date"
            });
    });

    $("input[name='birthdate']").keypress(function (event) {
        event.preventDefault();
        $("input[name='birthdate']").datepicker();
    });

    // $("input[name='telephone']").on("keyup",function () {
    //     if(this.value.substr(0,4)<2010){
    //         $("input[name='telephone']").next().hide();
    //     }else {
    //         $("input[name='telephone']").next().text("incorrect date").show();
    //     }
    // });
    // $("input[name='mobile']").on("blur",function () {
    //     if(this.value.substr(0,4)<2010){
    //         $("input[name='mobile']").next().hide();
    //     }else {
    //         $("input[name='mobile']").next().text("incorrect date").show();
    //     }
    // });
    $("input[name='password']").on("blur", function () {
        if ($("input[name='password']").val().trim().length >= 6) {
            $("input[name='password']").next().hide();
        } else {
            $("input[name='password']").next().text("password short").show();
        }
    })
    $("input[name='password_confirmation']").on("blur", function () {
        if ($("input[name='password']").val().trim() == $("input[name='password_confirmation']").val().trim()) {
            $("input[name='password_confirmation']").next().hide();
        } else {
            $("input[name='password_confirmation']").next().text("password mismatch").show();
        }
    });
});