/**
 * Created by mostafa on 07/06/16.
 */
$(document).ready(function () {
    $("input[name='name']").on("blur", function () {
        if (this.value.trim() == "") {
            $("input[name='name']").next().text("enter valid name").show();
        } else {
            $("input[name='name']").next().text("enter valid name").hide();
        }
    });
    $("input[name='telephone']").on("blur", function () {
        if (this.value.trim() == "" || this.value.trim() < 10 || this.value.trim().substr(0, 3) == 050) {
            $("input[name='telephone']").next().text("enter valid telephone").show();
        } else {
            $("input[name='telephone']").next().text("enter valid telephone").hide();
        }
    });
    $("input[name='address']").on("blur", function () {
        if (this.value.trim() == "") {
            $("input[name='address']").next().text("enter valid address").show();
        } else {
            $("input[name='address']").next().text("enter valid address").hide();
        }
    });
});