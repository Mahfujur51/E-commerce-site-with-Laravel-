
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('backend/vendor/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendor/font-awesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
</head>
<body class="sidebar-fixed header-fixed">
<div class="page-wrapper">
   @include('inc.nav')

    <div class="main-container">
        <div class="sidebar">
           @include('inc.sidebar')
        </div>

        <div class="content">
            @yield('content')
        </div>
    </div>
</div>
<script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend/vendor/popper.js/popper.min.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/vendor/chart.js/chart.min.js')}}"></script>
<script src="{{asset('backend/js/carbon.js')}}"></script>
<script src="{{asset('backend/js/demo.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script>
    @if (Session::has('success'))
    toastr.success("{{Session::get('success')}}")
    {{-- expr --}}
    @endif
    @if (Session::has('info'))
    toastr.info("{{Session::get('info')}}")
    {{-- expr --}}
    @endif

</script>
</body>
</html>
