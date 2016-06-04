$(document).ready(function () {

    console.log("hiii in ready");
    $("select[name='clinic_id']").change(function () {
        console.log('iam in');
        $id = this.value;
        console.log('hi', $id);
        $.get("/working_hours/date/" + this.value).done(function (data, status) {
            console.log(data);
            if (data.length > 0) {
                var idd = data[0]['id'];
                console.log(idd);
                $('#formN').attr('action', '/working_hours/' + idd);
                $('#from-field').val(data[0]['fromTime']);
                $('#to-field').val(data[0]['toTime']);
                $('#clinic_id_field').val(data[0]['clinic_id']);
                $('#day-field').val(data[0]['day']);
            }
            else {
                $('#from-field').val(null);
                $('#to-field').val(null);
                $('#clinic_id_field').val(null);
                $('#day-field').val(null);
            }
        });
    });
    
});