<!DOCTYPE html>
<html lang="en">
<head>
    @include('_partials.main.head')
</head>
<body>

    @include('_partials.main.header')

    @yield('content')

    @include('_partials.main.footer')
    @yield('script')

<!-- scripts -->
<!-- END: scripts -->

</body>
</html>
