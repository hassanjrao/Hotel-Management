@extends('layouts.backend')

@php
    $addEdit = isset($service) ? 'Edit' : 'Add';
    $addUpdate = isset($service) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' service')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Service</h3>


                <a href="{{ route('cpanel.services.index') }}" class="btn btn-primary push">All Services</a>


            </div>
            <div class="block-content">

                @if ($service)
                    <form action="{{ route('cpanel.services.update', $service->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('cpanel.services.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">


                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Title<span class="text-danger">*</span></label>
                                <input type="text" value="{{ $service ? $service->title : null }}" class="form-control"
                                    id="title" name="title">
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Price Type<span
                                        class="text-danger">*</span></label>

                                <select name="price_type" class="form-select">

                                    @foreach ($priceTypes as $priceType)
                                        <option value="{{ $priceType['code'] }}"
                                            {{ $service && $service->price_type == $priceType['code'] ? 'selected' : '' }}>
                                            {{ $priceType['name'] }}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Price<span class="text-danger">*</span></label>
                                <input type="number" step=".01" value="{{ $service ? $service->price : null }}"
                                    class="form-control" id="price" name="price">
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 mt-4">
                                <div class="form-check">

                                    <input required class="form-check-input" type="checkbox" {{ $service && $service->is_mandatory ? 'checked' : '' }}
                                        id="is_mandatory" name="is_mandatory">
                                    <label class="form-check-label" for="is_mandatory">
                                        Mandatory <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-4">

                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <label class="form-label" for="label">Room<span class="text-danger">*</span></label>

                                @if (!$service)
                                    @php
                                        $serviceRooms = [];
                                    @endphp
                                @endif

                                <x-rooms multiple name="room_ids" required id="roomSelect" :selected="$serviceRooms" :rooms=$rooms></x-rooms>


                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Start Date<span
                                        class="text-danger">*</span></label>
                                <input type="date" required value="{{ $service ? $service->start_date : '' }}"
                                    class="form-control" id="start_date" name="start_date">
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">End Date<span class="text-danger">*</span></label>
                                <input type="date" required value="{{ $service ? $service->end_date : '' }}"
                                    class="form-control" id="end_date" name="end_date">
                            </div>

                        </div>



                        <div class="row mb-4">

                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Included Tax</label>

                                @if (!$service)
                                    @php
                                        $includedTax = [];
                                    @endphp
                                @else
                                    @php
                                        $includedTax = [$service->included_tax_id];
                                    @endphp
                                @endif

                                <x-taxes name="included_tax_id" required id="includedTax" :selected="$includedTax" :taxes=$taxes>
                                </x-taxes>

                            </div>


                            <div class="col-lg-3 col-md-3 col-sm-12">

                                <label class="form-label" for="label">Added Tax</label>

                                @if (!$service)
                                    @php
                                        $addedTaxes = [];
                                    @endphp
                                @endif

                                <x-taxes name="added_taxes" multiple placeholder="Search & Select Taxes" required
                                    id="addedTaxes" :selected="$addedTaxes" :taxes=$taxes>
                                </x-taxes>

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
        function addChildrenservices() {

            var id = $("#childrenservicesRows tr").length + 1;


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
                                <a onclick="removeChildrenservices(this)"
                                    class="btn btn-sm btn-outline-danger " data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Remove">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>`;

            $("#childrenservicesRows").append(html);


        }


        function removeChildrenservices(element) {

            $(element).parent().parent().remove();

            var id = 1;

            $("#childrenservicesRows tr").each(function() {

                $(this).find("td:first").html(id);

                id++;

            })

        }
    </script>
@endsection
