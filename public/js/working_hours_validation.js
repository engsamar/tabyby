/**
 * Created by mostafa on 04/06/16.
 */
$(document).ready(function () {
    // console.log("hiii in ready");


    $(":input[name='to']").on("blur", function () {
        // console.log($(":input[name='from']").val());
        // console.log($(":input[name='to']").val());
        // console.log($(":input[name='from']").val().split(":"));
        // console.log($(":input[name='to']").val().split(":"));
        var hours1 = $(":input[name='from']").val().split(":")["0"];
        var hours2 = $(":input[name='to']").val().split(":")["0"];
        var minute1 = $(":input[name='from']").val().split(":")["1"];
        var minute2 = $(":input[name='to']").val().split(":")["1"];
        if (hours2 - hours1 >= 0) {
            if (minute2 - minute1 > 0) {
                $(":input[name='to']").next().text("enter correct time").hide();
            } else {
                $(":input[name='to']").next().text("enter correct time").show();
            }
            // console.log($(":input[name='to']").val());
            // $(":input[name='to']").next().text("enter correct time").hide();
            //     $("#error").text("enter correct time").show();
        } else {
            $(":input[name='to']").next().text("enter correct time").show();
        }
        // $("#error").show;
        //
        //         console.log("blur");
        // $.get("/abc").done(function (data, status) {

        // alert("Data: " + data + "\nStatus: " + status);
        // console.log("Data: " + data + "\nStatus: " + status);
        // console.log(data);
        // });
        // $.ajaxSetup({
        //     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        // });
        // $.ajax({
        //     url: '/working_hours/checkdata/',
        // type: "get",
        // data: {'from':$('input[name=from]').val(), 'to': $('input[name=to]').val()},
        //
        // success: function(data){
        //     alert(data);
        //         console.log(data);
        //
        // }
        // });
    });
    // $(":input[name='day']").on("blur", function () {
    //    
    //     var hours1 = $(":input[name='from']").val().split(":")["0"];
    //     var hours2 = $(":input[name='to']").val().split(":")["0"];
    //     var minute1 = $(":input[name='from']").val().split(":")["1"];
    //     var minute2 = $(":input[name='to']").val().split(":")["1"];
    //     if (hours2 - hours1 >= 0 ) {
    //         if (minute2 - minute1 > 0){
    //             $(":input[name='to']").next().text("enter correct time").hide();
    //         }else {
    //             $(":input[name='to']").next().text("enter correct time").show();
    //         }
    //         // console.log($(":input[name='to']").val());
    //         // $(":input[name='to']").next().text("enter correct time").hide();
    //         //     $("#error").text("enter correct time").show();
    //     } else {
    //         $(":input[name='to']").next().text("enter correct time").show();
    //     }
    //    
    // });
});