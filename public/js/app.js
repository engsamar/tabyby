$(document).ready(function () {

    // console.log("hiii in ready");
    $("select[name='clinic_id_field']").change(function () {
        console.log('iam in');
        $id = this.value;
        console.log('hi', $id);
        $.get("/working_hours/date/" + this.value).done(function (data, status) {
            console.log(data);
            if (data.length > 0) {
                var idd = data[0]['id'];
                console.log(idd);
                $('#formN').attr('action', '/working_hours/' + idd);
                $('#fromTime').val(data[0]['fromTime']);
                $('#toTime').val(data[0]['toTime']);
                $('#clinic_id').val(data[0]['clinic_id']);
                $('#day').val(data[0]['day']);
            }
            else {
                $('#fromTime').val(null);
                $('#toTime').val(null);
                $('#clinic_id').val(null);
                $('#day').val(null);
            }
        });
    });
    $("select[name='clinic_id']").change(function () {
        console.log('iam in');
        $id = this.value;
        console.log('hi', $id);
        $.get("/working_hours/date/" + this.value).done(function (data, status) {
            console.log(data);
            if (data.length > 0) {
                var idd = data[0]['id'];
                $('#fromTime').text(data[0]['fromTime']);
                $('#toTime').text(data[0]['toTime']);
                $('#day').text(data[0]['day']);
            }
            else {
                $('#fromTime').text("00:00");
                $('#toTime').text("00:00");
                $('#day').text("");
            }
        });
    });
    
});