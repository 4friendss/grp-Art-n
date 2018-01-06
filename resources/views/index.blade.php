<!DOCTYPE html>
<html lang="fa">
<head>
    <title>Artan Group</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="شرکت برنامه نویسی آرتان">
    <meta name="keywords"
          content="طراحی سایت, کارآموزی کامپیوتر,طراحی سایت php, وب سرویس,api,طراحی سایت از پایه, طراحی سایت لاراول, کارآموزی وب نویسی, برنامه نویسی سایت">
    <meta name="author" content="محسن نساجی زواره">
    <link rel="short icon" href="{{URL::asset('public/main/assets/img/logo.png')}}"/>
    <link rel="stylesheet" href="{{URL::asset('public/main/assets/css/main.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/main/assets/newsSlider/sliderengine/amazingslider-2.css')}}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--project slider --}}
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/main/assets/productSlider/slick/slick2.css')}}"/>
    {{--project slider --}}

    {{--flipping_gallery --}}
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/main/assets/internshipSlider/flipping_gallery.css')}}">
    {{--flipping_gallery end--}}

    {{--alert plugin --}}
    <link rel="stylesheet" href="{{URL::asset('public/main/assets/alertPlugin/alertify.core.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('public/main/assets/alertPlugin/alertify.default.css')}}" id="toggleCSS"/>
    {{--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>--}}
    <script src="{{URL::asset('public/main/assets/alertPlugin/alertify.js')}}"></script>
    {{--alert end--}}

    {{--team slider --}}
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Load miSlider -->
    <link href="{{URL::asset('public/main/assets/teamSlider/css/mislider.css')}}" rel="stylesheet">
    <link href="{{URL::asset('public/main/assets/teamSlider/css/mislider-skin-cameo.css')}}" rel="stylesheet">
    <script src="{{URL::asset('public/main/assets/teamSlider/js/mislider.js')}}"></script>
    <script src="https://use.fontawesome.com/5419f8ac71.js"></script>
    <script>
        jQuery(function ($) {
            var slider = $('.mis-stage').miSlider({
                //  The height of the stage in px. Options: false or positive integer. false = height is calculated using maximum slide heights. Default: false
                //stageHeight: 380,
                //  Number of slides visible at one time. Options: false or positive integer. false = Fit as many as possible.  Default: 1
                slidesOnStage: false,
                //  The location of the current slide on the stage. Options: 'left', 'right', 'center'. Defualt: 'left'
                slidePosition: 'center',
                //  The slide to start on. Options: 'beg', 'mid', 'end' or slide number starting at 1 - '1','2','3', etc. Defualt: 'beg'
                slideStart: 'mid',
                //  The relative percentage scaling factor of the current slide - other slides are scaled down. Options: positive number 100 or higher. 100 = No scaling. Defualt: 100
                slideScaling: 150,
                //  The vertical offset of the slide center as a percentage of slide height. Options:  positive or negative number. Neg value = up. Pos value = down. 0 = No offset. Default: 0
                offsetV: -5,
                //  Center slide contents vertically - Boolean. Default: false
                centerV: true,
                //  Opacity of the prev and next button navigation when not transitioning. Options: Number between 0 and 1. 0 (transparent) - 1 (opaque). Default: .5
                navButtonsOpacity: 1
            });
        });
    </script>
</head>
<body>
<!-- notification for small viewports and landscape oriented smartphones -->
<div class="device-notification">
    <a class="device-notification--logo" href="#0">
        <img src="{{URL::asset('public/main/assets/img/logo.png')}}" alt="Artan Group" title="Artan Group" width="40px">
        <p>Artan Group</p>
    </a>
    <p class="device-notification--message">Welcome to artan Artan Group Co.</p>
</div>
<div class="perspective effect-rotate-left">
    <div class="container">
        <div class="outer-nav--return"></div>
        <div id="viewport" class="l-viewport">
            <div class="l-wrapper">
                <header class="header">
                    <a class="header--logo" href="#0">
                        <img src="{{URL::asset('public/main/assets/img/logo.png')}}" alt="Artan Group" width="40px">
                        <p>Artan Group</p>
                    </a>
                    <button class="header--cta cta">ثبت نام کارآموز</button>
                    <div class="header--nav-toggle">
                        <span></span>
                    </div>
                </header>
                <nav class="l-side-nav">
                    <ul class="side-nav">
                        <li class="is-active"><span>آرتان</span></li>
                        <li><span>درباره ی آرتان</span></li>
                        <li><span>محصولات</span></li>
                        <li><span>تیم فنی</span></li>
                        <li><span>دستاورد ها</span></li>
                        <li><span>تماس با ما</span></li>
                        <li><span>کارآموزی</span></li>
                        <li><span>ثبت نام کارآموز</span></li>
                    </ul>
                </nav>
                <ul class="l-main-content main-content">
                    {{-- home page start--}}
                    <li class="l-section section section--is-active">
                        <div class="intro">
                            <div class="intro--banner">
                                <h1 class="col-md-6 col-xs-3 col-sm-3">Live your dreams<br></h1>
                                <button class="cta">ثبت نام کارآموز
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 150 118" style="enable-background:new 0 0 150 118;"
                                         xml:space="preserve">
                                      <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                                          <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z"/>
                                      </g>
                                  </svg>
                                    <span class="btn-background"></span>
                                </button>
                                <img class="img-responsive"
                                     src="{{URL::asset('public/main/assets/img/introduction-visual.png')}}"
                                     alt="Welcome" style="max-width: 760px">
                            </div>
                            <div class="intro--options">
                                <a href="#0">
                                    <h3>طراحی وب سایت</h3>
                                    <p dir="rtl">طراحی و ساخت وب سایت های رسپانسیو به همراه طراحی پنل مدیریت اختصاصی
                                    </p>
                                </a>
                                <a href="#0">
                                    <h3>طراحی اپلیکیشن</h3>
                                    <p>طراحی و ساخت اپلیکیشن های زیبا و به روز برای موبایل </p>
                                </a>
                                <a href="#0">
                                    <h3>برنامه های تحت ویندوز</h3>
                                    <p>طراحی و ساخت برنامه های تحت ویندوز</p>
                                </a>
                            </div>
                        </div>
                    </li>
                    {{-- home page start--}}
                    {{-- about start--}}
                    <li class="l-section section">
                        <div class="about">
                            <div class="about--banner">
                                <h2>Live<br>your<br>dreams<br>with us
                                    <br><a href="#0">با ما رویاهایتان را به حقیقت تبدیل کنید
                                        <span>
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 150 118"
                                             style="enable-background:new 0 0 150 118;" xml:space="preserve">
                                        <g transform="translate(0.000000,118.000000) scale(0.100000,-0.100000)">
                                          <path d="M870,1167c-34-17-55-57-46-90c3-15,81-100,194-211l187-185l-565-1c-431,0-571-3-590-13c-55-28-64-94-18-137c21-20,33-20,597-20h575l-192-193C800,103,794,94,849,39c20-20,39-29,61-29c28,0,63,30,298,262c147,144,272,271,279,282c30,51,23,60-219,304C947,1180,926,1196,870,1167z"/>
                                        </g>
                                        </svg>
                                    </span>
                                    </a></h2>
                                <img src="{{URL::asset('public/main/assets/img/logo.png')}}" alt="Artan Group">

                                <p>
                                    شرکت برنامه نویسی آرتان در سال 1395 با تیم برنامه نویسی متخصص و مدیریت جناب دکتر
                                    محسن نساجی با مدرک دکتری سخت افزار از دانشگاه صنعتی اصفهان تأسیس شد.<br>
                                    شرکت آرتان فعالیت خود را در زمینه تولید نرم افزار تحت ویندوز و وب، اندروید، IOS،
                                    طراحی سایت های داینامیک و پیشرفته شروع نمود.
                                    هدف برتر تأسیس شرکت آرتان استعداد یابی و رشد نیروی کاری در زمینه ی طراحی صفحات وب،
                                    ویندوز و ... می باشد. </p>


                            </div>

                            {{--<div class="about--options">--}}
                            {{--<a href="#0">--}}
                            {{--<h3>Winners</h3>--}}
                            {{--</a>--}}
                            {{--<a href="#0">--}}
                            {{--<h3>Philosophy</h3>--}}
                            {{--</a>--}}
                            {{--<a href="#0">--}}
                            {{--<h3>History</h3>--}}
                            {{--</a>--}}
                            {{--</div>--}}
                        </div>
                    </li>
                    {{-- about End--}}
                    {{-- project start--}}
                    <li class="l-section section">
                        <div class="work">
                            <h2 style="margin-top: 4%">محصولات آرتان</h2>

                            <section class="autoplay1">
                                @foreach($projects_products as $pr)
                                    @foreach($pr->ProjectImage as $val)
                                        <div>
                                            <a href="{{url('projectDetail/' . $pr->id)}}"
                                               title="{{$pr->title}}" alt="{{$pr->title}}">
                                                <img src="{{url('public/dashboard/upload_files/projects/'.$val->src)}}"
                                                     class="img-res img-width-100 img-width-200">
                                            </a>
                                        </div>
                                    @endforeach
                                @endforeach
                            </section>
                            <h2 style="margin-top: 0">نمونه کارهای آرتان</h2>
                            <section class="autoplay2">
                                @foreach($projects_works as $pr)
                                    @foreach($pr->ProjectImage as $val)
                                        <div>
                                            <a href="{{url('projectDetail/' . $pr->id)}}" title="{{$pr->title}}"
                                               alt="{{$pr->title}}">
                                                <img src="{{url('public/dashboard/upload_files/projects/'.$val->src)}}"
                                                     class="img-res img-width-100 img-width-200">
                                            </a>
                                        </div>
                                    @endforeach
                                @endforeach
                            </section>
                        </div>
                    </li>
                    {{-- project End--}}
                    {{-- team slider Start--}}
                    <li class="l-section section">
                        <div class="work">
                            <h2 style="margin-top: 28%">تیم آرتان</h2>
                            <figure>
                                <div class="mis-stage">
                                    <!-- The element to select and apply miSlider to - the class is optional -->
                                    <ol class="mis-slider">
                                        <!-- The slider element - the class is optional - Set width of slide using CSS on this element -->
                                        @foreach($user as $val)
                                            <li class="mis-slide">
                                                <!-- A slide element - the class is optional -->
                                                <a href="#" class="mis-container">
                                                    <!-- A slide container - this element is optional, if absent the plugin adds it automatically -->
                                                    <figure>
                                                        <!-- Slide content - whatever you want -->
                                                        <img src="{{url('public/dashboard/upload_files/team/'.$val->src)}}"
                                                             alt="{{$val->title. ' '.$val->name.' '.$val->family}}"
                                                             title="{{$val->description}}">
                                                        <figcaption>{{$val->title. ' '.$val->name.' '.$val->family}}</figcaption>
                                                        <figcaption>«&nbsp {{$val->description}} &nbsp»</figcaption>
                                                    </figure>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ol>
                                </div>
                            </figure>
                        </div>
                    </li>
                    {{-- team slider End--}}
                    {{-- news start--}}
                    <li class="l-section section">
                        <div id="amazingslider-wrapper-2" class="newsSlider"
                             style="display:block;position:relative;padding-left:5%; padding-right:5%;">
                            <div id="amazingslider-2" style="display:block;position:relative;margin:0 auto;">
                                <ul class="amazingslider-slides" style="display:none;">
                                    @foreach($news as $val)
                                        <li><img alt="{{$val->title}}" title="{{$val->title}}"
                                                 data-description="{{$val->description}}"
                                                 src="{{url('public/dashboard/upload_files/team/'.$val->src)}}"/>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="amazingslider-thumbnails" style="display:none;">
                                    @foreach($news as $val)
                                        <li><img src="{{url('public/dashboard/upload_files/team/'.$val->src)}}"
                                                 alt="{{$val->title}}" title="{{$val->title}}"/></li>
                                    @endforeach
                                </ul>
                                {{--<div class="amazingslider-engine"><a href="http://amazingslider.com" title="Responsive Image Slider jQuery">Responsive Image Slider jQuery</a></div>--}}
                            </div>
                        </div>
                    </li>
                    {{-- news End--}}
                    {{-- map start--}}
                    <li class="l-section section">
                        <div class="contact">
                            <div class="contact--lockup">
                                <div class="modal" dir="rtl">
                                    <div class="modal--information">
                                        <p>اصفهان، میدان شهدا، خیابان فروغی،<br> بالاتر از مسجد امیرالمؤمنین(ع)، جنب
                                            لوستری
                                            ونوس، شرکت آرتان</p>
                                        <a href="mailto:ouremail@gmail.com">artansoftware@info.ir</a>
                                        <a href="tel:+148126287560">0313-3376496</a>
                                    </div>
                                    <ul class="modal--options">
                                        <li><a href="mailto:ouremail@gmail.com">تماس با ما</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- map End--}}
                    {{-- intership slider Start--}}

                    <li class="l-section section">
                        <div class="work">
                            <div class="page-container">
                                <div class="gallery">
                                    @foreach($internship as $val)
                                        <a href="#" data-caption="{{$val->title}}">
                                            <!-- هئشلث-->
                                            <img src="{{url('public/dashboard/upload_files/internship/'.$val->src)}}"/>
                                        </a>
                                    @endforeach
                                </div>
                                <div class="navigation">
                                    <a href="#" class="btn prev">قبلی</a>
                                    <a href="#" class="btn next">بعدی</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- intership slider End--}}
                    {{-- hire start--}}
                    <li class="l-section section">
                        <div class="hire">
                            <h2 class="hire-head" style="margin-bottom:0 !important;">فرم کارآموزی</h2>
                            <h2 style="margin:0 !important;">چه کار هایی میتونید انجام بدید؟</h2>
                            <!-- checkout formspree.io for easy form setup -->
                            <form class="work-request" id="internshipForm">
                                <div class="work-request--options">
                                      <span class="options-a">
                                        <input id="opt-1-PHP" type="checkbox" value="PHP">
                                        <label for="opt-1-PHP">
                                          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                               xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                               viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;"
                                               xml:space="preserve">
                                          <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                                            <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                                          </g>
                                          </svg>
                                          PHP
                                        </label>
                                        <input id="opt-2-Database" type="checkbox" value="Database (SQL or MYSQL)">
                                        <label for="opt-2-Database">
                                          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                               xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                               viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;"
                                               xml:space="preserve">
                                          <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                                            <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                                          </g>
                                          </svg>Database (SQL or MYSQL)
                                        </label>
                                        <input id="opt-3-ASP" type="checkbox" value="ASP">
                                        <label for="opt-3-ASP">
                                          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                               xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                               viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;"
                                               xml:space="preserve">
                                          <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                                            <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                                          </g>
                                          </svg>ASP
                                        </label>
                                      </span>
                                    <span class="options-b">
                                        <input id="opt-4-Android" type="checkbox" value="Android & Java">
                                        <label for="opt-4-Android">
                                          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                               xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                               viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;"
                                               xml:space="preserve">
                                          <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                                            <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                                          </g>
                                          </svg>Android & Java
                                        </label>
                                        <input id="opt-5-IOS" type="checkbox" value="IOS">
                                        <label for="opt-5-IOS">
                                          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                               xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                               viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;"
                                               xml:space="preserve">
                                          <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                                            <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                                          </g>
                                          </svg>
                                            IOS
                                        </label>
                                        <input id="opt-6-HTML" type="checkbox" value="HTML & HTML5">
                                        <label for="opt-6-HTML">
                                          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                               xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                               viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;"
                                               xml:space="preserve">
                                          <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                                            <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                                          </g>
                                          </svg>
                                          HTML & HTML5
                                        </label>
                                        <input id="opt-7-CSS" type="checkbox" value="CSS & CSS3">
                                        <label for="opt-7-CSS">
                                          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                               xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                               viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;"
                                               xml:space="preserve">
                                          <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                                            <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                                          </g>
                                          </svg>
                                          CSS & CSS3
                                        </label>
                                        <input id="opt-8-JavaScript" type="checkbox" value="JavaScript & JQuery">
                                        <label for="opt-8-JavaScript">
                                          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                               xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                               viewBox="0 0 150 111" style="enable-background:new 0 0 150 111;"
                                               xml:space="preserve">
                                          <g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)">
                                            <path d="M950,705L555,310L360,505C253,612,160,700,155,700c-6,0-44-34-85-75l-75-75l278-278L550-5l475,475c261,261,475,480,475,485c0,13-132,145-145,145C1349,1100,1167,922,950,705z"/>
                                          </g>
                                          </svg>
                                          JavaScript & JQuery
                                        </label>
                                      </span>
                                </div>
                                <input id="expert" name="expert" type="hidden" value="">
                                <div class="work-request--information">
                                    <div class="information-name">
                                        <input id="name" name="name" type="text" spellcheck="false">
                                        <label for="name"> نام و نام خانوادگی</label>
                                    </div>
                                    <div class="information-email">
                                        <input id="email" name="email" type="email" spellcheck="false">
                                        <label for="email">ایمیل</label>
                                    </div>
                                </div>
                                <div class="work-request--information">
                                    <div class="information-name">
                                        <input id="gender" name="gender" type="text" spellcheck="false">
                                        <label for="gender">جنسیت<span>(زن / مرد)</span></label>
                                    </div>
                                    <div class="information-name">
                                        <input id="age" name="age" type="email" spellcheck="false">
                                        <label for="age">سن
                                            <span>(به عدد)</span></label>
                                    </div>
                                </div>
                                <div class="work-request--information">
                                    <div class="information-name">
                                        <input id="education" name="education" type="text" spellcheck="false">
                                        <label for="education">تحصیلات
                                            <span>(دیپلم/کاردانی/کارشناسی/کارشناسی ارشد/دکتری)</span> </label>
                                    </div>
                                    <div class="information-name">
                                        <input id="tel" name="tel" type="text" spellcheck="false">
                                        <label for="tel"> شماره تلفن
                                            <span> (11 رقمی همراه با کد شهرستان ) </span></label>
                                    </div>
                                </div>
                                <input type="button" id="internshipSend" style="margin-top: -4%;" value="ثبت درخواست">
                            </form>
                        </div>
                    </li>
                    {{-- hire End--}}
                </ul>
            </div>
        </div>
    </div>
    <ul class="outer-nav">
        <li class="is-active"> آرتان</li>
        <li>درباره ی آرتان</li>
        <li>محصولات</li>
        <li>تیم فنی</li>
        <li>دستاوردها</li>
        <li>تماس با ما</li>
        <li>دوره های کارآموزی</li>
        <li>ثبت نام کارآموز</li>
    </ul>
</div>
<script async="" src="//www.google-analytics.com/analytics.js"></script>
<script>window.jQuery || document.write('<script src="{{URL::asset('public/main/assets/js/vendor/jquery-2.2.4.min.js')}}"><\/script>')</script>
<script src="{{URL::asset('public/main/assets/js/functions-min.js')}}"></script>
<script src="{{URL::asset('public/main/assets/newsSlider/sliderengine/initslider-2.js')}}"></script>
<script src="{{URL::asset('public/main/assets/newsSlider/sliderengine/jquery.js')}}"></script>
<script src="{{URL::asset('public/main/assets/newsSlider/sliderengine/amazingslider.js')}}"></script>
{{--flipping_gallery (internship)--}}
<script src="{{URL::asset('public/main/assets/internshipSlider/jquery.flipping_gallery.js')}}"></script>
{{--flipping_gallery end--}}
<script>
    $(document).ready(function () {
        $(".gallery").flipping_gallery({
            enableScroll: false,
            autoplay: 8000
        });

        $(".next").click(function () {
            $(".gallery").flipForward();
            return false;
        });
        $(".prev").click(function () {
            $(".gallery").flipBackward();
            return false;
        });
    });

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $("#internshipSend").click(function () {
            var expert = '';
            if ($('#opt-1-PHP').is(':checked'))
                expert += 'PHP -';
            if ($('#opt-2-Database').is(':checked'))
                expert += 'Database(MySQL & SQL) -';
            if ($('#opt-3-ASP').is(':checked'))
                expert += 'ASP -';
            if ($('#opt-4-Android').is(':checked'))
                expert += 'Android & Java -';
            if ($('#opt-5-IOS').is(':checked'))
                expert += 'IOS -';
            if ($('#opt-6-HTML').is(':checked'))
                expert += 'HTML & HTML5 -';
            if ($('#opt-7-CSS').is(':checked'))
                expert += 'CSS & CSS3 -';
            if ($('#opt-8-JavaScript').is(':checked'))
                expert += 'JavaScript & JQuery';
            $('#expert').val(expert);

            var formData = new FormData($('#internshipForm')[0]);
            $.ajax({
                type: 'post',
                cache: false,
                url: "{{URL::asset('registerInternship')}}",
                data: formData,
                dataType: 'json',
                contentType: false,//very important for upload file
                processData: false,//very important for upload file
                success: function (data) {
                    alertify.alert('اطلاعات شما با مؤفقیت ثبت شد');
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        var x = xhr.responseJSON;
                        var errorsHtml = '';
                        $.each(x, function (key, value) {
                            errorsHtml += value[0] + '<br>'; //showing only the first error.
                        });
                        alertify.alert(errorsHtml);
                    }
                    else if (xhr.status === 421) {
                        alertify.alert('متاسفانه مشکلی رخ داده است با پشتیبانی تماس حاصل فرمائید');
                    }
                    else {
                        alertify.alert('متاسفانه مشکلی رخ داده است با پشتیبانی تماس حاصل فرمائید');
                    }
                }
            });

        });

    });
</script>
{{--project slider --}}
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{URL::asset('public/main/assets/productSlider/slick/slick.js')}}"></script>
{{--project slider --}}
<script>

    $(document).ready(function () {
        $('.autoplay1').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
        });
        $('.autoplay2').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
        });
    });

</script>
</body>
</html>
