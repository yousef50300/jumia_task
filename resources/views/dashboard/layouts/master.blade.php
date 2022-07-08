<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @stack('before-styles')
    <link rel="stylesheet" href="{{ asset('css/backend.css') }}">
    @stack('after-styles')

    <style>
        @media print {
            .breadcrumb, .nav-tabs, .card-header, .col-sm-4 .card-title {
                display: none !important;
            }

            .tab-content, .card {
                border: none;
            }

            .rosheta_div,
            .add_products_div,
            .print_hidden {
                display: none;
            }
        }
    </style>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-off-canvas sidebar-lg-show">

@include('dashboard.layouts.partial.header')

<div class="app-body">
    @include('dashboard.layouts.partial.aside')

    <main class="main" id="app">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard.index') }}">
                    {{ __('core.home') }}
                </a>
            </li>
        </ol>

        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="content-header">
                    @yield('page-header')
                </div><!--content-header-->

                @include('dashboard.layouts.partial.messages')

                @yield('content')

            </div><!--animated-->
        </div><!--container-fluid-->
    </main><!--main-->

    @include('dashboard.layouts.partial.aside')
</div><!--app-body-->

@include('dashboard.layouts.partial.footer')

@stack('before-scripts')

<script src="{{ asset('js/backend.js') }}"></script>

@stack('after-scripts')

<script>
    $('body').on('xhr.dt', function (e, settings, data, xhr) {
        if (typeof phpdebugbar != "undefined") {
            if (xhr.getAllResponseHeaders()) {
                phpdebugbar.ajaxHandler.handle(xhr);
            }
        }
    });
</script>


</body>
</html>
