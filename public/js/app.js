$('#clinic_id').on('change',function (e) {
    var id =e.target.value;
    console.log('hi');
    $.get('/ajax?id'+id,function () {
        console.log(data);
    });
});