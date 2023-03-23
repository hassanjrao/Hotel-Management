@extends('layouts.front-layout')

@section('page-title', 'Register')

@section('content')
    <div id="content" class="pt30 pb30">
        <div class="container mt20">




            <div class="row">
                <div class="col-sm-12">
                    <ul class="pagination pull-right">
                        <li><a href="{{ route('account.index') }}">My account</a></li>
                        <li class="active"><a href="{{ route('account.bookings') }}">Booking history</a></li>
                    </ul>
                </div>
            </div>
            <fieldset>
                <legend>Booking history</legend>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Booking Reference</th>
                                <th class="text-center">Booking date</th>
                                <th class="text-center">Destination</th>
                                <th class="text-center">From</th>
                                <th class="text-center">Till</th>
                                <th class="text-center">Persons</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">View Details</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($userBookings as $booking)
                                <tr>
                                    <td>{{ $booking->booking_id }}</td>
                                    <td>{{ $booking->created_at }}</td>
                                    <td>{{ $booking->destination->name }}</td>
                                    <td>{{ $booking->from_date }}</td>
                                    <td>{{ $booking->to_date }}</td>
                                    <td class="text-center">{{ $booking->total_persons }}</td>
                                    <th>
                                        <select name="booking_status" class="form-control"
                                            onchange="bookingStatusUpdated(this,{{ $booking->id }},'{{ $booking->booking_id }}')"
                                            {{ $booking->status_code == 'cancelled' ? 'disabled' : ''  }}
                                            >
                                            @foreach ($bookingStatuses as $status)
                                                <option value="{{ $status->code }}"
                                                    {{ $status->code == $booking->status_code ? 'selected' : '' }}>
                                                    {{ $status->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <form action="{{ route("account.cancelBooking") }}" method="POST" id="{{ 'form-'.$booking->id }}">
                                            @csrf
                                            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                        </form>

                                    </th>
                                    <td class="text-center">
                                        <a href="{{ route('account.bookingDetails', ['booking_id' => $booking->id]) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </fieldset>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        function bookingStatusUpdated(e,booking_id,booking_ref) {
            console.log(e.value);

            if(e.value=='pending'){
                return false;
            }

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to cancel this booking "+booking_ref+"!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#form-" + booking_id).submit();
                    // Swal.fire(
                    //     'Deleted!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )
                }
            })
        }
    </script>

@endsection
