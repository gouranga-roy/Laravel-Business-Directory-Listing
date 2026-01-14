@extends('layouts::app')

@section('loadCssFiles')
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/bootstrap-slider.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/fontawesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/nice-select.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/jquery-ui.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/summernote-lite.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/choices.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/quill.snow.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/responsive.css') }}" rel="stylesheet" />
@endsection


@section('mainContent')
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay"></div>

    <main class="main-wrapper">
        @include('admin::sidebar')

        <!-- [ Page Wrapper ] Start -->
        <div class="page-wrapper">
            <div class="container-fluid p-0">
                @include('admin::navbar')
                <!-- [ Page Content ] Start -->
                <div class="page-content">
                    @yield('content')
                </div>
            </div>
        </div>

    </main>
@endsection


@section('loadJsFiles')
    <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/choices.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/chart.js') }}"></script>
    <script src="{{ asset('assets/backend/js/quill.js') }}"></script>
    <script src="{{ asset('assets/backend/js/script.js') }}"></script>
@endsection
