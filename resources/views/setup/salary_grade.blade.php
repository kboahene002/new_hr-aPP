@include('layout.loader')


@include('layout.loader')


<!--begin::Modal - Add New Job Category to list-->
<div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="kt_modal_new_target_form " class="form" action="#">

                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Add a new salary grade</h1>
                    </div>

                    <div class="text-left">
                        <ul class="error">

                        </ul>
                    </div>

                    <div class="d-flex flex-column mb-8 fv-row">

                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Pay grade</span>
                        </label>

                        <input type="text" value="@if (isset($find)) {{ $find->pay_grade }} @endif"
                            class="form-control form-control" placeholder="Enter a new pay grade " name="pay grade" />
                    </div>

                    <div class="d-flex flex-column mb-8 fv-row">

                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Pay grade Code</span>
                        </label>

                        <input type="text"
                            value="@if (isset($find)) {{ $find->pay_grade_code }} @endif"
                            class="form-control form-control" placeholder="Enter a new pay grade code"
                            name="pay_grade_code" />
                    </div>


                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Level</label>
                            <select class="form-select form-select  " data-control="select2" data-hide-search="true"
                                data-placeholder="Select a level" name="level">
                                <option value>Select ...</option>
                                @for ($i = 1; $i <= 150; $i++)
                                    <option
                                        @isset($find)
                                        @if ($find->level == $i)
                                            selected
                                        @endif
                                    @endisset
                                        value='{{ $i }}'> {{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                    </div>

                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">No of notches</label>
                            <select class="form-select form-select  " data-control="select2" data-hide-search="true"
                                data-placeholder="Select a notch level" name="no_of_notches">
                                <option value>Select ...</option>
                                @for ($i = 1; $i <= 150; $i++)
                                    <option
                                        @isset($find)
                                        @if ($find->no_of_notches == $i)
                                            selected
                                        @endif
                                    @endisset
                                        value='{{ $i }}'> {{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                    </div>


                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Notch Jump (yrs)</label>
                            <select class="form-select form-select  " data-control="select2" data-hide-search="true"
                                data-placeholder="Select number of years" name="notch_jump">
                                <option value>Select ...</option>
                                @for ($i = 1; $i <= 150; $i++)
                                    <option
                                        @isset($find)
                                        @if ($find->notch_jump == $i)
                                            selected
                                        @endif
                                    @endisset
                                        value='{{ $i }}'> {{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                    </div>

                    <div class="d-flex flex-column mb-8 fv-row">

                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Leave days</span>
                        </label>

                        <input type="text" value="@if (isset($find)) {{ $find->leave_days }} @endif"
                            class="form-control form-control" placeholder="Leave days" name="leave_days" />
                    </div>


                    <div class="d-flex flex-column mb-8 fv-row">

                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="">Description </span>
                        </label>

                        <input value="@isset($find) {{ $find->description }} @endisset"
                            type="text" class="form-control " placeholder="Enter a description" name="description" />
                    </div>

                    <!--end::Input group-->









                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">

                        <button data-id={{ $id }} type="submit" id="kt_modal_new_target_submit"
                            class="submit btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button data-id={{$id}} style="display:none;" type="submit"
                            id="kt_modal_new_target_update" class="update btn btn-primary">
                            <span class="indicator-label">Update</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button id="dismiss" id="" data-bs-dismiss="modal" class=" btn btn-danger">
                            Close
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Target-->



<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Salary grade List</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Setup - Salary grade List</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="#" id="modal_popup" class="btn  btn-sm fw-bold btn-primary"
                        data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Add New salary grade</a>
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div class="container">
            <div class="row">

                <div class="col-xl-12">
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">List Of Salary grades</span>
                                <span class="text-muted mt-1 fw-semibold fs-7">()
                                    Salary grade(s)
                                    found</span>
                            </h3>







                            <div style=" " class="d-flex justify-content-between mb-4">



                                <div class="form-outline me-3" style="width: 18rem">
                                    <input required type="text" name="keyword"
                                        placeholder="Search salary grade list" id="fff"
                                        class="form-control " />

                                </div>

                            </div>







                            {{-- <input class="form-control" type="text" id="fff"> --}}


                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table id="department" class="table table-row-dashed align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    @if ($salaryGrade)
                                        <thead>
                                            <tr class="fw-bold text-muted bg-light">
                                                <th class="ps-4">Pay Grade</th>
                                                <th class="ps-4">Pay Grade Code</th>
                                                <th class="ps-4">Level</th>
                                                <th class="ps-4">No of Notches</th>
                                                <th class="ps-4">No of years</th>
                                                <th class="ps-4">leave Days</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    @endif

                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>

                                        @forelse($salaryGrade as $item)
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ Str::ucfirst($item->pay_grade) }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ Str::ucfirst($item->pay_grade_code) }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ Str::ucfirst($item->level) }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ Str::ucfirst($item->no_of_notches) }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ Str::ucfirst($item->notch_jump) }}</a>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ Str::ucfirst($item->leave_days) }}</a>
                                                        </div>
                                                    </div>
                                                </td>




                                                <td>
                                                    <a href="#"
                                                        class=" @if ($item->description == '')  @endif text-dark  fw-bold text-hover-primary d-block mb-1 fs-6">
                                                        @if ($item->description == '')
                                                            null
                                                        @else
                                                            {{ $item->description }}
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="text-start">

                                                    <a href="#" data-reference={{$id}} data-id="{{$item->id }}"
                                                        class="edit btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                        <i class="ki-duotone ki-pencil fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </a>
                                                    <a data-reference={{$id}} href="#" data-id="{{ $item->id }}"
                                                        class="delete btn btn-icon  btn-bg-light btn-active-color-danger btn-sm">
                                                        <i class="ki-duotone ki-trash fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                            <span class="path4"></span>
                                                            <span class="path5"></span>
                                                        </i>
                                                    </a>

                                                </td>
                                            </tr>
                                        @empty
                                            <small>Salary grade and notch list is currently empty</small>
                                        @endforelse










                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--begin::Body-->
                    </div>
                </div>

            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->
    <div id="kt_app_footer" class="app-footer">
        <!--begin::Footer container-->
        <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-semibold me-1">2023&copy;</span>
                <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Appnet
                    Consult</a>
            </div>
            <!--end::Copyright-->
            <!--begin::Menu-->

            <!--end::Menu-->
        </div>
        <!--end::Footer container-->
    </div>
    <!--end::Footer-->
</div>


<script>
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

    $('#modal_popup').on('click', function () {
          $('input').val('');
          $('select').val('');
          $('.update').hide();
          $('#kt_modal_new_target_submit').show();

      })

    $('.submit').on('click', function(e) {

        e.preventDefault();
    
        
        $('.error').html('');

        let id = $(this).data('id');
        showLoader();
        let form = $('.form').serialize();
        
        $.ajax({
            type: "POST",
            url: "/hr/salaryGrade/" + id,
            data: form,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                    'content')
            },
            success: function(data) {

                Swal.fire(
                    'Success',
                    'The data has been saved successfully',
                    'success'
                )
                $('#kt_modal_new_target').modal('hide');
                $(".main").html(data);
                hideLoader();
               
            },
            error: function(data) {
                hideLoader();
               
                $.each(data.responseJSON.data, function(index, value) {
                    
                    $('.error').append(
                        "<li style='text-decoration:none;' class='text-danger'> " +
                        value +
                        "</li>");
                });


            }
        });


    });
    $('.edit').on('click', function (e) {
          e.preventDefault();
          
          $('.update').show();
          $('#kt_modal_new_target_submit').hide();
          $(".error").html('');

          let reference = $(this).data('reference');
          let id = $(this).data('id');
         
       
          $.ajax({

              type: "get",
              url: "../hr/"+reference+"/salaryGrade/edit/" + id,

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
                          url: "../hr/"+reference+"/salaryGrade/update/"+id,
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
          let reference = $(this).data('reference');
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
                      url: "../hr/"+reference+"/salaryGrade/delete/" + id,
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
                        
                      }
                  })

              }
          })

      })

    










   

    $('#dismiss').on('click', function(e) {
        e.preventDefault();
    })
</script>
