<!doctype html>
<html lang="en">
<head>

    @include('backend.pages.head')
    @yield('head')

</head>
<body class="sidebar-mini fixed">

@include('backend\pages.header_nav')

<div class="wrapper">
    <div class="content-wrapper">

@yield('content')

    </div>
</div>

@include('backend.pages.script_js')
@yield('js')



@yield('footer')

</body>
</html>