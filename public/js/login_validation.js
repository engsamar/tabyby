/**
 * Created by mostafa on 08/06/16.
 */

$(document).ready(function () {
    $("input[name='email']").on("blur", function () {

        if (this.value.trim() != "") {
            $(":input[name='email']").next().text("email used").hide();
            
        } else {
            $(":input[name='email']").next().text("email empty").show();
            $(":input[name='email']").focus();
        }
    });
    $("input[name='password']").on("blur", function () {

        if (this.value.trim() != "") {
            $(":input[name='password']").next().text("password used").hide();

        } else {
            $(":input[name='password']").next().text("password empty").show();
            // $(":input[name='password']").focus();
        }
    });
});