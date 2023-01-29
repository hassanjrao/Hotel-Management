@extends('layouts.backend')

@php
    $addEdit = isset($activity) ? 'Edit' : 'Add';
    $addUpdate = isset($activity) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Activity')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Activity</h3>


                <a href="{{ route('cpanel.activities.index') }}" class="btn btn-primary push">All Activities</a>


            </div>
            <div class="block-content">

                @if ($activity)
                    <form action="{{ route('cpanel.activities.update', $activity->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('cpanel.activities.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Title<span class="text-danger">*</span></label>
                                <input type="text" required value="{{ $activity ? $activity->title : null }}"
                                    class="form-control" id="title" name="title" min="0">
                                <span class="text-danger" id="title_error"></span>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Sub Title</label>
                                <input type="text"  value="{{ $activity ? $activity->sub_title : null }}"
                                    class="form-control" id="sub_title" name="sub_title" min="0">
                                <span class="text-danger" id="sub_title_error"></span>
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <label class="form-label" for="label">Hotels<span class="text-danger">*</span></label>

                                @if (!$activity)
                                    @php
                                        $activityHotels = [];
                                    @endphp
                                @endif

                                <x-hotels name="hotel_ids" multiple required hotelDependentId="no" required :selected="$activityHotels" :hotels=$hotels>
                                </x-hotels>

                            </div>






                        </div>


                        <div class="row mb-4">

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Max Children<span
                                        class="text-danger">*</span></label>
                                <input type="number" min=0 required value="{{ $activity ? $activity->max_children : 0 }}"
                                    class="form-control" id="max_children" name="max_children">
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Max Adults<span
                                        class="text-danger">*</span></label>
                                <input type="number" min=0 required value="{{ $activity ? $activity->max_adults : 0 }}"
                                    class="form-control" id="max_adults" name="max_adults">
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Max People<span
                                        class="text-danger">*</span></label>
                                <input type="number" min=0 required value="{{ $activity ? $activity->max_people : 0 }}"
                                    class="form-control" id="max_people" name="max_people">
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Price Per Person<span
                                        class="text-danger">*</span></label>
                                <input type="number" step=".01" required
                                    value="{{ $activity ? $activity->price_per_person : 0 }}" class="form-control"
                                    id="price_per_person" name="price_per_person">

                            </div>

                        </div>

                        <div class="row mb-4">
                            <div class="col-12 mb-4">
                                <label class="form-label" for="label">Description</label>
                                <textarea name="description" id="js-ckeditor5-classic" cols="30" rows="10">{!! $activity ? $activity->description : '' !!}</textarea>
                            </div>

                        </div>

                        <div class="row mb-4">



                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Duration<span class="text-danger">*</span></label>
                                <input required type="number" step=".01" value="{{ $activity ? $activity->duration : '' }}"
                                    class="form-control" id="duration" name="duration">
                                <span class="text-danger" id="duration_error"></span>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Duration Unit<span
                                        class="text-danger">*</span></label>
                                <select required class="form-select" id="duration_unit" name="duration_unit">
                                    <option value="minutes"
                                        {{ $activity && $activity->duration_unit == 'minutes' ? 'selected' : '' }}>
                                        minutes</option>
                                    <option value="hours"
                                        {{ $activity && $activity->duration_unit == 'hours' ? 'selected' : '' }}>
                                        hours</option>
                                    <option value="days"
                                        {{ $activity && $activity->duration_unit == 'days' ? 'selected' : '' }}>
                                        days</option>
                                    <option value="weeks"
                                        {{ $activity && $activity->duration_unit == 'weeks' ? 'selected' : '' }}>
                                        weeks</option>

                                </select>

                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Latitude<span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $activity ? $activity->lat : '' }}"
                                    class="form-control" id="lat" name="lat" >
                                <span class="text-danger" id="lat_error"></span>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Longitude<span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $activity ? $activity->lng : '' }}"
                                    class="form-control" id="lng" name="lng" >
                                <span class="text-danger" id="lng_error"></span>
                            </div>


                        </div>



                        <div class="row mb-4">


                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-label" for="label">Release <span
                                        class="text-danger">*</span></label>
                                @if ($activity)
                                    <x-release-component :code="$activity->release_status" />
                                @else
                                    <x-release-component :code="null" />
                                @endif

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mt-4">

                                @php
                                    $checked = '';
                                    if ($activity) {
                                        $checked = $activity->home_page == 1 ? 'checked' : '';
                                    }
                                @endphp

                                <x-home-page :checked=$checked></x-home-page>


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

        function addChildrenactivities() {

            var id = $("#childrenactivitiesRows tr").length + 1;


            var html = `<tr>
                            <td>${id}</td>
                            <td>
                                <input required type="number" class="form-control" name="min_ages[]">
                            </td>
                            <td>
                                <input required type="number" class="form-control" name="max_ages[]">
                            </td>
                            <td>
                                <input required step=".01" type="number" value="0" min="0" class="form-control" name="child_prices[]">

                            </td>
                            <td>
                                <a onclick="removeChildrenactivities(this)"
                                    class="btn btn-sm btn-outline-danger " data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Remove">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>`;

            $("#childrenactivitiesRows").append(html);


        }


        function removeChildrenactivities(element) {

            $(element).parent().parent().remove();

            var id = 1;

            $("#childrenactivitiesRows tr").each(function() {

                $(this).find("td:first").html(id);

                id++;

            })

        }
    </script>
@endsection
