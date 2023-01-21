@extends('layouts.backend')

@php
    $addEdit = isset($rate) ? 'Edit' : 'Add';
    $addUpdate = isset($rate) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Rate')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Rate</h3>


                <a href="{{ route('cpanel.rates.index') }}" class="btn btn-primary push">All Rates</a>


            </div>
            <div class="block-content">

                @if ($rate)
                    <form action="{{ route('cpanel.rates.update', $rate->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('cpanel.rates.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Hotel<span class="text-danger">*</span></label>

                                @if (!$rate)
                                    @php
                                        $rateHotels = [];
                                    @endphp
                                @endif

                                <x-hotels name="hotel_id" hotelDependentId="roomSelect" required onchange="hotelRooms"
                                    :selected="$rateHotels" :hotels=$hotels></x-hotels>

                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Room<span class="text-danger">*</span></label>

                                @if (!$rate)
                                    @php
                                        $rateRooms = [];
                                    @endphp
                                @else
                                    @php
                                        $rateRooms = [$rate->room_id];
                                    @endphp
                                @endif

                                <x-rooms name="room_id" required id="roomSelect" :selected="$rateRooms" :rooms=$rooms></x-rooms>


                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Start Date<span
                                        class="text-danger">*</span></label>
                                <input type="date" required value="{{ $rate ? $rate->start_date : '' }}"
                                    class="form-control" id="start_date" name="start_date">
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">End Date<span class="text-danger">*</span></label>
                                <input type="date" required value="{{ $rate ? $rate->end_date : '' }}"
                                    class="form-control" id="end_date" name="end_date">
                            </div>

                        </div>


                        <div class="row mb-4">

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Package<span class="text-danger">*</span></label>

                                @if (!$rate)
                                    @php
                                        $ratePackages = [];
                                    @endphp
                                @else
                                    @php
                                        $ratePackages = [$rate->package_id];
                                    @endphp
                                @endif

                                <x-packages name="package_id" required required id="packageId" :selected="$ratePackages"
                                    :packages=$packages>
                                </x-packages>

                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Price Per Night<span
                                        class="text-danger">*</span></label>
                                <input type="number" step=".01" required
                                    value="{{ $rate ? $rate->price_per_night : 0 }}" class="form-control"
                                    id="price_per_night" name="price_per_night">

                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Total People</label>
                                <input type="number" value="{{ $rate ? $rate->total_people : null }}" class="form-control"
                                    id="total_people" name="total_people" min="0">
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Price / extra adult / night</label>
                                <input type="number" value="{{ $rate ? $rate->price_extra_adult : '' }}"
                                    class="form-control" id="price_extra_adult" name="price_extra_adult" min="0"
                                    step=".01">
                                <span class="text-danger" id="price_extra_adult_error"></span>
                            </div>


                        </div>

                        <div class="row mb-4">



                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Price / extra child / night</label>
                                <input type="number" value="{{ $rate ? $rate->price_extra_child : '' }}"
                                    class="form-control" id="price_extra_child" name="price_extra_child" min="0"
                                    step=".01">
                                <span class="text-danger" id="price_extra_child_error"></span>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Fixed supplement / stay</label>
                                <input type="number" value="{{ $rate ? $rate->fixed_supplement : '' }}"
                                    class="form-control" id="fixed_supplement" name="fixed_supplement" min="0">
                                <span class="text-danger" id="fixed_supplement_error"></span>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Discount</label>
                                <input type="number" value="{{ $rate ? $rate->discount : null }}" class="form-control"
                                    id="discount" name="discount" min="0">
                                <span class="text-danger" id="discount_error"></span>
                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Discount Type</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="discount_type"
                                        id="fixedDiscount" value="fixed" {{ $rate ? $rate->discount_type=="fixed" ? "checked" : "" : "" }}>
                                    <label class="form-check-label" for="fixedDiscount">
                                        Fixed
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="discount_type" id="perDiscount"
                                        value="percentage" {{ $rate ? $rate->discount_type=="percentage" ? "checked" : "" : "" }}>
                                    <label class="form-check-label" for="perDiscount">
                                        Percentage
                                    </label>
                                </div>

                            </div>

                        </div>




                        <div class="row mb-4">




                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Included Tax</label>

                                @if (!$rate)
                                    @php
                                        $includedTax = [];
                                    @endphp
                                @else
                                    @php
                                        $includedTax = [$rate->included_tax_id];
                                    @endphp
                                @endif

                                <x-taxes name="included_tax_id" required id="includedTax" :selected="$includedTax" :taxes=$taxes>
                                </x-taxes>

                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Added Tax</label>

                                @if (!$rate)
                                    @php
                                        $addedTaxes = [];
                                    @endphp
                                @endif

                                <x-taxes name="added_taxes" multiple placeholder="Search & Select Taxes" required
                                    id="addedTaxes" :selected="$addedTaxes" :taxes=$taxes>
                                </x-taxes>

                            </div>





                        </div>


                        <div class="row mb-4">

                            <label class="form-label" for="label">
                                Children's Rates
                                <a onclick="addChildrenRates()" class="btn btn-sm btn-outline-success "
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Add More">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </label>

                            <div class="table-responsive">

                                <table class="table table-bordered table-stripped">

                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Age Min</td>
                                            <td>Age Max</td>
                                            <td>Price</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>

                                    <tbody id="childrenRatesRows">

                                        @forelse ($childrenRates as $childrenRate)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <input type="number" class="form-control" name="min_ages[]"
                                                        class="form-control" value="{{ $childrenRate->age_min }}">


                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="max_ages[]"
                                                        class="form-control" value="{{ $childrenRate->age_max }}">
                                                </td>
                                                <td>
                                                    <input required type="number" min="0" step=".01"
                                                        class="form-control" name="child_prices[]"
                                                        value="{{ $childrenRate->price }}">

                                                </td>
                                                <td>
                                                    <a onclick="removeChildrenRates(this)"
                                                        class="btn btn-sm btn-outline-danger " data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Remove">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                        @empty
                                        @endforelse

                                    </tbody>

                                </table>

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
        function addChildrenRates() {

            var id = $("#childrenRatesRows tr").length + 1;


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
                                <a onclick="removeChildrenRates(this)"
                                    class="btn btn-sm btn-outline-danger " data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Remove">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>`;

            $("#childrenRatesRows").append(html);


        }


        function removeChildrenRates(element) {

            $(element).parent().parent().remove();

            var id = 1;

            $("#childrenRatesRows tr").each(function() {

                $(this).find("td:first").html(id);

                id++;

            })

        }
    </script>
@endsection
