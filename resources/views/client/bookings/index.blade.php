@extends('layouts.front-layout')

@section('page-title', 'Booking')

@section('content')

    <div id="search-page" class="mt20 mt20">
        <div class="container" style="padding-top:140px">

            <form action="{{ route('booking.index') }}" method="GET" class="booking-search">

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">Destination</div>
                                <select name="destination" id="" class="form-control" required>
                                    <option value="">Select Destination</option>
                                    @foreach ($destinations as $destination)
                                        <option value="{{ $destination->id }}" {{ $destination->id == $selectedDestination ? 'selected' : '' }}
                                            >{{ $destination->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="input-wrapper datepicker-wrapper form-inline">
                            <div class="input-group from-date">

                                <input type="date" class="form-control hasDatepicker" id="from_picker" name="from_date"
                                    placeholder="Check in" value="{{ $fromDate }}">


                            </div>

                            <i class="fas fa-fw fa-long-arrow-alt-right"></i>
                            <div class="input-group to-date">

                                <input type="date" class="form-control hasDatepicker" id="to_picker" name="to_date"
                                   value="{{ $toDate }}" placeholder="Check out">


                            </div>
                        </div>
                        <div class="field-notice" rel="dates"></div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">Persons</div>
                                <input type="number" name="total_persons" id="" class="form-control"
                                    value="{{ $enteredPersons }}" min="0">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-1 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <button class="btn btn-block btn-primary" type="submit">GO</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>

    <booking-component :from_date="'{{ $fromDate }}'" :to_date="'{{ $toDate }}'"
        :destinations="{{ $destinations }}" :selected_destination="{{ $selectedDestination }}"
        :entered_persons="{{ $enteredPersons }}" :all_hotels="{{ $hotels }}"></booking-component>

@endsection
