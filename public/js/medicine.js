/**
 * Created by mostafa on 16/06/16.
 */
$("input[name='name']").on("blur",function () {
    if(this.value.trim()!=""){
        $.ajax({
            url:"/medicine/find/?name=" + this.value,
            type:"get",
            success:function (data) {
                if (data=="yes"){
                    $("input[name='name']").next().text("Enter Medicine Name").hide();
                }else{
                    $("input[name='name']").next().text("Enter Medicine Name").show();
                }
            }
        });
    }else {
        $("input[name='name']").next().text("Enter Medicine Name").show();
    }
});
