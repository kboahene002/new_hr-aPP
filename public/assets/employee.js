//Personal information
$('.form').submit(function (e) {

    e.preventDefault();
    let form_data = new FormData(this);

    $.ajax({
        'url': "new",
        'type': "post",
        data: form_data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                'content')
        },
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response)
        },
        error: function (xhr, status, error) {
            console.log(status.status)
        }
    });

})
$('.dropify').dropify({
    messages: {
        'default': '',
        'replace': 'Drag and drop or click to replace',
        'remove': 'Remove',
        'error': 'Ooops, something wrong happended.'
    }
});

$('#division').change(function () {
    var selectedValue = $(this).val();
    $('#department').empty().append('<option value="">Please wait</option>');
    if (selectedValue != "") {
        $.ajax({
            url: 'department',
            type: 'POST',
            data: {
                'name': selectedValue
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                    'content')
            },
            success: function (data) {
                console.log(data);
                $('#department').empty().append('<option value="">Select ...</option>');
                $.each(data, function (index, item) {
                    $('#department').append('<option value="' + item.id + '">' + item.departmentName + '</option>');
                });
                $('#department').change(function () {
                    let department = $('#department').val();
                    console.log(department);
                    $('#job_title').empty().append('<option value="">Please wait</option>');
                    if (department != "") {
                        $.ajax({
                            url: "jobList",
                            type: 'POST',
                            data: {
                                'name': department
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            success: function (data) {
                                console.log(data);
                                $('#job_title').empty().append('<option value="">Select ...</option>');
                                $.each(data, function (index, item) {
                                    $('#job_title').append('<option value="' + item.id + '">' + item.job_title + '</option>');
                                });


                                $('#job_title').change(function () {
                                    let job_title = $('#job_title').val();
                                    console.log(job_title);
                                    if(job_title != ""){
                                        $.ajax({
                                            url: "filter",
                                            type: 'POST',
                                            data: {
                                                'name': job_title , 
                                            },
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                                    'content')
                                            },
                                            success:function(data){
                                                console.log(data);
                                            }
                                        });
                                    }else{
                                        console.log('empty');
                                    }

                                })
                            }

                        });
                    } else {
                        $('#job_title').empty().append('<option value="">...</option>');

                    }
                })
            },

            error: function (data) {

                console.error(data);
            }
        });
    } else {
        $('#department').empty().append('<option value="">...</option>');
        console.log('empty');
    }
});
