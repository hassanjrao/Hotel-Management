@extends('layouts.backend')

@php
    $addEdit = isset($hotel) ? 'Edit' : 'Add';
    $addUpdate = isset($hotel) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' hotel')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Hotel</h3>


                <a href="{{ route('cpanel.hotels.index') }}" class="btn btn-primary push">All Hotels</a>


            </div>
            <div class="block-content">

                @if ($hotel)
                    <form action="{{ route('cpanel.hotels.update', $hotel->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('cpanel.hotels.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">

                            <div class="col-6">

                                <label class="form-label" for="label">Title<span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $hotel ? $hotel->title : '' }}"
                                    class="form-control" id="title" name="title">

                            </div>


                            <div class="col-6">
                                <label class="form-label" for="label">Subtitle</label>
                                <input type="text" value="{{ $hotel ? $hotel->sub_title : '' }}" class="form-control"
                                    id="subtitle" name="sub_title">
                            </div>



                        </div>

                        <div class="row mb-4">
                            <div class="col-12 mb-4">
                                <label class="form-label" for="label">Description</label>
                                <textarea name="description" id="js-ckeditor5-classic" cols="30" rows="10">{!! $hotel ? $hotel->description : '' !!}</textarea>
                            </div>

                        </div>


                        <div class="row mb-4">

                            <div class="col-4">

                                <label class="form-label" for="label">Facilities</label>

                                <x-facilities :facilities=$facilities multiple></x-facilities>

                            </div>


                            <div class="col-4">

                                <label class="form-label" for="label">Destination</label>

                                <x-destinations :destinations=$destinations></x-destinations>

                            </div>

                            <div class="col-4">

                                <label class="form-label" for="label">Class</label>

                                <x-hotel-stars :hotelStars=$hotelStars></x-hotel-stars>

                            </div>




                        </div>



                        <div class="row mb-4">

                            <div class="col-4">

                                <label class="form-label" for="label">Phone</label>
                                <input type="tel" value="{{ $hotel ? $hotel->phone : '' }}" class="form-control"
                                    id="phone" name="phone">

                            </div>

                            <div class="col-4">

                                <label class="form-label" for="label">Email</label>
                                <input type="email" value="{{ $hotel ? $hotel->email : '' }}" class="form-control"
                                    id="email" name="email">

                            </div>

                            <div class="col-4">

                                <label class="form-label" for="label">Address</label>
                                <input type="text" value="{{ $hotel ? $hotel->address : '' }}" class="form-control"
                                    id="address" name="address">

                            </div>

                        </div>

                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label" for="label">Latitude<span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $hotel ? $hotel->lat : '' }}" class="form-control"
                                    id="lat" name="lat">
                            </div>

                            <div class="col-6">

                                <label class="form-label" for="label">Longtitude<span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $hotel ? $hotel->lng : '' }}" class="form-control"
                                    id="lng" name="lng">

                            </div>

                        </div>


                        <div class="row mb-4">


                            <div class="col-6">
                                <label class="form-label" for="label">Release <span class="text-danger">*</span></label>
                                @if ($hotel)
                                    <x-release-component :code="$hotel->release" />
                                @else
                                    <x-release-component :code="null" />
                                @endif

                            </div>

                            <div class="col-6 mt-4">

                                @php
                                    $checked = '';
                                    if ($hotel) {
                                        $checked = $hotel->home_page == 1 ? 'checked' : '';
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

                                <input type="file" />

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
        const pond = FilePond.create(inputElement);


        pond.setOptions({
            allowMultiple: true,
            server:{
                url: "/upload",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }
        })
    </script>
@endsection
