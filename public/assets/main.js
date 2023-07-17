  function showLoader() {
      $('#loader-container').css('width', '100%');
      $('#loader-container').css('height', '100vh');

      $('.loader-bike').show(200);
  }

  function hideLoader() {
      $('#loader-container').css('width', '0%');
      $('#loader-container').css('height', '0%');


      $('.loader-bike').hide(200);
  }

  function loadPage(route_name, event, button) {

      $('.menu-link').removeClass('active');

      $(button).addClass('active');
      $('#exampleModal').modal('hide');

      event.preventDefault();

      showLoader();

      $.ajax({
          type: "get",
          url: 'hr/' + route_name,
          success: function (view) {
              $(".main").html(view);
          }
      });

      $('#dismiss').on('click' , function(e){
        e.preventDefault();
    })

    
  }

  function loadSalaryPage(route_name, event, button) {

    
    $('#exampleModal').modal('hide');

    event.preventDefault();
    let id = $(button).data('id');
    showLoader();

    $.ajax({
        type: "get",
        url: 'hr/' + route_name + '/' + id,
        success: function (view) {
            $(".main").html(view);
        }
    });

   

    $('#dismiss').on('click' , function(e){
      e.preventDefault();
  })

}


  $('.logout').on('click', function (e) {
      e.preventDefault();
      $.ajax({
          type: "POST",
          url: " ../logout",
          data: {
              "_token": "{{ csrf_token() }}",
          },
          success: function (data) {
              if (data.code == 200) {
                  Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Logout Sucessfull',
                      showConfirmButton: false,
                      timer: 1500
                  })
                  // Materialize.toast('Success! Patient Information Saved.', 4000, 'success');

              }

              setTimeout(() => {
                  window.location.href = '/';
              }, 700);

              // $(".main").html(data);

          }
      });
  })

  function controller(route_name) {
    
    $(document).ready(function() {
        let table = $('#department').DataTable({
            "lengthMenu": [5, 20, 40, 60, 80, 100],
            "pageLength": 5,
            "lengthChange": false
            
        });
        $('#fff').on('keyup', function() {
            table.search(this.value).draw();
        });

    });
     $('#dismiss').on('click' , function(e){
        e.preventDefault();
    })
    

      $('#modal_popup').on('click', function () {
       
          $('input').val('');
          $('select').val('');
          $('.update').hide();
          $('#kt_modal_new_target_submit').show();

      })
      $('.close').on('click', function () {
          $('#exampleModal').modal('hide');
      })
      $('.submit').on('click', function (e) {
          e.preventDefault();
          $('.error').html('');

          showLoader();
          let form = $('.form').serialize();

          $.ajax({
              type: "POST",
              url: "/hr/" + route_name,
              data: form,
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                      'content')
              },
              success: function (data) {

                Swal.fire(
                    'Success',
                    'The data has been saved successfully',
                    'success'
                  )
                  $('#kt_modal_new_target').modal('hide');
                  $(".main").html(data);
                  hideLoader();
              },
              error: function (data) {
                  hideLoader();
                  $.each(data.responseJSON.data, function (index, value) {
                    console.log(data);
                      $('.error').append("<li style='text-decoration:none;' class='text-danger'> " + value +
                          "</li>");
                  });


              }
          });


      })

      $('.search').on('click', function (e) {
          e.preventDefault();
          

            if($('#filter') == '' && $('#search') == ""){
                alert('hello');
            }else{
               
                showLoader();
                let form = $('#find').serialize();
                
                $.ajax({
                    type: "get",
                    url: "/hr/search/" + route_name,
                    data: form,
                  
                    success: function (data) {
                        $(".main").html(data);
                        hideLoader();
                    },
                    error: function (data) {
                        hideLoader();
                        console.log(data);
                        $.each(data.responseJSON.data, function (index, value) {
                          
                            $('.error').append("<li style='text-decoration:none;' class='text-danger'> " + value +
                                "</li>");
                        });
      
      
                    }
                });
            }
         
   
           
          
        

      });



      $('.edit').on('click', function (e) {
          e.preventDefault();
         
          $('.update').show();
          $('#kt_modal_new_target_submit').hide();
          $(".error").html('');


          let id = $(this).data('id');
          $.ajax({

              type: "get",
              url: "../hr/" + route_name + "/edit/" + id,

              success: function (data) {

                  $(".main").html(data);
                  $('#kt_modal_new_target_submit').hide();
                  $('.update').show();
                  $('#kt_modal_new_target').modal('show');



                  $('#kt_modal_new_target_update').on('click', function (e) {
                      e.preventDefault();
                      showLoader();
                      let form = $('.form').serialize();

                      $.ajax({
                          type: "post",
                          url: "../hr/" + route_name + "/update/" + id,
                          data: form,
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                  'content'
                              )
                          },
                          success: function (data) {
                              Swal.fire({
                                  icon: 'success',
                                  title: 'OK',
                                  text: 'Updated Successfully!',
                                  // footer: '<a href="">Why do I have this issue?</a>'
                              });
                              hideLoader();
                              $('#kt_modal_new_target').modal('hide');
                              $(".main").html(data);
                          },
                          error: function (data) {
                              hideLoader();
                              console.log(data);
                              $.each(data.responseJSON.data, function (index,
                                  value) {
                                  $('.error').append(
                                      "<li class='text-danger'> " +
                                      value +
                                      "</li>");
                              });
                          }
                      });
                  })

              }

          });
      })
      $('.delete').on('click', function (e) {
          e.preventDefault();
          let id = $(this).data('id');
          Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
              if (result.isConfirmed) {
                  $('#loader-overlay').css('width', '100%');
                  $('#loader-overlay').css('height', '100vh');
                  $('.loader').show();

                  $.ajax({
                      type: "post",
                      url: "../hr/" + route_name + "/delete/" + id,
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                              'content'
                          )
                      },
                      success: function (data) {
                          Swal.fire(
                              'Deleted!',
                              'Your file has been deleted.',
                              'success'
                          )
                          $(".main").html(data);

                      },
                      error: function (data) {
                        console.log(data);
                      }
                  })

              }
          })

      })

  }

$('.logout').on('click' , function(e){
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "This will log you out!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "logout",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content'
                    )
                },
                success: function (data) {
                    Swal.fire(
                        'Success!',
                        'You have been signed out successfully.',
                        'success'
                    )
                    window.location.href="/";

                }
            })

        
        }
      })
})

  $(document).ready(function () {
      let table = new DataTable('#department');
  });

  function breadcrumb(event, route_name) {
      event.preventDefault();
      showLoader();
      $.ajax({
          type: "get",
          url: "/hr/" + route_name,

          success: function (view) {
              $(".main").html(view);
          }
      });
  }
