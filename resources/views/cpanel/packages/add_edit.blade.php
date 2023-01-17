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
                    <form action="{{ route('cpanel.packages.update', $package->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('cpanel.packages.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-5">

                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <label class="form-label" for="label">Name<span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $package ? $package->name : '' }}" class="form-control"
                                    id="name" name="name">
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <label class="form-label" for="label">Hotel<span class="text-danger">*</span></label>

                                @if (!$package)
                                    @php
                                        $packageHotels = [];
                                    @endphp
                                @endif

                                <x-hotels name="hotel_ids" required :selected="$packageHotels" multiple :hotels=$hotels></x-hotels>

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">



                                <label class="form-label" for="label">Days<span class="text-danger">*</span></label>

                                @if (!$package)
                                    @php
                                        $selectedDays = [];
                                    @endphp
                                @endif

                                <x-days name="days" required multiple :selected="$selectedDays" :days=$days></x-days>

                            </div>






                        </div>


                        <div class="row mb-4">

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Check in day</label>

                                @if (!$package)
                                    @php
                                        $selectedCheckInDay = [];
                                    @endphp
                                    @else
                                    @php
                                        $selectedCheckInDay = [$package->check_in_day];
                                    @endphp
                                @endif

                                <x-days name="check_in_day" required :selected="$selectedCheckInDay" :days=$days></x-days>

                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Check out day</label>

                                @if (!$package)
                                    @php
                                        $selectedCheckOutDay = [];
                                    @endphp
                                    @else
                                    @php
                                        $selectedCheckOutDay = [$package->check_out_day];
                                    @endphp
                                @endif

                                <x-days name="check_out_day" required :selected="$selectedCheckOutDay" :days=$days></x-days>

                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Max Nights</label>
                                <input type="number" value="{{ $package ? $package->max_nights : 0 }}" class="form-control"
                                    id="max_nights" name="max_nights" min="0" onkeyup="maxNights(this.value)">
                                <span class="text-danger" id="max_nights_error"></span>
                            </div>



                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Min Nights</label>
                                <input type="number" value="{{ $package ? $package->min_nights : 0 }}" class="form-control"
                                    id="min_nights" name="min_nights" min="0" onkeyup="minNights(this.value)">
                                <span class="text-danger" id="min_nights_error"></span>
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



        function maxNights(value) {

            if (parseInt(value) <= parseInt($("#min_nights").val())) {

                $("#max_nights_error").html("Max nights should be greater than min nights")

                $("#submitBtn").attr("disabled", "disabled")
            } else {
                $("#max_nights_error").html("")


                $("#submitBtn").attr("disabled", false)
            }

        }

        function minNights(value) {

            if (parseInt(value) >= parseInt($("#max_nights").val())) {

                $("#min_nights_error").html("Min nights should be less than max nights")


                $("#submitBtn").attr("disabled", "disabled")
            } else {
                $("#min_nights_error").html("")


                $("#submitBtn").attr("disabled", false)
            }

        }





    </script>
@endsection
