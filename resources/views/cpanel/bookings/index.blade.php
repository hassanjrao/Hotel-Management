@extends('layouts.backend')
@section('page-title', 'bookings')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Bookings
                </h3>



                {{-- <a href="{{ route('cpanel.bookings.create') }}" class="btn btn-primary push">Add</a> --}}

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Booking Id</th>
                                <th>Customer Name</th>
                                <th>Destination</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Total Persons</th>
                                <th>Total Rooms</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($bookings as $ind => $booking)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $booking->booking_id }}</td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->destination->name }}</td>
                                    <td>{{ $booking->from_date }}</td>
                                    <td>{{ $booking->to_date }}</td>
                                    <td>{{ $booking->total_persons }}</td>
                                    <td>{{ $booking->total_rooms }}</td>
                                    <td>
                                        @if ($booking->status_code == 'confirmed')
                                            @php
                                                $color = 'bg-success';
                                            @endphp
                                        @elseif($booking->status_code == 'cancelled')
                                            @php
                                                $color = 'bg-danger';
                                            @endphp
                                        @elseif($booking->status_code == 'pending')
                                            @php
                                                $color = 'bg-warning';
                                            @endphp
                                        @endif

                                        <span class="badge {{ $color }}">{{ $booking->status_code }}</span>
                                    </td>
                                    <td>{{ $booking->created_at }}</td>
                                    <td>{{ $booking->updated_at }}</td>

                                    <td>
                                        <div class="btn-group me-2 mb-2" role="group" aria-label="Icons Outline Text group">

                                            <a href={{ route('cpanel.bookings.edit', ['booking' => $booking]) }}
                                                class="btn btn-xs btn-outline-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            {{-- <form id="form-{{ $booking->id }}"
                                                action="{{ route('cpanel.bookings.destroy', $booking->id) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <a onclick="confirmDelete({{ $booking->id }})"
                                                    class="btn btn-xs btn-outline-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>

                                            </form> --}}


                                        </div>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>







    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection
