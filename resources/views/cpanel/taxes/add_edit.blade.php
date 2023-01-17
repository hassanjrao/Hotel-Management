@extends('layouts.backend')

@php
    $addEdit = isset($tax) ? 'Edit' : 'Add';
    $addUpdate = isset($tax) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' tax')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Tax</h3>


                <a href="{{ route('cpanel.taxes.index') }}" class="btn btn-primary push">All Taxes</a>


            </div>
            <div class="block-content">

                @if ($tax)
                    <form action="{{ route('cpanel.taxes.update', $tax->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('cpanel.taxes.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">

                            <div class="col-lg-4 col-md-4 col-sm-12">

                                <label class="form-label" for="label">Name<span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $tax ? $tax->name : '' }}" class="form-control"
                                    id="name" name="name">

                            </div>




                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-label" for="label">Amount<span class="text-danger">*</span></label>
                                <input type="number" value="{{ $tax ? $tax->amount : '' }}" class="form-control"
                                    id="amount" name="amount" step=".01">
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label class="form-label" for="label">Release <span
                                        class="text-danger">*</span></label>
                                @if ($tax)
                                    <x-release-component :code="$tax->release_status" />
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
    <script>

    </script>
@endsection
