@extends('layouts.front-layout')

@section('page-title', 'Home')

@section('content')

    <div id="search-home-wrapper">
        <div id="search-home" class="container">


            <form action="{{ route("booking.index") }}" method="GET" class="booking-search">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-2">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">Destination</div>
                                <select name="destination" id="" class="form-control" required>
                                    <option value="">Select Destination</option>
                                    @foreach ($destinations as $destination)
                                        <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="input-wrapper datepicker-wrapper form-inline">
                            <div class="input-group from-date">
                                <input type="date" class="form-control text-right" id="from_picker"
                                    name="from_date" value="{{ date("Y-m-d") }}" min="{{ date("Y-m-d") }}" placeholder="Check in">
                            </div>
                            <svg class="svg-inline--fa fa-long-arrow-alt-right fa-w-14 fa-fw" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="long-arrow-alt-right" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z">
                                </path>
                            </svg>
                            <!-- <i class="fas fa-fw fa-long-arrow-alt-right"></i> Font Awesome fontawesome.com -->
                            <div class="input-group to-date">
                                <input type="date" class="form-control hasDatepicker" id="to_picker" name="to_date"
                                value="{{ date('Y-m-d', strtotime(' +1 day'))}}" min="{{ date('Y-m-d', strtotime(' +1 day'))}}" placeholder="Check out">
                            </div>
                        </div>
                        <div class="field-notice" rel="dates"></div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">Persons</div>
                                <input type="number" name="total_persons" id="" class="form-control" value="0"
                                    min="0">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12 col-md-offset-4">
                        <div class="form-group">
                            <button class="btn btn-block btn-primary" type="submit">GO</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <section id="sliderContainer">

        <div id="mainSlider" class="royalSlider rsMinW sliderContainer fullWidth clearfix fullSized">

            <div class="rsContent">
                <img class="rsImg" src="{{ asset('front-assets/media/slide/big/6/slide3.jpg') }}" alt="">
                <div class="infoBlock" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200">
                    <h1>Find Hotels, Activities and Tours</h1>

                    <h2>Your whole vacation starts here</h2>
                </div>
            </div>

            <div class="rsContent">
                <img class="rsImg" src="{{ asset('front-assets/media/slide/big/3/slide1.jpg') }}" alt="">
                <div class="infoBlock" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200">
                    <h2>Book your holydays with FREEHOTELROOMS WORDL WIDE Resorts</h2>
                    <h2>Fast, Easy and Powerfull</h2>
                </div>
            </div>

            <div class="rsContent">
                <img class="rsImg" src="{{ asset('front-assets/media/slide/big/4/slide2.jpg') }}" alt="">
                <div class="infoBlock" data-fade-effect="" data-move-offset="10" data-move-effect="bottom"
                    data-speed="200">
                    <h1>A dream stay at the best price</h1>

                    <h2>Best price guarantee</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="content" class="pt20 pb30">
        <div class="container">


            <div class="row">
                <div class="col-md-12 text-center mb30">
                    <h1 itemprop="name">
                        Panda Multi Resorts, Luxury Hotels
                    </h1>
                    <blockquote class="text-center">
                        <p>A man travels the world over in search of what he needs and returns home to find it.</p>
                    </blockquote>

                    <p class="text-muted" style="text-align: center;">- George A. Moore -</p>
                </div>
            </div>


            <div class="row mb10">

                @foreach ($hotels as $hotel)
                    <article class="col-sm-4 mb20">
                        <article itemprop="url" href="/hotels/waterfront" class="moreLink">
                            <figure class="more-link">
                                <div class="img-container  md">

                                    {{-- @dump($hotel->images->first()) --}}

                                    @if ($hotel->images->first())
                                        {{-- @dump("yes") --}}
                                        <img alt=""
                                            src="{{ asset('storage/hotels/' . $hotel->images->first()->image) }}"
                                            width="300" height="170">
                                    @endif

                                </div>
                                <div class="more-content">
                                    <h3 itemprop="name">{{ ucWords($hotel->title) }}</h3>
                                    <div class="more-descr">
                                        <div class="price">
                                            From
                                            <span itemprop="priceRange">
                                                {{ config('app.app_currency') }} {{ $hotel->rates->min('price_per_night') }}
                                            </span>
                                        </div>
                                        <small>Price / night</small>
                                    </div>
                                </div>
                                <div class="more-action">
                                    <div class="more-icon">
                                        <i class="fa fa-link"></i>
                                    </div>
                                </div>
                            </figure>
                            </a>
                        </article>
                    </article>
                @endforeach




            </div>
        </div>

    </section>


@endsection
