@extends('layouts.backend')

@php
    $addEdit = isset($package) ? 'Edit' : 'Add';
    $addUpdate = isset($package) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' package')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Package</h3>


                <a href="{{ route('cpanel.packages.index') }}" class="btn btn-primary push">All Packages</a>


            </div>
            <div class="block-content">

                @if ($package)
                    <form action="{{ route('cpanel.packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('cpanel.packages.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">

                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <label class="form-label" for="label">Hotel<span class="text-danger">*</span></label>

                                @if (!$package)
                                    @php
                                        $packageHotels = [];
                                    @endphp
                                @endif

                                <x-hotels name="hotel_id" required :selected="$packageHotels" :hotels=$hotels></x-hotels>

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <label class="form-label" for="label">Name<span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $package ? $package->name : '' }}" class="form-control"
                                    id="name" name="name">

                            </div>





                        </div>


                        <div class="row mb-4">

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Max Children<span
                                        class="text-danger">*</span></label>
                                <input type="number" value="{{ $package ? $package->max_children : 0 }}" class="form-control"
                                    id="max_children" name="max_children" min="0">
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Max Adults<span
                                        class="text-danger">*</span></label>
                                <input type="number" value="{{ $package ? $package->max_adults : 0 }}" class="form-control"
                                    id="max_adults" name="max_adults" min="0">
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Max People<span
                                        class="text-danger">*</span></label>
                                <input type="number" value="{{ $package ? $package->max_people : 0 }}" class="form-control"
                                    id="max_people" name="max_people" min="0" onkeyup="maxPeople(this.value)">
                                <span class="text-danger" id="max_people_error"></span>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Min People<span
                                        class="text-danger">*</span></label>
                                <input type="number" value="{{ $package ? $package->min_people : 0 }}" class="form-control"
                                    id="min_people" name="min_people" min="0" onkeyup="minPeople(this.value)">
                                <span class="text-danger" id="min_people_error"></span>
                            </div>


                        </div>

                        <div class="row mb-4">
                            <div class="col-12 mb-4">
                                <label class="form-label" for="label">Description</label>
                                <textarea name="description" id="js-ckeditor5-classic" cols="30" rows="10">{!! $package ? $package->description : '' !!}</textarea>
                            </div>

                        </div>




                        <div class="row mb-4">

                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <label class="form-label" for="label">Facilities</label>

                                @if (!$package)
                                    @php
                                        $packageFacilities = [];
                                    @endphp
                                @endif


                                <x-facilities :selected="$packageFacilities" :facilities=$facilities multiple></x-facilities>


                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <label class="form-label" for="label">Number of packages<span
                                        class="text-danger">*</span></label>
                                <input type="number" value="{{ $package ? $package->total_packages : 1 }}" class="form-control"
                                    id="total_packages" name="total_packages" min="1">

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <label class="form-label" for="label">Price Per Night<span
                                        class="text-danger">*</span></label>
                                <input type="text" value="{{ $package ? $package->price_per_night : 0 }}"
                                    class="form-control" id="price_per_night" name="price_per_night">

                            </div>



                        </div>


                        <div class="row mb-4">

                            <label class="form-label" for="label">
                                Closing Dates
                                <a onclick="addCLosingDates()" class="btn btn-sm btn-outline-success "
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Add More">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </label>

                            <div class="table-responsive">

                                <table class="table table-bordered table-stripped">

                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Start Date</td>
                                            <td>End Date</td>
                                            <td>packages <span class="text-danger" id="max_package_error"></span></td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>

                                    <tbody id="closingDatesRows">

                                        @forelse ($closingDates as $closingDate)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <input type="date" class="form-control" name="start_dates[]"
                                                        class="form-control" value="{{ $closingDate->start_date }}">


                                                </td>
                                                <td>
                                                    <input type="date" class="form-control" name="end_dates[]"
                                                        class="form-control" value="{{ $closingDate->end_date }}">
                                                </td>
                                                <td>
                                                    <input required type="number" min="0"
                                                        onkeyup="maxpackagesAllowed(this,{{ $loop->index }})" class="form-control"
                                                        name="total_closing_packages[]" value="{{ $closingDate->total_packages }}">

                                                </td>
                                                <td>
                                                    <a onclick="removeClosingDates(this)"
                                                        class="btn btn-sm btn-outline-danger " data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Remove">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                        @empty



                                            {{-- <tr>
                                                <td>1</td>
                                                <td>
                                                    <input type="date" class="form-control" name="start_dates[]">
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control" name="end_dates[]">
                                                </td>
                                                <td>
                                                    <input type="number" min="0" name="total_packages[]"
                                                        class="form-control">
                                                </td>
                                                <td>
                                                    <a onclick="removeClosingDates(this)"
                                                        class="btn btn-sm btn-outline-danger " data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Remove">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr> --}}
                                        @endforelse

                                    </tbody>

                                </table>

                            </div>


                        </div>


                        <div class="row mb-4">


                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label class="form-label" for="label">Release <span
                                        class="text-danger">*</span></label>
                                @if ($package)
                                    <x-release-component :code="$package->release_status" />
                                @else
                                    <x-release-component :code="null" />
                                @endif

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 mt-4">

                                @php
                                    $checked = '';
                                    if ($package) {
                                        $checked = $package->home_page == 1 ? 'checked' : '';
                                    }
                                @endphp

                                <x-home-page :checked=$checked></x-home-page>


                            </div>



                        </div>

                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label" for="label">Image</label>
                                {{-- <input type="file" name="image" id="image" class="form-control"> --}}
                                {{-- <form class="dropzone" action="be_forms_plugins.html"></form> --}}

                                {{-- <div class="dropzone"></div> --}}
                                {{-- <div class="previews"></div> --}}

                                <input type="file" name="image" multiple data-allow-reorder="true"
                                    data-max-file-size="3MB" data-max-files="3" />


                                {{-- <form action="{{ }}" class="dropzone" id="my-great-dropzone"></form> --}}
                            </div>
                        </div>


                    </div>


                </div>

                <div class="d-flex justify-content-end mb-4">

                    <button type="submit" id="submitBtn" class="btn btn-primary  border">{{ $addUpdate }}</button>

                </div>




                </form>


            </div>
        </div>





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

    <!-- Page JS Helpers (CKEditor 5 plugins) -->
    <script>
        One.helpersOnLoad(['js-ckeditor5']);


        function addCLosingDates() {

            var id = $("#closingDatesRows tr").length + 1;


            var html = `<tr>
                            <td>${id}</td>
                            <td>
                                <input required type="date" class="form-control" name="start_dates[]">
                            </td>
                            <td>
                                <input required type="date" class="form-control" name="end_dates[]">
                            </td>
                            <td>
                                <input required type="number" value="0" min="0" onkeyup="maxpackagesAllowed(this,${id})" class="form-control" name="total_closing_packages[]">

                            </td>
                            <td>
                                <a onclick="removeClosingDates(this)"
                                    class="btn btn-sm btn-outline-danger " data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Remove">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>`;

            $("#closingDatesRows").append(html);


        }

        function maxpackagesAllowed(element, index) {
            var maxpackages = $("#total_packages").val();
            var value = $(element).val();

            $("#closingDatesRows tr").each(function() {

                if ($(this).find("td:first").html() != index) {
                    value = parseInt(value) + parseInt($(this).find("input[name='total_closing_packages[]']").val())
                }

            })

            console.log(maxpackages, value)

            if (parseInt(value) > parseInt(maxpackages)) {

                $("#max_package_error").html(`Total Closing packages should not exceed to total package: ${maxpackages}`)

                $("#submitBtn").attr("disabled", "disabled")
            } else {

                $("#max_package_error").html("")

                $("#submitBtn").attr("disabled", false)
            }
        }

        function removeClosingDates(element) {

            $(element).parent().parent().remove();

            var id = 1;

            $("#closingDatesRows tr").each(function() {

                $(this).find("td:first").html(id);

                id++;

            })

        }


        function maxPeople(value) {

            if (parseInt(value) <= parseInt($("#min_people").val())) {

                $("#max_people_error").html("Max people should be greater than min people")

                $("#submitBtn").attr("disabled", "disabled")
            } else {
                $("#max_people_error").html("")


                $("#submitBtn").attr("disabled", false)
            }

        }

        function minPeople(value) {

            if (parseInt(value) >= parseInt($("#max_people").val())) {

                $("#min_people_error").html("Min people should be less than max people")


                $("#submitBtn").attr("disabled", "disabled")
            } else {
                $("#min_people_error").html("")


                $("#submitBtn").attr("disabled", false)
            }

        }

        // new/

        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement, {

        });



        pond.setOptions({
            allowMultiple: true,

            server: {
                url: "/cpanel",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                process: {
                    url: '/upload',
                    method: 'POST',
                    withCredentials: false,
                    onload: (response) => {
                        console.log(response);

                        $('<input>').attr({
                            type: 'hidden',
                            id: 'foo',
                            name: 'images[]',
                            value: response
                        }).appendTo('form');

                    },
                    onerror: null,
                    ondata: null,
                },
                load: '/get-files/',

            },


        })
    </script>
@endsection
