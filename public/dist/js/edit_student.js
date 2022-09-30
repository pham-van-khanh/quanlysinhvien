$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function update(id) {
    $.get('students/' + id + '/edit', function (data) {
        console.log(data);
        $('#nameStudent').val(data.student.name);
        $('#phoneStudent').val(data.student.phone);
        $('#emailStudent').val(data.student.email);
        $('#addressStudent').val(data.student.address);
        $('#genderStudent').val(data.student.gender);
        $('#birthdayStudent').val(data.student.birthday);
        $('#student_id').val(data.student.id);
    })
};

var id = $('#student_id').val()
$('#saveUpdateForm').on('click', function (id) {

    saveUpdate(id);
});

function saveUpdate() {
    var name = $('#nameStudent').val();
    var phone = $('#phoneStudent').val();
    var email = $('#emailStudent').val();
    var address = $('#addressStudent').val();
    var gender = $('#genderStudent').val();
    var birthday = $('#birthdayStudent').val();
    var id = $('#student_id').val();
    $.ajax({
        url: 'students/' + id,
        type: "PUT",
        data: {
            id: id,
            name: name,
            phone: phone,
            email: email,
            address: address,
            birthday: birthday,
            gender: gender,
        },
        dataType: 'json',
        success: function (data) {
            $('.modal-backdrop').removeClass('modal-backdrop');
            $('#edit-bookmark').removeAttr('style');
            $('#id' + data.student.id).find("td:eq(1)").text(data.student.name);
        }
    })
}
