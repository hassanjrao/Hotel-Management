@extends('layouts.front-layout')

@section('page-title', 'Home')

@section('content')

    <div id="search-home-wrapper">
        <div id="search-home" class="container">

            <form action="/booking" method="post" class="booking-search">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="input-wrapper form-inline">
                            <i class="fas fa-fw fa-map-marker"></i>
                            <div class="input-group">
                                <select name="destination_id" class="form-control js-select2">
                                    <option value="">Select Destination</option>
                                    @foreach ($destinations as $destination)
                                        <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="input-wrapper datepicker-wrapper form-inline">
                            <i class="fas fa-fw fa-calendar hidden-xs"></i>
                            <div class="input-group from-date">
                                <input type="date" class="form-control text-right" id="from_picker" name="from_date"
                                    value="" placeholder="Check in">
                            </div>
                            <i class="fas fa-fw fa-long-arrow-alt-right"></i>
                            <div class="input-group to-date">
                                <input type="date" class="form-control" id="to_picker" name="to_date" value=""
                                    placeholder="Check out">
                            </div>
                        </div>
                        <div class="field-notice" rel="dates"></div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">Adults</div>
                                <input type="number" name="num_adults" class="form-control">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">Children</div>
                                <input type="number" name="num_children" class="form-control">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <button class="btn btn-block btn-primary" type="submit" name="check_availabilities">GO</button>
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
                <div class="infoBlock" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200">
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
                                            src="{{ asset('storage/hotels/' .$hotel->images->first()->image) }}"
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
