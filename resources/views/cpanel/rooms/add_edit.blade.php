@extends('layouts.backend')

@php
    $addEdit = isset($room) ? 'Edit' : 'Add';
    $addUpdate = isset($room) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' room')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Room</h3>


                <a href="{{ route('cpanel.rooms.index') }}" class="btn btn-primary push">All Rooms</a>


            </div>
            <div class="block-content">

                @if ($room)
                    <form action="{{ route('cpanel.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('cpanel.rooms.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">

                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <label class="form-label" for="label">Hotel<span class="text-danger">*</span></label>

                                @if (!$room)
                                    @php
                                        $roomHotels = [];
                                    @endphp
                                @endif

                                <x-hotels name="hotel_id" :selected="$roomHotels" :hotels=$hotels ></x-hotels>

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <label class="form-label" for="label">Title<span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $room ? $room->title : '' }}" class="form-control"
                                    id="title" name="title">

                            </div>




                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-label" for="label">Subtitle<span class="text-danger">*</span></label>
                                <input type="text" value="{{ $room ? $room->sub_title : '' }}" class="form-control"
                                    id="subtitle" name="sub_title">
                            </div>

                        </div>


                        <div class="row mb-4">

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Max Children<span class="text-danger">*</span></label>
                                <input type="number" value="{{ $room ? $room->max_children : 0 }}" class="form-control"
                                    id="max_children" name="max_children" min="0">
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Max Adults<span class="text-danger">*</span></label>
                                <input type="number" value="{{ $room ? $room->max_adults : 0 }}" class="form-control"
                                    id="max_adults" name="max_adults" min="0">
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Max People<span class="text-danger">*</span></label>
                                <input type="number" value="{{ $room ? $room->max_people : 0 }}" class="form-control"
                                    id="max_people" name="max_people" min="0">
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Min People<span class="text-danger">*</span></label>
                                <input type="number" value="{{ $room ? $room->min_people : 0 }}" class="form-control"
                                    id="min_people" name="min_people" min="0">
                            </div>


                        </div>

                        <div class="row mb-4">
                            <div class="col-12 mb-4">
                                <label class="form-label" for="label">Description</label>
                                <textarea name="description" id="js-ckeditor5-classic" cols="30" rows="10">{!! $room ? $room->description : '' !!}</textarea>
                            </div>

                        </div>




                        <div class="row mb-4">

                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <label class="form-label" for="label">Facilities</label>

                                @if (!$room)
                                    @php
                                        $roomFacilities = [];
                                    @endphp
                                @endif


                                <x-facilities :selected="$roomFacilities" :facilities=$facilities multiple></x-facilities>


                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <label class="form-label" for="label">Number of Rooms<span class="text-danger">*</span></label>
                                <input type="number" value="{{ $room ? $room->total_rooms : 1 }}" class="form-control"
                                    id="total_rooms" name="total_rooms" min="1">

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <label class="form-label" for="label">Price Per Night<span class="text-danger">*</span></label>
                                <input type="text" value="{{ $room ? $room->price_per_night : 0 }}" class="form-control"
                                    id="price_per_night" name="price_per_night">

                            </div>



                        </div>




                        <div class="row mb-4">


                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label class="form-label" for="label">Release <span class="text-danger">*</span></label>
                                @if ($room)
                                    <x-release-component :code="$room->release_status" />
                                @else
                                    <x-release-component :code="null" />
                                @endif

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 mt-4">

                                @php
                                    $checked = '';
                                    if ($room) {
                                        $checked = $room->home_page == 1 ? 'checked' : '';
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

                    <button type="submit" class="btn btn-primary  border">{{ $addUpdate }}</button>

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
