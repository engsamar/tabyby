/**
 * Created by mostafa on 03/06/16.
 */

$(document).ready(function () {
    $("input[name='birthdate']").datepicker({
        dateFormat: "yy/mm/dd",
        changeYear:true,
        changeMonth:true,
        minDate: "-3500w",
        maxDate: "-1d",
        yearRange:"c-80:c+0",
        weekHeader: "W",
        showWeek: true,

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
            minDate: "-3500w",
            maxDate: "-1d"
        });
    });

    $("input[name='birthdate']").keypress(function (event) {
        event.preventDefault();
        $("input[name='birthdate']").datepicker();
    });

    $("input[name='telephone']").on("keypress", function (event) {
        if (event.charCode >= 48 && event.charCode <= 57) {
            $("input[name='telephone']").next().hide();
        } else {
            event.preventDefault();
            $("input[name='telephone']").next().text("telephone numbers only").show();
        }
    });

    $("input[name='telephone']").on("blur", function (event) {
        if ($("input[name='telephone']").val().length <= 10) {
            if  ($("input[name='telephone']").val().substr(0, 1) == 0 && $("input[name='telephone']").val().substr(2, 1) == 0){
                $("input[name='telephone']").next().hide();
            } else {
                $("input[name='telephone']").next().text("telephone starts with 0*0").show();
            }
        }else {
            $("input[name='telephone']").next().text("incorrect telephone  10 numbers").show();
        }
    });

    $("input[name='mobile']").on("keypress", function (event) {
        if (event.charCode >= 48 && event.charCode <= 57) {
            $("input[name='mobile']").next().hide();
        } else {
            event.preventDefault();
            $("input[name='mobile']").next().text("mobile numbers only").show();
        }
    });

    $("input[name='mobile']").on("blur", function () {
        if ($("input[name='mobile']").val().length <= 11) {
            if  ($("input[name='mobile']").val().substr(0, 3) == 010 || $("input[name='mobile']").val().substr(0, 3) == 011 || $("input[name='mobile']").val().substr(0, 3) == 012){
                $("input[name='mobile']").next().hide();
            } else {
                $("input[name='mobile']").next().text("mobile starts with 010|011|012").show();
            }
        }else {
            $("input[name='mobile']").next().text("incorrect mobile 11 numbers").show();
        }
    });

    $("input[name='password']").on("blur", function () {
        if ($("input[name='password']").val().trim().length >= 6) {
            $("input[name='password']").next().hide();
        } else {
            $("input[name='password']").next().text("password short").show();
        }
    });

    $("input[name='password_confirmation']").on("blur", function () {
        if ($("input[name='password']").val().trim() == $("input[name='password_confirmation']").val().trim()) {
            $("input[name='password_confirmation']").next().hide();
        } else {
            $("input[name='password_confirmation']").next().text("password mismatch").show();
        }
    });
});