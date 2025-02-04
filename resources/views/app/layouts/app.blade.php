<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield("title")</title>
    <!-- General CSS Files -->
    <link href="{{ asset("modules/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("modules/fontawesome/css/all.min.css") }}" rel="stylesheet">
    <!-- Template CSS -->
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset("css/components.css") }}" rel="stylesheet">
    <link href="{{ asset("css/forms.css") }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include("app.components.navbar")
            @include("app.components.sidebar")

            <div class="main-content">
                @yield("content")
            </div>

            @include("app.components.footer")

        </div>

        {{-- General JavaScript Script --}}
        <script src="{{ asset("modules/jquery/jquery.min.js") }}"></script>
        <script src="{{ asset("modules/popper/popper.js") }}"></script>
        <script src="{{ asset("modules/tooltip/tooltip.js") }}"></script>
        <script src="{{ asset("modules/bootstrap/js/bootstrap.min.js") }}"></script>
        <script src="{{ asset("modules/nicescroll/jquery.nicescroll.min.js") }}"></script>
        <script src="{{ asset("modules/moment/moment.min.js") }}"></script>
        <script src="{{ asset("js/stisla.js") }}"></script>

        {{-- JavaScript Libraries --}}
        <script src="{{ asset("modules/sweetalert/sweetalert.min.js") }}"></script>

        {{-- Template JavaScript Script --}}
        <script src="{{ asset("js/scripts.js") }}"></script>
        <script src="{{ asset("js/custom.js") }}"></script>
    </div>
    @yield("scripts")
</body>

</html>
