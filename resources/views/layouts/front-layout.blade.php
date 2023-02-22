<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">



    <title>Panda Multi Resorts, web software to create and manage multi hotels platforms</title>






    <meta name="description"
        content="A man travels the world over in search of what he needs and returns home to find it. - George A. Moore -">



    <!-- Schema.org markup for Google+ -->

    <meta itemprop="name" content="Panda Multi Resorts, web software to create and manage multi hotels platforms">

    <meta itemprop="description"
        content="A man travels the world over in search of what he needs and returns home to find it. - George A. Moore -">




    <!-- Open Graph data -->

    <meta property="og:title" content="Panda Multi Resorts, web software to create and manage multi hotels platforms">

    <meta property="og:type" content="article">

    <meta property="og:url" content="https://www.wdfp.co.uk/">


    <meta property="og:description"
        content="A man travels the world over in search of what he needs and returns home to find it. - George A. Moore -">

    <meta property="og:site_name" content="FREEHOTELROOMS">




    <meta property="article:author" content="FREEHOTELROOMS">



    <!-- Twitter Card data -->

    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:site" content="@publisher_handle">

    <meta name="twitter:title" content="Panda Multi Resorts, web software to create and manage multi hotels platforms">

    <meta name="twitter:description"
        content="A man travels the world over in search of what he needs and returns home to find it. - George A. Moore -">

    <meta name="twitter:creator" content="@author_handle">




    <meta name="robots" content="index,follow">

    <meta name="viewport" content="width=device-width, initial-scale=1">




    <meta name="autogeolocate" content="true">


    <meta name="gmaps_api_key" content="AIzaSyDminHt06-r8n5tmd0cPtTxtkKtJkAtDNc">




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




</head>

<body id="page-1" itemscope itemtype="http://schema.org/WebPage">



    <!-- Schema.org markup for Google+ -->

    <meta itemprop="name" content="Panda Multi Resorts, web software to create and manage multi hotels platforms">

    <meta itemprop="description"
        content="A man travels the world over in search of what he needs and returns home to find it. - George A. Moore -">




    <!-- <div id="loader-wrapper"><div id="loader"></div></div> -->




    <header class="navbar-fixed-top">

        <div id="mainHeader">

            <div class="container-fluid">

                <div id="secondMenu">

                    <ul class="nav navbar-nav">

                        <li class="primary btn-nav">


                            <a class="popup-modal firstLevel" href="#user-popup">

                                <i class="fas fa-fw fa-power-off"></i>

                            </a>


                        </li>




                        <li class="primary btn-nav">

                            <div class="dropdown">

                                <a class="firstLevel dropdown-toggle" data-toggle="dropdown" href="#">

                                    <i class="fas fa-fw fa-search"></i> <span class="caret"></span>

                                </a>

                                <ul class="dropdown-menu dropdown-menu-right" role="menu">

                                    <li>




                                        <form method="post" action="/search" class="form-inline">

                                            <input type="hidden" name="csrf_token"
                                                value="9728705963e14779bad952.89023491">

                                            <div class="input-group searchWrapper">

                                                <input type="text" class="form-control" name="global-search"
                                                    placeholder="Search">

                                                <span class="input-group-btn">

                                                    <button type="submit" class="btn btn-primary" name="send"><i
                                                            class="fas fa-fw fa-search"></i></button>

                                                </span>

                                            </div>

                                        </form>

                                    </li>

                                </ul>

                            </div>

                        </li>

                    </ul>

                    <div id="user-popup" class="white-popup-block mfp-hide">

                        <div class="fluid-container">

                            <!--<div class="row">

                            <div class="col-xs-12 mb20 text-center">

                                <a class="btn fblogin" href="#"><i class="fas fa-fw fa-facebook"></i> Log in with Facebook</a>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-xs-12 mb20 text-center">

                                - Or -

                            </div>

                        </div>-->

                            <div class="row">

                                <div class="col-xs-12">

                                    <div class="login-form">

                                        <form method="post" action="/" class="ajax-form">

                                            <div class="alert alert-success" style="display:none;"></div>

                                            <div class="alert alert-danger" style="display:none;"></div>

                                            <div class="form-group">

                                                <div class="input-group">

                                                    <div class="input-group-addon"><i class="fas fa-fw fa-user"></i>
                                                    </div>

                                                    <input type="text" class="form-control" name="user"
                                                        value="" placeholder="Username or E-mail *">

                                                </div>

                                                <div class="field-notice" rel="user"></div>

                                            </div>

                                            <div class="form-group">

                                                <div class="input-group">

                                                    <div class="input-group-addon"><i class="fas fa-fw fa-lock"></i>
                                                    </div>

                                                    <input type="password" class="form-control" name="pass"
                                                        value="" placeholder="Password *">

                                                </div>

                                                <div class="field-notice" rel="pass"></div>

                                            </div>

                                            <div class="row mb10">

                                                <div class="col-sm-7 text-left">

                                                    <a class="open-pass-form" href="#">Forgotten
                                                        password?</a><br>

                                                    <a class="open-signup-form" href="#">I sign up</a>

                                                </div>

                                                <div class="col-sm-5 text-right">

                                                    <a href="#" class="btn btn-default sendAjaxForm"
                                                        data-action="/templates/default/common/register/login.php"
                                                        data-refresh="true"><i class="fas fa-fw fa-power-off"></i> Log
                                                        in</a>

                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                    <div class="signup-form">

                                        <form method="post" action="/" class="ajax-form">

                                            <div class="alert alert-success" style="display:none;"></div>

                                            <div class="alert alert-danger" style="display:none;"></div>

                                            <input type="hidden" name="signup_type" value="quick" class="noreset">

                                            <input type="hidden" name="signup_redirect"
                                                value="https://www.wdfp.co.uk/account" class="noreset">

                                            <div class="form-group">

                                                <div class="input-group">

                                                    <div class="input-group-addon"><i class="fas fa-fw fa-user"></i>
                                                    </div>

                                                    <input type="text" class="form-control" name="username"
                                                        value="" placeholder="Username *">

                                                </div>

                                                <div class="field-notice" rel="username"></div>

                                            </div>

                                            <div class="form-group">

                                                <div class="input-group">

                                                    <div class="input-group-addon"><i
                                                            class="fas fa-fw fa-envelope"></i></div>

                                                    <input type="text" class="form-control" name="email"
                                                        value="" placeholder="E-mail *">

                                                </div>

                                                <div class="field-notice" rel="email"></div>

                                            </div>

                                            <div class="form-group">

                                                <div class="input-group">

                                                    <div class="input-group-addon"><i class="fas fa-fw fa-lock"></i>
                                                    </div>

                                                    <input type="password" class="form-control" name="password"
                                                        value="" placeholder="Password *">

                                                </div>

                                                <div class="field-notice" rel="password"></div>

                                            </div>

                                            <div class="form-group">

                                                <div class="input-group">

                                                    <div class="input-group-addon"><i class="fas fa-fw fa-lock"></i>
                                                    </div>

                                                    <input type="password" class="form-control"
                                                        name="password_confirm" value=""
                                                        placeholder="Confirm password *">

                                                </div>

                                                <div class="field-notice" rel="password_confirm"></div>

                                            </div>

                                            <div class="form-group">

                                                <input type="radio" name="hotel_owner" id="hotel_owner_1"
                                                    value="1"> <label for="hotel_owner_1">I am a hotel
                                                    owner</label> &nbsp;

                                                <input type="radio" name="hotel_owner" id="hotel_owner_0"
                                                    value="0"> <label for="hotel_owner_0">I am a traveler</label>

                                            </div>

                                            <div class="row mb10">

                                                <div class="col-sm-7 text-left">

                                                    <a class="open-login-form" href="#">I already have an
                                                        account</a>

                                                </div>

                                                <div class="col-sm-5 text-right">

                                                    <a href="#" class="btn btn-default sendAjaxForm"
                                                        data-action="/templates/default/common/register/signup.php"
                                                        data-clear="true"><i class="fas fa-fw fa-power-off"></i> Sign
                                                        up</a>

                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                    <div class="pass-form">

                                        <form method="post" action="/" class="ajax-form">

                                            <div class="alert alert-success" style="display:none;"></div>

                                            <div class="alert alert-danger" style="display:none;"></div>

                                            <p>Please enter your e-mail address corresponding to your account. A new
                                                password will be sent to you by e-mail.</p>



                                            <div class="form-group">

                                                <div class="input-group">

                                                    <div class="input-group-addon"><i
                                                            class="fas fa-fw fa-envelope"></i></div>

                                                    <input type="text" class="form-control" name="email"
                                                        value="" placeholder="E-mail *">

                                                </div>

                                                <div class="field-notice" rel="email"></div>

                                            </div>

                                            <div class="row mb10">

                                                <div class="col-sm-7 text-left">

                                                    <a class="open-login-form" href="#">Log in</a><br>

                                                    <a class="open-signup-form" href="#">I sign up</a>

                                                </div>

                                                <div class="col-sm-5 text-right">

                                                    <a href="#" class="btn btn-default sendAjaxForm"
                                                        data-action="/templates/default/common/register/reset.php"
                                                        data-refresh="false"><i class="fas fa-fw fa-power-off"></i>
                                                        New password</a>

                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div id="mainMenu" class="collapse navbar-collapse">

                    <ul class="nav navbar-nav">


                        <li class="primary nav-1">


                            <a class="firstLevel active" href="/"
                                title="FREEHOTELROOMS WORLD WIDE Resorts, Luxury Hotels">Home</a>


                        </li>


                        <li class="primary nav-7">


                            <a class="dropdown-toggle disabled firstLevel" href="/hotels" target="_self"
                                title="Hotels">

                                Hotels
                            </a>


                        </li>


                        <li class="primary nav-6">


                            <a class="dropdown-toggle disabled firstLevel" href="/gallery" target="_self"
                                title="Gallery">

                                Gallery
                            </a>


                        </li>


                        <li class="primary nav-10">


                            <a class="dropdown-toggle disabled firstLevel hasSubMenu" href="/destinations"
                                target="_self" title="">

                                Destinations
                                <i class="fa fa-fw fa-angle-down hidden-xs"></i>


                            </a>


                            <span class="dropdown-btn visible-xs"></span>

                            <ul class="subMenu">


                                <li>


                                    <a class="hasSubMenu" href="" target="_self"
                                        title="Countries">Countries</a>


                                    <span class="dropdown-btn visible-xs"></span>

                                    <ul class="subMenu">


                                        <li>


                                            <a class="" href="https://wdfp.co.uk/destinations" target="_blank"
                                                title="United Kingdom">United Kingdom</a>


                                        </li>


                                        <li>


                                            <a class="" href="" target="_self"
                                                title="Canada">Canada</a>


                                        </li>


                                        <li>


                                            <a class="" href="" target="_self"
                                                title="United States">United States</a>


                                        </li>


                                    </ul>


                                </li>


                            </ul>


                        </li>


                        <li class="primary nav-2">


                            <a class="dropdown-toggle disabled firstLevel" href="/contact" target="_self"
                                title="Contact">

                                Contact
                            </a>


                        </li>


                    </ul>

                </div>

                <div class="navbar navbar-default">

                    <div class="navbar-header">

                        {{-- <a class="navbar-brand" href="/" title="Panda Multi Resorts, Luxury Hotels"><img
                                src="/templates/default/images/logo.png" alt="FREEHOTELROOMS"></a> --}}

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


    @yield('content')

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

                "{{ asset('front-assets/plugins/imagefill/js/jquery-imagefill.js')}}",

                "{{ asset('front-assets/plugins/toucheeffect/toucheffects.js')}}",

                '//use.fontawesome.com/releases/v5.15.3/js/all.js'

            ],

            complete: function() {

                Modernizr.load({

                    load: [

                        "{{ asset('front-assets/js/custom.js')}}",

                        "{{ asset('front-assets/js/custom.js')}}"

                    ]

                });

            }

        });
    </script>


</body>

</html>
