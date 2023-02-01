@extends('layouts.backend')

@section('page-title', 'Dashboard')

@section('content')
    <!-- Hero -->
    {{-- <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Dashboard
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Welcome Admin, everything looks great.
                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">App</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div> --}}
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row row-deck">

            <div class="col-sm-6 col-xxl-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('cpanel.hotels.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $hotels }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Hotels</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">

                                <i class="text-primary fa fa-2x fa-hotel"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('cpanel.hotels.index') }}">
                                <span>View Hotels</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>


            <div class="col-sm-6 col-xxl-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('cpanel.rooms.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $rooms }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Rooms</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-2x fa-bed text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('cpanel.rooms.index') }}">
                                <span>View Rooms</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>




            @if (auth()->user()->hasRole('admin'))
                <div class="col-sm-6 col-xxl-3">
                    <!-- New Customers -->
                    <div class="block block-rounded d-flex flex-column">
                        <a href="{{ route('cpanel.users.index') }}">
                            <div
                                class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                                <dl class="mb-0">
                                    <dt class="fs-3 fw-bold">{{ $users }}</dt>
                                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Users</dd>
                                </dl>
                                <div class="item item-rounded-lg bg-body-light">
                                    <i class="fa fa-2x fa-users text-primary"></i>
                                </div>
                            </div>
                            <div class="bg-body-light rounded-bottom">
                                <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                    href="{{ route('cpanel.users.index') }}">
                                    <span>View Users</span>
                                    <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                                </a>
                            </div>
                        </a>
                    </div>


                </div>
            @endif


            <div class="col-sm-6 col-xxl-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('cpanel.facilities.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $facilities }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Facilities</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fas fa-fw fa-wrench fa-2x text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('cpanel.facilities.index') }}">
                                <span>View Facilities</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>




            <div class="col-sm-6 col-xxl-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('cpanel.destinations.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $destinations }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Destinations</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-2x fa-plane text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('cpanel.destinations.index') }}">
                                <span>View Destinations</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>



            <div class="col-sm-6 col-xxl-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('cpanel.packages.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $packages }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Packages</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class=" fa-2x fas fa-fw fa-suitcase text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('cpanel.packages.index') }}">
                                <span>View Packages</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>



            @if (auth()->user()->hasRole('admin'))
                <div class="col-sm-6 col-xxl-3">
                    <!-- New Customers -->
                    <div class="block block-rounded d-flex flex-column">
                        <a href="{{ route('cpanel.taxes.index') }}">
                            <div
                                class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                                <dl class="mb-0">
                                    <dt class="fs-3 fw-bold">{{ $taxes }}</dt>
                                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Taxes</dd>
                                </dl>
                                <div class="item item-rounded-lg bg-body-light">
                                    <i class="fa fa-2x fa-percent text-primary"></i>
                                </div>
                            </div>
                            <div class="bg-body-light rounded-bottom">
                                <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                    href="{{ route('cpanel.taxes.index') }}">
                                    <span>View Taxes</span>
                                    <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                                </a>
                            </div>
                        </a>
                    </div>


                </div>
            @endif

            <div class="col-sm-6 col-xxl-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('cpanel.rates.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $rates }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Rates</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class=" fa-2x  fas fa-fw fa-calendar text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('cpanel.rates.index') }}">
                                <span>View Rates</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>



            <div class="col-sm-6 col-xxl-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('cpanel.coupons.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $coupons }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Coupons</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-2x fa-tags text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('cpanel.coupons.index') }}">
                                <span>View Coupons</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>


            </div>

        </div>
        <!-- END Page Content -->
    @endsection
