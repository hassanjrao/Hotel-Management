@extends('layouts.backend')

@php
    $addEdit = isset($destination) ? 'Edit' : 'Add';
    $addUpdate= isset($destination) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' destination')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Destination</h3>


                <a href="{{ route('cpanel.destinations.index') }}" class="btn btn-primary push">All Destinations</a>


            </div>
            <div class="block-content">

                @if ($destination)
                    <form action="{{ route('cpanel.destinations.update', $destination->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else

                        <form action="{{ route('cpanel.destinations.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label" for="label">Name <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $destination ? $destination->name : '' }}"
                                    class="form-control" id="name" name="name">
                            </div>

                            <div class="col-6">

                                <label class="form-label" for="label">Title<span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $destination ? $destination->title : '' }}"
                                    class="form-control" id="title" name="title">

                            </div>


                        </div>

                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label" for="label">Subtitle</label>
                                <input type="text" value="{{ $destination ? $destination->sub_title : '' }}"
                                    class="form-control" id="subtitle" name="sub_title">
                            </div>

                            <div class="col-6">

                                <label class="form-label" for="label">Title Tag<span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $destination ? $destination->title_tag : '' }}"
                                    class="form-control" id="title_tag" name="title_tag">

                            </div>

                        </div>

                        <div class="row mb-4">
                            <div class="col-12 mb-4">
                                <label class="form-label" for="label">Main Text</label>

                                <textarea name="main_text" id="js-ckeditor5-classic" cols="30" rows="10">{!! $destination ? $destination->main_text : '' !!}</textarea>


                            </div>

                            <div class="col-12">

                                <label class="form-label" for="label">Video URL</label>
                                <input  type="url" value="{{ $destination ? $destination->video_url : '' }}"
                                    class="form-control" id="video_url" name="video_url">

                            </div>

                        </div>

                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label" for="label">Latitude<span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $destination ? $destination->lat : '' }}"
                                    class="form-control" id="lat" name="lat">
                            </div>

                            <div class="col-6">

                                <label class="form-label" for="label">Longtitude<span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $destination ? $destination->lng : '' }}"
                                    class="form-control" id="lng" name="lng">

                            </div>

                        </div>


                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label" for="label">Description</label>
                                <textarea  type="text" class="form-control" id="description" name="description">{{ $destination ? $destination->description : '' }}</textarea>
                            </div>


                            <div class="col-6 mt-4">
                                <label class="form-label" for="label">Release <span class="text-danger">*</span></label>
                                @if ($destination)
                                    <x-release-component :code="$destination->release" />
                                @else
                                    <x-release-component :code="null" />
                                @endif

                            </div>



                        </div>



                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label" for="label">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>


                            <div class="col-6 mt-4">

                                <div class="form-check">
                                    @php
                                        $checked = '';
                                        if ($destination) {
                                            $checked = $destination->home_page == 1 ?  'checked' : '';
                                        }
                                    @endphp
                                    <input class="form-check-input" type="checkbox"
                                         {{ $checked }}
                                        id="homePage" name="home_page">
                                    <label class="form-check-label" for="homePage">
                                        Home Page
                                    </label>
                                </div>

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
    </script>
@endsection
