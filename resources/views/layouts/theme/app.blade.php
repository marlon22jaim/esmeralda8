<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>la Esmeralda -</title>
        <meta name="robots" content="noindex, nofollow" />
        <meta content="" name="description" />
        <meta content="" name="keywords" />

        <!-- STYLES -->
        @include('layouts.theme.styles')
        <!-- END STYLES -->
    </head>
    <body>
        <!-- HEADER -->
        @include('layouts.theme.header')
        <!-- END HEADER -->

        <!-- SIDEBAR HEADER -->
        @include('layouts.theme.sidebar')

        <!-- END SIDEBAR -->

        <!-- CONTENT-MAIN -->
        <main id="main" class="main">
            <div class="pagetitle">
                @yield('content')
            </div>
        </main>
        <!-- END CONTENT-MAIN -->

        <!-- FOOTER -->
        @include('layouts.theme.footer')

        <!-- END FOOTER -->
        <a
            href="#"
            class="back-to-top d-flex align-items-center justify-content-center"
            ><i class="bi bi-arrow-up-short"></i
        ></a>

        <!-- SCRIPTS -->
        @include('layouts.theme.scripts')
        <!-- END SCRIPTS -->
    </body>
</html>
