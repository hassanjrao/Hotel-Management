@extends('layouts.front-layout')

@section('page-title', 'Register')

@section('content')
    <div id="content" class="pt30 pb30">
        <div class="container mt20">


            <div class="row">
                <div class="col-sm-12">
                    <ul class="pagination pull-right">
                        <li><a href="{{ route("account.index") }}">My account</a></li>
                        <li class="active"><a href="{{ route("account.bookings") }}">Booking history</a></li>
                    </ul>
                </div>
            </div>
            <fieldset>
                <legend>Booking {{ $booking->booking_id }}</legend>
                <div class="white-popup-block" id="popup-booking-14">

                    <h2>Booking summary</h2>
                    <a href="#" onclick="javascript:printElem('popup-booking-14');return false;"
                        class="pull-right print-btn"><i class="fa fa-print"></i></a>

                    <table class="table table-responsive table-bordered">
                        <tr>
                            <th width="50%">Booking details</th>
                            <th width="50%">Billing address</th>
                        </tr>
                        <tr>
                            <td>Check in: <strong>{{ $booking->from_date }}</strong><br>
                                Check out: <strong>{{ $booking->to_date }}</strong><br>
                                Persons: <strong>{{ $booking->total_persons }}</strong>
                            </td>
                            <td>
                                {{ $booking->user->name }}<br>{{ $booking->user->address }}<br>
                                {{ $booking->user->city }}, {{ $booking->user->country }}<br>
                                Mobile : {{ $booking->user->mobile }}<br>E-mail : {{ $booking->user->email }}
                            </td>
                        </tr>
                    </table>
                    <table class="table table-responsive table-bordered">
                        <tr>
                            <th>Hotel</th>
                            <th>Room</th>
                            <th>Rooms</th>
                            <th class="text-center">Persons</th>
                        </tr>
                        @foreach ($booking->bookingDetails as $bookingDetail)
                            <tr>
                                <td>{{ $bookingDetail->hotel->title }}</td>
                                <td>
                                    {{ $bookingDetail->room->title }}
                                </td>
                                <td>
                                    {{ $bookingDetail->total_rooms }}
                                </td>
                                <td class="text-right" width="15%">{{ $booking->total_persons }}</td>
                            </tr>
                        @endforeach
                    </table>
                    {{-- <table class="table table-responsive table-bordered">
                        <tr>
                            <th class="text-right">VAT</th>
                            <td class="text-right">US$0.27</td>
                        </tr>
                        <tr>
                            <th class="text-right">Total (incl. tax)</th>
                            <td class="text-right" width="15%"><b>US$3.00</b></td>
                        </tr>
                    </table> --}}
                    {{-- <p><strong>Payment</strong>
                    <p>
                    <p>Payment method : check<br>Status: Payed<br>
                    <table class="table table-responsive table-bordered">
                        <tr>
                            <th>Date</th>
                            <th>Payment method</th>
                            <th class="text-center">Amount</th>
                        </tr>
                        <tr>
                            <td>2022-12-20 12:00am</td>
                            <td>check</td>
                            <td class="text-right" width="15%">US$3.27</td>
                        </tr>
                    </table>Payment date : 1970-01-01 12:00am<br></p> --}}
                </div>
            </fieldset>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function printElem(elem) {
            var popup = window.open('', 'print', 'height=800,width=600');
            popup.document.write('<html><head><title>' + document.title +
                '</title><link rel="stylesheet" href="/templates/default/css/print.css"/></head><body>' + document
                .getElementById(elem).innerHTML + '</body></html>');
            setTimeout(function() {
                popup.document.close();
                popup.focus();
                popup.print();
                popup.close();
            }, 600);
            return true;
        }
    </script>

@endsection
