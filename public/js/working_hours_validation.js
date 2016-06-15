/**
 * Created by mostafa on 04/06/16.
 */
$(document).ready(function () {
    $(":input[name='toTime']").on("blur", function () {
        var hours1 = $(":input[name='fromTime']").val().split(":")["0"];
        var hours2 = $(":input[name='toTime']").val().split(":")["0"];
        var minute1 = $(":input[name='fromTime']").val().split(":")["1"];
        var minute2 = $(":input[name='toTime']").val().split(":")["1"];
        if (hours2 - hours1 >= 0) {
            if (minute2 - minute1 >= 15 || hours2 - hours1 > 0 ) {
                $(":input[name='toTime']").next().text("enter correct time").hide();
            } else {
                $(":input[name='toTime']").next().text("enter correct time").show();
            }
        } else {
            $(":input[name='toTime']").next().text("enter correct time").show();
        }
    });
});