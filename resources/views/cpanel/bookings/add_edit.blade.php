@extends('layouts.backend')

@section('page-title', 'Bookin ' . $booking->booking_id)
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">Booking {{ $booking->booking_id }}</h3>


                <a href="{{ route('cpanel.bookings.index') }}" class="btn btn-primary push">All Bookings</a>


            </div>

            <div class="block-content">




                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">

                        <div class="row mb-4">


                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Destination</label>

                                <x-destinations disabled :selected="[$booking->destination_id]" :destinations=$destinations></x-destinations>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Check In</label>
                                <input readonly type="date" value="{{ $booking->from_date }}" class="form-control"
                                    id="check_in" name="check_in">
                                <span class="text-danger" id="check_in_error"></span>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Check Out</label>
                                <input readonly type="date" value="{{ $booking->to_date }}" class="form-control"
                                    id="check_out" name="check_out">
                                <span class="text-danger" id="check_out_error"></span>
                            </div>



                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label class="form-label" for="label">Customer<span class="text-danger"></span></label>


                                <x-users disabled name="user_id" required :selected="[$booking->user_id]" :users=$users>
                                </x-users>

                            </div>

                        </div>

                        <form action="{{ route('cpanel.bookings.update', $booking->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <label class="form-label" for="label" >Booking Status</label>
                                    <select name="booking_status" id="" class="form-select">
                                        @foreach ($bookingStatuses as $bookingStatus)
                                            <option value="{{ $bookingStatus->code }}"
                                                {{ $bookingStatus->code == $booking->status_code ? 'selected' : '' }}>
                                                {{ $bookingStatus->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-12 mt-4">
                                <button type="submit" id="submitBtn"
                                class="btn btn-primary  border">{{ 'Update Booking Status' }}</button>
                                </div>

                            </div>




                        </form>




                    </div>


                </div>







            </div>

        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Booking Details</h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped table-vcenter fs-sm">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 100px;">#</th>
                                <th>Hotel</th>
                                <th class="text-center">Room</th>
                                <th class="text-center">Total Rooms</th>
                                <th class="text-end" style="width: 10%;">Total Persons</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($booking->bookingDetails as $bookingDetail)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td><a
                                            href="{{ route('cpanel.hotels.edit', ['hotel' => $bookingDetail->hotel]) }}"><strong>{{ $bookingDetail->hotel->title }}</strong></a>
                                    </td>
                                    <td class="text-center">
                                        <a
                                            href="{{ route('cpanel.rooms.edit', ['room' => $bookingDetail->room]) }}"><strong>{{ $bookingDetail->room->title }}</strong></a>
                                    </td>
                                    <td class="text-center"><strong>{{ $bookingDetail->total_rooms }}</strong></td>
                                    <td class="text-end"><strong>{{ $bookingDetail->total_persons }}</strong></td>

                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-12">

                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Customer Information</h3>
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="block block-rounded block-bordered">
                                    <div class="block-header border-bottom">
                                        <h3 class="block-title">Membership Number
                                            #{{ $booking->user->member_ship_number }}</h3>
                                    </div>
                                    <div class="block-content">
                                        <div class="fs-4 mb-1">{{ $booking->user->name }}</div>
                                        <address class="fs-sm">
                                            Address: <b>{{ $booking->user->address }}</b><br>
                                            City: <b>{{ $booking->user->city }}</b><br>
                                            Country: <b>{{ $booking->user->country }}</b><br>
                                            Post Code: <b>{{ $booking->user->post_code }}</b><br><br>
                                            <i class="fa fa-phone"></i> {{ $booking->user->mobile }}<br>
                                            <i class="fa fa-envelope-o"></i> <a
                                                href="javascript:void(0)">{{ $booking->user->email }}</a>
                                        </address>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
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
    </script>
@endsection
