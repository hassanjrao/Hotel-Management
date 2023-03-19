<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Hotel Management</title>
    <link rel="icon" type="image/png" href="/templates/default/images/favicon.png">


    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">


    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,700">

    <link rel="stylesheet" href="{{ asset('front-assets/plugins/royalslider/royalslider.css') }}" media="all">


    <link rel="stylesheet"
        href="{{ asset('front-assets/plugins/royalslider/skins/minimal-white/rs-minimal-white.css') }}" media="all">


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.min.css">

    <link rel="stylesheet"
        href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('front-assets/css/shortcodes.css') }}">

    <link rel="stylesheet" href="{{ asset('front-assets/css/layout.css') }}">

    <link rel="stylesheet" href="{{ asset('front-assets/css/colors.css') }}" id="colors">

    <link rel="stylesheet" href="{{ asset('front-assets/css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('front-assets/css/custom.css') }}">

    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">


    <script src="//code.jquery.com/jquery-1.12.4.min.js"></script>

    @livewireStyles


</head>

<body id="page-1">


    <!-- <div id="loader-wrapper"><div id="loader"></div></div> -->




    <header class="navbar-fixed-top fixed">

        <div id="mainHeader">

            <div class="container-fluid">
                <div id="mainMenu" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="primary nav-1">
                            <a class="firstLevel active" href="/"
                                title="FREEHOTELROOMS WORLD WIDE Resorts, Luxury Hotels">Home</a>
                        </li>


                        <li class="primary nav-7">
                            <a class="dropdown-toggle disabled firstLevel" href="/hotels" target="_self" title="Hotels">
                                Hotels
                            </a>
                        </li>

                        <li class="primary nav-2">


                            <a class="dropdown-toggle disabled firstLevel" href="/contact" target="_self"
                                title="Contact">

                                Contact
                            </a>


                        </li>

                        @if (!Auth::check())
                            <li class="primary nav-2">


                                <a class="dropdown-toggle disabled firstLevel" href="/contact" target="_self"
                                    title="Contact">

                                    Sign Up
                                </a>
                            </li>
                        @endif

                        <li class="primary nav-2">


                            @if (Auth::check())
                                <a class="dropdown-toggle disabled firstLevel" style="cursor: pointer;"
                                    onclick="document.getElementById('logout-form').submit()">
                                    Log Out
                                </a>
                                <form action="{{ route('logout') }}" id="logout-form" method="POST">
                                    @csrf

                                </form>
                            @else
                                <a class="dropdown-toggle disabled firstLevel" href="{{ route('login') }}"
                                    target="_self" title="Contact">
                                    Login
                                </a>
                            @endif


                        </li>


                    </ul>

                </div>

                <div class="navbar navbar-default">

                    <div class="navbar-header">

                        <a class="navbar-brand" href="/" title="Panda Multi Resorts, Luxury Hotels"><img
                                src="/templates/default/images/logo.png" alt="FREEHOTELROOMS"></a>

                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">

                            <span class="sr-only">Toggle navigation</span>

                            <span class="icon-bar"></span>

                            <span class="icon-bar"></span>

                            <span class="icon-bar"></span>

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </header>



    <div id="vue-app">

        @yield('content')


    </div>

    <footer>

        <section id="mainFooter">

            <div class="container" id="footer">

                <div class="row">

                    <div class="col-md-4">

                        <div class="widget-footer_col_1">
                            <div id="widget-1" class="widget">
                                <div class="widget-title">About us</div>
                                <div class="widget-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget auctor
                                        ipsum. Mauris pharetra neque a mauris commodo, at aliquam leo malesuada.
                                        Maecenas eget elit eu ligula rhoncus dapibus at non erat. In sed velit eget eros
                                        gravida consectetur varius imperdiet lectus.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">

                        <div class="widget-footer_col_2">
                            <div id="widget-3" class="widget">
                                <div class="widget-title">Latest articles</div>
                                <div class="widget-content">
                                    <ul class="nostyle">

                                        <li>
                                            <a href="/about-us/scuba-diving"
                                                title="Dive into unknown waters! - About us"
                                                class="img-container sm pull-left tips">
                                                <img src="/medias/article/small/5/diving.jpg">
                                            </a>
                                        </li>

                                        <li>
                                            <a href="/gallery/first-gallery" title="First gallery - Gallery"
                                                class="img-container sm pull-left tips">
                                                <img src="/medias/article/small/4/sample4.jpg">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">

                        <div class="widget-footer_col_3">
                            <div id="widget-4" class="widget">
                                <div class="widget-content">
                                    <div itemscope itemtype="http://schema.org/Corporation">
                                        <h3 itemprop="name">FREEHOTELROOMS</h3>
                                        <address>
                                            <p>
                                                <span class="fas fa-fw fa-map-marker"></span> <span itemprop="address"
                                                    itemscope itemtype="http://schema.org/PostalAddress">20 – 22
                                                    Wenlock Road, London N1 7GU</span><br> <span
                                                    class="fas fa-fw fa-mobile"></span> <a href="tel:0800-0786064"
                                                    itemprop="telephone" dir="ltr">0800-0786064</a><br> <span
                                                    class="fas fa-fw fa-envelope"></span> <a itemprop="email"
                                                    dir="ltr" href="mailto:admin@wdfp.co.uk">admin@wdfp.co.uk</a>
                                            </p>
                                        </address>
                                    </div>
                                    <p class="lead">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>

        <div id="footerRights">

            <div class="container">

                <div class="row">

                    <div class="col-md-6">

                        <p>

                            &copy; 2023
                            FREEHOTELROOMS All rights reserved
                        </p>

                    </div>

                    <div class="col-md-6">

                        <p class="text-right">

                            <a href="/feed/" target="_blank" title="RSS feed"><i class="fas fa-fw fa-rss"></i></a>


                            <a href="/about-us" title="About us">About us</a>

                            &nbsp;&nbsp;


                            <a href="/contact" title="Contact">Contact</a>

                            &nbsp;&nbsp;




                            <a href="/legal-notices" title="Legal notices">Legal notices</a>

                            &nbsp;&nbsp;


                            <a href="/sitemap" title="Sitemap">Sitemap</a>

                            &nbsp;&nbsp;


                        </p>

                    </div>

                </div>

            </div>

        </div>

    </footer>




    <a href="#" id="toTop"><i class="fas fa-fw fa-angle-up"></i></a>

    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

    <script src="//rawgit.com/tuupola/jquery_lazyload/2.x/lazyload.min.js"></script>

    <script src="{{ asset('front-assets/js/modernizr-2.6.1.min.js') }}"></script>


    <script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        Modernizr.load({

            load: [

                '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js',

                '//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js',

                '//code.jquery.com/ui/1.12.1/jquery-ui.js',


                '//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js',

                '//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js',

                '//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js',



                //Javascripts required by the current model

                "{{ asset('front-assets/plugins/royalslider/jquery.royalslider.min.js') }}",
                "{{ asset('front-assets/plugins/live-search/jquery.liveSearch.js') }}",



                '//unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js',

                "{{ asset('front-assets/plugins/imagefill/js/jquery-imagefill.js') }}",

                "{{ asset('front-assets/plugins/toucheeffect/toucheffects.js') }}",

                '//use.fontawesome.com/releases/v5.15.3/js/all.js'

            ],

            complete: function() {

                Modernizr.load({

                    load: [

                        "{{ asset('front-assets/js/custom.js') }}",

                        "{{ asset('front-assets/js/custom.js') }}"

                    ]

                });

            }

        });
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')


    @livewireScripts

    @yield('scripts')

</body>

</html>
