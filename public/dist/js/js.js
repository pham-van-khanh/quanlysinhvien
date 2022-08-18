

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function update(id) {
    console.log(id);
    // var id = $(this).attr('data-id');
    $.get('faculties/' + id + '/edit', function(data) {
        $('#nameFaculty').val(data.faculty.name);
        $('#faculty_id').val(data.faculty.id);
    })
};

var id = $('#faculty_id').val()
$('#saveUpdateForm').on('click', function(id) {
    saveUpdate(id);
});
function saveUpdate() {
    var name = $('#nameFaculty').val();
    var id = $('#faculty_id').val();
    var url = '/admin/faculties/'
    $.ajax({
        url: "/admin/faculties/" + id,
        type: "PUT",
        data: {
            id: id,
            name: name,
        },
        dataType: 'json',
        success: function(data) {
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
