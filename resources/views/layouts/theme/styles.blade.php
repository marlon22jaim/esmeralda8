<link href="{{ asset('assets/img/LA_ESMERALDA_logo.svg') }}" rel="icon" />
<link href="{{ asset('assets/img/LA_ESMERALDA_logo.svg') }}" rel="apple-touch-icon" />
<link href="https://fonts.gstatic.com" rel="preconnect" />
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet" />
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/bootstrap-icons.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/boxicons.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/quill.snow.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/quill.bubble.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/remixicon.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/simple-datatables.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

{{-- Otros --}}
{{-- <script src="{{ asset('assets/js/loader.js') }}"></script> --}}
<link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/font-icons/fontawesome/css/fontawesome.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" />

<link href="{{ asset('assets/css/widgets/modules-widgets.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/structure.css') }}" rel="stylesheet" class="structure" />
<link href="{{ asset('assets/css/elements/avatar.css') }}" rel="stylesheet" />


{{-- end otros --}}
<style>
    aside {
        /* display: none !important; */
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #3b3f5c;
        border-color: #3b3f5c;
    }

    @media (max-width:480px) {
        .mtnmobile {
            margin-bottom: 20px !important;
        }

        .mbmobile {
            margin-bottom: 10px !important;
        }

        .hideonsm {
            display: none !important;
        }

        .inblock {
            display: block;
        }
    }
</style>
{{-- Añadiendo estilos livewire --}}
@livewireStyles
