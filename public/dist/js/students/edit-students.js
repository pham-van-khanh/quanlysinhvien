

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function update(id) {
    console.log(id);
    $.get('students/' + id + '/edit', function (data) {
        // console.log(data);
        $('#nameStudent').val(data.student.name);
        $('#phoneStudent').val(data.student.phone);
        $('#emailStudent').val(data.student.email);
        $('#genderStudent').val(data.student.gender);
        $('#addressStudent').val(data.student.address);
        $('#student_id').val(data.student.id);
    })
};

var id = $('#student_id').val()
$('#saveUpdateForm').on('click', function(id) {
    saveUpdate(id);
});
function saveUpdate() {
    var name = $('#nameStudent').val();
    var phone = $('#phoneStudent').val();
    var email = $('#emailStudent').val();
    var address = $('#addressStudent').val();
    var gender = $('#genderStudent').val();
    var id = $('#student_id').val();
    var url = '/admin/students/'
    $.ajax({
        url: "/admin/students/" + id,
        type: "PUT",
        data: {
            id: id,
            name: name,
            phone: phone,
            email: email,
            address: address,
            gender: gender,
        },
        dataType: 'json',
        success: function (data) {
            $('#edit-bookmark').removeClass('show');
            $('#edit-bookmark').css('padding-right', ' ');
            $('body').removeAttr("style");
            $('body').removeClass('modal-open');
            // $('#id ' + data.id + ' td:nth-child(0)').html(data.name);
            $('#id'+data.id).find('td:eq(1)').text(data.name);
            $('body').removeAttr('data-bs-padding-right');
        }
    })
}
