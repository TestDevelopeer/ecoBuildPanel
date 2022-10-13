@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <a class="brand-logo" href="/">
                            <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                        y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%"
                                        y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path"
                                                d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                                style="fill: currentColor"></path>
                                            <path id="Path1"
                                                d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                                fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                                points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                            </polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                                points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                            </polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                                points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <h2 class="brand-text text-primary ms-1">ИСОиП АБИТУРИЕНТ</h2>
                        </a>
                        <!-- /Brand logo-->

                        <!-- Left Text-->
                        <div class="col-lg-3 d-none d-lg-flex align-items-center p-0">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center">
                                <img class="img-fluid w-100" src="/app-assets/images/illustration/create-account.svg"
                                    alt="multi-steps">
                            </div>
                        </div>
                        <!-- /Left Text-->

                        <!-- Register-->
                        <div class="col-lg-9 d-flex align-items-center auth-bg px-2 px-sm-3 px-lg-5 pt-3">
                            <div class="width-700 mx-auto">
                                <div class="bs-stepper register-multi-steps-wizard shadow-none">
                                    <div class="bs-stepper-header px-0" role="tablist">
                                        <div class="step" data-target="#account-details" role="tab"
                                            id="account-details-trigger">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    <i class="fa-light fa-user"></i>
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Основное</span>
                                                    <span class="bs-stepper-subtitle">Информация о себе.</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line">
                                            <i data-feather="chevron-right" class="font-medium-2"></i>
                                        </div>
                                        <div class="step" data-target="#personal-info" role="tab"
                                            id="personal-info-trigger">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    <i class="fa-light fa-school"></i>
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Образование</span>
                                                    <span class="bs-stepper-subtitle">Место учебы.</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line">
                                            <i data-feather="chevron-right" class="font-medium-2"></i>
                                        </div>
                                        <div class="step" data-target="#billing" role="tab" id="billing-trigger">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    <i class="fa-light fa-sliders-up"></i>
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Аккаунт</span>
                                                    <span class="bs-stepper-subtitle">Данные для входа</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content px-0 mt-2">
                                        <div id="account-details" class="content" role="tabpanel"
                                            aria-labelledby="account-details-trigger">
                                            <div class="content-header mb-2">
                                                <h2 class="fw-bolder mb-75">Основная информация</h2>
                                                <span>Заполните поля ниже чтобы перейти на следующую форму.</span>
                                            </div>
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-4 mb-1">
                                                        <label class="form-label" for="last_name">Фамилия</label>
                                                        <input type="text" name="last_name" id="last_name"
                                                            class="form-control" placeholder="Ваша фамилия">
                                                    </div>
                                                    <div class="col-md-4 mb-1">
                                                        <label class="form-label" for="first_name">Имя</label>
                                                        <input type="text" name="first_name" id="first_name"
                                                            class="form-control" placeholder="Ваше имя">
                                                    </div>
                                                    <div class="col-md-4 mb-1">
                                                        <label class="form-label" for="patronymic">Отчество</label>
                                                        <input type="text" name="patronymic" id="patronymic"
                                                            class="form-control" placeholder="Ваше отчество">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 mb-1">
                                                        <label class="form-label" for="city">Город</label>
                                                        <input type="text" name="city" id="city"
                                                            class="form-control" placeholder="Из какого вы города?">
                                                    </div>
                                                    <div class="col-md-4 mb-1">
                                                        <label class="form-label" for="phone">Телефон</label>
                                                        <input type="text" name="phone" id="phone"
                                                            class="form-control mobile-number-mask phone_mask"
                                                            placeholder="+7(___) ___-__-__">
                                                    </div>
                                                    <div class="col-md-4 mb-1">
                                                        <label class="form-label" for="social">Соц. сеть</label>
                                                        <input type="text" name="social" id="social"
                                                            class="form-control" placeholder="Ссылка, id"
                                                            aria-label="john.doe">
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="d-flex justify-content-between mt-2">
                                                <button class="btn btn-outline-secondary btn-prev" disabled="">
                                                    <i data-feather="chevron-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">Назад</span>
                                                </button>
                                                <button type="button" class="btn btn-primary btn-next">
                                                    <span class="align-middle d-sm-inline-block d-none">Далее</span>
                                                    <i data-feather="chevron-right"
                                                        class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="personal-info" class="content" role="tabpanel"
                                            aria-labelledby="personal-info-trigger">
                                            <div class="content-header mb-2">
                                                <h2 class="fw-bolder mb-75">Образование</h2>
                                                <span>Заполните поля ниже чтобы перейти на следующую форму.</span>
                                            </div>
                                            <form>
                                                <div class="row">
                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label" for="school">Учебное
                                                            заведение</label>
                                                        <input type="text" name="school" id="school"
                                                            class="form-control" placeholder="Где вы учитесь?">
                                                    </div>
                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label" for="class">Класс / Курс</label>
                                                        <input type="number" min="1" max="11"
                                                            name="class" id="class" class="form-control"
                                                            placeholder="В каком классе / На каком курсе?">
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="teacher_name">ФИО
                                                            руководителя</label>
                                                        <input type="text" name="teacher_name" id="teacher_name"
                                                            class="form-control"
                                                            placeholder="Как зовут вашего руководителя?">
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="teacher_job">Должность
                                                            руководителя</label>
                                                        <input type="text" name="teacher_job" id="teacher_job"
                                                            class="form-control"
                                                            placeholder="Должность вашего руководителя">
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="d-flex justify-content-between mt-2">
                                                <button class="btn btn-primary btn-prev">
                                                    <i data-feather="chevron-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">Назад</span>
                                                </button>
                                                <button type="button" class="btn btn-primary btn-next">
                                                    <span class="align-middle d-sm-inline-block d-none">Далее</span>
                                                    <i data-feather="chevron-right"
                                                        class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="billing" class="content" role="tabpanel"
                                            aria-labelledby="billing-trigger">
                                            <div class="content-header mb-2">
                                                <h2 class="fw-bolder mb-75">Данные аккаунта</h2>
                                                <span>Заполните поля ниже чтобы закончить регистрацию.</span>
                                            </div>
                                            <form>
                                                <div class="row">
                                                    <div class="mb-1 col-md-12">
                                                        <label class="form-label" for="email">Email</label>
                                                        <input type="email" name="email" id="email"
                                                            class="form-control" placeholder="Ваш Email">
                                                    </div>
                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label" for="password">Пароль</label>
                                                        <input type="password" name="password" id="password"
                                                            class="form-control" placeholder="Придумайте пароль">
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="repeat_password">Повторите
                                                            пароль</label>
                                                        <input type="password" name="repeat_password"
                                                            id="repeat_password" class="form-control"
                                                            placeholder="Повторите ваш пароль">
                                                    </div>
                                                </div>
                                                <div class="mb-1">
                                                    <div class="form-check">
                                                        <input checked disabled class="form-check-input" type="checkbox"
                                                            id="register-privacy-policy" tabindex="4">
                                                        <label class="form-check-label" for="register-privacy-policy">
                                                            Регистрируясь вы принимаете условия <a
                                                                href="#">пользовательского соглашения</a>.
                                                        </label>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="d-flex justify-content-between mt-1">
                                                <button class="btn btn-primary btn-prev">
                                                    <i data-feather="chevron-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">Назад</span>
                                                </button>
                                                <button class="btn btn-success btn-submit">
                                                    <i data-feather="check" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">Продолжить</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2 mt-2">
                                        <a type="button" href="{{ route('login') }}"
                                            class="btn btn-outline-primary waves-effect">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-home me-25">
                                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                            </svg>
                                            <span>Вход</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('otherStyles')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/form-wizard.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->
@endsection
@section('vendorScripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="/app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <script src="/app-assets/vendors/js/forms/jquery.maskedinput.min.js"></script>
    <script src="/app-assets/vendors/js/forms/sex_by_russian_name.js"></script>
    <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <!-- END: Page Vendor JS-->
@endsection
@section('otherScripts')
    <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/pages/auth-register.min.js"></script>
    <!-- END: Page JS-->
    <script>
        jQuery(function($) {
            $(".phone_mask").mask("+7(999) 999-99-99");
        });
    </script>
@endsection
