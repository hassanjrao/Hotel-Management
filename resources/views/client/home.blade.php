@extends('layouts.front-layout')

@section("page-title", "Home")

@section('content')
    <!-- Banner Area -->
    <div class="banner-area">
        <div class="container">
            
            <div class="banner-content">
                <h1>Discover a Hotel & Resort to Book a Suitable Room</h1>
                <p>
                    The hotel and resort business is one of the best and loyal business in the global market.
                    We are the agency that helps to book you a good room in a suitable palace at a reasonable price.
                </p>
                <div class="banner-btn">
                    <a href="#" class="default-btn btn-bg-one border-radius-5">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->

    <!-- Banner Form Area -->
    <div class="banner-form-area">
        <div class="container">
            <div class="banner-form">
                <form>
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label>CHECK IN TIME</label>
                                <div class="input-group">
                                    <input id="datetimepicker" type="text" class="form-control" placeholder="11/02/2020">
                                    <span class="input-group-addon"></span>
                                </div>
                                <i class='bx bxs-chevron-down'></i>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label>CHECK OUT TIME</label>
                                <div class="input-group">
                                    <input id="datetimepicker-check" type="text" class="form-control"
                                        placeholder="11/02/2020">
                                    <span class="input-group-addon"></span>
                                </div>
                                <i class='bx bxs-chevron-down'></i>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2">
                            <div class="form-group">
                                <label>GUESTS</label>
                                <select class="form-control">
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <button type="submit" class="default-btn btn-bg-one border-radius-5">
                                Check Arability
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Banner Form Area End -->

    <!-- About Area -->
    <div class="about-area pt-100 pb-70">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="{{ asset('front-assets/img/about/about-img.jpg') }}" alt="Images">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title">
                            <span>About Us</span>
                            <h2>We Are More Than 20+ Global Exp. And We Have a Lots of Reasons Into The Choose Us From Other
                            </h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tristique augue quis
                                neque ornare fermentum.
                                In sit amet mattis diam. Sed id aliquam nulla. In porttitor et turpis non pretium.
                            </p>
                        </div>

                        <ul>
                            <li>
                                <i class="flaticon-restaurant"></i>
                                <div class="content">
                                    <h3>Restaurant Facilities</h3>
                                    <p>
                                        We are one of the best company in the global market and we have a restaurant
                                        facilities for all of our guides and all of our guests.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <i class="flaticon-wifi-signal-1"></i>
                                <div class="content">
                                    <h3>Free Wifi Facilities</h3>
                                    <p>
                                        This is the place where you will get a free wifi zone on a reasonable price and this
                                        will help you to make a colourful happy moments.
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <a href="#" class="default-btn btn-bg-one border-radius-5">Read More</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- About Area End -->

    <!-- Services Area -->
    <div class="services-area pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span>Our Services</span>
                <h2>Our Services on the Global Market for Our Client's Reservation</h2>
            </div>
            <div class="services-slider owl-carousel owl-theme pt-45">
                <div class="services-item">
                    <i class="flaticon-hotel"></i>
                    <h3><a href="service-details.html">Hotel Room Reservation into the Desire Places</a></h3>
                    <p>You can easily reserve a hotel room in a suitable place as you want. This will be able to make good
                        feelings.</p>
                    <a href="service-details.html" class="get-btn">Get Service</a>
                </div>

                <div class="services-item">
                    <i class="flaticon-resort"></i>
                    <h3><a href="service-details.html">Resort Reservation Into a Suitable Place</a></h3>
                    <p>One can easily reserve a resort room in a suitable place as you want. This will be able to make good
                        feelings.</p>
                    <a href="service-details.html" class="get-btn">Get Service</a>
                </div>

                <div class="services-item">
                    <i class="flaticon-buildings"></i>
                    <h3><a href="service-details.html">Weeding Hall Reservation in the Suitable Place</a></h3>
                    <p>Weeding hall reservation is possible in a suitable place as you want. This will be able to make good
                        feelings.</p>
                    <a href="service-details.html" class="get-btn">Get Service</a>
                </div>

                <div class="services-item">
                    <i class="flaticon-calendar"></i>
                    <h3><a href="service-details.html">Book Now to Secure Availability Time Now</a></h3>
                    <p>You can easily reserve a hotel room in a suitable place as you want. This will be able to make good
                        feelings.</p>
                    <a href="service-details.html" class="get-btn">Get Service</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Area End -->

    <!-- Reservation Area -->
    <div class="reservation-area section-bg pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="reservation-content">
                        <div class="section-title">
                            <h2> <a href="reservation.html">You Easily Reserve the Desire Things That Makes All of Your
                                    Happiness & Joys</a></h2>
                            <p>
                                This is one of the most important and crucial facts that helps us to make one of the booking
                                easily. This booking will help you to make your journey and
                                trip period easily. This will help you to make a journey more easier and that an easier
                                journey is more useful for you. So, let's start!
                            </p>
                        </div>
                        <a href="#" class="default-btn btn-bg-one border-radius-5">Quick Booking</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="reservation-img">
                        <img src="{{ asset('front-assets/img/reservation/reservation-img.jpg') }}" alt="Images">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Reservation Area End -->

    <!-- Specialty Area End -->
    <div class="specialty-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span>SPECIALTY</span>
                <h2>Our Specialization Sectors & All of the Other Details</h2>
            </div>

            <div class="row pt-45 align-items-center">
                <div class="col-lg-6 col-xxl-7">
                    <div class="specialty-img">
                        <img src="{{ asset('front-assets/img/specialty/specialty-img1.jpg') }}" alt="Images">
                    </div>
                </div>

                <div class="col-lg-6 col-xxl-5">
                    <div class="specialty-list">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="specialty-list-card">
                                    <i class="flaticon-decoration"></i>
                                    <h3>Well Decoration</h3>
                                    <p>We are very careful about our room and all of the resort decorations. So, try us.</p>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="specialty-list-card">
                                    <i class="flaticon-champagne-glass"></i>
                                    <h3>Luxury Bar</h3>
                                    <p>You can easily enjoy free access to a superstar bar at a reasonable price.</p>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="specialty-list-card">
                                    <i class="flaticon-fireworks"></i>
                                    <h3>5 Stars Rettings</h3>
                                    <p>Atoli is a Well Known Agency and the Agency is One of the Best by 5 Star Retting.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Specialty Area End -->

    <!-- Room Area -->
    <div class="room-area pt-100 pb-70 section-bg">
        <div class="container">
            <div class="section-title text-center">
                <span>ROOMS</span>
                <h2>Our Rooms & Rates</h2>
            </div>
            <div class="row pt-45">
                <div class="col-lg-4 col-md-6">
                    <div class="room-card">
                        <a href="room-details.html">
                            <img src="{{ asset('front-assets/img/room/room-img1.jpg') }}" alt="Images">
                        </a>
                        <div class="content">
                            <h3><a href="room-details.html">Luxury Room</a></h3>
                            <ul>
                                <li>320</li>
                                <li>Per Night</li>
                            </ul>
                            <div class="rating">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star-half'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="room-card">
                        <a href="room-details.html">
                            <img src="{{ asset('front-assets/img/room/room-img2.jpg') }}" alt="Images">
                        </a>
                        <div class="content">
                            <h3><a href="room-details.html">Single Room</a></h3>
                            <ul>
                                <li>300</li>
                                <li>Per Night</li>
                            </ul>
                            <div class="rating">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star-half'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="room-card">
                        <a href="room-details.html">
                            <img src="{{ asset('front-assets/img/room/room-img3.jpg') }}" alt="Images">
                        </a>
                        <div class="content">
                            <h3><a href="room-details.html">Double Room</a></h3>
                            <ul>
                                <li>350</li>
                                <li>Per Night</li>
                            </ul>
                            <div class="rating">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star-half'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="room-card">
                        <a href="room-details.html">
                            <img src="{{ asset('front-assets/img/room/room-img4.jpg') }}" alt="Images">
                        </a>
                        <div class="content">
                            <h3><a href="room-details.html">Family Room</a></h3>
                            <ul>
                                <li>370</li>
                                <li>Per Night</li>
                            </ul>
                            <div class="rating">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star-half'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="room-card">
                        <a href="room-details.html">
                            <img src="{{ asset('front-assets/img/room/room-img5.jpg') }}" alt="Images">
                        </a>
                        <div class="content">
                            <h3><a href="room-details.html">Deluxe Room</a></h3>
                            <ul>
                                <li>270</li>
                                <li>Per Night</li>
                            </ul>
                            <div class="rating">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star-half'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="room-card">
                        <a href="room-details.html">
                            <img src="{{ asset('front-assets/img/room/room-img6.jpg') }}" alt="Images">
                        </a>
                        <div class="content">
                            <h3><a href="room-details.html">Presidential Room</a></h3>
                            <ul>
                                <li>270</li>
                                <li>Per Night</li>
                            </ul>
                            <div class="rating">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star-half'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Room Area End -->

    <!-- Testimonials Area -->
    <div class="testimonials-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span>TESTIMONIALS</span>
                <h2>Our Latest Testimonials and What Our Client Says</h2>
            </div>
            <div class="testimonials-slider owl-carousel owl-theme pt-45">
                <div class="testimonials-item">
                    <i class="flaticon-left-quote"></i>
                    <p>
                        You can easily make a good and easily the best service from this agency. This is one
                        of the best and crucial service for us.
                    </p>
                    <ul>
                        <li>
                            <img src="{{ asset('front-assets/img/testimonials/testimonials-img1.jpg') }}" alt="Images">
                            <h3>Mary Marden</h3>
                            <span>New York City</span>
                        </li>
                    </ul>
                </div>

                <div class="testimonials-item">
                    <i class="flaticon-left-quote"></i>
                    <p>
                        You can easily make a good and easily the best service from this agency. This is one
                        of the best and crucial service for us.
                    </p>
                    <ul>
                        <li>
                            <img src="{{ asset('front-assets/img/testimonials/testimonials-img2.jpg') }}" alt="Images">
                            <h3>Harriet Johnson</h3>
                            <span>London City</span>
                        </li>
                    </ul>
                </div>

                <div class="testimonials-item">
                    <i class="flaticon-left-quote"></i>
                    <p>
                        You can easily make a good and easily the best service from this agency. This is one
                        of the best and crucial service for us.
                    </p>
                    <ul>
                        <li>
                            <img src="{{ asset('front-assets/img/testimonials/testimonials-img3.jpg') }}" alt="Images">
                            <h3>Tyrone Morgan</h3>
                            <span>New Jersey</span>
                        </li>
                    </ul>
                </div>

                <div class="testimonials-item">
                    <i class="flaticon-left-quote"></i>
                    <p>
                        You can easily make a good and easily the best service from this agency. This is one
                        of the best and crucial service for us.
                    </p>
                    <ul>
                        <li>
                            <img src="{{ asset('front-assets/img/testimonials/testimonials-img4.jpg') }}" alt="Images">
                            <h3>Julia Rose</h3>
                            <span>Budapest</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials Area End -->

    <!-- FAQ Area -->
    <div class="faq-area pt-100 pb-70 section-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xxl-7">
                    <div class="faq-img">
                        <img src="{{ asset('front-assets/img/faq/faq-img1.jpg') }}" alt="Images">
                    </div>
                </div>

                <div class="col-lg-6 col-xxl-5">
                    <div class="faq-content">
                        <div class="section-title">
                            <h2>Let's Start a Free of Questions And Get a Quick Support That Will Help You to Know Us</h2>
                        </div>

                        <div class="faq-accordion">
                            <ul class="accordion">
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class='bx bx-plus'></i>
                                        How I Will Book a Room or Resort?
                                    </a>

                                    <div class="accordion-content">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam at diam leo.
                                            Mauris a ante placerat,
                                            dignissim orci eget, viverra ante. Mauris ornare pellentesque augue. Curabitur
                                            leo nibh, ultrices
                                            vel ultricies eu, vulputate at felis.
                                        </p>
                                    </div>
                                </li>

                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class='bx bx-plus'></i>
                                        How I Will Be Able to Add on the Admin Portal?
                                    </a>

                                    <div class="accordion-content">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam at diam leo.
                                            Mauris a ante placerat,
                                            dignissim orci eget, viverra ante. Mauris ornare pellentesque augue. Curabitur
                                            leo nibh, ultrices
                                            vel ultricies eu, vulputate at felis.
                                        </p>
                                    </div>
                                </li>

                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class='bx bx-plus'></i>
                                        What are the Benefits of These Agencies?
                                    </a>

                                    <div class="accordion-content">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam at diam leo.
                                            Mauris a ante placerat,
                                            dignissim orci eget, viverra ante. Mauris ornare pellentesque augue. Curabitur
                                            leo nibh, ultrices
                                            vel ultricies eu, vulputate at felis.
                                        </p>
                                    </div>
                                </li>

                                <li class="accordion-item">
                                    <a class="accordion-title active" href="javascript:void(0)">
                                        <i class='bx bx-plus'></i>
                                        How I Will Make Payment for Room Book?
                                    </a>

                                    <div class="accordion-content show">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam at diam leo.
                                            Mauris a ante placerat,
                                            dignissim orci eget, viverra ante. Mauris ornare pellentesque augue. Curabitur
                                            leo nibh, ultrices
                                            vel ultricies eu, vulputate at felis.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ Area End -->

    <!-- Team Area -->
    <div class="team-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span>TEAM</span>
                <h2>Let's Meet Up With Our Special Team Members</h2>
            </div>
            <div class="team-slider owl-carousel owl-theme pt-45">
                <div class="team-item">
                    <a href="team.html">
                        <img src="{{ asset('front-assets/img/team/team-img1.jpg') }}" alt="Images">
                    </a>
                    <div class="content">
                        <h3><a href="team.html">Tom Shumate</a></h3>
                        <span>Manager</span>
                        <ul class="social-link">
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="team-item">
                    <a href="team.html">
                        <img src="{{ asset('front-assets/img/team/team-img2.jpg') }}" alt="Images">
                    </a>
                    <div class="content">
                        <h3><a href="team.html">Carrie Horton</a></h3>
                        <span>Chief Reception Officer</span>
                        <ul class="social-link">
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="team-item">
                    <a href="team.html">
                        <img src="{{ asset('front-assets/img/team/team-img3.jpg') }}" alt="Images">
                    </a>
                    <div class="content">
                        <h3><a href="team.html">Brian Orlando</a></h3>
                        <span>Housekeeping</span>
                        <ul class="social-link">
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="team-item">
                    <a href="team.html">
                        <img src="{{ asset('front-assets/img/team/team-img4.jpg') }}" alt="Images">
                    </a>
                    <div class="content">
                        <h3><a href="team.html">Michael Evens</a></h3>
                        <span>Housekeeping</span>
                        <ul class="social-link">
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Area End -->

    <!-- Blog Area -->
    <div class="blog-area pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span>BLOGS</span>
                <h2>Our Latest Blogs to the Intranational Journal at a Glance</h2>
            </div>
            <div class="row pt-45">
                <div class="col-lg-6">
                    <div class="blog-card">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-4 p-0">
                                <div class="blog-img">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('front-assets/img/blog/blog-img1.jpg') }}" alt="Images">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-8 p-0">
                                <div class="blog-content">
                                    <span>October 08, 2020</span>
                                    <h3>
                                        <a href="blog-details.html">Hotel Management is the Best Policy</a>
                                    </h3>
                                    <p>This is one of the best & quality full hotels in the world that will help you to make
                                        a good market.</p>
                                    <a href="blog-details.html" class="read-btn">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="blog-card">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-4 p-0">
                                <div class="blog-img">
                                    <a href="blog-details.html">
                                        <img src="{{ asset('front-assets/img/blog/blog-img2.jpg') }}" alt="Images">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-8 p-0">
                                <div class="blog-content">
                                    <span>October 11, 2020</span>
                                    <h3>
                                        <a href="blog-details.html">3d Hotel Models Have a Royal Model</a>
                                    </h3>
                                    <p>Hotel has made a revolutionary into the global market by making a 3D model on the
                                        hotel.</p>
                                    <a href="blog-details.html" class="read-btn">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Area End -->
@endsection
