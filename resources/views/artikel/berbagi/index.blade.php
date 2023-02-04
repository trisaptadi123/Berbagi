<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_service" style="background:#f7f7f7;">
<!-- loader -->
@include('layouts.header2')


@yield('content')

@include('layouts.modal')

@include('layouts.footer_plus')

@include('layouts.js')
</body>
</html>
