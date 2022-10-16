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
                    <div class="card faq-search"
                        style="background-image: url('../../../app-assets/images/banner/banner.png')">
                        <div class="card-body text-center">
                            <!-- main title -->
                            <h2 class="text-primary">Ваши результаты</h2>
                            <!-- subtitle -->
                            <p class="card-text mb-2">Здесь собраны результаты тестирования по всем темам</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-statistics">
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-12 mb-2 mb-md-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-primary me-2">
                                                    <div class="avatar-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-trending-up avatar-icon">
                                                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18">
                                                            </polyline>
                                                            <polyline points="17 6 23 6 23 12"></polyline>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{ $user->percent_build }}
                                                        баллов
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">по
                                                        строительству</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-danger me-2">
                                                    <div class="avatar-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-box avatar-icon">
                                                            <path
                                                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                                            </path>
                                                            <polyline points="3.27 6.96 12 12.01 20.73 6.96">
                                                            </polyline>
                                                            <line x1="12" y1="22.08" x2="12"
                                                                y2="12"></line>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{ $user->percent_eco }}
                                                        баллов</h4>
                                                    <p class="card-text font-small-3 mb-0">по
                                                        экологии</p>
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
