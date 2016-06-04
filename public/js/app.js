console.log('hello');
function selectVal(e) {
    console.log(e);
    var id = e;
    $.get('/ajax?id=' + id, function (data) {
        console.log(data);
        console.log('hello ajax');
    });
}

// });