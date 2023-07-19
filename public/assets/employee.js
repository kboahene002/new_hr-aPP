//Personal information
$('.form').submit(function (e) {

    e.preventDefault();
    showLoader();
    let form_data = new FormData(this);
    $('.error').html('');
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
            hideLoader();
            console.log(response)
        },
        error: function (data) {
            hideLoader();
            
            $.each(data.responseJSON.data, function (index, value) {
                console.log(data);
                  $('.error').append("<li style='text-decoration:none;' class='text-danger'> " + value +
                      "</li>");
              });
            console.log(data)
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

                        $('#job_category').empty().append('<option value="">Select ...</option>');
                        console.log( data.job_category.job_category_name);
                        $('#job_category').val( data.job_category.job_category_name );
                        $('#job_category_id').val( data.job_category.id );
                        $('#starting_salary').val( data.notch.annual_salary );
                        $('#starting_salary_id').val( data.notch.id );
                        $('#starting_salary_id').val( data.notch.id );
                        $('#monthly_salary').val( (data.notch.annual_salary / 12).toFixed(2));

                       

                        

                                // $.each(data.notch, function (index, item) {
                                //     $('#starting_salary').val( data.notch.annual_salry );
                                // });
 
                    }
                });
            }else{
                console.log('empty');
            }

        })
    } else {
        $('#department').empty().append('<option value="">...</option>');
        console.log('empty');
    }
});



