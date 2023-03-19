@extends('layouts.front-layout')

@section('page-title', 'Booking')

@section('content')

<booking-component :from_date="'{{ $fromDate }}'" :to_date="'{{ $toDate }}'" :destinations="{{ $destinations }}" :selected_destination="{{ $selectedDestination }}" :enteredPersons="{{ $enteredPersons }}" :all_hotels="{{ $hotels }}"></booking-component>

@endsection
