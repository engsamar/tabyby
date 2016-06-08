/**
 * Created by mostafa on 03/06/16.
 */
$(document).ready(function () {
    // console.log("hiii in ready");

    // $(":input[name='username']").on("blur", function () {
    //     console.log("hiiiiiiiii")
    // });
    $(":input[name='username']").on("blur", function () {
        // console.log("blur");
        //         console.log("blur");
        // $.post("/user/check/?action=username").done(function (data, status) {
        // alert("Data: " + data + "\nStatus: " + status);
        // console.log("Data: " + data + "\nStatus: " + status);
        // console.log(data);
        //
        // });
        console.log($(":input[name='username']").val());
        if ($(":input[name='username']").val().trim() != "") {
            console.log($(":input[name='username']").val().parseHTML());
            $.ajax({
                url: '/users/checkdata/?action=username',
                type: "post",
                data: {'username': $(":input[name='username']").val(), '_token': $('input[name=_token]').val()},

                success: function (data) {
                    // alert(data);
                    // console.log(data);
                    if (data == "no") {
                        $(":input[name='username']").next().text("username used").hide();
                        console.log(data);
                    } else {
                        console.log(data);
                        $(":input[name='username']").next().text("username used").show();
                        $(":input[name='username']").focus();
                    }

                }
            });
        }else {
            $(":input[name='username']").next().text("Enter Valid Username").show();
            // $(":input[name='username']").focus();
        }

    });
    $(":input[name='email']").on("blur", function () {
        // console.log("blur");
        if ($(":input[name='email']").val().trim() != "") {
            $.ajax({
                url: '/users/checkdata/?action=email',
                type: "post",
                data: {'email': $(":input[name='email']").val(), '_token': $('input[name=_token]').val()},

                success: function (data) {
                    // alert(data);
                    console.log(data);
                    if (data == "no") {
                        $(":input[name='email']").next().text("email used").hide();
                    } else {
                        $(":input[name='email']").next().text("email used").show();
                        $(":input[name='email']").focus();
                    }
                }
            });
        }else {
            $(":input[name='email']").next().text("Enter Valid E-mail").show();
            // $(":input[name='username']").focus();
        }
    });
});