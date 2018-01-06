<!DOCTYPE html>
<html lang="fa">
<head>
    <title>Artan Group -
        @foreach($projects as $val)
            {{$val->title}}
        @endforeach</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="شرکت برنامه نویسی آرتان">
    <meta name="keywords"
          content="طراحی سایت, کارآموزی کامپیوتر,طراحی سایت php, وب سرویس,api,طراحی سایت از پایه, طراحی سایت لاراول, کارآموزی وب نویسی, برنامه نویسی سایت">
    <meta name="author" content="محسن نساجی زواره">
    <link rel="short icon" href="{{URL::asset('public/main/assets/img/logo.png')}}"/>
    <link rel="stylesheet" href="{{URL::asset('public/main/assets/css/main.css')}}">
    <link href="{{ URL::asset('public/main/assets/css/bootstrap.css')}}" rel="stylesheet">
    {{--<link rel="stylesheet" type="text/css"--}}
    {{--href="{{URL::asset('public/main/assets/newsSlider/sliderengine/amazingslider-2.css')}}">--}}
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--project slider --}}
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/main/assets/productSlider/slick/slick2.css')}}"/>
    {{--project slider --}}
    {{--alert plugin --}}
    <link rel="stylesheet" href="{{URL::asset('public/main/assets/alertPlugin/alertify.core.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('public/main/assets/alertPlugin/alertify.default.css')}}" id="toggleCSS"/>
    {{--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>--}}
    <script src="{{URL::asset('public/main/assets/alertPlugin/alertify.js')}}"></script>
    {{--alert end--}}

    {{--team slider --}}
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/5419f8ac71.js"></script>
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
    <div class="container padding-phone no-padding">
        <div class="outer-nav--return"></div>
        <div id="viewport" class="l-viewport" style="min-height: 100vh !important;height: 130vh;">
            <div class="l-wrapper" style="max-width:96.5% !important;width: inherit !important;">
                <header class="header">
                    <a class="header--logo" href="{{url('/')}}">
                        <img src="{{URL::asset('public/main/assets/img/logo.png')}}" alt="Artan Group" width="40px">
                        <p>Artan Group</p>
                    </a>
                    <div class="header--nav-toggle">
                        <span></span>
                    </div>
                </header>
                <nav class="l-side-nav" style="height: 0%;">
                    <ul class="side-nav">
                        {{--<li class="is-active"><span>{{$projectTitle}}</span></li>--}}
                    </ul>
                </nav>
                <ul class="l-main-content main-content">
                    {{-- project start--}}
                    <li class="l-section section section--is-active">
                        <div class="text-justify">
                            <div class="row project-height" style="border-bottom: 3px solid #00adef;">
                                <div class="col-md-12 margin-5 margin-16 padding-phone">
                                    <div class="col-md-3 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2 project-padding padding-phone">
                                        <div class="col-md-10 col-offset-1 project-padding">
                                            <section class="autoplay1">
                                                @foreach($project[0]->projectImage as $val)
                                                    <div>
                                                        <a href="{{url('projectDetail/' . $val->id)}}"
                                                           title="{{$val->title}}" alt="{{$val->title}}">
                                                            <img src="{{url('public/dashboard/upload_files/projects/'.$val->src)}}"
                                                                 class="img-responsive img-res img-width-100 img-width-200">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </section>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12 col-xs-12 project-padding " dir="rtl">
                                        <div class="col-md-12 " dir="rtl">نام پروژه :
                                            {{$val->title}}
                                        </div>
                                        <div class="col-md-12 hidden-xs hidden-sm" style="height:25px;"></div>
                                        @foreach($project as $val)
                                            <div class="col-md-12 padding-phone">
                                                {!! $val->description!!}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 margin-5" dir="rtl">
                                    <div class="col-md-4 col-lg-offset-5">
                                        تلفن تماس ما: 12345678903
                                    </div>
                                    <div class="col-md-3">
                                        ایمیل ما:
                                        artan@gmail.com
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 " style="border-top: 1px #00adef;">
                                <section class="autoplay2">
                                    @foreach($projects as $pr)
                                        @foreach($pr->ProjectImage as $val)
                                            <div>
                                                <a target="_blank"
                                                   href="{{url('public/dashboard/upload_files/projects/'.$val->src)}}"
                                                   title="{{$pr->title}}"
                                                   alt="{{$pr->title}}">
                                                    <img src="{{url('public/dashboard/upload_files/projects/'.$val->src)}}"
                                                         class="img-responsive" style="height: 100px;width: 100px">
                                                </a>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </section>
                            </div>
                        </div>
                    </li>
                    {{-- project End--}}
                </ul>
            </div>
        </div>
    </div>
    <ul class="outer-nav">
        <li class=""><a href="{{url('/')}}">صفحه ی اصلی</a></li>
    </ul>
</div>
<script async="" src="//www.google-analytics.com/analytics.js"></script>
<script>window.jQuery || document.write('<script src="{{URL::asset('public/main/assets/js/vendor/jquery-2.2.4.min.js')}}"><\/script>')</script>
<script src="{{URL::asset('public/main/assets/js/functions-min-details.js')}}"></script>
{{--<script src="{{URL::asset('public/main/assets/newsSlider/sliderengine/initslider-2.js')}}"></script>--}}
<script src="{{URL::asset('public/main/assets/newsSlider/sliderengine/jquery.js')}}"></script>
{{--<script src="{{URL::asset('public/main/assets/newsSlider/sliderengine/amazingslider.js')}}"></script>--}}
{{--flipping_gallery (internship)--}}
{{--<script src="{{URL::asset('public/main/assets/internshipSlider/jquery.flipping_gallery.js')}}"></script>--}}
{{--flipping_gallery end--}}
<script>
    //    $(document).ready(function () {
    //        $(".gallery").flipping_gallery({
    //            enableScroll: false,
    //            autoplay: 8000
    //        });
    //
    //        $(".next").click(function () {
    //            $(".gallery").flipForward();
    //            return false;
    //        });
    //        $(".prev").click(function () {
    //            $(".gallery").flipBackward();
    //            return false;
    //        });
    //    });

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
//        $('body').bind("mousewheel", function() {
//            return false;
//        });
        $('.autoplay1').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 4000,
        });
        $('.autoplay2').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
        });
    });

</script>
</body>
</html>
