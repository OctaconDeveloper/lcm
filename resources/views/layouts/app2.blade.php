<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
    <link href="https://lcm-62f517d95952.herokuapp.com/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="https://lcm-62f517d95952.herokuapp.com/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="auth-bg">

    <div class="d-flex flex-column flex-root">
        <div
            class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">

            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <a href="/" class="mb-12">
                    <img alt="Logo" src="https://lcm-62f517d95952.herokuapp.com/assets/media/logos/logo.png" class="h-60px" />
                </a>
                <div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
                    @yield('content')
                </div>
            </div>
            <div class="d-flex flex-center flex-column-auto p-10">
                {{-- <div class="d-flex align-items-center fw-bold fs-6"> --}}
                    <span class="text-gray-400 fw-bold me-1">&copy; {{ Date('Y') }}</span>
                    <a href="/" target="_blank"
                        class="text-muted text-hover-primary fw-bold me-2 fs-6">{{env('APP_NAME')}}</a>
                {{-- </div> --}}
            </div>
        </div>
    </div>

    <script src="https://lcm-62f517d95952.herokuapp.com/assets/plugins/global/plugins.bundle.js"></script>
    <script src="https://lcm-62f517d95952.herokuapp.com/assets/js/scripts.bundle.js"></script>
    <script src="https://lcm-62f517d95952.herokuapp.com/assets/js/custom/authentication/sign-in/general.js"></script>
</body>

</html>
