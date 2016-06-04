/**
 * Created by mostafa on 03/06/16.
 */
$(document).ready(function () {
    console.log("hiii in ready");

    // $(":input[name='username']").on("blur", function () {
    //     console.log("hiiiiiiiii")
    // });
    $(":input[name='username']").on("blur", function () {
        //         console.log("blur");
        $.post("/user/check/?action=username").done(function (data, status) {
            // alert("Data: " + data + "\nStatus: " + status);
            console.log("Data: " + data + "\nStatus: " + status);
            console.log(data);

        });
    });
});