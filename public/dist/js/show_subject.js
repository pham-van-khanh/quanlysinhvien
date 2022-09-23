$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.btnModal').on('click', function (e) {
        e.preventDefault();
        $('tbody').addClass('name');
        var id = $(this).attr('data-id');
        var href = '/updateMark/' + id;
        $('#form_update').attr('action', href);

        var url = '/show-subject/' + id;
        var updateMark = "{{route('updateMark'}}";
        var token = $("input[name='_token']").val();
        console.log(id);
        $.get('/show-subject/' + id, function (data) {
            var tr = '';
            data.subjects.forEach(element => {
                tr += `
                        <tr style=" text-align: left; height: 2px" >
                            <td>${element.id}</td>
                            <td><a class="btn btn-info btn-sm" style="color: white; width: 200px" target="_blank" href="subjects/${element.id}">${element.name}</a></td>
                            <td>
                            <div class="row mb-4">
                                        <input type="hidden" name="_token" value="${token}" >
                                        <div class="col-11">
                                           <input type="text" name="mark[]" id="mark" style="border: none; background-color: " class="form-control small" value="${element.pivot.mark}">
                                        </div>
                            </div>
                            </td>
                        </tr>
                    `;
            });
            $('#table-subject').html(tr);
        });
    })
    $('.btnDelete').click(function (e) {
        e.preventDefault();
        var href = $(this).attr('href');
        $('#form-delete').attr('action', href);
        if (confirm('Are you sure?')) {
            $('#form-delete').submit();
        }
    });
});
