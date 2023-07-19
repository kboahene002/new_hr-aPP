@include('layout.loader')


{{-- @include('layout.loader') --}}






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
                        Employee List</h1>
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
                        <li class="breadcrumb-item text-muted">Employee</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="#" onclick="loadPage('employee' , event  , $(this))" id="modal_popup" class="btn  btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_new_target">Add New a new Employee</a>
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
                                <span class="card-label fw-bold fs-3 mb-1">List Of Employees</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">()
                                    Employee's found
                                    </span>
                            </h3>







                            <div style=" " class="d-flex justify-content-between mb-4">



                                <div class="form-outline me-3" style="width: 18rem">
                                    <input required type="text" name="keyword"
                                        placeholder="Search for employees" id="fff"
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
                                    
                                        <thead>
                                            <tr class="fw-bold text-muted bg-light">
                                                <th class="ps-4">Name</th>
                                                <th>Staff No.</th>
                                                <th>Job_title</th>
                                                <th>Department</th>
                                    
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                   

                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>

                                        @forelse($allEmployee as $item)
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ Str::ucfirst($item->surname . ''. $item->other_names) }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" 
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ Str::ucfirst($item->staff_id)}}</a>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{  Str::ucfirst(App\Models\setup\JobList::find($item->job_title_id)->job_title) }}</a>
                                                        </div>
                                                    </div>
                                                </td>

                                                
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ App\Models\setup\DepartmentList::find($item->department_id)->departmentName }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            
                                             
                                                <td class="text-start">

                                                    <a href="#" onclick="loadPage('viewEmployee/{{$item->id}}' , event  , $(this))" data-id="{{ $item->id }}"
                                                        class=" btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                        view
                                                    </a>
                                                    <a href="#" data-id="{{ $item->id }}"
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
                                            <small>Employee List is currently empty</small>
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
    controller('viewEmployee');
</script>
