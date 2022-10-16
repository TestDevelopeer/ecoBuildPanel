@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-lg-6 offset-lg-3 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-lg-12 d-flex justify-content-between">
                            <h2 class="content-header-title float-start mb-0" id="questions_type"
                                data-type="{{ $type }}">
                                Тестирование по@if ($type == 'eco')
                                    экологии
                                @elseif ($type == 'build')
                                    строительству
                                @endif
                            </h2>
                            <button type="button" class="btn btn-icon" id="show_tour">
                                <i class="fa-regular fa-circle-info"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <!-- basic custom options -->
                <div class="row">
                    <!-- custom option radio -->
                    <div class="col-12 col-lg-6 offset-lg-3" id="question_block">
                        @include('pages.questions.include.question')
                    </div>
                </div>
                <!-- / basic custom options -->
            </div>
        </div>
    </div>
    @if ($tutorial)
        <div id="isTutorial"></div>
    @endif
    <!-- END: Content-->
@endsection

@section('otherStyles')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/plyr.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/ext-component-media-player.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/shepherd.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/ext-component-tour.min.css">
    <!-- END: Page CSS-->
@endsection
@section('vendorScripts')
    <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/plyr.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/plyr.polyfilled.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/tether.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/shepherd.min.js"></script>
@endsection
@section('otherScripts')
    <!-- BEGIN: Page JS-->
    <script src="/assets/js/pages/questions/questions-tour.js"></script>
    <!-- END: Page JS-->
    <script src="/assets/js/pages/questions/questions.js"></script>
@endsection
