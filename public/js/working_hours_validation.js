/**
 * Created by mostafa on 04/06/16.
 */
$(document).ready(function () {
    console.log("hiii in ready");


    $(":input[name='to']").on("blur", function () {
console.log($(":input[name='from']").val());
console.log($(":input[name='to']").val());
        
        //         console.log("blur");
        // $.post("/user/check/?action=username").done(function (data, status) {
        //     alert("Data: " + data + "\nStatus: " + status);
        //     console.log("Data: " + data + "\nStatus: " + status);
        //     console.log(data);
        // });
    });
});