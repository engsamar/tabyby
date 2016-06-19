/**
 * Created by mostafa on 14/06/16.
 */
$(document).ready(function () {
    console.log('hi');
    $("input[name='name']").on("blur", function () {

        if (this.value.trim() != "") {
            $.ajax({
                url: "/secretaries/find/" + this.value,
                type: "get",
                data: {},
                success: function (data) {
                    if (data == "yes") {
                        $("input[name='name']").next().hide();
                    } else {
                        $("input[name='name']").next().text("Enter Another Name").show();
                    }
                }
            });
        }
    });
});