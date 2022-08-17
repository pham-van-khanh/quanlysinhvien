// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });

    $('#image').change(
    function () {

        const form  = new formData();
        form.append('image',$(this)[0].flies[0]);
        $.ajax({
            procesData:false,
            contentType:false,
            type:'POST',
            dataType:'JSON',
            data:form,
            url:'/admin/upload/services',

            success:function (results) {
                console.log(results)
            }
        })
    }
)
