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
                        <h1 class="mb-3">Add a new Job list</h1>
                    </div>

                    <div class="text-left">
                        <ul class="error">

                        </ul>
                    </div>

                    <div class="d-flex flex-column mb-8 fv-row">

                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Job Title</span>
                        </label>

                        <input type="text"
                            value="@if (isset($find)) {{ $find->job_title }} @endif"
                            class="form-control form-control" placeholder="Enter a new job title  "
                            name="job_title" />
                    </div>

                    <div class="d-flex flex-column mb-8 fv-row">

                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Job Schedule</span>
                        </label>

                        <textarea type="text"class="form-control form-control" 
                            name="job_schedule" >@if (isset($find)) {{ $find->job_schedule }} @endif</textarea>
                    </div>
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Job Category</label>
                            <select class="form-select form-select  " data-control="select2" data-hide-search="true"
                                data-placeholder="Select a level" name="job_category">
                                <option value>Select ...</option>
                                @foreach ($jobCategory as $item)
                                    <option @if(isset($find)) @if($find->job_category == $item->job_category_name) selected @endif @endif value="{{$item->job_category_name}}">{{$item->job_category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Department</label>
                            <select class="form-select form-select  " data-control="select2" data-hide-search="true"
                                data-placeholder="Select a department" name="department">
                                <option value>Select ...</option>
                                @foreach ($department as $item)
                                    <option @if(isset($find)) @if($find->department == $item->departmentName) selected @endif @endif value="{{$item->departmentName}}">{{$item->departmentName}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Starting Salary</label>
                            <select class="form-select form-select  " data-control="select2" data-hide-search="true"
                                data-placeholder="Select a starting salary" name="starting_salary">
                                <option value>Select ...</option>
                                    @foreach ($salaryNotch as $item)
                                <option @if(isset($find)) @if($find->starting_salary == ($item->pay_grade.' : ' . 'Notch '.$item->notch_position." : ".$item->currency.' '.$item->annual_salary)) selected @endif @endif   value="{{$item->pay_grade.' : ' . 'Notch '.$item->notch_position." : ".$item->currency.' '.$item->annual_salary}}">{{$item->pay_grade.' : ' . 'Notch '.$item->notch_position." : ".$item->currency.' '.$item->annual_salary}}</option>
                            @endforeach
                            </select>
                        </div>

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

                        <button type="submit" id="kt_modal_new_target_submit" class="submit btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button style="display:none;" type="submit" id="kt_modal_new_target_update"
                            class="update btn btn-primary">
                            <span class="indicator-label">Update</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button  id="dismiss" data-bs-dismiss="modal" class=" btn btn-danger">
                            <span class="indicator-label">Close</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                        Job List</h1>
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
                        <li class="breadcrumb-item text-muted">Setup -Job List</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="#" id="modal_popup" class="btn  btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_new_target">Add New job List</a>
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
                                <span class="card-label fw-bold fs-3 mb-1">List Of Jobs</span>
                                <span class="text-muted mt-1 fw-semibold fs-7">({{ count($jobList) }})
                                    Job List
                                    found</span>
                            </h3>







                            <div style=" " class="d-flex justify-content-between mb-4">



                                <div class="form-outline me-3" style="width: 18rem">
                                    <input required type="text" name="keyword"
                                        placeholder="Search job list" id="fff"
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
                                    @if (count($jobList) > 0)
                                        <thead>
                                            <tr class="fw-bold text-muted bg-light">
                                                <th class="ps-4">Job Title</th>
                                                <th>Job Schedule</th>
                                                <th>Job Category</th>
                                                <th>Department</th>
                                                <th>Starting Salary</th>
                                                <th>Description</th>
                                             
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    @endif

                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>

                                        @forelse($jobList as $item)
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ Str::ucfirst($item->job_title) }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" 
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ Str::ucfirst($item->job_schedule)}}</a>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ Str::ucfirst($item->job_category) }}</a>
                                                        </div>
                                                    </div>
                                                </td>

                                                
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ Str::ucfirst($item->department) }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ Str::ucfirst($item->starting_salary) }}</a>
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

                                                    <a href="#" data-id="{{ $item->id }}"
                                                        class="edit btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                        <i class="ki-duotone ki-pencil fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
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
                                            <small>Job list is currently empty</small>
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
    controller('jobList');
</script>
