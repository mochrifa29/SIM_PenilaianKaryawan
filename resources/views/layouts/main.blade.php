<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ $title }}</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <script src="/kaiadmin/assets/js/core/jquery-3.7.1.min.js"></script>

    <!-- Fonts and icons -->
    <script src="/kaiadmin/assets/js/plugin/webfont/webfont.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["/kaiadmin/assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/kaiadmin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/kaiadmin/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="/kaiadmin/assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="/kaiadmin/assets/css/demo.css" />
</head>

<body>
    <div class="wrapper">

        @include('partials.sidebar')


        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>

                @include('partials.navbar')

            </div>

            <div class="container">
                @yield('content')
            </div>

            @include('partials.footer')

        </div>
    </div>
    <!--   Core JS Files   -->

    <script src="/kaiadmin/assets/js/core/popper.min.js"></script>
    <script src="/kaiadmin/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="/kaiadmin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="/kaiadmin/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="/kaiadmin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="/kaiadmin/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="/kaiadmin/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="/kaiadmin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="/kaiadmin/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="/kaiadmin/assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Google Maps Plugin -->
    <script src="/kaiadmin/assets/js/plugin/gmaps/gmaps.js"></script>

    <!-- Sweet Alert -->
    <script src="/kaiadmin/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="/kaiadmin/assets/js/kaiadmin.min.js"></script>

    <!-- Datatables -->
    <script src="/kaiadmin/assets/js/plugin/datatables/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable({});
            $('.select2').select2({

            });

            // $("#multi-filter-select").DataTable({
            //     pageLength: 5,
            //     initComplete: function() {
            //         this.api()
            //             .columns()
            //             .every(function() {
            //                 var column = this;
            //                 var select = $(
            //                         '<select class="form-select"><option value=""></option></select>'
            //                     )
            //                     .appendTo($(column.footer()).empty())
            //                     .on("change", function() {
            //                         var val = $.fn.dataTable.util.escapeRegex($(this).val());

            //                         column
            //                             .search(val ? "^" + val + "$" : "", true, false)
            //                             .draw();
            //                     });

            //                 column
            //                     .data()
            //                     .unique()
            //                     .sort()
            //                     .each(function(d, j) {
            //                         select.append(
            //                             '<option value="' + d + '">' + d + "</option>"
            //                         );
            //                     });
            //             });
            //     },
            // });
        });
    </script>
</body>

</html>
