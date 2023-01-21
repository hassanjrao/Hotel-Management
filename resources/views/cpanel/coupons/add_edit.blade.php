@extends('layouts.backend')

@php
    $addEdit = isset($coupon) ? 'Edit' : 'Add';
    $addUpdate = isset($coupon) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Coupon')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Coupon</h3>


                <a href="{{ route('cpanel.coupons.index') }}" class="btn btn-primary push">All Coupons</a>


            </div>
            <div class="block-content">

                @if ($coupon)
                    <form action="{{ route('cpanel.coupons.update', $coupon->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('cpanel.coupons.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-label" for="label">Title<span class="text-danger">*</span></label>
                                <input type="text" required value="{{ $coupon ? $coupon->title : '' }}"
                                    class="form-control" id="title" name="title">
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-label" for="label">Promo Code<span
                                        class="text-danger">*</span></label>
                                <input type="text" required value="{{ $coupon ? $coupon->code : '' }}"
                                    class="form-control" id="code" name="code">
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-label" for="label">Discount</label>
                                <input type="number" step=".01" value="{{ $coupon ? $coupon->discount : '' }}"
                                    class="form-control" id="discount" name="discount">
                            </div>






                        </div>


                        <div class="row mb-4">


                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Discount Type</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="discount_type" id="fixedDiscount"
                                        value="fixed"
                                        {{ $coupon ? ($coupon->discount_type == 'fixed' ? 'checked' : '') : '' }}>
                                    <label class="form-check-label" for="fixedDiscount">
                                        Fixed
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="discount_type" id="perDiscount"
                                        value="percentage"
                                        {{ $coupon ? ($coupon->discount_type == 'percentage' ? 'checked' : '') : '' }}>
                                    <label class="form-check-label" for="perDiscount">
                                        Percentage
                                    </label>
                                </div>

                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12 mt-4">

                                @php
                                    $onTimeChecked = '';
                                    if ($coupon) {
                                        $onTimeChecked = $coupon->one_time == 1 ? 'checked' : '';
                                    }
                                @endphp


                                <div class="form-check">

                                    <input class="form-check-input" type="checkbox" {{ $onTimeChecked }} id="onTimeChecked"
                                        name="one_time">
                                    <label class="form-check-label" for="onTimeChecked">
                                        One Time Coupon
                                    </label>
                                </div>


                            </div>



                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <label class="form-label" for="label">Rooms</label>

                                @if (!$coupon)
                                    @php
                                        $couponRooms = [];
                                    @endphp
                                @endif

                                <x-rooms name="room_ids" multiple id="roomSelect" :selected="$couponRooms" :rooms=$rooms>
                                </x-rooms>


                            </div>


                        </div>



                        <div class="row mb-4">


                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Valid From</label>
                                <input type="datetime-local" value="{{ $coupon ? $coupon->valid_from : '' }}"
                                    class="form-control" id="valid_from" name="valid_from">

                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Valid To</label>
                                <input type="datetime-local" value="{{ $coupon ? $coupon->valid_to : '' }}"
                                    class="form-control" id="valid_to" name="valid_to">

                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Release <span class="text-danger">*</span></label>
                                @if ($coupon)
                                    <x-release-component :code="$coupon->release_status" />
                                @else
                                    <x-release-component :code="null" />
                                @endif
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
    <script></script>
@endsection
