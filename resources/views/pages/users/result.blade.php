@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <!-- search header -->
                <section id="faq-search-filter">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-congratulations">
                                <div class="card-body text-center">
                                    <img src="../../../app-assets/images/elements/decore-left.png"
                                        class="congratulations-img-left" alt="card-img-left">
                                    <img src="../../../app-assets/images/elements/decore-right.png"
                                        class="congratulations-img-right" alt="card-img-right">
                                    <div class="avatar avatar-xl bg-primary shadow">
                                        <div class="avatar-content">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-award font-large-1">
                                                <circle cx="12" cy="8" r="7"></circle>
                                                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="mb-1 text-white">Ваши результаты</h1>
                                        <p class="card-text m-auto w-75">
                                            Здесь собраны результаты тестирования по всем темам
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-12 mb-2 mb-md-0">

                                            <div class="alert alert-success mb-0" role="alert">
                                                <h4 class="alert-heading">Отлично!</h4>
                                                <div class="alert-body">
                                                    Вы набрали <strong>{{ $user->percent_build }} баллов</strong> по
                                                    строительству @if ($user->percent_build >= 40)
                                                        и можете
                                                        участвовать в <a href="">креативном задании</a>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="alert alert-success mb-0" role="alert">
                                                <h4 class="alert-heading">Отлично!</h4>
                                                <div class="alert-body">
                                                    Вы набрали <strong>{{ $user->percent_eco }} баллов</strong> по
                                                    экологии @if ($user->percent_eco >= 40)
                                                        и можете
                                                        участвовать в <a href="">креативном задании</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /search header -->

                <!-- frequently asked questions tabs pills -->
                <section id="faq-tabs">
                    <!-- vertical tab pill -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="faq-navigation d-flex justify-content-between flex-column mb-2 mb-md-0">
                                <!-- pill tabs navigation -->
                                <ul class="nav nav-pills nav-left flex-column" role="tablist">
                                    <!-- payment -->
                                    <li class="nav-item">
                                        <a class="nav-link active" id="payment" data-bs-toggle="pill" href="#faq-payment"
                                            aria-expanded="true" role="tab">
                                            <i data-feather="credit-card" class="font-medium-3 me-1"></i>
                                            <span class="fw-bold">Строительство</span>
                                        </a>
                                    </li>

                                    <!-- delivery -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="delivery" data-bs-toggle="pill" href="#faq-delivery"
                                            aria-expanded="false" role="tab">
                                            <i data-feather="shopping-bag" class="font-medium-3 me-1"></i>
                                            <span class="fw-bold">Экология</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- FAQ image -->
                                <img src="../../../app-assets/images/illustration/faq-illustrations.svg"
                                    class="img-fluid d-none d-md-block" alt="demand img">
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <!-- pill tabs tab content -->
                            <div class="tab-content">
                                <!-- payment panel -->
                                <div role="tabpanel" class="tab-pane active" id="faq-payment" aria-labelledby="payment"
                                    aria-expanded="true">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary me-1">
                                            <i data-feather="credit-card" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">Строительство</h4>
                                            <span>Разверните вопрос чтобы увидеть свой ответ</span>
                                        </div>
                                    </div>
                                    <!-- frequent answer and question  collapse  -->
                                    <div class="accordion accordion-margin mt-2" id="faq-payment-qna">
                                        @foreach ($allQuestions['build'] as $build)
                                            <div class="card accordion-item">
                                                <h2 class="accordion-header" id="user_answer_{{ $build->id }}">
                                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                        role="button"
                                                        data-bs-target="#user_answer_{{ $build->id }}_table"
                                                        aria-expanded="false"
                                                        aria-controls="user_answer_{{ $build->id }}_table">
                                                        {{ $build->question_text }}
                                                    </button>
                                                </h2>
                                                <div id="user_answer_{{ $build->id }}_table"
                                                    class="collapse accordion-collapse question_answer"
                                                    aria-labelledby="user_answer_{{ $build->id }}"
                                                    data-bs-parent="#faq-payment-qna">
                                                    <div class="accordion-body">
                                                        @if ($build->question_type != 'text')
                                                            <div class="mb-2 question_attach">
                                                                @if ($build->question_type == 'image')
                                                                    <img class="card-img-top"
                                                                        src="/app-assets/images/slider/04.jpg"
                                                                        alt="Card image cap">
                                                                @elseif ($build->question_type == 'video')
                                                                    <div class="video-player" id="plyr-video-player">
                                                                        <iframe
                                                                            src="https://www.youtube.com/embed/bTqVqk7FSmY"
                                                                            allowfullscreen="" allow="autoplay"></iframe>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        <div class="table-responsive">
                                                            @include('pages.users.include.table-answers', [
                                                                'answers' => $build->question_answers,
                                                                'userAnswer' => $build->user_answer_id,
                                                            ])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- delivery panel -->
                                <div class="tab-pane" id="faq-delivery" role="tabpanel" aria-labelledby="delivery"
                                    aria-expanded="false">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary me-1">
                                            <i data-feather="shopping-bag" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">Экология</h4>
                                            <span>Разверните вопрос чтобы увидеть свой ответ</span>
                                        </div>
                                    </div>

                                    <!-- frequent answer and question  collapse  -->
                                    <div class="accordion accordion-margin mt-2" id="faq-delivery-qna">
                                        @foreach ($allQuestions['eco'] as $eco)
                                            <div class="card accordion-item">
                                                <h2 class="accordion-header" id="user_answer_{{ $eco->id }}">
                                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                        role="button"
                                                        data-bs-target="#user_answer_{{ $eco->id }}_table"
                                                        aria-expanded="false"
                                                        aria-controls="user_answer_{{ $eco->id }}_table">
                                                        {{ $eco->question_text }}
                                                    </button>
                                                </h2>
                                                <div id="user_answer_{{ $eco->id }}_table"
                                                    class="collapse accordion-collapse question_answer"
                                                    aria-labelledby="user_answer_{{ $eco->id }}"
                                                    data-bs-parent="#faq-payment-qna">
                                                    <div class="accordion-body">
                                                        @if ($eco->question_type != 'text')
                                                            <div class="mb-2 question_attach">
                                                                @if ($eco->question_type == 'image')
                                                                    <img class="card-img-top"
                                                                        src="/app-assets/images/slider/04.jpg"
                                                                        alt="Card image cap">
                                                                @elseif ($eco->question_type == 'video')
                                                                    <div class="video-player" id="plyr-video-player">
                                                                        <iframe
                                                                            src="https://www.youtube.com/embed/bTqVqk7FSmY"
                                                                            allowfullscreen="" allow="autoplay"></iframe>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        <div class="table-responsive">
                                                            @include('pages.users.include.table-answers', [
                                                                'answers' => $eco->question_answers,
                                                                'userAnswer' => $eco->user_answer_id,
                                                            ])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- / frequently asked questions tabs pills -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('otherStyles')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/page-faq.min.css">
    <!-- END: Page CSS-->
@endsection
@section('vendorScripts')
@endsection
@section('otherScripts')
@endsection
