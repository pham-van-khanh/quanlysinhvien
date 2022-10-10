$(document).ready(function () {
    $('#saveCreateForm').on('click', function (event) {
        event.preventDefault();
        var name = $('#name_student').val();
        var email = $('#email_student').val();
        var phone = $('#phone_student').val();
        var birthday = $('#birthday_student').val();
        var address = $('#address_student').val();
        var gender = $('input[name="gender"]:checked').val();
        $.ajax({
            url: "/students",
            type: "POST",
            cache: false,
            data: {
                name: name,
                email: email,
                phone: phone,
                birthday: birthday,
                address: address,
                gender: gender
            },
            dataType: 'json',
            success: function (data) {
                window.location.reload();
                // $('#create-bookmark').removeAttr('style');
                // $('#edit-bookmark').css('padding-right', ' ');
                // $('.modal-backdrop').removeClass('show');
                // $('body').removeAttr("style");
                // $('body').removeClass('modal-open');
                // $('#student-table tbody').prepend('<tr id="' + data.student.id + '">' +
                //     '<td>' + data.student.id + '</td>' +
                //     '<td>' + data.student.name + '</td>' +
                //     '<td><img width="100px" src="http://127.0.0.1:8000/public/images/users/" ' + data.student.avatar + '"></td>' +
                //     '<td>Have not registered enough faculty</td>' +
                //     '<td><a data-id="' + data.student.id + '" data-toggle="modal" class="btnModal gradient-button gradient-button-3" data-target="#exampleModal"><i class="fa fa-arrow-up text-white"></i></a></td>' +
                //     '<td>Have not registered enough subjects</td>' +
                //     '<td><a style="color: #febc06" href="" onclick="update({}})" data-bs-toggle="modal" data-bs-target="#edit-bookmark" id="editStudent" data-id="' + data.student.id + ' "><i class="fa fa-edit"></i></a></td>' +
                //     '<button class="btn btn-danger btn-xs btnDelete" data-id="' + data.student.id + '" id="deleteStudent"><i class="fa-solid fa-trash"></i></button></td></tr>');
                // $('#create-form')[0].reset();
            },
            error: function (errors) {
                console.log(errors.responseJSON.message);
                    if (errors.responseJSON.errors.name) {
                        $('.validate-name').text(errors.responseJSON.errors.name);
                        $('#name_student').addClass('is-invalid');
                    } else {
                        $('.validate-name').text('');
                        $('#name_student').removeClass('is-invalid');
                    }
                    if (errors.responseJSON.errors.email) {
                        $('.validate-email').text(errors.responseJSON.errors.email);
                        $('#email_student').addClass('is-invalid');
                    } else {
                        $('.validate-email').text('');
                        $('#email_student').removeClass('is-invalid');
                    }
                    if (errors.responseJSON.errors.phone) {
                        $('.validate-phone').text(errors.responseJSON.errors.phone);
                        $('#phone_student').addClass('is-invalid');
                    } else {
                        $('.validate-phone').text('');
                        $('#phone_student').removeClass('is-invalid');
                    }
                    if (errors.responseJSON.errors.birthday) {
                        $('.validate-birthday').text(errors.responseJSON.errors.birthday);
                        $('#birthday_student').addClass('is-invalid');
                    } else {
                        $('.validate-birthday').text('');
                        $('#birthday_student').removeClass('is-invalid');
                    }
                    if (errors.responseJSON.errors.address) {
                        $('.validate-address').text(errors.responseJSON.errors.address);
                        $('#address_student').addClass('is-invalid');
                    } else {
                        $('.validate-address').text('');
                        $('#address_student').removeClass('is-invalid');
                    }
                    if (errors.responseJSON.errors.gender) {
                        $('.validate-gender').text(errors.responseJSON.errors.gender);
                        $('#gender_student').addClass('is-invalid');
                    } else {
                        $('.validate-gender').text('');
                        $('#gender_student').removeClass('is-invalid');
                    }
            }
        })
    });

});
