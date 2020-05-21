<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.header_scripts')
</head>
<body>

<div id="wrapper">

    @include('backend.header')

    @include('backend.sidebar')

    <div class="content-page" id="app">
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        @include('backend.footer')


    </div>

</div>
@include('backend.footer_scripts')
@yield('scripts')
</body>
</html>
