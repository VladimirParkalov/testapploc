function send_form() {
    var id=$("#id_course").val();

    $.ajax({
        type: 'ajax',
        url: '/api/courses/'+id,
        data: {id: id},
        beforeSend: function () {
            $('#students_list').html('Loading...');
        },
        success: function (result) {
            $('#students_list').html(result);
        },
        error: function (response, error) {
            alert('Search :Error' + error);
        }
    });
}

