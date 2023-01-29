<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>@yield('page-title', 'Admin Panel Hotel Management')</title>

    <meta name="description"
        content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    <!-- Fonts and Styles -->
    @yield('css_before')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="{{ asset('/css/themes/amethyst.css') }}"> -->

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>

    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">



    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">


    <link rel="stylesheet" href="{{ asset('js/plugins/dropzone/min/dropzone.min.css') }}">

    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />

    <link href="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css" rel="stylesheet" />



    <link rel="stylesheet" id="css-main" href="{{ asset('/css/oneui.css') }}">



    @yield('css_after')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
</head>

<body>
    <!-- Page Container -->
    <!--
            Available classes for #page-container:

        GENERIC

            'remember-theme'                            Remembers active color theme between pages using localStorage (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-dark'                              Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Light themed Header
            'page-header-dark'                          Dark themed Header

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

        DARK MODE

            'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
        -->
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
        <!-- Side Overlay-->
        <aside id="side-overlay" class="fs-sm">
            <!-- Side Header -->
            <div class="content-header border-bottom">
                <!-- User Avatar -->
                <a class="img-link me-1" href="javascript:void(0)">
                    <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar10.jpg') }}"
                        alt="">
                </a>
                <!-- END User Avatar -->

                <!-- User Info -->
                <div class="ms-2">
                    <a class="text-dark fw-semibold fs-sm" href="javascript:void(0)">{{ auth()->user()->name }}</a>
                </div>
                <!-- END User Info -->

                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="ms-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout"
                    data-action="side_overlay_close">
                    <i class="fa fa-fw fa-times"></i>
                </a>
                <!-- END Close Side Overlay -->
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="content-side">
                <p>
                    Content..
                </p>
            </div>
            <!-- END Side Content -->
        </aside>
        <!-- END Side Overlay -->

        <!-- Sidebar -->
        <!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="content-header">
                <!-- Logo -->
                <a class="font-semibold text-dual" href="/">
                    <span class="smini-visible">
                        <i class="fa fa-circle-notch text-primary"></i>
                    </span>
                    <span class="smini-hide fs-5 tracking-wider">Admin<span class="fw-normal"> Panel</span></span>
                </a>
                <!-- END Logo -->

                <!-- Extra -->
                <div>
                    <!-- Dark Mode -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->

                    <!-- END Dark Mode -->



                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout"
                        data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-fw fa-times"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Extra -->
            </div>
            <!-- END Side Header -->

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">
                <!-- Side Navigation -->
                <div class="content-side">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('cpanel') || request()->is('cpanel/dashboard') || request()->is('dashboard') ? ' active' : '' }}"
                                href="{{ route('cpanel.dashboard') }}">
                                <i class="nav-main-link-icon fas fa-fw fa-tachometer-alt"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->segment(2)=='hotels' ? ' active' : '' }}"
                                href="{{ route('cpanel.hotels.index') }}">
                                <i class="nav-main-link-icon fa fa-hotel"></i>
                                <span class="nav-main-link-name">Hotels</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->segment(2)=='rooms' ? ' active' : '' }}"
                                href="{{ route('cpanel.rooms.index') }}">
                                <i class="nav-main-link-icon fa fa-bed"></i>
                                <span class="nav-main-link-name">Rooms</span>
                            </a>
                        </li>


                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->segment(2)=='users' ? ' active' : '' }}"
                                href="{{ route('cpanel.users.index') }}">
                                <i class="nav-main-link-icon fa fa-users"></i>
                                <span class="nav-main-link-name">Users</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->segment(2)=='facilities' ? ' active' : '' }}"
                                href="{{ route('cpanel.facilities.index') }}">
                                <i class="nav-main-link-icon si si-settings"></i>
                                <span class="nav-main-link-name">Facilities</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->segment(2)=='destinations' ? ' active' : '' }}"
                                href="{{ route('cpanel.destinations.index') }}">
                                <i class="nav-main-link-icon fa fa-plane"></i>
                                <span class="nav-main-link-name">Destiantions</span>
                            </a>
                        </li>


                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->segment(2)=='packages' ? ' active' : '' }}"
                                href="{{ route('cpanel.packages.index') }}">
                                <i class="nav-main-link-icon fas fa-fw fa-suitcase"></i>
                                <span class="nav-main-link-name">Packages</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->segment(2)=='taxes' ? ' active' : '' }}"
                                href="{{ route('cpanel.taxes.index') }}">
                                <i class="nav-main-link-icon fa fa-percent"></i>
                                <span class="nav-main-link-name">Taxes</span>
                            </a>
                        </li>



                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->segment(2)=='rates' ? ' active' : '' }}"
                                href="{{ route('cpanel.rates.index') }}">
                                <i class="nav-main-link-icon fas fa-fw fa-calendar"></i>
                                <span class="nav-main-link-name">Rates</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->segment(2)=='coupons' ? ' active' : '' }}"
                                href="{{ route('cpanel.coupons.index') }}">
                                <i class="nav-main-link-icon fa fa-tags"></i>
                                <span class="nav-main-link-name">Coupons</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->segment(2)=='activities' ? ' active' : '' }}"
                                href="{{ route('cpanel.activities.index') }}">
                                <i class="nav-main-link-icon fas fa-fw fa-ticket-alt"></i>
                                <span class="nav-main-link-name">Activities</span>
                            </a>
                        </li>


                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->segment(2)=='services' ? ' active' : '' }}"
                                href="{{ route('cpanel.services.index') }}">
                                <i class="nav-main-link-icon fas fa-fw fa-thumbs-up"></i>
                                <span class="nav-main-link-name">Services</span>
                            </a>
                        </li>




                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="d-flex align-items-center">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Toggle Mini Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block"
                        data-toggle="layout" data-action="sidebar_mini_toggle">
                        <i class="fa fa-fw fa-ellipsis-v"></i>
                    </button>
                    <!-- END Toggle Mini Sidebar -->




                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="d-flex align-items-center">
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block ms-2">
                        <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle" src="{{ asset('media/avatars/avatar10.jpg') }}"
                                alt="Header Avatar" style="width: 21px;">
                            <span class="d-none d-sm-inline-block ms-2">{{ auth()->user()->name }}</span>
                            <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ms-1 mt-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0"
                            aria-labelledby="page-header-user-dropdown">
                            <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                                <img class="img-avatar img-avatar48 img-avatar-thumb"
                                    src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
                                <p class="mt-2 mb-0 fw-medium">{{ auth()->user()->name }}</p>

                            </div>
                            <div class="p-2">

                                {{-- <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="{{ route('admin.profile') }}">
                                <span class="fs-sm fw-medium">Profile</span> --}}

                                </a>

                            </div>
                            <div role="separator" class="dropdown-divider m-0"></div>
                            <div class="p-2">

                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    onclick="document.getElementById('logout-form').submit()">
                                    <span class="fs-sm fw-medium">Log Out</span>
                                </a>
                                <form action="{{ route('logout') }}" id="logout-form" method="POST">
                                    @csrf

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->



                    <!-- Toggle Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->

                    <!-- END Toggle Side Overlay -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->



            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-body-extra-light">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-light">
            <div class="content py-3">
                <div class="row fs-sm">

                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <a class="fw-semibold" href="#" target="_blank">Hotel Booking</a>
                        &copy;
                        <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!--
            OneUI JS

            Core libraries and functionality
        -->
    <script src="{{ asset('js/oneui.app.js') }}"></script>

    <!-- Laravel Scaffolding JS -->
    <!-- <script src="{{ asset('/js/laravel.app.js') }}"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')

    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>
    {{-- <script src="assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script> --}}
    <script src="{{ asset('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>


    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

    <script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>

    <script src="{{ asset('js/plugins/dropzone/min/dropzone.min.js') }}"></script>



    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

    <script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>

    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>


    <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider + BS Colorpicker plugins) -->
    <script>
        One.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-maxlength', 'jq-select2', 'jq-masked-inputs',
            'jq-rangeslider', 'jq-colorpicker'
        ]);
        // $(".drp0select2").select2({
        //     dropdownParent: $(".modal")
        // });
        FilePond.registerPlugin(FilePondPluginImagePreview);
    </script>





    @yield('js_after')



    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#form-" + id).submit();
                    // Swal.fire(
                    //     'Deleted!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )
                }
            })
        }

        window.addEventListener('show-status', event => {
            Swal.fire({
                icon: event.detail.type,
                title: event.detail.msg,
            })
        })

        window.addEventListener('scroll-top', event => {

            $("body").scrollTop(0);

        })




        function ckeditor() {
            return {
                /**
                 * The function creates the editor and returns its instance
                 * @param $dispatch Alpine's magic property
                 */
                create: async function($dispatch) {
                    // Create the editor with the x-ref
                    const editor = await ClassicEditor.create(this.$refs.ckEditor);
                    // Handle data updates
                    editor.model.document.on('change:data', function() {
                        $dispatch('input', editor.getData())
                    });
                    // return the editor
                    return editor;
                },
                /**
                 * Initilizes the editor and creates a listener to recreate it after a rerender
                 * @param $dispatch Alpine's magic property
                 */
                init: async function($dispatch) {
                    // Get an editor instance
                    const editor = await this.create($dispatch);
                    // Set the initial data
                    editor.setData('{{ old('description') }}')
                    // Pass Alpine context to Livewire's
                    const $this = this;
                    // On reinit, destroy the old instance and create a new one
                    Livewire.on('reinit', async function(e) {
                        editor.setData('');
                        editor.destroy()
                            .catch(error => {
                                console.log(error);
                            });
                        await $this.create($dispatch);
                    });
                }
            }
        }
    </script>
</body>

</html>
