<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MOVIESAURUS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        html,
        body {
            height: 100%;
            padding: 0;
            margin: 0;
        }

        #wrapper {
            overflow-x: hidden;
        }

        #sidebar-wrapper {
            /* min-height: 100vh; */
            margin-left: -15rem;
            -webkit-transition: margin .25s ease-out;
            -moz-transition: margin .25s ease-out;
            -o-transition: margin .25s ease-out;
            transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
            /* padding: 0.875rem 1.25rem; */
            font-size: 35px;
        }

        #sidebar-wrapper .list-group {
            width: 15rem;
        }

        #page-content-wrapper {
            min-width: 100vw;
            height: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: 0;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
                height: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15rem;
            }
        }

    </style>

</head>

<body class="bg-evening">
    <div id="app" style="height: 100%;" class="bg-evening">
        <div id="wrapper" class="d-flex">
            <!-- Sidebar -->
            <sidebar></sidebar>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <navigation></navigation>
                <div class="overflow-auto">
                    <vue-page-transition name="fade">
                        <router-view></router-view>
                    </vue-page-transition>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div>
        <footer-bottom></footer-bottom>
        <loader></loader>
    </div>
</body>

<script src="{{ asset('js/app.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}
<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");

        // Reset all images
        $(".toggler i.alt").hide();
        $(".toggler i.orig").show();

        // Now toggle the ones in this .toggler
        $("img", this).toggle();
    });
</script>

</html>
